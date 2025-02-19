<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->get();
        return view('page.index', compact('posts'));
    }
}