<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\EducationType;
use Illuminate\Http\Request;

class EducationTypeController extends Controller
{
    public function index()
    {
        return view('admin.education_types.index');
    }

    public function create()
    {
        $education_type = new EducationType();

        return view('admin.education_types.create', compact('education_type'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $education_type = EducationType::create($request->all());
        $education_type->save();

        return redirect()->route('education_types.index', $education_type);
    }

    public function edit(EducationType $education_type)
    {
        return view('admin.education_types.edit', compact('education_type'));
    }

    public function update(Request $request, EducationType $education_type)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $education_type->update($request->all());

        $education_type->save();

        return redirect()->route('education_types.index', $education_type);
    }

    public function destroy(EducationType $education_type)
    {
        $education_type->delete();
        return response('Success', 200);
    }


    public function api(){
        $data = EducationType::all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $buttons = '<a href="'.route('education_types.edit', $row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Редактировать">
                            <i class="jam jam-write"></i>
                        </a>
                        <a href="'.route('education_types.destroy', $row->id).'" data-id="'.$row->id.'" class="btn-to-alert m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Удалить">
                            <i class="jam jam-trash-alt"></i>
                        </a>';
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}

