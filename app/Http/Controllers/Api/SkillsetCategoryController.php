<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SkillsetCategory;
use Illuminate\Http\Request;


class SkillsetCategoryController extends Controller
{
    public function index(Request $request)
    {
        $select = SkillsetCategory::all();
        $result = [];

        foreach ($select as $item){
            array_push($result, [
                'id'=> $item->id,
                'name'=> $item->getName($request->lang)
            ]);
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
