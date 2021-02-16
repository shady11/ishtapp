<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        $result = [];
        foreach (Region::all() as $item){
            array_push($result, [
                'id'=> $item->id,
                'name'=> $item->name
            ]);
        }
        dd($result);
        return $result;

    }
}
