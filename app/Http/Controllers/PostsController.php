<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function feed()
    {
        $feed=Post::with(["can_have_comments","can_have_likes"])->orderBy('created_at','desc')->get();
        return view('instagram.feed',['dataall'=>$feed]);
    }


    public function add_post()
    {
        return view('instagram.add_post');
    }
    
    public function store(Request $request)
    {
        $post=new Post();
        $post->title=$request->title;
        if ($request->has('photo'))
        {
        $post->photo=$request->photo->store('images');
        }
        $post->user_id=Auth::user()->id;
        $post->save();

        return redirect('/');
    }
  

}

