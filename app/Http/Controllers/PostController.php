<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::latest()->get();
        $page_title = 'Posts';
        return view('backend.posts.list', compact('posts','page_title'));
    }

    public function add()
    {
        $page_title = 'Create Post';
        return view('backend.posts.add', compact('page_title'));
    }

    public function store()
    {
        return redirect()->route('backend.post.list');
    }

    public function edit()
    {
        return view('backend.posts.edit');
    }

    public function update()
    {
        return redirect()->route('backend.post.index');
    }

    public function destroy()
    {
        return redirect()->route('backend.post.index');
    }
}
