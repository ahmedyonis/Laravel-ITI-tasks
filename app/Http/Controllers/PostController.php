<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //

    // public $posts = [['id' => 0, 'title' => 'First Post', 'content' => 'This is the content of the first post.'],
    // ['id' => 1, 'title' => 'Second Post', 'content' => 'This is the content of the second post.'],
    // ['id' => 2, 'title' => 'Third Post', 'content' => 'This is the content of the third post.'],];
    

    
    
    function index(){
        // $posts=Post::all();
        $posts = Post::whereNull('deleted_at')->with('user')->latest()->paginate(5);

        return view('posts.view',['posts' => $posts]);
    }

    function show($id){
        $posts =Post::find($id);
        return view('posts.show', ['posts' => $posts]);
    }

    function edit($id){
        $posts =Post::find($id);
        $users = User::all();
        return view('posts.edit', ['posts' => $posts],['users'=>$users]);
    }

    function destroy($id){
        $posts = Post::find($id);
        $posts->delete();
        return redirect("/posts");
    }

    function create(){
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    function store(Request $request){
        $request->validate([
            "title"=>"required|min:3",
            "content"=>"required|min:10",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('photos', $filename, 'public');

        Post::create ([
            "title"=>$request->title,
            "content"=>$request->content,
            "user_id"=>$request->user_id,
            "photo"=>$path
        ]);
        return redirect("/posts");
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

        return redirect("/posts");
    }

    function trashed()
    {
        $posts = Post::onlyTrashed() 
                     ->paginate(5);
        return view('posts.trashed', compact('posts'));
    }

    function restore($id)
    {
        
        $posts = Post::withTrashed()->find($id);
        $posts->restore();
        return redirect("/posts");
    }
    function forceDelete($id)
    {
    $post = Post::withTrashed()->findOrFail($id);

    if ($post->photo && Storage::disk('public')->exists($post->photo)) {
        Storage::disk('public')->delete($post->photo);
    }

    $post->forceDelete();

    return redirect()->route('posts.trashed')->with('success', 'Post and image permanently deleted.');
    }
}
