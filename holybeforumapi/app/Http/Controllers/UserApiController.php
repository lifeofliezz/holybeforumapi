<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function userCreate(){
    //validations
        request()->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required'
        ]);

            //create topic
        return User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => request('password')
        ]);
        }



    public function logout(){
        //validations
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        //create topic
        return User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password')
        ]);
    }
}
