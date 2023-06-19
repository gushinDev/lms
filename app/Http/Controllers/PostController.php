<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()->paginate(3);
        return view('posts', compact('posts'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show(Post $post)
    {
        //
    }
}
