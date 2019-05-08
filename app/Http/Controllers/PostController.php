<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show',compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('msg','Post Deleted Successfully');
    }

    public function postActive($id){

        $post = Post::find($id);
        $post->status = 1;
        $post->save();
        return redirect()->back()->with('msg','Post Activated Successfully');
    }
}
