<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
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

    public function login(\Illuminate\Http\Request $request): \Illuminate\Http\JsonResponse
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }
        $user=User::where('email',$request->email)->first();

        $token=$user->createToken('API-Token')->accessToken;

        return response()->json([
            'user'=>auth::user()->email,
            'token'=>$token
        ]);
    }
}
