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
      app()->setLocale('en');
        $post = new Post();
        $post->title = $request->titleen;
        $post->content = $request->contenten;
        $post->save();

        app()->setLocale('id');

        $post->title = $request->titleid;
        $post->content = $request->contentid;
        $post->save();
        
        return redirect()->route('post.index');
    }
}
