<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\FlashBarter;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoostPost\BoostPostRequest;
use App\Http\Requests\FlashBarter\FlashBarterRequest;

class FlashBarterController extends Controller
{
    public function index()
    {
        return view('user.flash_barter.index', [
            'flash_barters' => FlashBarter::with('post.media', 'payment')->whereRelation('post', 'user_id', auth()->id())->where('is_expired', false)->paginate(20)
        ]);
    }

    public function create()
    {
        return view('user.flash_barter.create', [
            'posts' => Post::query()
            ->doesntHave('active_boosted_posts')
            ->doesntHave('active_flash_barters')
            ->whereBelongsTo(auth()->user())
            ->get(), // get all post that don't have active boost post & flash barter subscription
            'payment_methods' => PaymentMethod::all(),
        ]);
    }

    public function store(FlashBarterRequest $request, PaymentService $service)
    {
        // check if the post is already existing
        if(FlashBarter::where(['post_id' => $request->post_id, 'is_expired' => false])->first()) {
            return back()->with(['error' => 'The post has an existing flash barter subscription. Please select another one']);
        }

        // check if the flash barter for tomorrow schedule is already full

        $tomorrow_flash_barters = Flashbarter::whereDate('date_end', now()->addDay())->count();

        if($tomorrow_flash_barters >= 12) {
            return back()->with(['error' => "Oops! the schedule for tomorrow's Flash Barter is already full. You can request again next-time. If you already pay your subscription a refund will be granted. Please message us using our chat widget or email us at info.albarter@gmail.com."]);
        }

        $flash_barter = FlashBarter::create($request->validated() + [
            'date_start' => now()->addDay(), 
            'date_end' => now()->addDays($request->day_count + 1),
            'transaction_no' => mt_rand(123456,999999),
        ]);

        $service->handle(user: auth()->user(), paymentable: $flash_barter, paymentable_type: 'flash_barter', request_input: $request);  // process payment

        $this->log_activity(model: $flash_barter, event: 'requested', model_name: 'Flash Barter', model_property_name: $flash_barter->post->title);  // logs

        return to_route('user.flash_barters.index')
        ->with(['success' => 'Hola! You have requested a flash barter for post '. $flash_barter->post->title . ". You will be receiving an email notification once there is an update from your request."]);
    }

    public function show(FlashBarter $flash_barter)
    {
        return view('user.flash_barter.show', [
            'flash_barter' => $flash_barter->load(['post' => fn($query) => $query->with('category', 'media'), 'payment.payment_method']),
        ]);
    }
}