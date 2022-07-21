<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostInFeaturedList as PostInFeaturedListResource;
use App\Http\Resources\PostInList as PostInListResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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

    public function create()
    {
        return inertia('Posts/Create', ['categories' => CategoryResource::collection(Category::all())]);
    }

    public function store()
    {
        $validatedData = Request::validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'category' => ['required', 'exists:categories,id'],
        ]);

        $validatedData['author_id'] = Auth::id();

        Post::create($validatedData);

        return redirect()->route('posts.index');
    }
}
