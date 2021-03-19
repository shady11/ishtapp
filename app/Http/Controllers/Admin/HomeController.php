<?php

namespace App\Http\Controllers\Admin;

use App\Charts\ActionChart;
use App\Charts\GenderChart;
use App\Charts\IntersexChart;
use App\Charts\SexChart;
use App\Charts\UserChart;
use App\Charts\YearChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;

//use App\Models\Question;

use App\Models\Page;
use function GuzzleHttp\Psr7\str;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Главная';
        return view('admin.index', compact('title'));
    }

    public function nav_toggle(Request $request)
    {
        $minutes = 1440;
        if ($request->mini == '1') {
            Cookie::queue('mini', 'm-brand--minimize m-aside-left--minimize', $minutes);
        } else if ($request->mini == '0') {
            Cookie::queue(Cookie::forget('mini'));
        }
    }

    public function menu()
    {
        return view('admin.menus.index');
    }


    public function page($slug)
    {
        return abort(404);
    }
}

