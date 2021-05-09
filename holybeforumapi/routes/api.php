<?php

use App\Http\Controllers\ForgotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicApiController;
use App\Http\Controllers\ReactionApiController;
use App\Http\Controllers\AuthController;



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
//user routes

//login user
Route::post('/login',[AuthController::class,'login']);

//get user
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();});

Route::get('/currentuser',[AuthController::class, 'currentuser'])->middleware('auth:api');

//register user
Route::post('/register',[AuthController::class, 'register']);

//forgot password
Route::post('/forgot',[ForgotController::class,'forgot']);



//topicRoutes
//Get all topics
Route::get('/topics',[TopicApiController::class, 'index'])->middleware('auth:api');

//create a topic
Route::post('/createtopic',[TopicApiController::class, 'store'])->middleware('auth:api');

//update a topic
Route::put('/topics/{topic}',[TopicApiController::class, 'update']);

//delete a topic
Route::delete('/topics/{topic}',[TopicApiController::class, 'delete']);



//reaction routes
//Get all reaction from topic
Route::get('/reactions',[ReactionApiController::class, 'index']);

//create a reaction
Route::post('/reactions',[ReactionApiController::class, 'store']);

//update a reaction
Route::put('/reactions/{reaction}',[ReactionApiController::class, 'update']);

//delete a reaction
Route::delete('/reactions/{reaction}',[ReactionApiController::class, 'delete']);
