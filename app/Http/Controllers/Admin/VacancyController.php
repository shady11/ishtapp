<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Busyness;
use App\Models\JobType;
use App\Models\Region;
use App\Models\Schedule;
use App\Models\Vacancy;
use App\Models\VacancyType;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        return view('admin.vacancies.index');
    }

    public function create()
    {
        $vacancy = new Vacancy();

        return view('admin.vacancies.create', compact('vacancy'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $vacancy = Vacancy::create($request->all());
        $vacancy->save();

        return redirect()->route('vacancies.index', $vacancy);
    }

    public function edit(Vacancy $vacancy)
    {
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $vacancy->update($request->all());

        $vacancy->save();

        return redirect()->route('vacancies.index', $vacancy);
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return response('Success', 200);
    }


    public function api(){
        $data = Vacancy::all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $buttons = '<a href="'.route('vacancies.edit', $row->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Редактировать">
                            <i class="jam jam-write"></i>
                        </a>
                        <a href="'.route('vacancies.destroy', $row->id).'" data-id="'.$row->id.'" class="btn-to-alert m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Удалить">
                            <i class="jam jam-trash-alt"></i>
                        </a>';
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}

