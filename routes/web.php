<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Post;

//Main Page
Route::get('/', function () {
    $posts = Post::all();
    return view('blogmain')->with('posts',$posts);
});

//Admin portal
Route::get('/create', function () {
    if(!Auth::check()){
        abort(403,"Unauthorized");
    }
    return view('create');
});

Route::post('/create', 'PostController@create');

Route::get('/edit/{id}', function ($id) {
    if(!Auth::check()){
        abort(403,"Unauthorized");
    }
    $post = Auth::user()->posts->where('id',$id)->first();
    if (!$post->id){
        abort(403,"Unauthorized");
    }
    return view('edit')->with('existingpost',$post);
});

Route::post('/edit/{id}', 'PostController@update');

Auth::routes();

Route::get('/home',[
    'as'=> 'home',
    'uses'=>'HomeController@index'
]);
