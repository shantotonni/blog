<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function create(){

        return view('admin.user.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' =>'required',
            'phone' =>'required',
            'avatar' =>'required|mimes:jpeg,jpg,png',
            'email' =>'required|email',
            'password' =>'required',
        ]);

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

            //image resize
            $user_image_resize = Image::make($image)->resize(100,150)->save($imagename,90);
            Storage::disk('public')->put('user/'.$imagename,$user_image_resize);

        }else{
            $imagename = 'default.png';
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->avatar = $imagename;
        $user->date_of_birth = $request->date_of_birth;
        if ($user->save()){
            return redirect()->route('admin.user.index')->with('msg','Post Created Successfully');
        }
    }

}
