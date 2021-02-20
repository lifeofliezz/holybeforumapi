<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicApiController;

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
Route::get('/topics',[TopicApiController::class, 'index']);

//create a topic
Route::post('/topics',[TopicApiController::class, 'store']);

//update a topic
Route::put('/topics/{topic}',[TopicApiController::class, 'update']);

//delete a topic
Route::delete('/topics/{topic}',[TopicApiController::class, 'delete']);
