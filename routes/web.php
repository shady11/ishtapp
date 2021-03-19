<?php

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web']], function(){

    Route::name('web.index')->get('/', 'WebController@index');

});
