<?php

use App\Http\Controllers\ForgotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicApiController;
use App\Http\Controllers\ReactionApiController;
use App\Http\Controllers\UserApiController;
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
//get user
Route::middleware('auth:api')->get('/user', [UserApiController::class, 'index']);

//create user
Route::post('/users',[UserApiController::class, 'store']);

//update user
Route::put('/users/{user}',[UserApiController::class, 'update']);

//delete user
Route::delete('/users/{user}',[UserApiController::class, 'delete']);

//login user
Route::post('/users',[AuthController::class,'login']);

//get user
Route::get('/users',[AuthController::class, 'user'])->middleware('auth:api');

//register user
Route::post('/users',[AuthController::class, 'register']);

//logout user
Route::post('/users/{user}',[UserApiController::class, 'logout']);

//forgot password
Route::post('users',[ForgotController::class, 'forgot']);

//topicRoutes
//Get all topics
Route::get('/topics',[TopicApiController::class, 'index']);

//create a topic
Route::post('/topics',[TopicApiController::class, 'store']);

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
