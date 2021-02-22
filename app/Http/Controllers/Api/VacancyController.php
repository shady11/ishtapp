<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\UserVacancy;
use App\Models\Vacancy;
use App\Models\User;
use App\Models\Busyness;
use App\Models\Schedule;
use App\Models\JobType;
use App\Models\VacancyType;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index(Request $request)
    {

        $limit = $request->limit;
        $offset = $request->offset;
        $job_type_ids = $request->job_type_ids;
        $schedule_ids = $request->schedule_ids;
        $busyness_ids = $request->busyness_ids;
        $type_ids = $request->type_ids;
//        dd($job_type_ids);
        $result = [];
        foreach (Vacancy::whereIn('job_type_id', $job_type_ids)
                     ->whereIn('schedule_id', $schedule_ids)
                     ->whereIn('busyness_id', $busyness_ids)
                     ->whereIn('vacancy_type_id', $type_ids)
                     ->skip($offset)
                     ->take($limit)
                     ->get() as $item){
//            dd($item);
            array_push($result, [
                'id'=> $item->id,
                'name'=> $item->name,
                'title'=> $item->title,
                'address'=> $item->address,
                'description'=> $item->description,
                'company_name'=> User::findOrFail($item->company_id)->name,
                'busyness'=> Busyness::findOrFail($item->busyness_id)->name,
                'job_type'=> JobType::findOrFail($item->job_type_id)->name,
                'schedule'=> Schedule::findOrFail($item->schedule_id)->name,
                'type'=> VacancyType::findOrFail($item->vacancy_type_id)->name,
                'company'=> User::findOrFail($item->company_id)->id
            ]);
        }
//        dd($result);
        return $result;

    }

    public function likeOrSubmit(Request $request)
    {

        $type = $request->type;
        $user_id = $request->user_id;
        $vacancy_id = $request->vacancy_id;

        UserVacancy::create($request->all());
        return 'OK';

    }
}
