<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags'));
    }


    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|min:3'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();

        return redirect()->route('tag.index')->with('msg','Tag Created Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit',compact('tag'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' =>'required|min:3'
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();

        return redirect()->route('tag.index',$id)->with('msg','Tag Updated Successfully');
    }


    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tag.index',$id)->with('msg','Tag Deleted Successfully');
    }

    public function destroy($id)
    {

    }
}
