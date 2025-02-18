<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => Auth::user()->name
        ]);

        return redirect()->route('post.index')->with('success', 'Postingan ditambahkan');
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'visibility' => 'required'
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'visibility' => $request->input('visibility'),
            'author_update' => Auth::user()->name
        ]);

        return redirect()->route('post.index')->with('success', 'Perubahan berhasil');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Postingan Terhapus');
    }


    // // Testing CKE Editor
    // public function createTwo()
    // {
    //     return view('tinyeditor');
    // }

    // public function storeTwo(Request $request)
    // {
    //     $request->validate([
    //         'titile',
    //         'content'
    //     ]);

    //     Post::create([
    //         'title' => $request->input('title'),
    //         'content' => $request->input('content')
    //     ]);

    //     return redirect()->route('welcome');
    // }

    public function uploadImage(Request $request)
    {
        $file = $request->file('upload');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload'), $fileName);
        return response()->json([
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => asset('upload/' . $fileName)
        ]);
    }
}