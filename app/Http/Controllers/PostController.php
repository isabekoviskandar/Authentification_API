<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if(!$post){
            return response()->json(['message' => 'Sorry we cannot find post'], 404);
        }else{
            return new PostResource($post);
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create([
            'category_id' => $request->category_id,
            'title' => $request-> title,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Post created successfully!' , 'data' => $post], 200);
    }

    public function update(Request $request , $id)
    {
        $post = Post::find($id);

        if(!$post){
            return response()->json(['message' => 'Sorry we cannot find the post!!'] , 404);
        }

        $request->validate([
            'category_id' =>'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create([
            'category_id' => $request->category_id,
            'title'=>$request->title,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Post updated succesfully!' , 'data' => $post ] , 200);
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if(!$post){
            return response()->json(['message' => 'Sorry we canno find the post'] , 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted succesfully!'] , 200);
    }
}
