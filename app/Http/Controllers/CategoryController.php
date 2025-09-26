<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\CategoryDto;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Blog\BlogPostCategoryService;
use Exception;

class CategoryController extends Controller
{

    public function index()
    {
        return view('blog.category.index', [
            'category' => app(BlogPostCategoryService::class)->allPostCategory()
        ]);
    }

    public function create($id = null)
    {
        return view('blog.category.create', [
            'category' => $id ? Category::find($id) : ''
        ]);
    }

    public function save(CategoryRequest $request)
    {
        try {
            app(BlogPostCategoryService::class)->updateOrCreate(CategoryDto::fromCategoryRequest($request), $request->id);
            return redirect()->back()->with('message', 'category created successfully');
        } catch (Exception $e) {
            //write error to log file
            return back()->with('dbError', $e->getMessage());
        }
    }
}
