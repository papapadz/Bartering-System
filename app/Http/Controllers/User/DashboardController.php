<?php

namespace App\Http\Controllers\User;

use App\Models\Ad;
use App\Models\Post;
use App\Models\Category;
use App\Models\BoostedPost;
use App\Models\FlashBarter;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->with('media')->whereBelongsTo(auth()->user());
        $ads =   Ad::query()->with('media')->whereBelongsTo(auth()->user());
        $boosted_posts = BoostedPost::query()->with('post.media')->whereRelation('post', 'user_id', auth()->id());
        $flash_barters = FlashBarter::query()->with('post.media')->whereRelation('post', 'user_id', auth()->id());

        return view('user.dashboard.index', [
            'activities' => Activity::where('causer_id', auth()->id())->latest()->take(5)->get(),
            'total_post' => $posts->count(),
            'total_boosted_post' => $boosted_posts->count(),
            'total_flash_barter' => $flash_barters->count(),
            'total_ad' => $ads->count(),
            'recent_posts' => $posts->paginate(3),
            'recent_ads' => $ads->paginate(6),
            'announcements' => Announcement::latest()->paginate(6),
            'total_posts_by_category' => $this->getTotalPostByCategory(),
        ]);
    }

    protected function getTotalPostByCategory()
    {
        $categories = [];
        $total_posts = [];

        foreach (Category::with('posts')->whereRelation('posts', 'user_id', auth()->id())->get() as $category) {
            $categories[] = $category->name;
            $total_posts[] = $category->posts->count();
        }

        return [$categories, $total_posts];
    }
}