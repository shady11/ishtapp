<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use App\Models\District;
use App\Models\EducationType;
use App\Models\JobSphere;
use App\Models\JobType;
use App\Models\Region;
use App\Models\SocialOrientation;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserCV;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserVacancy;
use App\Models\Vacancy;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function index()
    {
        $model = User::query()->get();
        return response()->json($model);
    }

    public function show(Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where("password", $token)->firstOrFail();

        if ($user) {
            if($user->region && $user->district) {
                $region = Region::find($user->region);
                $district = District::find($user->district);
                $user->region = $region->getName($request->lang);
                $user->district = $district->getName($request->lang);
            } else {
                $user->region = '';
                $user->district = '';
            }
            if($user->job_type) {
                $job_type = JobType::find($user->job_type);
                $user->job_type = $job_type->getName($request->lang);
            } else {
                $user->job_type = '';
            }
            return response($user);
        }
        return response('token is not valid');
    }

    protected function avatar(Request $request)
    {
        $vacancy_id = $request->vacancy_id;
        $vacancy = Vacancy:: findOrFail($vacancy_id);
        if($vacancy){
            $user = User::findOrFail($vacancy->company_id);
            if ($user->avatar) {
                //get content of image
                return $user->avatar;
            } else {
                return "company doesn't have image";
            }
        }
        else
            return "vacancy doesn't exists";
    }

    protected function checkUserEmail(Request $request)
    {
        $email = $request->email;
        if($email){
            $count = User::where('email', $email)->count();
            if($count>0)
                return "true";
            else
                return "false";
        }
        else
            return 'email not found';
    }

    protected function checkUserCv(Request $request)
    {
        $user_id = $request->user_id;
        if($user_id){
            $user_cv = UserCV::where('user_id', $user_id)->firstOrFail();
            if($user_cv->job_title)
                return "true";
            else
                return "false";
        }
        else
            return 'user_id not found';
    }

    protected function getCompanySubmittedUserCvs(Request $request, $company_id)
    {
        if($company_id){
            $vacancy_ids =Vacancy::where('company_id', $company_id)->pluck('id')->toArray();
            $submitted_user_vacancies = UserVacancy::whereIn("vacancy_id", $vacancy_ids)->where("type", 'SUBMITTED')->orderBy('id', 'desc')->get();
//            return $submitted_user_ids;
            $result = [];
            foreach ($submitted_user_vacancies as $submitted_user_vacancy) {

                array_push($result, [
                    'vacancy_name' => $submitted_user_vacancy->vacancy->name,
                    'id' => $submitted_user_vacancy->user->id,
                    'name' => $submitted_user_vacancy->user->name,
                    'lastname' => $submitted_user_vacancy->user->lastname,
                    'email' => $submitted_user_vacancy->user->email,
                    'phone_number' => $submitted_user_vacancy->user->phone_number,
                    'avatar' => $submitted_user_vacancy->user->avatar,
                    'birth_date' => $submitted_user_vacancy->user->birth_date,
                    'job_title' => UserCv::where('user_id',$submitted_user_vacancy->user->id)->first()->job_title,
                    'experience_year' => UserCv::where('user_id',$submitted_user_vacancy->user->id)->first()->experience_year
                ]);
            }
            return $result;
        }
        else{
            return 'company id doesnt exist';
        }
    }

    protected function getUserFullInfo(Request $request, $user_id)
    {
        if($user_id){
            $user = User::where('id', $user_id)
                ->where('type','USER')
                ->firstOrFail();
            if($user){
                $user_cv = UserCV::where('user_id', $user_id)->firstOrFail();
                if($user_cv){
                    $user_experiences = [];
                    foreach (UserExperience::where('user_cv_id', $user_cv->id)->get() as $model) {
                        array_push($user_experiences, [
                            'id' => $model->id,
                            'job_title' => $model->job_title,
                            'start_date' => $model->start_date,
                            'end_date' => $model->end_date,
                            'organization_name' => $model->organization_name,
                            'description' => $model->description,
                        ]);
                    }

                    $user_courses = [];
                    foreach (UserCourse::where('user_cv_id', $user_cv->id)->get() as $model) {
                        array_push($user_courses, [
                            'id' => $model->id,
                            'name' => $model->name,
                            'organization_name' => $model->organization_name,
                            'end_year' => $model->end_year,
                            'duration' => $model->duration,
                        ]);
                    }

                    $user_educations = [];
                    foreach (UserEducation::where('user_cv_id', $user_cv->id)->get() as $model) {
                        array_push($user_educations, [
                            'id' => $model->id,
                            'title' => $model->title,
                            'faculty' => $model->faculty,
                            'speciality' => $model->speciality,
                            'type' => EducationType::findOrFail($model->type_id)->name,
                            'end_year' => $model->end_year,
                        ]);
                    }

                    return response()->json([
                        'id' => $user->id,
                        'name' => $user->name,
                        'surname_name' => $user->lastname,
                        'email' => $user->email,
                        'phone_number' => $user->phone_number,
                        'avatar' => $user->avatar,
                        'birth_date' => $user->birth_date,
                        'linkedin' => $user->linkedin,
                        'is_migrant' => $user->is_migrant,
                        'job_title' => $user_cv->job_title,
                        'experience_year' => $user_cv->experience_year,
                        'attachment' => $user_cv->attachment,
                        'educations' => $user_educations,
                        'courses' => $user_courses,
                        'experiences' => $user_experiences,
                    ]);
                }
                else{
                    return 'user doesnt have cv';
                }
            }
            else{
                return 'user doesnt exist';
            }
        }
        else{
            return 'company id doesnt exist';
        }
    }

    public function store(Request $request)
    {
        $lang = $request->lang ? $request->lang : 'ru';

        if (User::where('email', $request->email)->count() == 0) {

            if($lang == 'ru'){
                $region = Region::where('nameRu', $request->region)->first();
                $district = District::where('nameRu', $request->district)->first();
                $job_type = JobType::where('name_ru', $request->job_type)->first();
                $job_sphere = JobSphere::where('name_ru', $request->job_sphere)->first();
                $department = Department::where('name_ru', $request->department)->first();
                $social_orientation = SocialOrientation::where('name_ru', $request->social_orientation)->first();
            } else {
                $region = Region::where('nameKg', $request->region)->first();
                $district = District::where('nameKg', $request->district)->first();
                $job_type = JobType::where('name', $request->job_type)->first();
                $job_sphere = JobSphere::where('name', $request->job_sphere)->first();
                $department = Department::where('name', $request->department)->first();
                $social_orientation = SocialOrientation::where('name', $request->social_orientation)->first();
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'birth_date' => $request->birth_date,
                'type' => $request->type,
                'address' => $request->address,
                'active' => true,
                'phone_number' => $request->phone_number,
                'linkedin' => $request->linkedin,
                'is_migrant' => $request->is_migrant == '1',
                'gender' => $request->gender == '1',
                'region' => $region ? $region->id : null,
                'district' => $district ? $district->id : null,
                'job_type' => $job_type ? $job_type->id : null,
                'contact_person_fullname' => $request->contact_person_fullname,
                'contact_person_position' => $request->contact_person_position,
                'job_sphere' => $job_sphere ? $job_sphere->id : null,
                'department' => $department ? $department->id : null,
                'social_orientation' => $social_orientation ? $social_orientation->id : null,
            ]);

            // create empty cv
            if($user && $user->type == 'USER') {
                UserCV::create([
                    'user_id' => $user->id
                ]);
            }

            if($request->hasFile('avatar')){

                $file = $request->file('avatar');

                $dir  = 'assets/media/users/';
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }

                $name = Str::slug($user->name, '-').'.'.$file->getClientOriginalExtension();

                Image::make($file)->fit(400, 400)->save($dir.$name, 75);

                $user->avatar = $dir.$name;
            }

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            try {
                $user->save();
                return response()->json([
                    'id' => $user->id,
                    'token' => $user->password,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'user_type' => $user->type,
                    'message' => 'Successfully created user!',
                    'status' => 200,
                    'gender' => $user->gender,
                    'region' => $region ? $region->getName($lang) : 0,
                    'district' => $district ? $district->getName($lang) : 0,
                    'job_type' => $job_type ? $job_type->getName($lang) : 0,
                    'contact_person_fullname' => $user->contact_person_fullname,
                    'contact_person_position' => $user->contact_person_position,
                    'job_sphere' => $job_sphere ? $job_sphere->getName($lang) : 0,
                    'department' => $department ? $department->getName($lang) : 0,
                    'social_orientation' => $social_orientation ? $social_orientation->getName($lang) : 0,
                ], 200);
            } catch (QueryException $e) {
                return response()->json([
                    'id' => null,
                    'token' => null,
                    'message' => 'error!',
                    'status' => 999,
                ]);
            }
        }
        return response()->json([
            'id' => null,
            'token' => null,
            'message' => 'user exist!',
            'status' => 999,
        ]);
    }

    public function update1(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user) {

            if($request->hasFile('avatar')){

                if($user->avatar) @unlink($user->avatar);

                $file = $request->file('avatar');

                $dir  = 'assets/media/users/';
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }

                $name = Str::slug($user->name, '-').'.'.$file->getClientOriginalExtension();

                Image::make($file)->fit(400, 400)->save($dir.$name, 75);

                $user->avatar = $dir.$name;
            }

            $region = Region::where('nameRu', $request->region)->orWhere('nameKg', $request->region)->first();
            $district = District::where('nameRu', $request->district)->orWhere('nameKg', $request->district)->first();
            $job_sphere = District::where('nameRu', $request->job_sphere)->orWhere('nameKg', $request->job_sphere)->first();
            $department = District::where('nameRu', $request->department)->orWhere('nameKg', $request->department)->first();
            $social_orientation = District::where('nameRu', $request->social_orientation)->orWhere('nameKg', $request->social_orientation)->first();

            $user ->update([
                'name' => $request->name,
                'email' => $request->email,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'linkedin' => $request->linkedin,
                'is_migrant' => $request->is_migrant,
                'gender' => $request->gender == '1',
                'region' => $region ? $region->id : null,
                'district' => $district ? $district->id : null,
                'contact_person_fullname' => $user->contact_person_fullname,
                'contact_person_position' => $user->contact_person_position,
                'job_sphere' => $job_sphere ? $job_sphere->id : 0,
                'department' => $department ? $department->id : 0,
                'social_orientation' => $social_orientation ? $social_orientation->id : 0,
            ]);
            try {
                $user->save();
                return response()->json([
                    'id' => $user->id,
                    'token' => $user->password,
                    'avatar' => $user->avatar,
                    'message' => 'Successfully updated user!'
                ], 201);
            } catch (QueryException $e) {
                return response()->json([
                    'id' => null,
                    'token' => null,
                    'message' => 'error!',
                    'status' => 999,
                ]);
            }
        }
        return response()->json([
            'id' => null,
            'token' => null,
            'message' => 'user doesn\'t exists!',
            'status' => 999,
        ]);
    }

    public function saveFilters(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user) {

            $user ->update([
                'filter_region' => $request->regions,
                'filter_activity' => $request->activities,
                'filter_type' => $request->types,
                'filter_busyness' => $request->busyness,
                'filter_schedule' => $request->schedules,
            ]);
            try {
                $user->save();
                return response()->json([
                    'id' => $user->id,
                    'token' => $user->password,
                    'message' => 'Successfully saved filters!'
                ], 201);
            } catch (QueryException $e) {
                return response()->json([
                    'id' => null,
                    'token' => null,
                    'message' => 'error!',
                    'status' => 999,
                ]);
            }
        }
        return response()->json([
            'id' => null,
            'token' => null,
            'message' => 'user doesn\'t exists!',
            'status' => 999,
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $user = Patient::findOrFail($id);
        if ($request->header('token') == $user->password) {
            $user->delete();
        }
        return response('deleted');
    }

    public function getFilters(Request $request, $id, $model)
    {
        $result = [];

        $user = User::findOrFail($id);
        if($user) {
            if($model == 'regions') $result = $user->filter_region;
            if($model == 'activities') $result = $user->filter_activity;
            if($model == 'types') $result = $user->filter_type;
            if($model == 'busyness') $result = $user->filter_busyness;
            if($model == 'schedules') $result = $user->filter_schedule;
            if($model == 'districts') $result = $user->filter_district;
        }

        return $result;
    }

    public function resetSettings(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        if ($user) {
            $user->filter_region = null;
            $user->filter_district = null;
            $user->filter_activity = null;
            $user->filter_type = null;
            $user->filter_busyness = null;
            $user->filter_schedule = null;

            $user_vacancies = UserVacancy::where('user_id', $user->id)->where('type', '<>', 'SUBMITTED')->delete();

            return "OK";
        }
        return response()->json('user id does not exist');
    }

}
