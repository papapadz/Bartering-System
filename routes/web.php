<?php
// Facades
use Illuminate\Support\Facades\{Auth,Route};

// Shared Restful Controllers
use App\Http\Controllers\All\{
    ProfileController,
    TmpImageUploadController
};

// Admin Restful Controllers
use App\Http\Controllers\Admin\{
    DashboardController,
    ActivityLogController,
    AdController as AdminAdController,
    AnnouncementController as AdminAnnouncementController,
    BartererController as AdminBartererController,
    BoostedPostController as AdminBoostedPostController,
    CategoryController,
    FlashBarterController,
    PaymentController,
    PaymentMethodController,
    PostController,
    SubscriptionController,
    AdminController
};

// Auth Restful Controller
use App\Http\Controllers\Auth\{
    AuthController
};

// Main Restful Controllers
use App\Http\Controllers\Main\{
    AdController,
    AnnouncementController,
    BartererController,
    FlashBarterController as MainFlashBarterController,
    PostController as MainPostController
};

// User Restful Controllers
use App\Http\Controllers\User\{
    ActivityLogController as UserActivityLogController,
    AdController as UserAdController,
    BarterController,
    BoostedPostController,
    CommentController,
    DashboardController as UserDashboardController,
    FavoriteController,
    FlashBarterController as UserFlashBarterController,
    LikeController,
    MessageController,
    PostController as UserPostController,
    RatingController
};

// Guest
Route::group(['as' => 'main.'],function() {
    Route::view('/', 'main.home')->name('home');
    Route::resource('/barterers', BartererController::class)->only('index', 'show');
    Route::resource('/barter/posts', MainPostController::class)->only('index', 'show');
    Route::resource('/flashbarters', MainFlashBarterController::class)->only('index', 'show');
    Route::resource('/announcements', AnnouncementController::class)->only('index', 'show');
    Route::get('ads/{ad}', AdController::class)->name('ads.show');
});

// Admin 
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'],function() {
    Route::get('dashboard', DashboardController::class)->name('dashboard.index');
    Route::resource('admins', AdminController::class);
    Route::resource('barterers', AdminBartererController::class);
    Route::resource('payments/subscriptions', SubscriptionController::class);
    Route::resource('payments/boosted_posts', AdminBoostedPostController::class);
    Route::resource('payments/flash_barters', FlashBarterController::class);
    Route::resource('payments/ads', AdminAdController::class);
    Route::resource('posts', PostController::class);
    Route::resource('announcements', AdminAnnouncementController::class);
    Route::resource('payment_methods', PaymentMethodController::class);

    Route::resource('payments', PaymentController::class)->only('index', 'show');
    Route::resource('categories', CategoryController::class);
    //Route::get('role', RoleController::class)->name('role.index');
    Route::get('activity_logs', ActivityLogController::class)->name('activity_logs.index');
});

// User
Route::group(['middleware' => ['auth'], 'prefix' => 'barterer', 'as' => 'user.'],function() {
    Route::get('dashboard', UserDashboardController::class)->name('dashboard.index');
    Route::get('{post}/barters/create', [BarterController::class, 'create'])->name('barters.create');
    Route::post('{post}/barters', [BarterController::class, 'store'])->name('barters.store');
    Route::get('barters', [BarterController::class, 'index'])->name('barters.index');
    Route::get('barters/{barter}', [BarterController::class, 'show'])->name('barters.show');
    Route::put('barters/{barter}', [BarterController::class, 'update'])->name('barters.update');
    Route::delete('barters/{barter}', [BarterController::class, 'destroy'])->name('barters.destroy');
    Route::resource('posts', UserPostController::class);
    Route::resource('boosted_posts', BoostedPostController::class);
    Route::resource('flash_barters', UserFlashBarterController::class);
    Route::resource('favorites', FavoriteController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('likes', LikeController::class)->only('store', 'destroy');
    Route::resource('comments', CommentController::class)->except('index', 'show');
    Route::post('ratings', RatingController::class)->name('ratings.store');
    Route::resource('ads', UserAdController::class);
    Route::get('activity_logs', UserActivityLogController::class)->name('activity_logs.index');

});

Route::delete('tmp_upload/revert', [TmpImageUploadController::class, 'revert']);     // TMP FILE UPLOAD
Route::post('tmp_upload/content', [TmpImageUploadController::class, 'faqImageUpload'])->name('tmpupload.faqImageUpload');
Route::resource('tmp_upload', TmpImageUploadController::class);
Route::resource('profile', ProfileController::class)->parameter('profile', 'user');

// Custom Authentication
Route::group(['as' => 'auth.'], function () {

    // Auth Routes
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'attemptLogin')->name('attempt_login');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'attemptRegister')->name('attempt_register');
        Route::get('/logout', 'logout')->name('logout');

        // email verification
        Route::get('/email/verify/{token}', 'emailVerification')->name('email_verification');
    });
});


Auth::routes(['login' => false, 'register' => false]);