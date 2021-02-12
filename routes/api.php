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
    Route::name('categorytests.api')->get('categories/{id}', ['uses' => 'CategorytestController@show']);
    Route::name('consultants.api')->get('consultants/{id}', ['uses' => 'ConsultantController@show']);
    Route::name('organizations.api')->get('organizations/{id}', ['uses' => 'OrganizationController@show']);
    Route::name('resourcesforuserregistration.api')->get('resourcesforuserregistration', ['uses' => 'GetresourcesforregController@index']);
    Route::name('moods.api')->get('moods', ['uses' => 'MoodController@index']);
    Route::name('symptoms.api')->get('symptoms', ['uses' => 'SymptomController@index']);
    Route::name('patientmoods.api')->post('patientmoods', ['uses' => 'PatientmoodController@store']);
    Route::name('patientsymptoms.api')->post('patientsymptoms', ['uses' => 'PatientsymptomController@store']);
    Route::name('notifications.api')->post('notifications', ['uses' => 'NotificationController@store']);
    Route::name('patientresultimages.api')->post('patientresultimages', ['uses' => 'PatientresultimageController@store']);
    Route::name('videoinformations.api')->get('videoinformations', ['uses' => 'VideoinformationController@index']);
    Route::name('audioinformations.api')->get('audioinformations', ['uses' => 'AudioinformationController@index']);
    Route::name('statistics.api')->post('statistics', ['uses' => 'StatisticController@store']);
//    Route::name('users.api')->get('users/{id}', ['uses' => 'UserController@show']);

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
