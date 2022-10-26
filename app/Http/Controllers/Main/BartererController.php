<?php

namespace App\Http\Controllers\Main;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BartererController extends Controller
{
    public function index(Request $request)
    {
        $top_barterers = User::query()
        ->has('ratings')
        ->withAvg('ratings','rating')
        ->byRole('user')
        ->take(6)
        ->get()
        ->sortByDesc('ratings_avg_rating');

        $barterers = User::query()
        ->when($request->name, fn($query) => $query->whereRaw("concat(first_name, ' ', last_name) LIKE '%$request->name%'"))
        ->doesntHave('ratings')
        ->with('media')
        ->byRole('user')
        ->paginate(12);

        return view('main.barterer.index', [
            'top_barterers' => $top_barterers,
            'barterers' => $barterers,
        ]);
    }

    public function show(User $barterer)
    {
        return view('main.barterer.show', [
            'barterer' => $barterer->load('posts.media', 'media', 'municipality', 'ratings'),
        ]);
    }
}