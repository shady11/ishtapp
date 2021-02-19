<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    public function index()
    {
        return view('admin.job_types.index');
    }

    public function create()
    {
        $job_type = new JobType();

        return view('admin.job_types.create', compact('job_type'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $job_type = JobType::create($request->all());
        $job_type->save();

        return redirect()->route('job_types.index', $job_type);
    }

    public function edit(JobType $job_type)
    {
        return view('admin.job_types.edit', compact('job_type'));
    }

    public function update(Request $request, JobType $job_type)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $job_type->update($request->all());

        $job_type->save();

        return redirect()->route('job_types.index', $job_type);
    }

    public function destroy(JobType $job_type)
    {
        $job_type->delete();
        return response('Success', 200);
    }


    public function api(){
        $data = JobType::all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $buttons = '<a href="'.route('job_types.edit', $row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Редактировать">
                            <i class="jam jam-write"></i>
                        </a>
                        <a href="'.route('job_types.destroy', $row->id).'" data-id="'.$row->id.'" class="btn-to-alert m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Удалить">
                            <i class="jam jam-trash-alt"></i>
                        </a>';
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}

