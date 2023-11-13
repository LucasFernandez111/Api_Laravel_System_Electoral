<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('list-all-post', [PostController::class, 'listAllPost']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    //Routes of Authentication
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logOut']);

    //Routes of Post
    Route::post('create-post', [PostController::class, 'createPost']);
    Route::get('list-post', [PostController::class, 'listPost']);
    Route::put('update-post/{id}', [PostController::class, 'updatePost']);
    Route::delete('delete-post/{id}', [PostController::class, 'deletePost']);
});

