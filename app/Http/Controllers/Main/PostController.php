<?php

namespace App\Http\Controllers\Main;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Barter;
use App\Models\Payment;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $boosted_posts = Post::query()
        ->has('active_boosted_posts')
        ->doesntHave('active_flash_barters')
        ->when($request->title, fn($query) => $query->where('title', 'LIKE', "%$request->title%"))
        ->when($request->user_id, fn($query) => $query->where('user_id', $request->user_id)) 
        ->when($request->category_id, fn($query) => $query->where('category_id', $request->category_id))
        ->when($request->min && $request->max, fn($query) => $query->whereBetween('value', [$request->min, $request->max]))
        ->when($request->min &&  is_null($request->max), fn($query) => $query->where('value', $request->min))
        ->when(is_null($request->min) && $request->max , fn($query) => $query->where('value', $request->max))
        ->whereRelation('active_boosted_posts.payment', 'status', Payment::CONFIRMED)
        ->where('status', Post::APPROVED)
        ->where('is_bartered', false)
        ->with('user.media','media', 'likes', 'comments')
        ->get();

        // $boosted_posts = BoostedPost::query()
        // ->when($request->title, fn($query) => $query->whereRelation('post', 'title', 'LIKE', "%$request->title%"))
        // ->when($request->user_id, fn($query) => $query->whereRelation('post', 'user_id', $request->user_id)) 
        // ->when($request->category_id, fn($query) => $$query->whereRelation('post', 'category_id', $request->category_id))
        // ->when($request->min && $request->max, fn($query) => $query->whereBetween('price', [$request->min, $request->max]))
        // ->when($request->min &&  is_null($request->max), fn($query) => $query->where('price', $request->min))
        // ->when(is_null($request->min) && $request->max , fn($query) => $query->where('price', $request->max))
        // ->whereRelation('payment', 'status', Payment::CONFIRMED)
        // ->with('user.media','media')
        // ->paginate(20)
        // ->withQueryString();
        
        $posts = Post::query()
        ->doesntHave('active_boosted_posts')
        ->doesntHave('active_flash_barters')
        ->when($request->title, fn($query) => $query->where('title', 'LIKE', "%$request->title%"))
        ->when($request->user_id, fn($query) => $query->where('user_id', $request->user_id)) 
        ->when($request->category_id, fn($query) => $query->where('category_id', $request->category_id))
        ->when($request->min && $request->max, fn($query) => $query->whereBetween('value', [$request->min, $request->max]))
        ->when($request->min &&  is_null($request->max), fn($query) => $query->where('value', $request->min))
        ->when(is_null($request->min) && $request->max , fn($query) => $query->where('value', $request->max))
        ->where('status', Post::APPROVED)
        ->where('is_bartered', false)
        ->with('user.media','media', 'likes', 'comments')
        ->paginate(18)
        ->withQueryString();

        return view('main.post.index', [
            'boosted_posts' => $boosted_posts,
            'posts' => $posts,
            'users' => User::byRole('user')->active()->get(),
            'categories' => Category::all(), 
        ]);
    }

    public function show(Post $post)
    {
        return view('main.post.show', [
            'post' => $post->load(['category','media','barters.bartered_post.user', 'user' => fn($query) => $query->with('media', 'municipality', 'ratings.sender.media')]),
            'ads' => Ad::with('media')->whereRelation('payment', 'status', Payment::CONFIRMED)->where('is_expired', false)->get(),
        ]);
    }
}