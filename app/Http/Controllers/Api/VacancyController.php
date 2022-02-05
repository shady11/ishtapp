<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\District;
use App\Models\Region;
use App\Models\UserVacancy;
use App\Models\Vacancy;
use App\Models\User;
use App\Models\Busyness;
use App\Models\Schedule;
use App\Models\JobType;
use App\Models\VacancyType;
use \App\Models\Department;
use \App\Models\SocialOrientation;
use \App\Models\Opportunity;
use \App\Models\IntershipLanguage;
use \App\Models\OpportunityType;
use \App\Models\OpportunityDuration;
use \App\Models\RecommendationLetterType;
use \App\Models\Skillset;
use Illuminate\Support\Facades\DB;
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
        $district_ids = $request->district_ids;
        $time_type = $request->type;
        $opportunity_ids = $request->opportunity_ids;
        $opportunity_type_ids = $request->opportunity_type_ids;
        $opportunity_duration_ids = $request->opportunity_duration_ids;
        $internship_language_ids = $request->internship_language_ids;

        $route = $request->route;

        if (!$opportunity_ids) {
            !$opportunity_ids = [];
            foreach (Opportunity::all() as $model) {
                array_push($opportunity_ids, $model->id);
            }
        }

        if (!$opportunity_type_ids) {
            !$opportunity_type_ids = [];
            foreach (OpportunityType::all() as $model) {
                array_push($opportunity_type_ids, $model->id);
            }
        }

        if (!$opportunity_duration_ids) {
            !$opportunity_duration_ids = [];
            foreach (OpportunityDuration::all() as $model) {
                array_push($opportunity_duration_ids, $model->id);
            }
        }

        if (!$internship_language_ids) {
            !$internship_language_ids = [];
            foreach (IntershipLanguage::all() as $model) {
                array_push($internship_language_ids, $model->id);
            }
        }
        
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
        if (!$region_ids || $region_ids[0] == null) {
            $region_ids = [];
            foreach (Region::all() as $model) {
                array_push($region_ids, $model->id);
            }
        }
        if (!$district_ids) {
            $district_ids = [];
            foreach (District::all() as $model) {
                array_push($district_ids, $model->id);
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
        if($token!="null") {
            $user = User::where("password", $token)->firstOrFail();
            if($user)
                $banned_ones = UserVacancy::where("user_id", $user->id)->where("type",'!=', 'LIKED_THEN_DELETED')->pluck('vacancy_id')->toArray();
        }

        $vacancies = Vacancy::whereNotIn("id", $banned_ones)
            ->where('is_active',true)
            ->whereDate('created_at','>', $specificDate)
            ->orderBy('created_at', 'desc');

        if($route != 'PRODUCT_LAB') {
            $vacancies = $vacancies->whereIn('job_type_id', $job_type_ids)
            ->whereIn('schedule_id', $schedule_ids)
            ->whereIn('busyness_id', $busyness_ids)
            ->whereIn('vacancy_type_id', $type_ids)
            ->whereIn('region_id', $region_ids);
//            ->whereIn('district_id', $district_ids)
        } else {
            $vacancies = $vacancies->where("is_product_lab_vacancy", 1)
                ->whereIn('opportunity_id', $opportunity_ids)
                ->whereIn('opportunity_type_id', $opportunity_type_ids)
                ->whereIn('opportunity_duration_id', $opportunity_duration_ids)
                ->whereIn('internship_language_id', $internship_language_ids);
        }

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
                'is_disability_person_vacancy' => $item->is_disability_person_vacancy,
                'company_name' => $item->company->name,
                'company_logo'=> $item->company->avatar,
                'busyness' => $item->busyness ? $item->busyness->getName($request->lang) : null,
                'job_type' => $item->jobtype ? $item->jobtype->getName($request->lang) : null,
                'schedule' => $item->schedule ? $item->schedule->getName($request->lang) : null,
                'type' => $item->vacancytype ? $item->vacancytype->getName($request->lang) : null,
                'region' => $item->region ? $item->region->getName($request->lang) : null,
                'district' => $item->district ? $item->district->getName($request->lang) : null,
                'currency' => $item->currency ? $item->getcurrency->getName($request->lang) : null,
                'company' => $item->company->id,
                'opportunity' => $item->opportunity ? $item->opportunity->getName($request->lang) : null,
                'opportunity_type' => $item->opportunity_type ? $item->opportunity_type->getName($request->lang) : null,
                'internship_language' => $item->internship_language_id ? $item->internship_language->getName($request->lang) : null,
                'opportunity_duration' => $item->opportunity_duration_id ? $item->opportunity_duration->getName($request->lang) : null,
                'age_from' => $item->age_from,
                'age_to' => $item->age_to,
                'recommendation_letter_type' => $item->recommendation_letter_type_id ? $item->recommendation_letter_type->getName($request->lang) : null,
                'is_product_lab_vacancy' => $item->is_product_lab_vacancy,
            ]);
        }

        return $result;
    }

    public function storeCompanyVacancy(Request $request)
    {
        $token = $request->header('Authorization');

        $user = User::where("password", $token)->firstOrFail();

        $opportunity = Opportunity::where('name_ru', $request->opportunity)->orWhere('name', $request->opportunity)->first();
        $opportunity_type = OpportunityType::where('name_ru', $request->opportunity_type)->orWhere('name', $request->opportunity_type)->first();
        $internship_language = IntershipLanguage::where('name_ru', $request->internship_language)->orWhere('name', $request->internship_language)->first();
        $opportunity_duration = OpportunityDuration::where('name_ru', $request->opportunity_duration)->orWhere('name', $request->opportunity_duration)->first();
        $type_of_recommended_letter = RecommendationLetterType::where('name_ru', $request->type_of_recommended_letter)->orWhere('name', $request->type_of_recommended_letter)->first();

        if ($user && $user->type =='COMPANY') {
            if($request->salary){
                $salary = $request->salary;
            } else {
                if($request->salary_from){
                    if($request->salary_to){
                        if($request->currency){
                            $currency = Currency::find($request->currency);
                            $salary = $request->salary_from.'-'.$request->salary_to.' '.$currency->getName($request->lang);
                        } else {
                            $salary = $request->salary_from.'-'.$request->salary_to;
                        }
                    } else {
                        if($request->getcurrency){
                            $currency = Currency::find($request->currency);
                            $salary = $request->salary_from.' '.$currency->getName($request->lang);
                        } else {
                            $salary = $request->salary_from;
                        }
                    }
                } else {
                    $salary = '';
                }
            }

            if($request->id){
                $vacancy = Vacancy::update([
                    'name' => $request->name,
                    'salary' => $salary,
                    'salary_from' => $request->salary_from,
                    'salary_to' => $request->salary_to,
                    'description' => $request->description,
                    'busyness_id' => $request->busyness,
                    'schedule_id' => $request->schedule,
                    'job_type_id' => $request->job_type,
                    'region_id' => $request->region ? $request->region : $user->region,
                    'district_id' => $request->district ? $request->district : $user->distirct,
                    'vacancy_type_id' => $request->type,
                    'currency' => $request->currency,
                    'is_active' => true,
                    'is_disability_person_vacancy' => $request->is_disability_person_vacancy,
                    'opportunity_id' => $opportunity ? $opportunity->id : null,
                    'opportunity_type_id' => $opportunity_type ? $opportunity_type->id : null,
                    'internship_language_id' => $internship_language ? $internship_language->id : null,
                    'opportunity_duration_id' => $opportunity_duration ? $opportunity_duration->id : null,
                    'age_from' => $request->age_from,
                    'age_to' => $request->age_to,
                    'recommendation_letter_type_id' => $type_of_recommended_letter ? $type_of_recommended_letter->id : null,
                    'is_product_lab_vacancy' => $request->is_product_lab_vacancy
                ]);
            }
            else {
                $vacancy = Vacancy::create([
                    'name' => $request->name ? $request->name : null,
                    'salary' => $salary,
                    'salary_from' => $request->salary_from,
                    'salary_to' => $request->salary_to,
                    'description' => $request->description,
                    'busyness_id' => $request->busyness,
                    'schedule_id' => $request->schedule,
                    'job_type_id' => $request->job_type,
                    'region_id' => $request->region ? $request->region : $user->region,
                    'district_id' => $request->district ? $request->district : $user->district,
                    'vacancy_type_id' => $request->type,
                    'currency' => $request->currency,
                    'company_id' => $request->company_id,
                    'is_active' => true,
                    'is_disability_person_vacancy' => $request->is_disability_person_vacancy ? $request->is_disability_person_vacancy : 0,
                    'opportunity_id' => $opportunity ? $opportunity->id : null,
                    'opportunity_type_id' => $opportunity_type ? $opportunity_type->id : null,
                    'internship_language_id' => $internship_language ? $internship_language->id : null,
                    'opportunity_duration_id' => $opportunity_duration ? $opportunity_duration->id : null,
                    'age_from' => $request->age_from,
                    'age_to' => $request->age_to,
                    'recommendation_letter_type_id' => $type_of_recommended_letter ? $type_of_recommended_letter->id : null,
                    'is_product_lab_vacancy' => $request->is_product_lab_vacancy,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            return response()->json([
                'id' => $vacancy->id,
                'message' => 'OK'
            ], 200);
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
    public function getVacanciesByType(Request $request, $type)
    {        
        $token = $request->header('Authorization');
        $user = User::where("password", $token)->firstOrFail();
        if($user){
            $type = $request->type;
            
            $result = UserVacancy::where("type", $type)
                ->where("user_id", $user->id)
                //->where("user_id", 7885)
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
                            'busyness' => $item->busyness ? $item->busyness->getName($request->lang) : null,
                            'job_type' => $item->jobtype ? $item->jobtype->getName($request->lang) : null,
                            'schedule' => $item->schedule ? $item->schedule->getName($request->lang) : null,
                            'type' => $item->vacancytype ? $item->vacancytype->getName($request->lang) : null,
                            'region' => $item->region ? $item->region->getName($request->lang) : null,
                            'company' => $item->company->id,
                            'opportunity' => $item->opportunity ? $item->opportunity->getName($request->lang) : null,
                            'opportunity_type' => $item->opportunity_type ? $item->opportunity_type->getName($request->lang) : null,
                            'opportunity_duration' => $item->opportunity_duration ? $item->opportunity_duration->getName($request->lang) : null,
                            'internship_language' => $item->internship_language ? $item->internship_language->getName($request->lang) : null,
                            'age_from' => $item->age_from,
                            'age_to' => $item->age_to,
                            'recommendation_letter_type' => $item->recommendation_letter_type ? $item->recommendation_letter_type->getName($request->lang) : null,
                            'is_product_lab_vacancy' => $item->is_product_lab_vacancy,
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
        else {
            return 'FALSE';
        }

    }
    public function getVacanciesByCompany(Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where("password", "$token")->firstOrFail();
        
        if($user){
            $result1 = [];
            $vacancies = Vacancy::where('company_id', $user->id)->where('is_active', true)->orderBy('created_at', 'desc')->take(10)->get();

            foreach ($vacancies as $item) {

                $opportunity = Opportunity::where('id', $item->opportunity_id)->first();
                $opportunity_duration = OpportunityDuration::where('id', $item->opportunity_duration_id)->first();
                $opportunity_type = OpportunityType::where('id', $item->opportunity_type_id)->first();
                $internship_language = IntershipLanguage::where('id', $item->internship_language_id)->first();
                $recommendation_letter_type = RecommendationLetterType::where('id', $item->recommendation_letter_type_id)->first();

                array_push($result1, [
                    'id'=> $item->id,
                    'name'=> $item->name,
                    'title'=> $item->title,
                    'address'=> $item->company->address,
                    'description'=> $item->description,
                    'salary'=> $item->salary,
                    'company_name' => $item->company->name,
                    'company_logo'=> $item->company->avatar,
                    'busyness' => $item->busyness ? $item->busyness->getName($request->lang) : null,
                    'job_type' => $item->jobtype ? $item->jobtype->getName($request->lang) : null,
                    'schedule' => $item->schedule ? $item->schedule->getName($request->lang) : null,
                    'type' => $item->vacancytype ? $item->vacancytype->getName($request->lang) : null,
                    'region' => $item->region ? $item->region->getName($request->lang) : null,
                    'company' => $item->company->id,
                    'opportunity' => $opportunity ? $opportunity->getName($request->lang) : null,
                    'opportunity_type' => $opportunity_type ? $opportunity_type->getName($request->lang) : null,
                    'opportunity_duration' => $opportunity_duration ? $opportunity_duration->getName($request->lang) : null,
                    'internship_language' => $internship_language ? $internship_language->getName($request->lang) : null,
                    'age_from' => $item->age_from,
                    'age_to' => $item->age_to,
                    'recommendation_letter_type' => $recommendation_letter_type ? $recommendation_letter_type->getName($request->lang) : null,
                    'is_product_lab_vacancy' => $item->is_product_lab_vacancy,
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

    public function getVacancySkills(Request $request)
    {
        
        $vacancies = DB::table('vacancy_skills')->where('vacancy_id', $request->vacancy_id)->get();

        $skill_ids = [];
        foreach (Skillset::all() as $model) 
        {
            array_push($skill_ids, $model->id);
        }
            
        $skills = Skillset::all();
        $result = [];

        $vacancies = $vacancies->whereIn('skill_id', $skill_ids);

        
        foreach ($vacancies as $item) {
            $skill_name = $skills->where('id', $item->skill_id)->first()->getName("ru");

            $result[] = [
                'id'=> $item->id,
                'vacancy_id' => $item->vacancy_id,
                'name'=> $skill_name,
                'is_required' => $item->is_required,
            ];
        }

        return $result;
    }

    public function saveVacancySkills(Request $request) 
    {
        $lang = $request->lang ? $request->lang : 'ru';
        $tag = array();
        
        $vacancy = Vacancy::find($request->vacancy_id);
        
        if(count($request->vacancy_skills) > 0) {

            foreach($request->vacancy_skills as $skill_name){

                // $skill = Skillset::where('name_ru', $skill_name)->where('skillset_category_id', $request->category_id)->first();
                $skill = Skillset::where('name_ru', $skill_name)->first();
                if($skill){
                    DB::table('vacancy_skills')->insert([
                        'vacancy_id' => $vacancy->id,
                        'skill_id' => $skill->id,
                        'is_required' =>$request->is_required
                    ]);
                }
            }
        }
           
        try {
            return response()->json([
                'id' => $vacancy->id,
                'message' => 'Successfully added user skills!'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'id' => null,
                'token' => null,
                'message' => 'error!',
                'status' => 999,
            ]);
        }
        return response()->json([
            'id' => null,
            'token' => null,
            'message' => 'user exist!',
            'status' => 999,
        ]);
    }
}
