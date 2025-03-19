<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Album;
use App\Models\Award;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\IndomitableWomen;
use App\Models\News;
use App\Models\Product;
use App\Models\Project;
use App\Models\Story;
use App\Models\Subscriber;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pagebuilder;
use App\Models\PathFinder;
use App\Models\PathFinderReply;

class AdminDashboardController extends Controller
{
    // Show Information in dashboard with count
    public function dashboard()
    {
        // User count for view to dashboard
        $data['users'] = User::count();
        // Services count for view to dashboard
        $data['services'] = Service::count();
        // Partners count for view to dashboard
        $data['partners'] = Partner::count();
        // Awards count for view to dashboard
        $data['awards'] = Award::count();
        // Testimonials count for view to dashboard
        $data['testimonials'] = Testimonial::count();
        // Subscribers count for view to dashboard
        $data['subscribers'] = Subscriber::count();
        // Projects count for view to dashboard
        $data['projects'] = Project::count();
        // Blogs count for view to dashboard
        $data['blogs'] = Blog::count();
        // Events count for view to dashboard
        $data['events'] = Event::count();
        // News count for view to dashboard
        $data['news'] = News::count();
        // Stories count for view to dashboard
        $data['stories'] = Story::count();
        // Teams count for view to dashboard
        $data['teams'] = Team::count();
        // Indomitable Women count for view to dashboard
        $data['indomitable_women'] = IndomitableWomen::count();
        // Albums count for view to dashboard
        $data['albums'] = Album::count();
        // Galleries count for view to dashboard
        $data['galleries'] = Gallery::count();
        // Products count for view to dashboard
        $data['products'] = Product::count();
        // Page Builder count for view to dashboard
        $data['page'] = Pagebuilder::count();
        // Path Finder count for view to dashboard
        $data['path_finder'] = PathFinder::count();
        // Path Finder Reply count for view to dashboard
        $data['path_finder_reply'] = PathFinderReply::count();
        return view('admin.dashboard', $data);
    }
    
    // All Users
    public function user()
    {
        $data = [];
        $data['users']=User::latest()->get();
        return view('admin.user.index', $data);
    }
    // For create new user
    public function createUser()
    {
        return view('admin.user.create-and-edit');
    }
    // All Role
    public function role()
    {
        return view('admin.roles.index');
    }
    // Create new role
    public function roleCreate()
    {
        return view('admin.roles.create-and-edit');
    }
    // Read Notificaton 
    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
