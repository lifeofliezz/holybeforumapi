<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class TopicApiController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','update','delete']);
    }

    //return all topics with userinfo
    public function index(){
        return Topic::latest()
            ->join('users', 'user_id', '=', 'users.id')
            ->select('topics.id', 'topics.title', 'topics.content', 'topics.created_at', 'topics.updated_at', 'users.username', 'users.profilePicture', 'users.moderator', 'users.status')
            ->paginate(20);
    }

//    return one topic with userinfo
    public function show($id){
        return Topic::find($id)
            ->rightjoin('users', 'user_id', '=', 'users.id')
            ->select('topics.id','topics.title', 'topics.content', 'topics.created_at', 'topics.updated_at', 'users.username', 'users.profilePicture', 'users.moderator', 'users.status')
            ->where('topics.id','=',$id)
            ->get();
 }


    //post topic
    public function store(Request $request){

        //validations
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
        ]);

        //create topic

        $success = $request->user()->topics()->create($request->only('title','content'));
        return [
            //'success' =>
                $success
        ];
    }

    //update a topic
    public function update(Request $request, Topic $topic){
        if(Auth::id() === $topic->user_id){
            $topic->update($request->all());
            return response() ->json($topic, 200);
        }
        else{
            return response()->json(null, 401);
        }

    }

    //delete a topic
    public function delete(Topic $topic){
        $topic->delete();

        return response()->json(null, 204);
    }

    //search topics and reactions
    public function search($term){
        return Topic::search($term)
            ->join('users', 'user_id', '=', 'users.id')
            ->select('topics.title', 'topics.content', 'topics.created_at', 'topics.updated_at', 'users.username', 'users.profilePicture', 'users.moderator', 'users.status')
            ->get();
    }

}


