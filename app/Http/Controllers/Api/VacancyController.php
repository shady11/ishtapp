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
use Carbon\Carbon;
use DateTime;
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
        $region_ids = $request->region_ids;
        $time_type = $request->type;

        if (!$job_type_ids) {
            $job_type_ids = [];
            foreach (JobType::all() as $model) {
                array_push($job_type_ids, $model->id);
            }
        }
        if (!$busyness_ids) {
            $busyness_ids = [];
            foreach (Busyness::all() as $model) {
                array_push($busyness_ids, $model->id);
            }
        }
        if (!$schedule_ids) {
            $schedule_ids = [];
            foreach (Schedule::all() as $model) {
                array_push($schedule_ids, $model->id);
            }
        }
        if (!$type_ids) {
            $type_ids = [];
            foreach (VacancyType::all() as $model) {
                array_push($type_ids, $model->id);
            }
        }
        if (!$region_ids) {
            $region_ids = [];
            foreach (Region::all() as $model) {
                array_push($region_ids, $model->id);
            }
        }
        if(!$offset){
            $offset = 0;
        }

        $specificDate = strtotime('2000-1-1');
        $specificDate = date("Y-m-d H:i:s",$specificDate);
        if($time_type == 'day'){
            $date = new DateTime('-1 day');
            $specificDate = $date->format('Y-m-d H:i:s');
        }
        else if($time_type == 'week'){
            $date = new DateTime('-1 week');
            $specificDate = $date->format('Y-m-d H:i:s');
        }
        else if($time_type == 'month'){
            $date = new DateTime('-1 month');
            $specificDate = $date->format('Y-m-d H:i:s');
        }

        $result = [];
        $banned_ones = [];

        $token = $request->header('Authorization');
//        dd($token);
        if($token!="null") {
            $user = User::where("password", $token)->firstOrFail();
            if($user)
                $banned_ones = UserVacancy::where("user_id", $user->id)->where("type",'!=', 'LIKED_THEN_DELETED')->pluck('vacancy_id')->toArray();
        }

        $vacancies = Vacancy::whereIn('job_type_id', $job_type_ids)
            ->whereIn('schedule_id', $schedule_ids)
            ->whereIn('busyness_id', $busyness_ids)
            ->whereIn('vacancy_type_id', $type_ids)
            ->whereIn('region_id', $region_ids)
            ->whereNotIn("id", $banned_ones)
            ->where('is_active',true)
            ->whereDate('created_at','>', $specificDate)
            ->orderBy('created_at', 'desc');

        if ($offset) {
            $vacancies = $vacancies->skip($offset);
        }

        if($limit) {
            $vacancies = $vacancies->take($limit);
        }

        $vacancies = $vacancies->get();

        foreach ($vacancies->reverse() as $item) {
            array_push($result, [
                'id' => $item->id,
                'name' => $item->name,
                'title' => $item->title,
                'address' => $item->company->address,
                'description' => $item->description,
                'salary' => $item->salary,
                'company_name' => $item->company->name,
                'company_logo'=> $item->company->avatar,
                'busyness' => $item->busyness->getName($request->lang),
                'job_type' => $item->jobtype->getName($request->lang),
                'schedule' => $item->schedule->getName($request->lang),
                'type' => $item->vacancytype->getName($request->lang),
                'region' => $item->region->getName($request->lang),
                'company' => $item->company->id
            ]);
        }
        return $result;

    }

    public function storeCompanyVacancy(Request $request)
    {
        $token = $request->header('Authorization');

//        $busyness = $schedule = $job_type = $region = $type = 0;
//
//        if($request->busyness && $request->busyness != "null") $busyness = $request->busyness;
//        if($request->schedule && $request->schedule != "null") $schedule = $request->schedule;
//        if($request->job_type && $request->job_type != "null") $job_type = $request->job_type;
//        if($request->region && $request->region != "null") $region = $request->region;
//        if($request->type && $request->type != "null") $type = $request->type;

        $user = User::where("password", $token)->firstOrFail();

        if ($user && $user->type =='COMPANY'){

            if($request->id){
                $vacancy = Vacancy::update([
                    'name' => $request->name,
                    'salary' => $request->salary,
                    'description' => $request->description,
                    'busyness_id' => $request->busyness,
                    'schedule_id' => $request->schedule,
                    'job_type_id' => $request->job_type,
                    'region_id' => $request->region,
                    'vacancy_type_id' => $request->type,
                    'is_active' => true,
                ]);
            }
            else{
                $vacancy = Vacancy::create([
                    'name' => $request->name,
                    'salary' => $request->salary,
                    'description' => $request->description,
                    'busyness_id' => $request->busyness,
                    'schedule_id' => $request->schedule,
                    'job_type_id' => $request->job_type,
                    'region_id' => $request->region,
                    'vacancy_type_id' => $request->type,
                    'company_id' => $request->company_id,
                    'is_active' => true,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
//                if($request->busyness){
//                    echo $request->busyness;
//                    $vacancy->busyness_id = $request->busyness;
//                } else {
//                    echo 111;
//                }
//                die();
//                $vacancy->save();
            }
            return "OK";
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
            $existing_user_vacancy = UserVacancy::where("user_id", $user->id)
                ->where("vacancy_id", $vacancy_id)
                ->where("type", "LIKED")
                ->first();
            if($existing_user_vacancy) {
                $existing_user_vacancy ->update([
                    'type' => $type,
                ]);
                $existing_user_vacancy->save();
            }
            else{
                $user_vacancy = new UserVacancy;
                $user_vacancy->user_id = $user->id;
                $user_vacancy->vacancy_id = $vacancy_id;
                $user_vacancy->type = $type;
                $user_vacancy->save();
            }
            return 'OK';
        }
        else{
            return "token is not valid";
        }

    }
    public function getVacanciesByType(Request $request,$type)
    {

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();
        if($user){
//            $type = $request->type;
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
                            'address'=> $item->company->address,
                            'description'=> $item->description,
                            'salary'=> $item->salary,
                            'company_name' => $item->company->name,
                            'company_logo'=> $item->company->avatar,
                            'busyness' => $item->busyness->getName($request->lang),
                            'job_type' => $item->jobtype->getName($request->lang),
                            'schedule' => $item->schedule->getName($request->lang),
                            'type' => $item->vacancytype->getName($request->lang),
                            'region' => $item->region->getName($request->lang),
                            'company' => $item->company->id
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
    public function getNumberOfLikedVacancies(Request $request, $type)
    {

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->first();
        if($user){
            $result = UserVacancy::where("type", $type)
                ->where("user_id", $user->id)
                ->pluck('vacancy_id')->toArray();
            $vacancies = Vacancy::wherein('id', $result)->get();
            return count($vacancies);
        }
        else{
            return 'FALSE';
        }

    }
    public function getVacanciesByCompany(Request $request)
    {

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();
        if($user){
            $result1 = [];
            $vacancies = Vacancy::where('company_id', $user->id)->where('is_active', true)->orderBy('created_at', 'desc')->get();
            foreach ($vacancies as $item){
                array_push($result1, [
                    'id'=> $item->id,
                    'name'=> $item->name,
                    'title'=> $item->title,
                    'address'=> $item->company->address,
                    'description'=> $item->description,
                    'salary'=> $item->salary,
                    'company_name' => $item->company->name,
                    'company_logo'=> $item->company->avatar,
                    'busyness' => $item->busyness->getName($request->lang),
                    'job_type' => $item->jobtype->getName($request->lang),
                    'schedule' => $item->schedule->getName($request->lang),
                    'type' => $item->vacancytype->getName($request->lang),
                    'region' => $item->region->getName($request->lang),
                    'company' => $item->company->id
                ]);
            }
            return $result1;
        }
        else{
            return 'ERROR';
        }

    }
    public function getActiveVacanciesNumber(Request $request)
    {
        $token = $request->header('Authorization');

        if($token && $token != 'null'){
            $user = User::where("password", $token)->firstOrFail();
            return Vacancy::where('company_id', $user->id)->where('is_active', true)->count();
        } else {
            return Vacancy::where('is_active', true)->count();
        }

    }
    public function getInactiveVacanciesNumber(Request $request)
    {

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();
        if($user){
            $count = 0;
            foreach (Vacancy::where('company_id', $user->id)
                         ->where('is_active', false)
                         ->get() as $item){
                $count=$count+1;
            }
            return $count;
        }
        else{
            return 'ERROR';
        }

    }
    public function getInactiveVacanciesByCompany(Request $request)
    {

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();
        if($user){
            $result1 = [];
            foreach (Vacancy::where('company_id', $user->id)
                         ->where('is_active', false)
                         ->get() as $item){
                array_push($result1, [
                    'id'=> $item->id,
                    'name'=> $item->name,
                    'title'=> $item->title,
                    'address'=> $item->company->address,
                    'description'=> $item->description,
                    'salary'=> $item->salary,
                    'company_name' => $item->company->name,
                    'company_logo'=> $item->company->avatar,
                    'busyness' => $item->busyness->getName($request->lang),
                    'job_type' => $item->jobtype->getName($request->lang),
                    'schedule' => $item->schedule->getName($request->lang),
                    'type' => $item->vacancytype->getName($request->lang),
                    'region' => $item->region->getName($request->lang),
                    'company' => $item->company->id
                ]);
            }
            return $result1;
        }
        else{
            return 'ERROR';
        }

    }
    public function deleteCompanyVacancy(Request $request)
    {

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();
        if($user){
            $result1 = [];
            $vacancy = Vacancy::where('id', $request->vacancy_id)
                ->firstOrFail();
            if($vacancy){
                $vacancy->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'successfully deleted',
                ]);
            }
            else{
                return 'ERROR';
            }
        }
        else{
            return 'ERROR';
        }

    }
    public function activateDeactivateCompanyVacancy(Request $request)
    {

        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();
        if($user){
            $vacancy = Vacancy::where('id', $request->vacancy_id)
                ->firstOrFail();
            if($vacancy){
                $vacancy->is_active = $request->active;
                $vacancy->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'successfully deac',
                ]);
            }
            else{
                return 'ERROR';
            }
        }
        else{
            return 'ERROR';
        }

    }
}
