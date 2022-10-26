<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Http\Requests\Post\PostRequest;
class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()
        ->doesntHave('active_boosted_posts')
        ->doesntHave('active_flash_barters')
        ->when($request->title, fn($query) => $query->where('title', 'LIKE', "%$request->title%"))
        ->when($request->category, fn($query) => $query->where('category_id', $request->category))
        ->when($request->min && $request->max, fn($query) => $query->whereBetween('value', [$request->min, $request->max]))
        ->when($request->min &&  is_null($request->max), fn($query) => $query->where('value', $request->min))
        ->when(is_null($request->min) && $request->max , fn($query) => $query->where('value', $request->max))
        ->with('user.media','media')
        ->whereBelongsTo(auth()->user())
        ->paginate(20)
        ->withQueryString();
        
        return view('user.post.index', [
            'posts' => $posts,
            'categories' => Category::pluck('name', 'id'), 
        ]);
    }

    public function create()
    {
        return view('user.post.create', [
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    public function store(PostRequest $request, ImageUploadService $service)
    {
        $recent_posts = Post::whereBelongsTo(auth()->user())->whereDate('created_at', now())->count(); // get authenticated user recent posts count

        // check if the user has already reach his/her maximum daily post limit
        if($recent_posts >= auth()->user()->current_subscription->subscription_type->post_count) {
            return back()->with(['error' => 'Unfortunately you have exceeded your maximum daily post limit. You can post again tomorrow.']);
        }

        $post = auth()->user()->posts()->create($request->validated() + ['slug' => Str::slug($request->title)]);

        $service->handleImageUpload(model:$post, images:$request->image, collection:'post_images', conversion_name:'card', action:'create');

        return to_route('user.posts.index')->with(['success' => 'Post Added Successfully']);
    }

    public function show(Post $post)
    {
        return view('user.post.show', [
            'post' => $post->load('user.avatar', 'category', 'media'),
        ]);
    }

    public function edit(Post $post)
    {
        return view('user.post.edit', [
            'categories' => Category::pluck('name', 'id'),
            'post' => $post,
        ]);
    }

    public function update(PostRequest $request, Post $post, ImageUploadService $service)
    {
        if($request->image)  {
            $service->handleImageUpload(model:$post, images:$request->image, collection:'post_images', conversion_name:'card', action:'update');
        }

        $post->update($request->validated() + ['status' => Post::PENDING]);

        return to_route('user.posts.index')->with(['success' => "Post Updated Successfully. We're reviewing your listing to make sure it follows our rules for bartering. Once it's approved, it will be visible in our platform."]);
    }

    public function destroy()
    {
        
    }
}