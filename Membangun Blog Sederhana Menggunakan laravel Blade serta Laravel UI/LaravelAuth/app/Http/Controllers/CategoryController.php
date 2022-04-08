<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //fitur pagination
        $data['categories'] = Category::orderBy('id')->paginate(5);
        return view('categories.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('categories.create');
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);
        $category = new Category;
        $category->user_id = $request->user_id;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')
        ->with('success','Category has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\category  $category
    * @return \Illuminate\Http\Response
    */
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\category  $category
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->user_id = $request->user_id;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')
        ->with('success','Category Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
        ->with('success','Category has been deleted successfully');
    }
}
