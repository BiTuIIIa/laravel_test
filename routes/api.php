<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [\App\Http\Controllers\AuthController::class,'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class,'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class,'me']);

});

Route::group(['namespace' => 'Post', 'middleware' => 'jwt.auth'],function (){
    Route::get('/posts',[\App\Http\Controllers\Post\IndexController::class,'__invoke']);
    Route::get('/posts/create', [\App\Http\Controllers\Post\CreateController::class,'__invoke']);
    Route::post('/posts',[\App\Http\Controllers\Post\StoreController::class,'__invoke']);
    Route::get('/posts/{post}',[\App\Http\Controllers\Post\ShowController::class,'__invoke']);
    Route::get('/posts/{post}/edit',[\App\Http\Controllers\Post\EditController::class,'__invoke']);
    Route::patch('/posts/{post}',[\App\Http\Controllers\Post\UpdateController::class,'__invoke']);
    Route::delete('/posts/{post}',[\App\Http\Controllers\Post\DestroyController::class,'__invoke']);
});
