<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'App\Http\Controllers\Post'],function (){

    Route::get('/admin',[\App\Http\Controllers\Admin\Post\IndexController::class,'__invoke']);

    Route::get('/posts', [\App\Http\Controllers\Post\IndexController::class,'__invoke'])->name('post.index');
    Route::get('/posts/create', [\App\Http\Controllers\Post\CreateController::class,'__invoke'])->name('post.create');
    Route::post('/posts',[\App\Http\Controllers\Post\StoreController::class,'__invoke'])->name('post.store');
    Route::get('/posts/{post}',[\App\Http\Controllers\Post\ShowController::class,'__invoke'])->name('post.show');
    Route::get('/posts/{post}/edit',[\App\Http\Controllers\Post\EditController::class,'__invoke'])->name('post.edit');
    Route::patch('/posts/{post}',[\App\Http\Controllers\Post\UpdateController::class,'__invoke'])->name('post.update');
    Route::delete('/posts/{post}',[\App\Http\Controllers\Post\DestroyController::class,'__invoke'])->name('post.delete');
});


Route::group(['namespace'=>'App\Http\Controllers\Admin'],function (){
    Route::group(['namespace'=>'App\Http\Controllers\Post', 'prefix'=>'admin'],function (){
        Route::get('/post',[\App\Http\Controllers\Admin\Post\IndexController::class,'__invoke'])->name('admin.post.index');
    });

});
