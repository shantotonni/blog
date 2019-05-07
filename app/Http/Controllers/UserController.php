<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Tag;
use App\User;
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
        $posts =Post::where('user_id',Auth::user()->id)->with('category','user')->get();
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

            if (Storage::disk('public')->exists('post')){

                Storage::disk('public')->makeDirectory('post');
            }

            //image resize
            $category_image_resize = Image::make($image)->resize(950,500)->save($imagename,90);
            Storage::disk('public')->put('post/'.$imagename,$category_image_resize);

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

    public function edit($id){

        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        return view('frontend.user.post_edit',compact('post','categories','tags'));

    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'title' =>'required|min:5',
            'category_id' =>'required|numeric',
            'tag_id' =>'required',
            'body' =>'required|min:5',
            'image_caption' =>'required|min:5',
        ]);

        $post = Post::find($id);

        $slug =str_slug($request->title);
        $image = $request->file('image');

        if (isset($image)){
            //make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //check category dir is exist
            if (Storage::disk('public')->exists('post')){

                Storage::disk('public')->makeDirectory('post');
            }

            //old image delete
            if (Storage::disk('public')->exists('post/'.$post->image)){

                Storage::disk('public')->delete('post/'.$post->image);
            }

            //image resize
            $category_image_resize = Image::make($image)->resize(950,500)->save($imagename,90);
            Storage::disk('public')->put('post/'.$imagename,$category_image_resize);

        }else{
            $imagename = $post->image;
        }

        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->image_caption = $request->image_caption;
        if ($post->save()){

            $post->tags()->sync($request->tag_id);
            return redirect()->route('user.post')->with('msg','Post Updated Successfully');
        }

    }

    public function delete($id){

        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('user.post')->with('msg','Post Deleted Successfully');
    }

    public function postComment(Request $request){

        $comment = new Comment();
        $comment->title = $request->title;
        $comment->body = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('msg','Comment Successfully');
    }

    public function userProfileView(){

        $profile = User::where('id',Auth::user()->id)->first();
        return view('frontend.user.user_profile_view',compact('profile'));

    }

    public function userProfileEdit($id){
        $profile = User::find($id);
        return view('frontend.user.edit_profile',compact('profile'));
    }

    public function userProfileUpdate(Request $request,$id){

        $this->validate($request,[
            'name' =>'required',
            'phone' =>'required|min:5',
            'avatar' =>'required|mimes:jpeg,jpg,png',
            'email' =>'required|email',
        ]);

        $user = User::find($id);

        $slug =str_slug($request->name);
        $image = $request->file('avatar');

        if (isset($image)){
            //make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //check category dir is exist
            if (Storage::disk('public')->exists('user')){

                Storage::disk('public')->makeDirectory('user');
            }

            //old image delete
            if (Storage::disk('public')->exists('user/'.$user->avatar)){

                Storage::disk('public')->delete('user/'.$user->avatar);
            }

            //image resize
            $user_image_resize = Image::make($image)->resize(150,150)->save($imagename,90);
            Storage::disk('public')->put('user/'.$imagename,$user_image_resize);

        }else{
            $imagename = $user->avatar;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->avatar = $imagename;
        $user->date_of_birth = $request->date_of_birth;

        if ($user->save()){

            return redirect()->route('user.profile.view')->with('msg','User Updated Successfully');
        }


    }



}
