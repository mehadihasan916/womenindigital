<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\News;
use App\Models\Team;
use App\Models\User;
use App\Models\Album;
use App\Models\Award;
use App\Models\Event;
use App\Models\Story;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\JoinTeam;
use App\Models\Ambassador;
use App\Models\HireMentor;
use App\Models\PathFinder;
use App\Models\Subscriber;
use App\Models\Pagebuilder;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\HireAmbassador;
use App\Models\PathFinderReply;
use App\Models\IndomitableWomen;
use App\Models\MentorApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Notifications\JoinTeamNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\HireMentorNotification;
use App\Notifications\PahFinderQuestonSubmit;
use App\Notifications\TestimonialNotification;
use App\Notifications\MentorRequestNotification;
use App\Notifications\HireAmbassadorNotification;
use App\Notifications\AmbassadorRequestNotification;
use Exception;

class WebController extends Controller
{
    // Home/Index Page
    public function index()
    {
        // services
        $data['services'] = Service::where('status', true)->orderBy('position')->get(['title','link','thumbnail'])->take(8);
        // Partners
        $data['partners'] = Partner::where('status', true)->orderBy('position')->get(['thumbnail'])->take(18);
        // Awards
        $data['awards'] = Award::where('status', true)->orderBy('position')->get(['name', 'location', 'thumbnail'])->take(8);
        // Testimonials
        $data['testimonials'] = Testimonial::where('status', true)->latest('id')->get(['name', 'designation', 'comment','thumbnail'])->take(8);
        // Projects
        $data['projects'] = Project::where('status', 1)->latest('id')->get(['id','title','short_description', 'thumbnail'])->take(3);
        // Stories
        $data['stories'] = Story::where('status', 1)->orderBy('position')->get(['id','title','short_description', 'thumbnail'])->take(1);
        // Blogs
        $data['blogs'] = Blog::where('status', 1)->latest('id')->get(['id','title','short_description', 'thumbnail'])->take(1);
        // Events
        $data['events'] = Event::where('status', 1)->latest('id')->get(['id','title','short_description', 'thumbnail'])->take(1);
        // Products
        $data['products'] = Product::where('status', true)->latest()->get(['id', 'name', 'short_description', 'thumbnail']);
        // Path Finder Question
        $data['path_finder_questions'] = PathFinder::where('is_publish', 1)->latest('id')->get()->take(20);
        return view('frontend.index', $data);
    }
    // Gallery
    public function gallery()
    {
        $data['albums'] = Album::where('status', true)->with('galleries')->orderBy('position')->get();
        return view('frontend.gallery', $data);
    }
    // Album
    public function album($id)
    {
        $data['album'] = Album::findOrFail($id);
        return view('frontend.albums', $data);
    }
    // Events
    public function events()
    {
        $data['events'] = Event::where('status', true)->latest('id')->get(['id', 'title', 'short_description', 'date', 'thumbnail']);
        return view('frontend.events', $data);
    }
    // Events Details
    public function eventDetails($id)
    {
        $data['events'] = Event::where('status', true)->latest('id')->take(10)->get(['id', 'title', 'thumbnail']);
        $data['event_item'] = Event::findOrFail($id);
        return view('frontend.event-details', $data);
    }
    // Blog
    public function blogs()
    {
        $data['blogs'] = Blog::where('status', true)->latest('id')->get();
        return view('frontend.blogs', $data);
    }
    // Blog Details
    public function blogDetails($id)
    {
        $data['blogs'] = Blog::where('status', true)->latest('id')->take(10)->get(['id', 'title', 'thumbnail']);
        $data['blog_item'] = Blog::findOrFail($id);
        return view('frontend.blog-details', $data);
    }
    // Products
    public function products()
    {
        $data['products'] = Product::where('status', true)->latest('id')->take(10)->get(['id', 'name', 'short_description', 'thumbnail']);
        return view('frontend.products', $data);
    }
    // Product Details
    public function productDetails($id)
    {
        $data['products'] = Product::where('status', true)->latest('id')->take(10)->get(['id', 'name', 'short_description', 'thumbnail']);
        $data['product'] = Product::findOrFail($id);
        return view('frontend.product-details', $data);
    }
    // News
    public function news()
    {
        $data['newses'] = News::where('status', true)->latest('id')->get();
        return view('frontend.news', $data);
    }
    // News Details
    public function newsDetails($id)
    {
        $data['newses'] = News::where('status', true)->latest('id')->take(10)->get(['id', 'title', 'thumbnail']);
        $data['news_item'] = News::findOrFail($id);
        return view('frontend.news-details', $data);
    }
    // Stories
    public function stories()
    {
        $data['stories'] = Story::where('status', true)->latest('id')->get(['id', 'title', 'short_description', 'thumbnail','created_at']);
        return view('frontend.stories', $data);
    }
    // Story Details
    public function storyDetails($id)
    {
        $data['stories'] = Story::where('status', true)->latest('id')->take(10)->get(['id', 'title', 'thumbnail']);
        $data['story_item'] = Story::findOrFail($id);
        return view('frontend.story-details', $data);
    }
    // Projects
    public function projects()
    {
        $data['projects'] = Project::where('status', true)->latest('id')->get(['id', 'title', 'short_description', 'thumbnail','created_at']);
        return view('frontend.projects', $data);
    }
    // Project Details
    public function projectDetails($id)
    {
        $data['projects'] = Project::where('status', true)->latest('id')->take(10)->get(['id', 'title', 'thumbnail']);
        $data['project_item'] = Project::findOrFail($id);
        return view('frontend.project-details', $data);
    }
    // Partners
    public function partners()
    {
        $data['partners'] = Partner::where('status', true)->orderBy('position')->get(['thumbnail']);
        return view('frontend.partners', $data);
    }
    // Awards
    public function awards()
    {
        $data['awards'] = Award::where('status', true)->latest('id')->get(['name', 'location', 'thumbnail']);
        return view('frontend.awards', $data);
    }
    // Video
    public function videos()
    {
        return view('frontend.videos');
    }
    // Indomitable Women
    public function indomitableWomen()
    {
        $data['indomitableWomens'] = IndomitableWomen::where('status', true)->orderBy('position')->get(['id', 'name', 'designation', 'short_description', 'thumbnail']);
        return view('frontend.indomitable-women-lists', $data);
    }
    // Indomitable Women Details
    public function indomitableWomenDetails($id)
    {
        $data['indomitableWomen'] = IndomitableWomen::findOrFail($id);
        return view('frontend.indomitable-women-details', $data);
    }
    // About Us
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    // Mission
    public function mission()
    {
        return view('frontend.mission');
    }
    // Contact
    public function contact()
    {
        return view('frontend.contact');
    }
    // Join The Team
    public function joinTheTeam()
    {
        return view('frontend.join-the-team');
    }
    // Join The Team Store
    public function joinTheTeamStore(Request $request)
    {
        // Validation Check
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|max:55|email|unique:join_teams,email',
            'phone' => 'required|string|max:20',
            'nid' => 'required|string|max:55',
            'cv' => 'required|mimes:pdf,doc',
            'bio' => 'string|max:500',
        ]);
        // Get CV From Team Member
        if($request->hasfile('cv'))
        {
            $file = $request->file('cv');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
        }
        // Join Team Member Object Create
        $join_team = new JoinTeam();
        $join_team->name = $request->name;
        $join_team->email = $request->email;
        $join_team->phone = $request->phone;
        $join_team->nid = $request->nid;
        $join_team->cv = $fileName;
        $join_team->bio = $request->bio;
        $file->move('uploads/join-teams-cv/', $fileName);
        $join_team->save();
        // Find Admin role id for notify
        // $user = User::where('role_id','1')->get();
        // Notify to admin for Join team request
        // Notification::send($user, new JoinTeamNotification($join_team));
        notify()->success('Success','Your CV Successfully Sumbitted');
        return back();
    }
    // Team
    public function team()
    {
        $data['teams'] = Team::where('status', true)->orderBy('position')->get();
        return view('frontend.team', $data);
    }
    // Become A Ambassador
    public function becomeAmbassador()
    {
        return view('frontend.become-ambassador');
    }
    // Ambassador Store
    public function ambassadorStore(Request $request)
    {
        // Validation Check
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|max:55|email|unique:ambassadors,email',
            'phone' => 'required|string|max:20',
            'nid' => 'string|max:55',
            'thumbnail' => 'required|mimes:jpg,png,jpeg',
            'bio' => 'required|string|max:500',
            'profession' => 'required|string|max:500',
            'institution' => 'required|string|max:500',
            'facebook' => 'required',
            'linkedin' => 'required'
        ]);
        // Get Avater From Ambassador
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
        }
        // Ambassador Application Create
        $ambassador = new Ambassador();
        $ambassador->name = $request->name;
        $ambassador->email = $request->email;
        $ambassador->phone = $request->phone;
        $ambassador->nid = $request->nid;
        $ambassador->thumbnail = $fileName;
        $ambassador->bio = $request->bio;
        $ambassador->profession  = $request->profession ;
        $ambassador->institution  = $request->institution ;
        $ambassador->facebook  = $request->facebook ;
        $ambassador->linkedin  = $request->linkedin ;
        $file->move('uploads/ambassadors/', $fileName);
        $ambassador->save();
        // Find Admin role id for notify
        // $user = User::where('role_id','1')->get();
        // // Notify to admin for ambassador request
        // Notification::send($user, new AmbassadorRequestNotification($ambassador));
        notify()->success('Success','Your Ambassador Request Successfully Sumbitted');
        return back();
    }
    // Ambassador
    public function ambassadors()
    {
        $data['ambassadors'] = Ambassador::where('status', true)->latest('id')->get(['id','name', 'profession', 'thumbnail']);
        return view('frontend.ambassador', $data);
    }
    // Ambassadors Details
    public function ambassadorDetails($id)
    {
        $data['ambassador'] = Ambassador::findOrFail($id);
        return view('frontend.ambassador-details', $data);
    }
    // Hier Ambassador
    public function hireAmbassador(Request $request)
    {
        // Validation check
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|max:55',
            'phone' => 'required|string|max:55',
        ]);
        // Hire Ambassador Object Create
        $hire_ambassador = new HireAmbassador();
        $hire_ambassador->name = $request->name;
        $hire_ambassador->email = $request->email;
        $hire_ambassador->phone = $request->phone;
        $hire_ambassador->ambassador_name = $request->ambassador_name;
        $hire_ambassador->ambassador_email = $request->ambassador_email;
        $hire_ambassador->ambassador_phone = $request->ambassador_phone;
        $hire_ambassador->save();
        // Find Admin role id for notify
        // $user = User::where('role_id','1')->get();
        // Notify to admin for hire ambassador request
        // Notification::send($user, new HireAmbassadorNotification($hire_ambassador));
        notify()->success('Success','Your Ambassador Request Submitted');
        return back();
    }

    // Mentorship Application
    public function mentorshipApplication()
    {
        return view('frontend.mentorship-application');
    }
    // Mentor Store
    public function mentorStore(Request $request)
    {
        // Validation Check
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|max:55|email|unique:mentor_applications,email',
            'phone' => 'required|string|max:20',
            'nid' => 'max:55',
            'thumbnail' => 'required|mimes:jpg,png,jpeg',
            'bio' => 'string',
            'profession' => 'string|max:5000',
        ]);
        // Get Avater From Mentor
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
        }
        // Mentor Application Create
        $mentor = new MentorApplication();
        $mentor->name = $request->name;
        $mentor->email = $request->email;
        $mentor->phone = $request->phone;
        $mentor->nid = $request->nid;
        $mentor->thumbnail = $fileName;
        $mentor->bio = $request->bio;
        $mentor->profession = $request->profession;
        $file->move('uploads/mentor-application/', $fileName);
        $mentor->save();
        // Find Admin role id for notify
        // $user = User::where('role_id','1')->get();
        // Notify to admin for mentor request
        // Notification::send($user, new MentorRequestNotification($mentor));
        notify()->success('Success','Your Mentor Application Successfully Sumbitted');
        return back();
    }
    // Mentor Program
    public function mentorProgram()
    {
        $data['mentors'] = MentorApplication::where('status', true)->get(['id','name', 'profession', 'thumbnail']);
        return view('frontend.mentor-program', $data);
    }
    // Mentor Details
    public function mentorDetails($id)
    {
        $data['mentor'] = MentorApplication::findOrFail($id);
        return view('frontend.mentor-details', $data);
    }
    // Hier Mentor
    public function hireMentor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|max:55',
            'phone' => 'required|string|max:55',
        ]);
        // Hire mentor object create
        $hire_mentor = new HireMentor();
        $hire_mentor->name = $request->name;
        $hire_mentor->email = $request->email;
        $hire_mentor->phone = $request->phone;
        $hire_mentor->mentor_name = $request->mentor_name;
        $hire_mentor->mentor_email = $request->mentor_email;
        $hire_mentor->mentor_phone = $request->mentor_phone;
        $hire_mentor->save();
        // Find Admin role id for notify
        // $user = User::where('role_id','1')->get();
        // Notify to admin for hire mentor request
        // Notification::send($user, new HireMentorNotification($hire_mentor));
        notify()->success('Success','Your Request Submitted');
        return back();
    }

    // Leave A Testimonial
    public function leaveTestimonial()
    {
        return view('frontend.leave-testimonial');
    }
    // Testimonial Store
    public function testimonialStore(Request $request)
    {
        // Validation
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'designation' => 'required|string|max:191',
            'email' => 'string|max:55',
            'comment' => 'required|string|max:450',
            'thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
        // Testimonial thumbnail store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
        }
        // Testimonial object create
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->email = $request->email;
        $testimonial->comment = $request->comment;
        $testimonial->thumbnail = $fileName;
        $file->move('uploads/testimonials/', $fileName);
        $testimonial->save();
        // Find Admin role id for notify
        // $user = User::where('role_id','1')->get();
        // Notify to admin for testimonial approve request
        // Notification::send($user, new TestimonialNotification($testimonial));
        notify()->success('Success','Subscribe Successfully Created');
        return back();
    }

    // Policy
    public function policy()
    {
        return view('frontend.policy');
    }
    // Subscribe
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|max:255|unique:subscribers,email',
        ]);
        Subscriber::create([
            'email' => $request->email,
        ]);
        notify()->success('Success','Subscribe Successfully Created');
        return back();
    }
    // Page Builder
    public function pageBuilder($slug)
    {
        $page_builder = Pagebuilder::where('slug',$slug)->first();
        return view('frontend.page-builder', compact('page_builder'));
    }

    // Path Finder Question Store
    public function pathFinderQuestionStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|max:55',
            'question' => 'required|string|max:255',
        ]);

        $path_finder_question = new PathFinder();
        $path_finder_question->email = $request->email;
        $path_finder_question->question = $request->question;
        $path_finder_question->save();
        // Find Admin role id for notify
        // $user = User::where('role_id','1')->get();
        // Notify to admin for Path Finder Question approve request
        // Notification::send($user, new PahFinderQuestonSubmit($path_finder_question));
        notify()->success('Success','Your Question Successfully Submitted');
        return back();
    }

    // Fidn Path Finder ID To Reply
    public function pathFinderQuestion($id)
    {
        $path_finder_question = PathFinder::findOrFail($id);
        $path_finder_reply = PathFinder::find($id)->pathFinderReply()->where('is_publish', 1)->get();
        return view('frontend.path-finder-reply', compact('path_finder_question', 'path_finder_reply'));
    }

    // Path Finder Reply Store
    public function pathFinderReplyStore(Request $request)
    {
        $this->validate($request, [
            'path_finder_id' => 'required',
            'email' => 'required|string|max:55',
            'reply' => 'required|string|max:500',
        ]);
        PathFinderReply::create([
            'path_finder_id' => $request->path_finder_id,
            'email' => $request->email,
            'reply' => $request->reply,
        ]);
        notify()->success('Success','Your Reply Sumbitted');
        return redirect()->back();
    }
    // Path Finder 
    public function pathFinder()
    {
        $data['path_finder'] = PathFinder::where('is_publish',1)->latest()->get();
        return view('frontend.pathfinder', $data);
    }
    // Optimize Site
    public function optimize()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return ('Cache Is Cleaned');
    }




   public function vision(){
       return view('frontend.vision');
   }

}
