<?php

use App\Http\Controllers\ForgotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicApiController;
use App\Http\Controllers\ReactionApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;



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

////get user
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();});

Route::get('/currentuser',[AuthController::class, 'currentuser'])->middleware('auth:api');

//register user
Route::post('/register',[AuthController::class, 'register']);

////forgot password
//Route::post('/forgot',[ForgotController::class,'forgot']);

//Get all users
Route::get('/users',[UserController::class, 'index'])->middleware('auth:api');

//get topic by id
Route::get('/user/{id}',[userController::class, 'show'])->middleware('auth:api');

//update a user
Route::put('/updateuser/{user}',[UserController::class, 'update'])->middleware('auth:api');

//delete a topic
Route::delete('/deleteuser/{user}',[UserController::class, 'delete'])->middleware('auth:api');


//topicRoutes
//Get all topics
Route::get('/topics',[TopicApiController::class, 'index'])->middleware('auth:api');

//get topic by id
Route::get('/topic/{id}',[TopicApiController::class, 'show'])->middleware('auth:api');

//create a topic
Route::post('/createtopic',[TopicApiController::class, 'store'])->middleware('auth:api');

//update a topic
Route::put('/updatetopic/{topic}',[TopicApiController::class, 'update'])->middleware('auth:api');

//delete a topic
Route::delete('/deletetopic/{topic}',[TopicApiController::class, 'delete'])->middleware('auth:api');



//reaction routes
//Get all reaction from topic
Route::get('/reactions/{Request}',[ReactionApiController::class, 'index'])->middleware('auth:api');

//create a reaction
Route::post('/createreaction',[ReactionApiController::class, 'store'])->middleware('auth:api');

//update a reaction
Route::put('/updatereaction/{topicreaction}',[ReactionApiController::class, 'update'])->middleware('auth:api');

//delete a reaction
Route::delete('/deletereactions/{topicreaction}',[ReactionApiController::class, 'delete'])->middleware('auth:api');

//search
Route::get('/searchreactions/{term}',[ReactionApiController::class, 'search'])->middleware('auth:api');
Route::get('/searchtopics/{term}',[TopicApiController::class, 'search'])->middleware('auth:api');

