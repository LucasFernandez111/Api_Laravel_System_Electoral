<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $request->validate([
            "title" => "required",
            "content" => "required",
            "partido" => "required",
        ]);

        $user_id = auth()->user()->id;

        $post = new Post();
        $post->user_id = $user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->partido = $request->partido;

        $post->save();

        return response()->json(['status' => 'OK', 'message' => 'Post Created successful']);
    }
    public function listPost()
    {
        $user_id = auth()->user()->id;
        $posts = Post::where("user_id", $user_id)->get();

        response()->json(['status' => 'OK', 'message' => 'Post Listed successful', 'data' => $posts]);
    }


    public function listAllPost()
    {

        $allPost = Post::all();

        return response()->json(['status' => 'OK', 'message' => 'Post Listed All successful', 'data' => $allPost]);
    }
    public function updatePost(Request $request, $id)
    {
    }

    public function deletePost($id)
    {
    }
}
