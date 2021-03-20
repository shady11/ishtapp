<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\EducationType;
use Illuminate\Http\Request;

class EducationTypeController  extends Controller
{
    public function index(Request $request)
    {
        $result = [];
        foreach (EducationType::all() as $item){
            array_push($result, [
                'id'=> $item->id,
                'name'=> $item->getName($request->lang)
            ]);
        }
        return $result;
    }
}
