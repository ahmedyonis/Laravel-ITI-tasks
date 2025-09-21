<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    //
    function index(){
        $posts=Post::all();
        return new PostResource($posts);
    }
    function show($id){
        $posts =Post::find($id);
        return new PostResource($posts);
    }
    function store(Request $request){
        $request->validate([
            "title"=>"required|min:3",
            "content"=>"required|min:10",
            // "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        // $file = $request->file('image');
        // $filename = time() . '_' . $file->getClientOriginalName();
        // $path = $file->storeAs('photos', $filename, 'public');

        Post::create ([
            "title"=>$request->title,
            "content"=>$request->content,
            "user_id"=>$request->user_id,
            // "photo"=>$path
        ]);
        return "done";
    }
    function update(Request $request,$id){

        $request->validate([
            "title"=>"required|min:3",
            "content"=>"required|min:10"
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;

        $post->save();

        return "done";
    }



}
