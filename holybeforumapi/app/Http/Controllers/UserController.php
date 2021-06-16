<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','update','delete']);
    }

    //return all users
    public function index(){
        return User::all();
    }

//    return one topic with userinfo
    public function show($id){
        return User::find($id);
    }


    //update a topic
    public function update(Request $request, User $user){
        $user->update($request->all());

        return response() ->json($user, 200);
    }

    //delete a user
    public function delete(User $user){
        $user->delete();

        return response()->json(null, 204);
    }

    //search users
    public function search($term){

    }

}


