<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\BoostedPost;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Http\Requests\BoostPost\BoostPostRequest;

class BoostedPostController extends Controller
{
    public function index()
    {
        return view('user.boosted_post.index', [
            'boosted_posts' => BoostedPost::with('post.media', 'payment')->whereRelation('post', 'user_id', auth()->id())->where('is_expired', false)->paginate(20)
        ]);
    }

    public function create()
    {
        return view('user.boosted_post.create', [
            'posts' => Post::query()
            ->doesntHave('active_boosted_posts')
            ->doesntHave('active_flash_barters')
            ->whereBelongsTo(auth()->user())
            ->get(), // get all post that don't have active boost post & flash barter subscription,
            'payment_methods' => PaymentMethod::all(),
        ]);
    }

    public function store(BoostPostRequest $request, PaymentService $service)
    {
        // check if the post has already been exist
        if(BoostedPost::where(['post_id' => $request->post_id, 'is_expired' => false])->first()) {
            return back()->with(['error' => 'The post has an existing boosted post subscription. Please select another one']);
        }

        $boosted_post = BoostedPost::create($request->validated() + [
            'date_start' => now()->addDay(), 
            'date_end' => now()->addDays($request->day_count + 1),
        ]);

        $service->handle(user: auth()->user(), paymentable: $boosted_post, paymentable_type: 'boosted_post', request_input: $request);  // process payment

        $this->log_activity(model: $boosted_post, event: 'requested', model_name: 'Boost Post', model_property_name: $boosted_post->post->title);  // logs

        return to_route('user.boosted_posts.index')
        ->with(['success' => 'Hola! You have requested a boost post for '. $boosted_post->post->title . ". You will be receiving an email notification once there is an update from your request."]);
    }

    public function show(BoostedPost $boosted_post)
    {
        return view('user.boosted_post.show', [
            'boosted_post' => $boosted_post->load(['post' => fn($query) => $query->with('category', 'media'), 'payment.payment_method']),
        ]);
    }
}