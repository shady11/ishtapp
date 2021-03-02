<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => ['api']], function () {
    Route::name('users.api')->get('users', ['uses' => 'UserController@index']);
    Route::name('users.login')->post('/login', ['uses' => 'AuthController@login']);
    Route::name('users.logged')->post('/logged', ['uses' => 'AuthController@logged']);
    Route::name('users.userexist')->post('/userexist', ['uses' => 'AuthController@checkusername']);
    Route::name('users.create')->post('/create', ['uses' => 'UserController@create']);
    Route::name('users.change_pass')->put('/change-password/{id}', ['uses' => 'ResetPasswordController@change_pass']);
    Route::name('users.resetpassword')->post('/resetpassword', ['uses' => 'ResetPasswordController@resetpassword']);
    Route::name('users.set_pin_kod')->post('/set_pin_kod/{id}', ['uses' => 'ResetPasswordController@set_pin_kod']);
    Route::name('busyness.api')->get('busyness', ['uses' => 'BusynessController@index']);
    Route::name('schedule.api')->get('schedule', ['uses' => 'ScheduleController@index']);
    Route::name('region.api')->get('region', ['uses' => 'RegionController@index']);
    Route::name('job_type.api')->get('job_type', ['uses' => 'JobTypeController@index']);
    Route::name('vacancy_type.api')->get('vacancy_type', ['uses' => 'VacancyTypeController@index']);
    Route::name('vacancy.api')->post('vacancy', ['uses' => 'VacancyController@index']);
    Route::name('vacancy.api')->post('user_vacancy', ['uses' => 'VacancyController@likeOrSubmit']);
    Route::name('vacancy.api')->get('user_vacancy/{type}', ['uses' => 'VacancyController@getVacanciesByType']);
    Route::name('user.api.avatar')->get('/users/avatar/{user_id}', ['uses' => 'UserController@avatar']);
    Route::name('users.api')->get('user', ['uses' => 'UserController@show']);

    Route::resources([
//        'users' => 'UserController',
        'users' => 'UserController',
    ]);
});

//Route::middleware('api')->get('/users', ['uses' => 'UserController@index'])->name('users.api');
//Route::middleware('api')->get('/posts', ['uses' => 'PostController@index']);
//Route::middleware('api')->get('/pages', ['uses' => 'PageController@index']);
//Route::middleware('api')->get('/questions', ['uses' => 'QuestionController@index']);
//Route::middleware('api')->get('/resources', ['uses' => 'ResourceController@index']);
//Route::middleware('api')->get('/topics', ['uses' => 'TopicController@index']);
//Route::middleware('api')->get('/rubrics', ['uses' => 'RubricController@index']);
//Route::middleware('api')->get('/entrepreneurs', ['uses' => 'EntrepreneurController@index']);
//Route::middleware('api')->get('/events', ['uses' => 'EventController@index']);
//Route::middleware('api')->get('/feedbacks', ['uses' => 'FeedbackController@index']);
//Route::middleware('api')->get('social_medias', ['uses' => 'SocialMediaController@index']);
