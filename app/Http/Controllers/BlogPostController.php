<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Services\Blog\BlogPostService;
use Illuminate\Http\Request;
use App\DataTransferObjects\BlogPostDto;
use App\Models\Post;
use App\Services\Blog\BlogPostCategoryService;
use App\Services\Blog\BlogPostTagService;

class BlogPostController extends Controller
{
    public function __construct(protected BlogPostService $service, protected BlogPostCategoryService $category, protected BlogPostTagService $tag)
    {
    }


    public function index(string $slog)
    {
        $selectedPost = $this->service->getPost($slog);
        $postTags = $selectedPost->pluck('tag');

        return view('blog.show', [
            'postDetail' => $selectedPost,
            'recentPosts' => $this->service->relatedPost($postTags),
        ]);
    }


    public function show()
    {
        return view('blog.create', [
            'category' => Category::get(),
            'tag' => $this->tag->allTags(),
        ]);
    }

    public function create(BlogPostRequest $request)
    {
        $post = $this->service->createPost(BlogPostDto::fromPostRequest($request));
        return back()->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        return view('blog.edit', [
            'post' => $this->service->getPost($id),
            'category' => $this->category->allPostCategory(),
            'selectedCategory' => $this->category->selectedPostCategory($id),
            'tag' => $this->tag->allTags(),
            'selectedTags' => $this->tag->postSelectedTags($id),
        ]);
    }

    public function update(BlogPostRequest $request, $post)
    {
        $update = $this->service->updatePost(BlogPostDto::fromPostRequest($request), $post);
        return back()->with('success', 'Post updated successfully');
    }

    public function destroy($post)
    {
        $this->service->delete($post);
        return back()->with('success', 'Post deleted');
    }
}
