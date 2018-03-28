<?php

use Illuminate\Http\Request;

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

 // Default route commented to add 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
* Users
*/
Route::resource( 'users', 'Users\UsersController', [ 'only' => [ 'index', 'show', 'edit', 'update' ] ] );

/**
* Blog_Posts
*/
Route::resource( 'blog_posts', 'Blog_Posts\Blog_PostsController', [ 'except' => [ 'destroy', 'update', 'edit' ] ] );
Route::resource( 'blog_posts.users', 'Blog_Posts\Blog_PostsUsersController', [ 'only' => [ 'index' ] ] );