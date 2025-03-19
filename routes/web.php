<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\WebController;
use App\Http\Controllers\Frontend\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Login Routes
Auth::routes();
// Include Admin Route
@include('admin.php');
// Include Students Route
@include('students.php');

// Login Socialite
Route::group(['as' => 'login.', 'prefix' => 'login', 'namespace' => 'Auth'], function () {
    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('provider');
    Route::get('/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('callback');
});

// Show All View Page
Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('team', [WebController::class, 'team'])->name('team');
Route::get('gallery', [WebController::class, 'gallery'])->name('gallery');
Route::get('album/{id}', [WebController::class, 'album'])->name('album');
// Event
Route::get('/events', [WebController::class, 'events'])->name('events');
Route::get('/event-details/{id}', [WebController::class, 'eventDetails'])->name('event.details');
// Blog
Route::get('blogs', [WebController::class, 'blogs'])->name('blogs');
Route::get('blog-details/{id}', [WebController::class, 'blogDetails'])->name('blog.details');
// News
Route::get('news', [WebController::class, 'news'])->name('news');
Route::get('news-details/{id}', [WebController::class, 'newsDetails'])->name('news.details');
// Story
Route::get('stories', [WebController::class, 'stories'])->name('stories');
Route::get('story-details/{id}', [WebController::class, 'storyDetails'])->name('story.details');
// Video
Route::get('videos', [WebController::class, 'videos'])->name('videos');
// Product
Route::get('products', [WebController::class, 'products'])->name('products');
Route::get('product/details/{id}', [WebController::class, 'productDetails'])->name('product.details');
// Projects
Route::get('projects', [WebController::class, 'projects'])->name('projects');
Route::get('project-details/{id}', [WebController::class, 'projectDetails'])->name('project.details');
// Partners
Route::get('partners', [WebController::class, 'partners'])->name('partners');
// Awards
Route::get('awards', [WebController::class, 'awards'])->name('awards');
// Indomitable Womens
Route::get('indomitable-womens', [WebController::class, 'indomitableWomen'])->name('indomitable-womens');
Route::get('vision2027', [WebController::class, 'vision'])->name('vision');
Route::get('indomitable-women-details/{id}', [WebController::class, 'indomitableWomenDetails'])->name('indomitable-women.details');
// About-Us
Route::get('about-us', [WebController::class, 'aboutUs'])->name('about.us');
// Mission
Route::get('mission', [WebController::class, 'mission'])->name('mission');
// Contact
Route::get('contact', [WebController::class, 'contact'])->name('contact');
Route::post('contact-send', [WebController::class, 'contactSend'])->name('contact.send');
// Join Team
Route::get('join-the-team', [WebController::class, 'joinTheTeam'])->name('join.the.team');
Route::post('join-the-team/store', [WebController::class, 'joinTheTeamStore'])->name('join.the.team.store');
// Testimonial
Route::get('leave-testimonial', [WebController::class, 'leaveTestimonial'])->name('leave.testimonial');
Route::post('testimonial-store', [WebController::class, 'testimonialStore'])->name('testimonial.store');
// Mentor Shop Application
Route::get('mentorship-application', [WebController::class, 'mentorshipApplication'])->name('mentorship.application');
Route::post('mentor-store', [WebController::class, 'mentorStore'])->name('mentor.store');
Route::get('mentor-program', [WebController::class, 'mentorProgram'])->name('mentor.program');
Route::get('mentor-details/{id}', [WebController::class, 'mentorDetails'])->name('mentor.details');
Route::post('hire-mentor', [WebController::class, 'hireMentor'])->name('hire.mentor');
// Ambassador
Route::get('become-a-ambassador', [WebController::class, 'becomeAmbassador'])->name('become.a.ambassador');
Route::post('ambassador-store', [WebController::class, 'ambassadorStore'])->name('ambassador.store');
Route::get('ambassadors', [WebController::class, 'ambassadors'])->name('ambassadors');
Route::get('ambassador-details/{id}', [WebController::class, 'ambassadorDetails'])->name('ambassador.details');
Route::post('hire-ambassador', [WebController::class, 'hireAmbassador'])->name('hire.ambassador');
// Subscribe
Route::post('subscribe', [WebController::class, 'subscribe'])->name('subscribe');
// Policy
Route::get('policy', [WebController::class, 'policy'])->name('policy');

// Page Builder
Route::get('page/{slug}', [WebController::class, 'pageBuilder']);

// Path Finder
Route::get('path-finder', [WebController::class, 'pathFinder'])->name('path.finder');
Route::post('path-finder-question-store', [WebController::class, 'pathFinderQuestionStore'])->name('path.finder.question.store');
Route::get('path-finder-question/{id}', [WebController::class, 'pathFinderQuestion'])->name('path.finder.question');
Route::post('path-finder-reply-store', [WebController::class, 'pathFinderReplyStore'])->name('path.finder.reply.store');
// Search Question
Route::get('search-question',[SearchController::class,'searchQuestion'])->name('search.question');

// Optimize The Site
Route::get('optimize', [WebController::class, 'optimize'])->name('optimize');



