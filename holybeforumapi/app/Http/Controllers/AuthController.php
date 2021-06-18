<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //login a user
    public function login(Request $request)
    {

        try{
        if (Auth::attempt($request->only('username', 'password'))) {

            $user = Auth::user();
            $token = $user->createToken('app')->accessToken;

            return response([
                'message' => 'success',
                'token' => $token,
                'user' => $user
            ]);
        }
    }catch(\Exception $exception){
        return response([
            'message' => $exception->getMessage()
            ],400);
        }



        return response([
            'message' => 'Invalid username/password'
        ], 401);
    }

    //returns a user with token
    public function user(){
        return Auth::user();
    }

    //returns the currentuser
    public function currentuser(){
        return response([
            'user' => Auth::user(),
            'message' => 'success',
        ]);
    }

    //register a user
    public function register(Request $request)
    {
        try {
            $user = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);

            //return $user;
            return response([
                'message' => 'success',
            ]);

        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
