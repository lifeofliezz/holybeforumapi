<?php

namespace App\Http\Controllers;

use App\Models\TopicReaction;
use Illuminate\Http\Request;

class ReactionApiController extends Controller
{
    //return all topics
    public function index(){
        return TopicReaction::All();
    }

    //post topic
    public function store(Topic $topic){
        //validations
        request()->validate([
            'content'=>'required',
        ]);

        //create topic
        return TopicReaction::create([
            'content' => request('content')

        ]);
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
