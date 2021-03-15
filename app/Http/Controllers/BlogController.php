<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('index')->with(['posts'=>$posts]);
    }

    public function store(Request $request){
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body 
        ]);
        return back();
    }

    public function get_post($id)
    {
        $post = Post::find($id);

        if($post == null)
        return response('post is not found');

        return view('detail')->with(['post'=>$post]);
    }
}
