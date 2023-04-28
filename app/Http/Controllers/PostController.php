<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.posts.index');
    }

    public function create()
    {
        return view('backend.posts.create');
    }

    public function store()
    {
        return redirect()->route('post.index');
    }

    public function edit()
    {
        return view('backend.posts.edit');
    }

    public function update()
    {
        return redirect()->route('post.index');
    }

    public function destroy()
    {
        return redirect()->route('post.index');
    }
}
