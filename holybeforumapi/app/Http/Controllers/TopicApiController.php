<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class TopicApiController extends Controller
{
    //return all topics
    public function index(){
        return Topic::All();
    }

    //post topic
    public function store(){
        //validations
        request()->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        //create topic
        return Topic::create([
            'title' => request('title'),
            'content' => request('content')
        ]);
    }

    //update a topic
    public function update(Topic $topic){
        //validations
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
        $success = $topic->delete();

        return[
            'success' => $success
        ];
    }
}


