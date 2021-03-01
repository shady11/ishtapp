<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
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
    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->header('token') == $user->password) {
            return response($user);
        }
        return response('false');

    }

    protected function avatar($user_id)
    {
        //check image exist or not
        $user = User::findOrFail($user_id);
        if ($user->avatar) {
            //get content of image
            return $user->avatar;
        } else {
            return null;
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
        if (User::where('login', $request->login)->count() == 0) {
            $user = User::create([
                'login' => $request->login,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'linkedin' => $request->linkedin,
                'type' => $request->type,
                'active' => true,
                'phone_number' => $request->phone_number,
            ]);
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
                    'avatar' => $user->avatar,
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
        $user = Patient::findOrFail($id);
        if ($request->header('token') == $user->password) {
            $user->delete();
        }
        return response('deleted');
    }

}
