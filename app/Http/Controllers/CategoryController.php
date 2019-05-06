<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|min:3'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        return redirect()->route('category.index')->with('msg','Category Created Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' =>'required|min:3'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        return redirect()->route('category.index',$id)->with('msg','Category Updated Successfully');
    }


    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index',$id)->with('msg','Category Deleted Successfully');
    }

    public function destroy($id)
    {

    }
}
