<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambassador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AmbassadorApprovedNotification;

class AmbassadorApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ambassadors'] = Ambassador::latest('id')->get();
        return view('admin.ambassador-application.index', $data);
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
        // Find Ambassador ID
        $ambassador = Ambassador::findOrFail($id);
        return view('admin.ambassador-application.show-ambassador', compact('ambassador'));
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
     * Approve the Ambassador .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approveAmbassador($id)
    {
        // Find Ambassador ID
        $ambassador = Ambassador::findOrFail($id);
        if ($ambassador->status == false)
        {
            // Approve ambassador
            $ambassador->status = true;
            $ambassador->save();
            // Notify To Ambassador after approved ambassador request
            // Notification::route('mail', $ambassador->email)
            // ->notify(new AmbassadorApprovedNotification($ambassador));
            notify()->success('Approved', 'Ambassador Approved');
            return redirect()->route('admin.ambassador-application.index');
        } else {
            notify()->info('Approved', 'Ambassador Already Approved');
        }
        return redirect()->back();
    }
    /**
     * Approve the Testimonail .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejectAmbassador($id)
    {
        // Find Ambassador ID
        $ambassador = Ambassador::findOrFail($id);
        if ($ambassador->status == true)
        {
            // Reject ambassador
            $ambassador->status = false;
            $ambassador->save();
            notify()->success('Reject', 'Ambassador Rejected Successful');
            return redirect()->route('admin.ambassador-application.index');
        } else {
            notify()->info('Reject','Ambassador Already Rejected');
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
        // Find Ambassador ID
        $ambassador = Ambassador::findOrFail($id);
        // Existing Ambassador CV Path 
        $ambassador_path = public_path('uploads/ambassadors/' . $ambassador->cv);
        // Delete ambassador cv, if the cv has
        if (File::exists($ambassador_path)) {
            File::delete($ambassador_path);
        }
        $ambassador->delete();
        notify()->success('Deleted', 'Ambassador Successfully Deleted');
        return redirect()->route('admin.ambassador-application.index');
    }
}
