<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostTranslation;
use Session;

class PostController extends Controller
{
     public function index()
    {
        $posts = Post::latest()->get();
        return view('blog')
            ->with('posts', $posts);
    }

     public function show($slug)
    {
        // This is the only difference you need be aware of
        $post = Post::whereTranslation('slug', $slug)->firstOrFail();

        if ($post->translate()->where('slug', $slug)->first()->locale != app()->getLocale()) {
            return redirect()->route('post.show', $post->translate()->slug);
        }

        return view('post')
            ->with('post', $post);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required'
        ]);

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;

        $post->save();
        return redirect()->route('post.index');
    }
}
