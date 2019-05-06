<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts =Post::all();
        return view('frontend.user.post_list',compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.user.post_create',compact('categories','tags'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'title' =>'required|min:5',
            'category_id' =>'required|numeric',
            'tag_id' =>'required',
            'body' =>'required|min:5',
            'image' =>'required|mimes:jpeg,jpg,png',
            'image_caption' =>'required|min:5',
        ]);

        $slug =str_slug($request->title);
        $image = $request->file('image');
        if (isset($image)){
            //make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //check category dir is exist

            if (Storage::disk('public')->exists('category')){

                Storage::disk('public')->makeDirectory('category');
            }

            //image resize
            $category_image_resize = Image::make($image)->resize(950,500)->save($imagename,90);
            Storage::disk('public')->put('category/'.$imagename,$category_image_resize);

        }else{
            $imagename = 'default.png';
        }

        $post = new Post();
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->image_caption = $request->image_caption;
        $post->status = 0;
        if ($post->save()){
            $post->tags()->attach($request->tag_id);
            return redirect()->route('user.post')->with('msg','Post Created Successfully');
        }
    }
}
