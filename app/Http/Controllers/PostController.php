<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        // $posts = Post::all()->paginate(2);
        $posts = Post::paginate(2);

        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        // Как у лектора не заработал:
        $post = Post::where('slug', $slug)->firstOrFail();
        // $post = Post::where('slug', $slug)->first();
        $post->views += 1;
        $post->update();
        return view('posts.show', compact('post'));
    }

}
