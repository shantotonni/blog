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
        $posts = Post::all();
        return view('welcome',compact('posts','categories','tags'));
    }

}
