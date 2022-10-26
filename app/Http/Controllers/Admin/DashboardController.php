<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\Post;
use App\Models\User;
use App\Models\Payment;
use App\Models\Category;
use App\Models\BoostedPost;
use App\Models\FlashBarter;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function __construct()
    {
        DB::statement("SET SQL_MODE=''"); // set the strict to false
    }

    public function __invoke()
    {
        $posts = Post::query()->with('media');
        $ads =   Ad::query()->with('media');
        $boosted_posts = BoostedPost::query()->with('post.media');
        $flash_barters = FlashBarter::query()->with('post.media');
        $announcements = Announcement::query()->with('media');
        $transactions = Payment::query();

        return view('admin.dashboard.index', [
            'activities' => Activity::take(5)->get(),
            'total_post' => $posts->count(),
            'total_boosted_post' => $boosted_posts->count(),
            'total_flash_barter' => $flash_barters->count(),
            'total_ad' => $ads->count(),
            'total_active_user' => User::ByRole('user')->where('is_activated', true)->count(),
            'total_inactive_user' => User::ByRole('user')->where('is_activated', false)->count(),
            'total_announcement' => $announcements->count(),
            'total_transaction' => $transactions->count(),
            'recent_posts' => $posts->paginate(6),
            'recent_users' => User::ByRole('user')->paginate(6),
            'recent_ads' => $ads->latest()->paginate(6),
            'recent_transactions' => $transactions->latest()->paginate(6),
            'announcements' => $announcements->paginate(6),
            'total_posts_by_category' => $this->getTotalPostByCategory(),
            'chart_monthly_users' => $this->getMonthlyUsers(),
            'chart_monthly_sales' => $this->getMonthlySales(),
        ]);
    }

    /**
    * get the total posts by category
    *
    * @return void
    */
    protected function getTotalPostByCategory()
    {
        $categories = [];
        $total_posts = [];

        foreach (Category::with('posts')->get() as $category) {
            $categories[] = $category->name;
            $total_posts[] = $category->posts->count();
        }

        return [$categories, $total_posts];
    }

    /**
    * get the total monthly user
    *
    * @return void
    */
    protected function getMonthlyUsers()
    {
        $monthly_users = User::selectRaw("
        count(id) AS total_users, 
        month(created_at) as month_no, 
        DATE_FORMAT(created_at, '%M-%Y') AS new_date,
        YEAR(created_at) AS year,
        monthname(created_at) AS month"
        )
        ->groupBy('new_date')
        ->orderByRaw('month_no')
        ->get();

        $months = array();
        
        $total_monthly_users = array();

        foreach ($monthly_users as $month) {
            $months[] = $month->month;
        }

        foreach ($monthly_users as $total) {
            $total_monthly_users[] = $total->total_users;
        }

        return [$months, $total_monthly_users]; // sorted
    }

    /**
    * get the total monthly sales
    *
    * @return void
    */
    protected function getMonthlySales()
    {
        $monthly_sales = Payment::selectRaw("
        id,
        SUM(amount) AS total_sales, 
        month(created_at) as month_no, 
        DATE_FORMAT(created_at, '%M-%Y') AS new_date,
        YEAR(created_at) AS year,
        monthname(created_at) AS month"
        )
        ->where('status', Payment::CONFIRMED)
        ->groupBy('new_date')
        ->orderByRaw('month_no')
        ->get();

        $months = array();
        
        $total_monthly_sales = array();

        foreach ($monthly_sales as $monthly_sale) {
            $months[] = $monthly_sale->month;
            $total_monthly_sales[] = $monthly_sale->total_sales;

        }

        return [$months, $total_monthly_sales]; // sorted
    }
    
}