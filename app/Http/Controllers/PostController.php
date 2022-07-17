<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return inertia('Posts/Index', [
            'posts' => Post::paginate(),
            'featured_posts' => Post::featured()->orderBy('updated_at', 'desc')->limit(5)->get(),
        ]);
    }

    public function show(Post $post)
    {
        return inertia('Posts/Show', [
            'post' => $post,
        ]);
    }
}
