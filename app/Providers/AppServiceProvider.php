<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;

use Harimayco\Menu\Facades\Menu;
use App\Models\Main;
use Jenssegers\Date\Date;
Date::setLocale('ru');

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale('ky');
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

        view()->composer('*', function ($view) {
            $view->with('current_first', Request::capture()->segment(1));
            $view->with('current_path', substr(Request::capture()->path(), 3));

            $view->with('locale', app()->getLocale());

            $view->with('top_menus', Menu::getByName('MainMenu'));
            $view->with('main', Main::first());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('admin.components.subheader', 'subheader');
        Blade::component('admin.components.content', 'content');
        Date::setlocale(config('app.locale'));
    }
}
