<?php

namespace App\Http\Controllers\Admin;

use App\Models\PathFinder;
use Illuminate\Http\Request;
use App\Models\PathFinderReply;
use App\Http\Controllers\Controller;

class PathFinderReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['path_finder_replies'] = PathFinderReply::latest('id')->get();
        return view('admin.pathfinder-reply.index', $data);
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
        $this->validate($request, [
            'path_finder_id' => 'required',
            'email' => 'required|string|max:55',
            'reply' => 'required|string|max:500',
        ]);
        PathFinderReply::create([
            'path_finder_id' => $request->path_finder_id,
            'email' => $request->email,
            'reply' => $request->reply,
            'is_publish' => $request->is_publish,
        ]);
        notify()->success('Success','Your Reply Sumbitted');
        return redirect()->route('admin.path-finder-reply.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $path_finder_question = PathFinder::findOrFail($id);
        $path_finder_reply = PathFinder::find($id)->pathFinderReply()->get();
        return view('admin.pathfinder-reply.create-and-edit', compact('path_finder_question', 'path_finder_reply'));
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
     * Approve the Path Finder Reply.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approveReply($id)
    {
        // Find Path Finder Reply ID for approve
        $path_finder_reply = PathFinderReply::findOrFail($id);
        if ($path_finder_reply->is_publish == false)
        {
            $path_finder_reply->is_publish = true;
            $path_finder_reply->save();
            notify()->success('Approved', 'Path Finder Reply Approved');
            return redirect()->route('admin.path-finder-reply.index');
        } else {
            notify()->info('Approved', 'Path Finder Reply Approved');
        }
        return redirect()->back();
    }

    /**
     * Approve the Path Finder .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejectReply($id)
    {
        // Find Path Finder Reply ID for Reject
        $path_finder_reply = PathFinderReply::findOrFail($id);
        if ($path_finder_reply->is_publish == true)
        {
            $path_finder_reply->is_publish = false;
            $path_finder_reply->save();
            notify()->success('Reject', 'Path Finder Reply Reject');
            return redirect()->route('admin.path-finder-reply.index');
        } else {
            notify()->info('Reject', 'Path Finder Reply Reject');
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
        // Find path finder Id
        $path_finder_reply = PathFinderReply::findOrFail($id);
        $path_finder_reply->delete();
        notify()->success('Deleted', 'Path Finder Answer Successfully Deleted');
        return redirect()->route('admin.path-finder.index');
    }
}
