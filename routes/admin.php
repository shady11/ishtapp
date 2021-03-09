<?php



Route::group([
    'prefix' => LaravelLocalization::setLocale().'/',
	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function (){

    Auth::routes();

    Route::middleware('auth')->group( function () {

        Route::name('logout')->get('/logout', 'Auth\LoginController@logout');

        Route::name('admin.index')->get('/', ['uses' => 'HomeController@index']);
        Route::name('nav_toggle')->post('/nav_toggle', 'HomeController@nav_toggle');

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
        ]);



        Route::post('/main/removethumb', 'MainController@removethumb')->name('main.removethumb');

        // Api Datatable

        Route::name('users.api')->get('users_api', ['uses' => 'UserController@api']);
        Route::name('patients.api')->get('patients_api', ['uses' => 'PatientController@api']);
        Route::name('categorytests.api')->get('categorytests_api', ['uses' => 'CategorytestController@api']);
        Route::name('categorytests.deleted')->get('categorytests/delete/{id}', ['uses' => 'CategorytestController@deleted']);
        Route::name('questiontests.deleted')->get('questiontests/delete/{id}', ['uses' => 'QuestiontestController@deleted']);
        Route::name('questiontests.api')->get('questiontests_api', ['uses' => 'QuestiontestController@api']);
        Route::name('questionnaires.api')->get('questionnaires_api', ['uses' => 'QuestionnaireController@api']);
        Route::name('themeconsultantquestions.api')->get('themeconsultantquestions_api', ['uses' => 'ThemeconsultantController@api']);
        Route::name('consultants.api')->get('consultants_api', ['uses' => 'СonsultantController@api']);
        Route::name('admin.menus')->get('menus','HomeController@menu');
        Route::name('vacancy_types.api')->get('vacancy_type', ['uses' => 'VacancyTypeController@api']);
        Route::name('busynesses.api')->get('busyness', ['uses' => 'BusynessController@api']);
        Route::name('permissions.api')->get('permission', ['uses' => 'PermissionController@api']);
        Route::name('roles.api')->get('role', ['uses' => 'RoleController@api']);
        Route::name('regions.api')->get('region', ['uses' => 'RegionController@api']);
        Route::name('schedules.api')->get('schedule', ['uses' => 'ScheduleController@api']);
        Route::name('job_types.api')->get('job_type', ['uses' => 'JobTypeController@api']);
        Route::name('education_types.api')->get('education_type', ['uses' => 'EducationTypeController@api']);
        Route::name('vacancies.api')->get('vacancy', ['uses' => 'VacancyController@api']);
        Route::name('roll')->get('roll', ['uses' => 'PermissionController@Permission']);
    });

});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web']], function(){
    // Page
    Route::group(['as' => 'page.'], function () {
        Route::get('{slug}', 'HomeController@page')->name('index');
    });
});
