<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ViewController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->get();
        return view('page.index', compact('posts'));
    }

    public function showPost(string $title)
    {
        $post = Post::where('title', $title)->firstOrFail();
        return view('page.show', compact('post'));
    }
}