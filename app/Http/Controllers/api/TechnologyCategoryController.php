<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TechnologyCategory;
use Illuminate\Http\Request;

class TechnologyCategoryController extends Controller
{
    public function index(Request $request){
        $count = $request->count;
        $query = TechnologyCategory::query();

        if (isset($count))
            $query->take($count);

        $technologies = $query->get();
        return response()->json($technologies);        
        
    }
}
