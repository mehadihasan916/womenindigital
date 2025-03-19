<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MentorApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MentorApprovedNotification;

class MentorApplicationController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mentors'] = MentorApplication::latest('id')->get();
        return view('admin.mentor-application.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find Mentor Id For Show
        $mentor = MentorApplication::findOrFail($id);
        return view('admin.mentor-application.show-mentor', compact('mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Approve the Testimonail .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approveMentor($id)
    {
        // Find Mentor Application for approve
        $mentor = MentorApplication::findOrFail($id);
        if ($mentor->status == false)
        {
            $mentor->status = true;
            $mentor->save();
            // Notification to Mentor, after approved mentor request
            // Notification::route('mail', $mentor->email)
            // ->notify(new MentorApprovedNotification($mentor));
            notify()->success('Mentor Approved.', 'Approved');
            return redirect()->route('admin.mentor-application.index');
        } else {
            notify()->info('Approved', 'Mentor Already Approved');
        }
        return redirect()->back();
    }

    /**
     * Approve the Testimonail .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejectMentor($id)
    {
        // Find Mentor id , for reject
        $mentor = MentorApplication::findOrFail($id);
        if ($mentor->status == true)
        {
            $mentor->status = false;
            $mentor->save();
            notify()->success('Reject', 'Mentor Rejected Successful');
            return redirect()->route('admin.mentor-application.index');
        } else {
            notify()->info('Reject', 'Mentor Already Rejected');
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Mentor application  ID
        $mentor = MentorApplication::findOrFail($id);
        // Existing mentor thumbnail
        $mentor_path = public_path('uploads/mentor-application/' . $mentor->cv);
        // Delete mentor cv, if the cv has
        if (File::exists($mentor_path)) {
            File::delete($mentor_path);
        }
        $mentor->delete();
        notify()->success('Deleted', 'Mentor Successfully Deleted');
        return redirect()->route('admin.mentor-application.index');
    }
}
