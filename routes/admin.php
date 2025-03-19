<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\JoinTeamController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\HireMentorController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\HireAmbassadorController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\IndomitableWomenController;
use App\Http\Controllers\Admin\MentorApplicationController;
use App\Http\Controllers\Admin\AmbassadorApplicationController;
use App\Http\Controllers\Admin\PagebuilderController;
use App\Http\Controllers\Admin\PathFinderController;
use App\Http\Controllers\Admin\PathFinderReplyController;
use App\Models\PathFinderReply;

//Admin Routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('profile', [ProfileSettingController::class, 'profile'])->name('profile');
    Route::put('profile-update', [ProfileSettingController::class, 'profileUpdate'])->name('profile.update');
    Route::get('change-password', [ProfileSettingController::class, 'changePassword'])->name('change.password');
    Route::put('password-update', [ProfileSettingController::class, 'updatePassword'])->name('password.update');
    Route::get('dashboard',[AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('user',[AdminDashboardController::class, 'user'])->name('user');
    Route::get('create-user',[AdminDashboardController::class, 'createUser'])->name('create.user');
    Route::get('create-role',[AdminDashboardController::class, 'roleCreate'])->name('create.role');
    Route::get('role',[AdminDashboardController::class, 'role'])->name('role');
    Route::resource('service', ServicesController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('award', AwardController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::put('approve-testimonial/{id}', [TestimonialController::class, 'approveTestimonial'])->name('approve.testimonial');
    Route::resource('subscriber', SubscriberController::class)->only(['index', 'destroy']);
    Route::resource('blog', BlogController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('event', EventController::class);
    Route::resource('story', StoryController::class);
    Route::resource('team', TeamController::class);
    Route::resource('indomitable-women', IndomitableWomenController::class);
    Route::resource('news', NewsController::class);
    Route::resource('album', AlbumController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('join-team', JoinTeamController::class)->only('index', 'show', 'destroy');
    // Mentors
    Route::resource('mentor-application', MentorApplicationController::class)->only('index', 'show', 'destroy');
    Route::put('approve/mentor/{id}', [MentorApplicationController::class, 'approveMentor'])->name('approve.mentor');
    Route::put('reject/mentor/{id}', [MentorApplicationController::class, 'rejectMentor'])->name('reject.mentor');
    Route::resource('hire-mentor', HireMentorController::class)->only(['index','show','destroy']);
    // Ambassador
    Route::resource('ambassador-application', AmbassadorApplicationController::class)->only('index', 'show', 'destroy');
    Route::put('approve/ambassador/{id}', [AmbassadorApplicationController::class, 'approveAmbassador'])->name('approve.ambassador');
    Route::put('reject/ambassador/{id}', [AmbassadorApplicationController::class, 'rejectAmbassador'])->name('reject.ambassador');
    Route::resource('hire-ambassador', HireAmbassadorController::class)->only(['index','show','destroy']);
    // Product
    Route::resource('product', ProductController::class);
    // Page Builder
    Route::resource('page-builder', PagebuilderController::class);
    // Path Finder
    Route::resource('path-finder', PathFinderController::class)->only(['index', 'destroy']);
    Route::put('approve-question/{id}', [PathFinderController::class, 'approveQuestion'])->name('approve.question');
    Route::put('reject-question/{id}', [PathFinderController::class, 'rejectQuestion'])->name('reject.question');
    // Path Finder Reply
    Route::resource('path-finder-reply', PathFinderReplyController::class)->only(['index', 'store', 'edit', 'destroy']);
    Route::put('approve-reply/{id}', [PathFinderReplyController::class, 'approveReply'])->name('approve.reply');
    Route::put('reject-reply/{id}', [PathFinderReplyController::class, 'rejectReply'])->name('reject.reply');
    
    
    // Mark As Read Notification
    Route::get('markAsRead', [AdminDashboardController::class, 'markAsRead'])->name('mark');
});

// Setting Routes
Route::group(['as' => 'admin.setting.', 'prefix' => 'admin/setting'], function(){
    Route::get('generel', [SettingController::class, 'generel'])->name('generel');
    Route::put('generel-update', [SettingController::class, 'generelUpdate'])->name('generel.update');
    Route::put('appearance-update', [SettingController::class, 'appearanceUpdate'])->name('appearance.update');
    Route::put('mail-update', [SettingController::class, 'mailUpdate'])->name('mail.update');
});

