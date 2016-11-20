<?php

use App\Post;

//Main display to show posts to visitors
Route::get('/', function () {
    $posts = Post::all();
    return view('blogmain')->with('posts',$posts);
});

//Create Post page
Route::get('/create', function () {
    if(!Auth::check()){
        abort(403,"Unauthorized");
    }
    return view('create');
});

//Edit Post page
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

//Delete Post GET
Route::get('/delete/{id}', 'PostController@delete');

//Edit Post POST (Didn't use PUT because of HTML Form issues)
Route::post('/edit/{id}', 'PostController@update');

//Create Post POST
Route::post('/create', 'PostController@create');

Auth::routes();

Route::get('/home',[
    'as'=> 'home',
    'uses'=>'HomeController@index'
]);
