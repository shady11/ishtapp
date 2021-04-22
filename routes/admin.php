<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group( function () {

    Route::name('logout')->get('/logout', 'Auth\LoginController@logout');

    Route::name('admin.index')->get('/', ['uses' => 'HomeController@index']);
    Route::name('nav_toggle')->post('/nav_toggle', 'HomeController@nav_toggle');

    Route::name('admin.profile')->get('/profile', ['uses' => 'HomeController@profile']);
    Route::name('admin.chat')->get('/chat', ['uses' => 'HomeController@chat']);
    Route::name('admin.chat.delete')->get('/chat/{chat}/delete', ['uses' => 'HomeController@chat']);
    Route::name('admin.chat.message')->post('/chat/{chat}/message', ['uses' => 'HomeController@message']);

    // Resources
    Route::resources([
        'users' => 'UserController',
        'vacancy_types' => 'VacancyTypeController',
        'busynesses' => 'BusynessController',
        'permissions' => 'PermissionController',
        'roles' => 'RoleController',
        'schedules' => 'ScheduleController',
        'job_types' => 'JobTypeController',
        'regions' => 'RegionController',
        'vacancies' => 'VacancyController',
        'education_types' => 'EducationTypeController',
        'user_cv' => 'UserCvController',
    ]);

    // CUSTOM ROUTES
    Route::name('user_cv.show')->get('user_cv/{user_vacancy}', ['uses' => 'UserCvController@show']);

    // DELETE ROUTES
    Route::name('users.delete')->get('users/delete/{user}', ['uses' => 'UserController@destroy']);
    Route::name('vacancy_types.delete')->get('vacancy_types/delete/{vacancy_type}', ['uses' => 'VacancyTypeController@destroy']);
    Route::name('busynesses.delete')->get('busynesses/delete/{busyness}', ['uses' => 'BusynessController@destroy']);
    Route::name('schedules.delete')->get('schedules/delete/{busyness}', ['uses' => 'ScheduleController@destroy']);
    Route::name('regions.delete')->get('regions/delete/{region}', ['uses' => 'RegionController@destroy']);
    Route::name('job_types.delete')->get('job_types/delete/{job_type}', ['uses' => 'JobTypeController@destroy']);
    Route::name('education_types.delete')->get('education_types/delete/{education_type}', ['uses' => 'EducationTypeController@destroy']);

    Route::name('vacancies.delete')->get('vacancies/delete/{vacancy}', ['uses' => 'VacancyController@destroy']);
    Route::name('user_cv.delete')->get('user_cv/delete/{user_cv}', ['uses' => 'UserCvController@destroy']);

    // Api Datatable

    Route::prefix('api')->group( function () {
        Route::name('users.api')->get('users_api', ['uses' => 'UserController@api']);
        Route::name('admin.menus')->get('menus','HomeController@menu');
        Route::name('vacancy_types.api')->get('vacancy_types', ['uses' => 'VacancyTypeController@api']);
        Route::name('busynesses.api')->get('busynesses', ['uses' => 'BusynessController@api']);
        Route::name('permissions.api')->get('permissions', ['uses' => 'PermissionController@api']);
        Route::name('roles.api')->get('roles', ['uses' => 'RoleController@api']);
        Route::name('regions.api')->get('regions', ['uses' => 'RegionController@api']);
        Route::name('schedules.api')->get('schedules', ['uses' => 'ScheduleController@api']);
        Route::name('job_types.api')->get('job_types', ['uses' => 'JobTypeController@api']);
        Route::name('education_types.api')->get('education_types', ['uses' => 'EducationTypeController@api']);
        Route::name('vacancies.api')->get('vacancies', ['uses' => 'VacancyController@api']);
        Route::name('user_cv.api')->get('user_cv', ['uses' => 'UserCvController@api']);
        Route::name('roll')->get('roll', ['uses' => 'PermissionController@Permission']);
    });
});

//Route::group([
//    'prefix' => LaravelLocalization::setLocale().'/',
//	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function (){
//
//    Auth::routes();
//
//    Route::middleware('auth')->group( function () {
//
//        Route::name('logout')->get('/logout', 'Auth\LoginController@logout');
//
//        Route::name('admin.index')->get('/', ['uses' => 'HomeController@index']);
//        Route::name('nav_toggle')->post('/nav_toggle', 'HomeController@nav_toggle');
//
//        // Resources
//        Route::resources([
//            'users' => 'UserController',
//            'vacancy_types' => 'VacancyTypeController',
//            'busynesses' => 'BusynessController',
//            'permissions' => 'PermissionController',
//            'roles' => 'RoleController',
//            'schedules' => 'ScheduleController',
//            'job_types' => 'JobTypeController',
//            'regions' => 'RegionController',
//            'vacancies' => 'VacancyController',
//            'education_types' => 'EducationTypeController',
//        ]);
//
//
//
//        Route::post('/main/removethumb', 'MainController@removethumb')->name('main.removethumb');
//
//        // Api Datatable
//
//        Route::name('users.api')->get('users_api', ['uses' => 'UserController@api']);
////        Route::name('patients.api')->get('patients_api', ['uses' => 'PatientController@api']);
////        Route::name('categorytests.api')->get('categorytests_api', ['uses' => 'CategorytestController@api']);
////        Route::name('categorytests.deleted')->get('categorytests/delete/{id}', ['uses' => 'CategorytestController@deleted']);
////        Route::name('questiontests.deleted')->get('questiontests/delete/{id}', ['uses' => 'QuestiontestController@deleted']);
////        Route::name('questiontests.api')->get('questiontests_api', ['uses' => 'QuestiontestController@api']);
////        Route::name('questionnaires.api')->get('questionnaires_api', ['uses' => 'QuestionnaireController@api']);
////        Route::name('themeconsultantquestions.api')->get('themeconsultantquestions_api', ['uses' => 'ThemeconsultantController@api']);
////        Route::name('consultants.api')->get('consultants_api', ['uses' => 'СonsultantController@api']);
//        Route::name('admin.menus')->get('menus','HomeController@menu');
//        Route::name('vacancy_types.api')->get('vacancy_type', ['uses' => 'VacancyTypeController@api']);
//        Route::name('busynesses.api')->get('busyness', ['uses' => 'BusynessController@api']);
//        Route::name('permissions.api')->get('permission', ['uses' => 'PermissionController@api']);
//        Route::name('roles.api')->get('role', ['uses' => 'RoleController@api']);
//        Route::name('regions.api')->get('region', ['uses' => 'RegionController@api']);
//        Route::name('schedules.api')->get('schedule', ['uses' => 'ScheduleController@api']);
//        Route::name('job_types.api')->get('job_type', ['uses' => 'JobTypeController@api']);
//        Route::name('education_types.api')->get('education_type', ['uses' => 'EducationTypeController@api']);
//        Route::name('vacancies.api')->get('vacancy', ['uses' => 'VacancyController@api']);
//        Route::name('roll')->get('roll', ['uses' => 'PermissionController@Permission']);
//    });
//
//});
//
//Route::group(['prefix' => 'admin'], function(){
//    // Page
//    Route::group(['as' => 'page.'], function () {
//        Route::get('{slug}', 'HomeController@page')->name('index');
//    });
//});
