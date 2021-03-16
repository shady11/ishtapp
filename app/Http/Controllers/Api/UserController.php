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
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * * @OA\Get(
     *     path="/users",
     *     operationId="usersAll",
     *     tags={"Users"},
     *     summary="Display a listing of the resource",
     *      @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     )
     * )
     */
    public function index()
    {
        $model = User::query()->get();
        return response()->json($model);
//        return response('false');
    }

    /**
     * @OA\Get(
     *     path="/users/{id}",
     *     operationId="userGet",
     *     tags={"Users"},
     *     summary="Show user by ID",
     *     @OA\Parameter(
     *         name="token",
     *         in="header",
     *         description="token for auth",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of example",
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     * )
     *
     * Display a listing of the resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where("password", $token)->firstOrFail();
        if ($user) {
            return response($user);
        }
        return response('token is not valid');

    }

    protected function avatar(Request  $request)
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
//            dd($vacancy_ids);
            $submitted_user_ids = UserVacancy::wherein("vacancy_id", $vacancy_ids)->where("type", 'SUBMITTED')->pluck('user_id')->toArray();
            $result =[];
            foreach (User::whereIn('id', $submitted_user_ids)
                        ->where('type','USER')
                        ->get() as $item) {
                $user_vacancy_id = UserVacancy::where("user_id", $item->id)->where("type", 'SUBMITTED')->firstOrFail()->vacancy_id;
                $user_vacancy_name = Vacancy::where('id', $user_vacancy_id)->first()->name;

                array_push($result, [
                    'vacancy_name' => $user_vacancy_name,
                    'id' => $item->id,
                    'lastname' => $item->lastname,
                    'email' => $item->email,
                    'phone_number' => $item->phone_number,
                    'avatar' => $item->avatar,
                    'birth_date' => $item->birth_date,
                    'job_title' => UserCv::where('user_id',$item->id)->first()->job_title,
                    'experience_year' => UserCv::where('user_id',$item->id)->first()->experience_year
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
//                dd($user_cv);
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

    /**
     * @OA\Post(
     *     path="/users",
     *     operationId="userCreate",
     *     tags={"Users"},
     *     summary="Create yet another user record",
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"username","password","question_id1","question_id2","answer1","answer2","sex_id","intersex","gender_id","year_of_birth"},
     *       @OA\Property(property="username", type="string", format="string", example="user"),
     *       @OA\Property(property="password", type="string", format="password", example="user123"),
     *       @OA\Property(property="question_id1", type="integer", example="11"),
     *       @OA\Property(property="question_id2", type="integer", example="3"),
     *       @OA\Property(property="answer1", type="string", format="string", example="a1"),
     *       @OA\Property(property="answer2", type="string", format="string", example="a2"),
     *       @OA\Property(property="sex_id", type="integer", example="8"),
     *       @OA\Property(property="intersex", type="boolean", example="1"),
     *       @OA\Property(property="gender_id", type="integer", example="2"),
     *       @OA\Property(property="year_of_birth", type="string", format="date-time", example="2000"),
     *    )
     *     ),
     *    @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * ),
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//        dd('$request');
        if (User::where('email', $request->email)->count() == 0) {
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'birth_date' => $request->birth_date,
                'type' => $request->type,
                'active' => true,
                'phone_number' => $request->phone_number,
            ]);
            // create empty cv
            if($user && $user->type == 'USER') {
                UserCV::create([
                    'job_title' => 'EMPTY',
                    'user_id' => $request->user_id
                ]);
            }
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $path = '/storage/avatars/'. Carbon::now()->format('YmdHms') . $file->getClientOriginalName();
                $file->move(public_path() . '/storage/avatars/',  Carbon::now()->format('YmdHms').$file->getClientOriginalName());
                $user->avatar = $path;
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
    public function update1(Request $request,$id)
    {
        $user = User::findOrFail($id);
//        dd($request);
        if ($user) {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $path = '/storage/avatars/'. Carbon::now()->format('YmdHms') . $file->getClientOriginalName();
                $file->move(public_path() . '/storage/avatars/',  Carbon::now()->format('YmdHms').$file->getClientOriginalName());
                $user->avatar = $path;
            }
            $user ->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'birth_date' => $request->birth_date,
                'phone_number' => $request->phone_number,
            ]);
            try {
                $user->save();
//                dd($request);
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

    /**
     * @OA\Put(
     *     path="/users/{id}",
     *     operationId="userUpdate",
     *     tags={"Users"},
     *     summary="Create yet another user record",
     *     @OA\Parameter(
     *         name="token",
     *         in="header",
     *         description="token for auth",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of example",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Pass user credentials",
     *         @OA\JsonContent(
     *            required={"username","password","pin_kod"},
     *            @OA\Property(property="username", type="string", format="string", example="user"),
     *            @OA\Property(property="password", type="string", format="password", example="user123"),
     *            @OA\Property(property="pin_kod", type="integer", example="1111"),
     *            )
     *         ),
     *      @OA\Response(
     *          response=422,
     *          description="Wrong credentials response",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *          )
     *      )
     * ),
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->header('token') == $user->password) {
            $user->update([
                'username' => $request->username,
                'pin_kod' => $request->pin_kod,
            ]);
            $user->password = Hash::make($request->password);
            try {
                $user->save();
            } catch (QueryException $exception) {
                return response('false');
            }
            return response()->json([
                'id' => $user->id,
                'token' => $user->password,
                'message' => 'Successfully created user!'
            ], 201);
        }
        return response('false');
    }*/


    /**
     * @OA\Delete(
     *     path="/users/{id}",
     *     operationId="userDelete",
     *     tags={"Users"},
     *     summary="Create yet another user record",
     *     @OA\Parameter(
     *         name="token",
     *         in="header",
     *         description="token for auth",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of example",
     *     ),
     *     @OA\Response(
     *         response="202",
     *         description="Deleted",
     *     )
     * ),
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     */
    public function destroy(Request $request, $id)
    {
        $user = Patient::findOrFail($id);
        if ($request->header('token') == $user->password) {
            $user->delete();
        }
        return response('deleted');
    }

}
