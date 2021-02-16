<?php

namespace App\Http\Controllers\Api;

use App\Models\Gender;
use App\Models\Patient;
use App\Models\Questionnaire;
use App\Models\Sex;
use App\Models\User;
use App\Models\Userquestion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
    public function show(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        if ($request->header('token') == $patient->password) {
            return response($patient);
        }
        return response('false');

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
        if (Patient::where('username', $request->username)->count()==0){
            $patient = Patient::create([
                'username' => $request->username,
                'question1_id' => $request->question_id1,
                'question2_id' => $request->question_id2,
                'answer1' => $request->answer1,
                'answer2' => $request->answer2,
            ]);
            $questionnaire = Questionnaire::create([
                'sex_id'=>$request->sex_id,
                'intersex'=>$request->intersex,
                'gender_id' => $request->gender_id,
                'year_of_birth' => $request->year_of_birth
            ]);
            if ($request->password) {
                $patient->password = Hash::make($request->password);
            }
            try {
                $patient->save();
                $questionnaire->save();
                return response()->json([
                    'id' => $patient->id,
                    'token' => $patient->password,
                    'message' => 'Successfully created user!'
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
            'message' => 'user exist!',
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
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        if ($request->header('token') == $patient->password) {
            $patient->update([
                'username' => $request->username,
                'pin_kod' => $request->pin_kod,
            ]);
            $patient->password = Hash::make($request->password);
            try {
                $patient->save();
            } catch (QueryException $exception) {
                return response('false');
            }
            return response()->json([
                'id' => $patient->id,
                'token' => $patient->password,
                'message' => 'Successfully created user!'
            ], 201);
        }
        return response('false');
    }


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
        $patient = Patient::findOrFail($id);
        if ($request->header('token') == $patient->password) {
            $patient->delete();
        }
        return response( 'deleted');
    }

}
