<?php

namespace App\Http\Controllers;

use App\Services\Blog\BlogPostService;
use Illuminate\Http\Request;
use App\Enums\BlogPostCategoryEnum;
use App\Services\Agency\AgencyService;

class PagesController extends Controller
{
    public $paginate = 30;
    public $recentPostPaginate = 5;

    public function __construct(protected BlogPostService $blogPostService)
    {
    }

    public function home(AgencyService $agency)
    {
        return view('blog.pages.home', [
            'recentPost' => $this->blogPostService->recentPost(BlogPostCategoryEnum::TUTORIAL, $this->recentPostPaginate),
            'recentPackages' => $this->blogPostService->recentPost(BlogPostCategoryEnum::PACKAGES, $this->recentPostPaginate),
            'recentNews' => $this->blogPostService->recentPost(BlogPostCategoryEnum::BLOG, $this->recentPostPaginate),
            'agencies' => $agency->all()
        ]);
    }

    public function tutorial()
    {
        return view('blog.pages.list-post-by-category', [
            'data' => $this->blogPostService->recentPost(BlogPostCategoryEnum::TUTORIAL, $this->paginate),
            'title' => BlogPostCategoryEnum::TUTORIAL
        ]);
    }

    public function blog()
    {
        return view('blog.pages.list-post-by-category', [
            'data' => $this->blogPostService->recentPost(BlogPostCategoryEnum::BLOG, $this->paginate),
            'title' => BlogPostCategoryEnum::BLOG
        ]);
    }
    public function packages()
    {
        return view('blog.pages.list-post-by-category', [
            'data' => $this->blogPostService->recentPost(BlogPostCategoryEnum::PACKAGES, $this->paginate),
            'title' => BlogPostCategoryEnum::PACKAGES
        ]);
    }
}
