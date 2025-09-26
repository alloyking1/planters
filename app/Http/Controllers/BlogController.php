<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\Blog\BlogPostService;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct(protected BlogPostService $service)
    {
    }

    public function index(): View
    {
        return view('blog.index', [
            'posts' => $this->service->allPost(6)
        ]);
    }

    public function show(Post $blog): View
    {
        return view('blog.show', [
            'post' => $blog,
        ]);
    }
}
