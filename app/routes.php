<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{

    //$posts = Post::orderBy('created_at', 'desc')->take(5)->get();
    $posts = DB::select('SELECT posts.id, posts.title, posts.body, posts.user_id, posts.created_at, users.firstname
        FROM posts, users
        WHERE posts.user_id = users.id ORDER BY posts.created_at DESC
        LIMIT 5');
	return View::make('index')->with('posts', $posts);
});
/* Users Routes */
Route::get('register', 'UserController@getRegister');
Route::post('register', 'UserController@postRegister');
Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');
Route::get('logout', 'UserController@getLogOut');
Route::get('profile', 'UserController@getProfile');
Route::get('edit', 'UserController@getUpdate');
Route::post('edit', 'UserController@postUpdate');
/* Posts Route */
Route::group(array('before' => 'notactivate'), function() {
    Route::get('createpost', 'PostController@getCreate');
    Route::get('myposts', 'PostController@getMyPosts');
});
Route::get('posts', 'PostController@getPosts');
Route::get('fullpost/{id}', 'PostController@getFullPost');
Route::post('createpost', 'PostController@addPost');
Route::post('delete/{id}', 'PostController@deletePost');
Route::get('get/edit/{id}', 'PostController@getEditPost');
Route::post('get/edit/{id}', 'PostController@postEditPost');
/* Admin Route */
Route::get('admin', 'PostController@adminPanel');
Route::post('admin', 'AdminController@deletePost');

/* Comments Route */
Route::post('fullpost/{id}', 'CommentController@addComment');

/* Search box */
Route::post('/', 'PostController@getSearchByCategories');
Route::get('search', 'PostController@getSearchByKey');
Route::get('accountactivate/{code}', 'UserController@activateUser');

/* Remind passsword */
Route::get('password/reset', 'PasswordController@remind');
Route::post('password/reset', 'PasswordController@request');
Route::get('password/reset/{token}', 'PasswordController@reset');
Route::post('password/reset/{token}', 'PasswordController@update');



