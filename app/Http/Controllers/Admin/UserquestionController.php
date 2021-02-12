<?php

namespace App\Http\Controllers\Admin;

use App\Models\Userquestion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserquestionController extends Controller
{
    public function index()
    {
        return view('admin.userquestions.index');
    }

    public function create()
    {
        $userquestion = new Userquestion();
        return view('admin.userquestions.create', compact('userquestion'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ru' => 'required',
            'name_ky' => 'required',
//            'email' => 'required|email',
//            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
//            'subject' => 'required',
//            'message' => 'required'
        ]);
        $userquestion = Userquestion::create($request->all());
//        try {
//            $userquestion = Userquestion::create([
//                'name_ru' => $request->name_ru,
//                'name_ky' => $request->name_ky
//            ]);
//            $userquestion->save();
//        } catch (QueryException $e) {
//            return redirect()->back()->with('error', 'все поля должны быть заполнены');
//        }
        return redirect()->route('userquestions.show', $userquestion);
    }

    public function show(Userquestion $userquestion)
    {
        return view('admin.userquestions.show', compact('userquestion'));
    }

    public function edit(Userquestion $userquestion)
    {
        return view('admin.userquestions.edit', compact('userquestion'));
    }

    public function update(Request $request, Userquestion $userquestion)
    {
        $userquestion->update([
            'name_ru' => $request->name_ru,
            'name_ky' => $request->name_ky
        ]);
        $userquestion->save();
        return redirect()->route('userquestions.show', $userquestion);
    }

    public function destroy(Userquestion $userquestion)
    {
        $userquestion->delete();
        return response('Success', 200);
    }

    public function api()
    {
        $data = Userquestion::get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $buttons = '<a href="' . route('userquestions.show', $row->id) . '" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Просмотр">
                            <i class="jam jam-info"></i>
                        </a>
                        <a href="' . route('userquestions.edit', $row->id) . '" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Редактировать">
                            <i class="jam jam-write"></i>
                        </a>
                        <a href="' . route('userquestions.destroy', $row->id) . '" data-id="' . $row->id . '" class="btn-to-alert m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Удалить">
                            <i class="jam jam-trash-alt"></i>
                        </a>';
            })
            ->make(true);
    }
}
