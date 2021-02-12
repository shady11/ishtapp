<?php



Route::group([
    'prefix' => LaravelLocalization::setLocale().'/',
	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function (){

    Auth::routes();

    Route::middleware('auth')->group(function () {

        Route::name('logout')->get('/logout', 'Auth\LoginController@logout');

        Route::name('admin.index')->get('/', ['uses' => 'HomeController@index']);
        Route::name('nav_toggle')->post('/nav_toggle', 'HomeController@nav_toggle');

        // Resources
        Route::resources([
            'users' => 'UserController',
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
