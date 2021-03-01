<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Region;
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

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();

        if($user) {

            $limit = $request->limit;
            $offset = $request->offset;
            $job_type_ids = $request->job_type_ids;
            $schedule_ids = $request->schedule_ids;
            $busyness_ids = $request->busyness_ids;
            $type_ids = $request->type_ids;
            $region_ids = $request->region_ids;
            if ($job_type_ids == []) {
                foreach (JobType::all() as $model) {
                    array_push($job_type_ids, $model->id);
                }
            }
            if ($busyness_ids == []) {
                foreach (Busyness::all() as $model) {
                    array_push($busyness_ids, $model->id);
                }
            }
            if ($schedule_ids == []) {
                foreach (Schedule::all() as $model) {
                    array_push($schedule_ids, $model->id);
                }
            }
            if ($type_ids == []) {
                foreach (VacancyType::all() as $model) {
                    array_push($type_ids, $model->id);
                }
            }
            if ($region_ids == []) {
                foreach (Region::all() as $model) {
                    array_push($region_ids, $model->id);
                }
            }
            $banned_ones = UserVacancy::where("user_id", $user->id)->pluck('vacancy_id')->toArray();

            $result = [];
            foreach (Vacancy::whereIn('job_type_id', $job_type_ids)
                         ->whereIn('schedule_id', $schedule_ids)
                         ->whereIn('busyness_id', $busyness_ids)
                         ->whereIn('vacancy_type_id', $type_ids)
                         ->whereIn('region_id', $region_ids)
                         ->whereNotIn("id", $banned_ones)
                         ->skip($offset)
                         ->take($limit)
                         ->get() as $item) {
//            dd($item);
                array_push($result, [
                    'id' => $item->id,
                    'name' => $item->name,
                    'title' => $item->title,
                    'address' => $item->address,
                    'description' => $item->description,
                    'company_name' => User::findOrFail($item->company_id)->name,
                    'busyness' => Busyness::findOrFail($item->busyness_id)->name,
                    'job_type' => JobType::findOrFail($item->job_type_id)->name,
                    'schedule' => Schedule::findOrFail($item->schedule_id)->name,
                    'type' => VacancyType::findOrFail($item->vacancy_type_id)->name,
                    'region' => Region::findOrFail($item->region_id)->name,
                    'company' => User::findOrFail($item->company_id)->id
                ]);
            }
//        dd($result);
            return $result;
        }
        else{
            return "token is not valid";
        }

    }

    public function likeOrSubmit(Request $request)
    {

        $type = $request->type;
        $token = $request->header('Authorization');
        $vacancy_id = $request->vacancy_id;

        $user = User::where("password", $token)->firstOrFail();

        if($user){
            $request->user_id = $user->id;
//            dd($request);
            $user_vacancy = new UserVacancy;
            $user_vacancy->user_id = $user->id;
            $user_vacancy->vacancy_id = $vacancy_id;
            $user_vacancy->type = $type;
            $user_vacancy->save();
            return 'OK';
        }
        else{
            return "token is not valid";
        }

    }
    public function getVacanciesByType(Request $request)
    {

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();
        if($user){
            $type = $request->type;
            $result = UserVacancy::where("type", $type)
                ->where("user_id", $user->id)
                ->pluck('vacancy_id')->toArray();
            $vacancies = Vacancy::wherein('id', $result)->get();
            $result1 = [];
                    foreach (Vacancy::whereIn('id', $result)
                                 ->get() as $item){
            //            dd($item);
                        array_push($result1, [
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
                            'region'=> Region::findOrFail($item->region_id)->name,
                            'company'=> User::findOrFail($item->company_id)->id
                        ]);
                    }
//            $vacancies = Vacancy::where('id', 3)->get();
//            dd($vacancies);
            return $result1;
        }
        else{
            return 'FALSE';
        }

    }
}
