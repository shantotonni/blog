<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::where('status',1)->with('user','category','comments')->get();
        return view('welcome',compact('posts','categories','tags'));
    }

    public function postDetails($slug){

        $post = Post::where('slug',$slug)->first();
        $posts = Post::where('status',1)->get();
        return view('post_details',compact('post','posts'));

    }

    public function tagPost($slug){

        $posts = Post::where('status',1)->with('user','category','comments')->whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();

        return view('welcome',compact('posts'));
    }

    public function categoryPost($id){

        $posts = Post::where('status',1)->with('user','category','comments')->where('category_id',$id)->get();
        return view('welcome',compact('posts'));
    }

}
