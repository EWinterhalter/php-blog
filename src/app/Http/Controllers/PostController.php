<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{   

    public function index(Request $request)
    {
        $query = Post::query();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        }

        $posts = $query->latest()->paginate(5)->withQueryString();
        return view('posts.index', compact('posts', 'search'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string'
        ]);

        $request->user()->posts()->create($data);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string'
        ]);

        $post->update($data);

        return redirect()->route('posts.show', $post);
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
