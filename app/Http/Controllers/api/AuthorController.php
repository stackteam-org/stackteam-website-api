<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request){
        $count = $request->count;
        $query = User::query();

        if (isset($count))
            $query->take($count);

        $authors = $query->get();
        return response()->json($authors);        
    }
}
