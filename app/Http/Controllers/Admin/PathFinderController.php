<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PathFinder;
use App\Models\PathFinderReply;
use Illuminate\Http\Request;

class PathFinderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['path_finders'] = PathFinder::latest('id')->get();
        return view('admin.pathfinder.index', $data);
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
     * Approve the Path Finder .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approveQuestion($id)
    {
        // Find Path Finder ID for approve
        $path_finder = PathFinder::findOrFail($id);
        if ($path_finder->is_publish == false)
        {
            $path_finder->is_publish = true;
            $path_finder->save();
            notify()->success('Path Finder Approved.', 'Approved');
            return redirect()->route('admin.path-finder.index');
        } else {
            notify()->info('Approved', 'Path Finder Approved');
        }
        return redirect()->back();
    }

    /**
     * Approve the Path Finder .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejectQuestion($id)
    {
        // Find Path Finder ID for Reject
        $path_finder = PathFinder::findOrFail($id);
        if ($path_finder->is_publish == true)
        {
            $path_finder->is_publish = false;
            $path_finder->save();
            notify()->success('Path Finder Reject.', 'Reject');
            return redirect()->route('admin.path-finder.index');
        } else {
            notify()->info('Reject', 'Path Finder Reject');
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
        $path_finder = PathFinder::findOrFail($id);
        $path_finder->delete();
        notify()->success('Deleted', 'Path Finder Successfully Deleted');
        return redirect()->route('admin.path-finder.index');
    }
}
