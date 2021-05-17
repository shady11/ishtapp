<?php

namespace App\Http\Controllers\Api;

use App\Models\EducationType;
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
        if (User::where('email', $request->email)->count() == 0) {
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
                    'status' => 200
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

            $user ->update([
                'name' => $request->name,
                'email' => $request->email,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'linkedin' => $request->linkedin,
                'is_migrant' => $request -> is_migrant,
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

    public function destroy(Request $request, $id)
    {
        $user = Patient::findOrFail($id);
        if ($request->header('token') == $user->password) {
            $user->delete();
        }
        return response('deleted');
    }

}
