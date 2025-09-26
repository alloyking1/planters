<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\TagDto;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\Blog\BlogPostTagService;
use Exception;

class TagController extends Controller
{
    public function index()
    {
        return view('blog.tag.index', [
            'tag' => app(BlogPostTagService::class)->allTags()
        ]);
    }

    public function create($id = null)
    {
        return view('blog.tag.create', [
            'tag' => $id ? Tag::find($id) : ''
        ]);
    }

    public function save(TagRequest $request)
    {
        try {
            app(BlogPostTagService::class)->updateOrCreate(TagDto::fromTagRequest($request), $request->id);
            return back()->with('message', 'Tag created successfully');
        } catch (Exception $e) {
            //write error to log file
            return back()->with('dbError', $e->getMessage());
        }
    }
}
