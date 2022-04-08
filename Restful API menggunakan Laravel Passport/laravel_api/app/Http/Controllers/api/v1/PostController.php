<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\v1\BaseController as BaseController;
use App\Models\Post;
use Validator;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $post = Post::paginate(5);
      
        return $this->sendResponse(PostResource::collection($post), 'Post retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $filename = '';
        // if($request->hasFile('image')){
        //     $filename = $request->file('image')->store('post','public');
        // }else{
        //     $filename=Null;
        // }

        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $request->image = $path;
        }
        
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'max:2048'
        ]);
     
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
       
        $post = Post::create($input);
     
        return $this->sendResponse(new PostResource($post), 'Post created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
    
        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
     
        return $this->sendResponse(new PostResource($post), 'Post retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $request->image = $path;
        }

        $input = $request->all();
     
        $validator = Validator::make($input, [
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'max:2048'
        ]);
     
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
     
        $post->user_id = $input['user_id'];
        $post->category_id = $input['category_id'];
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->image = $input['image'];
        $post->save();
     
        return $this->sendResponse(new PostResource($post), 'Post updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Post $post)
    {
        $post->delete();
     
        return $this->sendResponse([], 'Post deleted successfully.');
    }
}
