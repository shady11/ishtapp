<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillsetController extends Controller
{
    public function index(Request $request)
    {
        $select = Skillset::all();
        $result = [];

        foreach ($select as $item){
            $result[] = [
                'id'=> $item->id,
                'name'=> $item->getName("ru")
            ];
        }

        //dd ($result);
        return $result;
    }
}
