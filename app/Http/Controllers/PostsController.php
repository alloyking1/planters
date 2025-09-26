<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\BlogPostDto;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Services\Blog\BlogPostService;

class PostsController extends Controller
{
    public function __construct(protected BlogPostService $service)
    {
        $this->middleware('auth')->only([
            'create', 'update', 'edit', 'destroy'
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::orderBy('id', 'desc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create', [
            'category' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, BlogPost $blogPost)
    {
        // $post = $this->service->store( new BlogPostDto::fromAppRequest($request));

        // $validated = $request->validated();
        // $post = Post::create(['user_id' => Auth::user()->id, 'is_published' => 'on'], $validated);
        // $post = Post::create([
        //     'user_id' => Auth::user()->id,
        //     'title' => $validated->title,
        //     'excerpt' => $validated->excerpt,
        //     'body' => $validated->body,
        //     // 'image_path' => $this->storeImage($request),
        //     'is_published' => $validated->is_published === 'on',
        //     'min_to_read' => $validated->min_to_read,
        // ]);

        // $post->meta()->create([
        //     'post_id' => $post->id,
        //     'meta_description' => $validated->meta_description,
        //     'meta_keywords' => $validated->meta_keywords,
        //     'meta_robots' => $validated->meta_robots,
        // ]);

        // return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('blog.show', [
            'post' => Post::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('blog.edit', [
            'post' => Post::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts,title' . $id,
            'excerpt' => 'required',
            'body' => 'required',
            'img' => ['mime:jpg', 'max:5048'],
            'min_to_read' => 'min:0|max:60',
        ]);
        Post::where('id', $id)->update($request->except('_token', '_method'));

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect(route('blog.index'))->with('message', 'Post have been deleted');
    }

    private function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        return $request->image->move(public_path('image'), $newImageName);
    }
}
