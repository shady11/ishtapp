<?php

namespace App\Http\Controllers\Admin;

use App\Models\VacancyType as VacancyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class VacancyTypeController extends Controller
{
    public function index()
    {
        return view('admin.vacancy_types.index');
    }

    public function create()
    {
        $vacancy_type = new VacancyType();

        return view('admin.vacancy_types.create', compact('vacancy_type'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $vacancy_type = VacancyType::create($request->all());
        $vacancy_type->save();

        return redirect()->route('vacancy_types.index', $vacancy_type);
    }

    public function edit(VacancyType $vacancy_type)
    {
        return view('admin.vacancy_types.edit', compact('vacancy_type'));
    }

    public function update(Request $request, VacancyType $vacancy_type)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $vacancy_type->update($request->all());

        $vacancy_type->save();

        return redirect()->route('vacancy_types.index', $vacancy_type);
    }

    public function destroy(VacancyType $vacancy_type)
    {
        $vacancy_type->delete();
        if($vacancy_type->avatar) @unlink($vacancy_type->avatar);
        return response('Success', 200);
    }


    public function api(){
        $data = VacancyType::all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $buttons = '<a href="'.route('vacancy_types.edit', $row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Редактировать">
                            <i class="jam jam-write"></i>
                        </a>
                        <a href="'.route('vacancy_types.destroy', $row->id).'" data-id="'.$row->id.'" class="btn-to-alert m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Удалить">
                            <i class="jam jam-trash-alt"></i>
                        </a>';
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}
