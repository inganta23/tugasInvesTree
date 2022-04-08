<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Auth;

class ArticleController extends Controller
{
    public function index()
    {
        //fitur pagination
        $data['articles'] = Article::orderBy('id')->paginate(5);
        return view('articles.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('articles.create');
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
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdH') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Article::create($input);

        return redirect()->route('articles.index')
        ->with('success','Article has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\article  $article
    * @return \Illuminate\Http\Response
    */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\article  $article
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdH') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $article = Article::find($id);
       
        $article->update($input);
        return redirect()->route('articles.index')
        ->with('success','Article Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')
        ->with('success','Article has been deleted successfully');
    }
}
