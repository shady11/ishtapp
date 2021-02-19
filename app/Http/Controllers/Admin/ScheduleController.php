<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedules.index');
    }

    public function create()
    {
        $schedule = new Schedule();

        return view('admin.schedules.create', compact('schedule'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $schedule = Schedule::create($request->all());
        $schedule->save();

        return redirect()->route('schedules.index', $schedule);
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $schedule->update($request->all());

        $schedule->save();

        return redirect()->route('schedules.index', $schedule);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response('Success', 200);
    }


    public function api(){
        $data = Schedule::all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $buttons = '<a href="'.route('schedules.edit', $row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Редактировать">
                            <i class="jam jam-write"></i>
                        </a>
                        <a href="'.route('schedules.destroy', $row->id).'" data-id="'.$row->id.'" class="btn-to-alert m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Удалить">
                            <i class="jam jam-trash-alt"></i>
                        </a>';
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}

