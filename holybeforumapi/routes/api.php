<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Topic;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Get all topics
Route::get('/topics',function(){
    return Topic::all();

});

//create a topic
Route::post('/topics',function(){
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
});

//update a topic
Route::put('/topics/{topic}',function(Topic $topic){
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
});

//delete a topic
Route::delete('/topics/{topic}',function(Topic $topic){
    $success = $topic->delete();

    return[
        'success' => $success
    ];

});
