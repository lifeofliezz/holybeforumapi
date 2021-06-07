<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;



class TopicApiController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'delete']);
    }

    //return all topics
    public function index(){
        return Topic::latest()
            ->join('users', 'user_id', '=', 'users.id')
            ->select('topics.title', 'topics.content', 'topics.created_at', 'topics.updated_at', 'users.username', 'users.profilePicture', 'users.moderator', 'users.status')
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
            'success' => $success
        ];
    }

    //update a topic
    public function update(Topic $topic){
        //validations
        $topic = Topic::find($topic);
        if(is_null($topic)){
            return response()->json('record not found!',404);
        }
        request()->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        //update topic
        $success = $topic->update([
            'title' => request('title'),
            'content' => request('content')
        ]);

        return [
            'success' => $success
        ];
    }

    //delete a topic
    public function delete(Topic $topic){
        $topic = Topic::find($topic);
        if(is_null($topic)){
            return response()->json('record not found!',404);
        }
        $success = $topic->delete();

        return[
            'success' => $success
        ];
    }
}


