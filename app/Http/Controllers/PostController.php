<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostInList as PostInListResource;
use App\Http\Resources\PostInFeaturedList as PostInFeaturedListResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return inertia('Posts/Index', [
            'posts' => PostInListResource::collection(Post::paginate()),
            'featured_posts' => PostInFeaturedListResource::collection(Post::featured()->orderBy('updated_at', 'desc')->limit(5)->get()),
        ]);
    }

    public function show(Post $post)
    {
        return inertia('Posts/Show', ['post' => new PostResource($post)]);
    }
}
