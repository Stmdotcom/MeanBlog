<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, $id)
    {
        $post = Auth::user()->posts->where('id',$id)->first();
        if (!$post->id){
            abort(403,"Unauthorized");
        }
        $post->content = $request->postcontent;
        $post->save();
        return redirect('home')->with('successmessage',"Post Updated");
    }

    public function create(Request $request)
    {
        $post = new Post;
        //I assume this can be auto set to current authed user via the model...
        $post->user_id = Auth::user()->id;
        $post->content = $request->postcontent;
        $post->save();

        return redirect()->route('home')->with('successmessage',"Post Created");
    }
}

