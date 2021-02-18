<?php

namespace App\Http\Controllers\Admin;

use App\Models\Busyness as Busyness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class BusynessController extends Controller
{
    public function index()
    {
        return view('admin.busynesses.index');
    }

    public function create()
    {
        $busyness = new Busyness();

        return view('admin.busynesses.create', compact('busyness'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $busyness = Busyness::create($request->all());
        $busyness->save();

        return redirect()->route('busynesses.index', $busyness);
    }

    public function edit(Busyness $busyness)
    {
        return view('admin.busynesses.edit', compact('busyness'));
    }

    public function update(Request $request, Busyness $busyness)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $busyness->update($request->all());

        $busyness->save();

        return redirect()->route('busynesses.index', $busyness);
    }

    public function destroy(Busyness $busyness)
    {
        $busyness->delete();
        return response('Success', 200);
    }


    public function api(){
        $data = Busyness::all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $buttons = '<a href="'.route('busynesses.edit', $row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Редактировать">
                            <i class="jam jam-write"></i>
                        </a>
                        <a href="'.route('busynesses.destroy', $row->id).'" data-id="'.$row->id.'" class="btn-to-alert m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Удалить">
                            <i class="jam jam-trash-alt"></i>
                        </a>';
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}
