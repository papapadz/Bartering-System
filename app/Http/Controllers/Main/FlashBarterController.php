<?php

namespace App\Http\Controllers\Main;

use App\Models\Post;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlashBarterController extends Controller
{
    public function index(Request $request)
    {
        $flash_barters = Post::query()
        ->has('active_flash_barters')
        ->doesntHave('active_boosted_posts')
        ->when($request->title, fn($query) => $query->where('title', 'LIKE', "%$request->title%"))
        ->when($request->user_id, fn($query) => $query->where('user_id', $request->user_id)) 
        ->when($request->category_id, fn($query) => $query->where('category_id', $request->category_id))
        ->when($request->min && $request->max, fn($query) => $query->whereBetween('price', [$request->min, $request->max]))
        ->when($request->min &&  is_null($request->max), fn($query) => $query->where('price', $request->min))
        ->when(is_null($request->min) && $request->max , fn($query) => $query->where('price', $request->max))
        ->whereRelation('active_flash_barters.payment', 'status', Payment::CONFIRMED)
        ->where('is_bartered', false)
        ->with('user.media','media', 'likes', 'comments')
        ->get();

        return view('main.flash_barter.index', [
            'flash_barters' => $flash_barters,
        ]);
    }
}