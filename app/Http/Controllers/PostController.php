<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        // $posts = Post::with('category')->orderBy('id', 'desc')->paginate(2);
        $posts = Post::paginate(2);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        // Как у лектора не заработал:
        // $post = Post::where('slug', $slug)->firstOfFail();
        $post = Post::where('slug', $slug)->first();
        $post->views += 1;
        $post->update();
        return view('posts.show', compact('post'));
    }

}
