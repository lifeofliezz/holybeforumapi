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

    //return all reactions with topicid
    public function index($id){
        return TopicReaction::find($id)
            ->join('users', 'user_id', '=', 'users.id')
            ->select('topic_reactions.id','topic_reactions.content', 'topic_reactions.created_at', 'topic_reactions.updated_at', 'users.username', 'topic_reactions.user_id', 'users.profilePicture', 'users.moderator', 'users.status')
            ->where('topic_reactions.topic_id','=',$id)
            ->get();
    }

    //post reaction
    public function store(Request $request){
        //validations
        $this->validate($request,[
            'content'=>'required',
        ]);

        //create reaction

        $success = $request->user()->topic_reactions()->create($request->only('content', 'topic_id'));
        return [
            'success' => $success
        ];
    }

    //update a reaction
    public function update(Request $request, TopicReaction $topicreaction){
        $topicreaction->update($request->all());

        return response() ->json($topicreaction, 200);
    }

    //delete a reaction
    public function delete(TopicReaction $reaction){
        $reaction->delete();

        return response()->json(null, 204);
    }


    //search topics and reactions
    public function search($term){
        return TopicReaction::search($term)
            ->join('users', 'user_id', '=', 'users.id')
            ->select('topic_reactions.content', 'topic_reactions.created_at', 'topic_reactions.updated_at', 'users.username', 'users.profilePicture', 'users.moderator', 'users.status')
            ->get();
    }

}
