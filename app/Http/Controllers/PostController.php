<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $AllPosts = Post::all();
        return view('posts.index', ["posts" => $AllPosts]);
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }
    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
        Post::create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => request('posted_by'),
        ]);
        return to_route('posts.index');
    }


    public function edit(Post $post)
    {
        return view('posts.edit', ["post" => $post, "users"=>User::all()]);
    }

    public function update($post)
    {
        Post::findOrFail($post)->update([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => request('post_creator')
        ]);

        return to_route('posts.index');
    }


    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return to_route('posts.index');
    }
}

