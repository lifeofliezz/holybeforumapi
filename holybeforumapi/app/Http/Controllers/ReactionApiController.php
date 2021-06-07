<?php

namespace App\Http\Controllers;


use App\Models\TopicReaction;
use Illuminate\Http\Request;

class ReactionApiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'delete']);
    }

    //return all topics
    public function index(Request $request){
        return TopicReaction::where('topic_reactions.topic_id', $request)
            ->join('users', 'user_id', '=', 'users.id')
            ->select('topic_reactions.content', 'topic_reactions.created_at', 'topic_reactions.updated_at', 'users.username', 'users.profilePicture', 'users.moderator', 'users.status')
            ->paginate(20);
    }

    //post topic
    public function store(Request $request){
        //validations
        $this->validate($request,[
            'content'=>'required',
        ]);

        //create topic

        $success = $request->user()->topicreactions()->create($request->only('content'));
        return [
            'success' => $success
        ];
    }

    //update a topic
    public function update(TopicReaction $reaction){
        //validations
        request()->validate([
            'content'=>'required',
        ]);
        //update topic
        $success = $reaction->update([
            'content' => request('content')
        ]);

        return [
            'success' => $success
        ];
    }

    //delete a topic
    public function delete(TopicReaction $reaction){
        $success = $reaction->delete();

        return[
            'success' => $success
        ];
    }

}
