<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $request->password= bcrypt($request->password);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone_number'=>$request->phone_number
        ]);

        $token=$user->createToken('API-Token')->accessToken;

        return response()->json([
           "massage"=>'Created.',
            'token'=>$token
        ],201);
    }
}
