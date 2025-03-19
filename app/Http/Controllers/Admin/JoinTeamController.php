<?php

namespace App\Http\Controllers\Admin;

use App\Models\JoinTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\File;

class JoinTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['join_teams'] = JoinTeam::latest('id')->get();
        return view('admin.join-the-team.index', $data);
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
        // Find Join team ID for show
        $join_team = JoinTeam::findOrFail($id);
        return view('admin.join-the-team.show-team', compact('join_team'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Team Member ID
        $join_team = JoinTeam::findOrFail($id);
        // Existing team member CV path
        $join_team_path = public_path('uploads/join-teams-cv/' . $join_team->cv);
        // Delete cv, if the cv has
        if (File::exists($join_team_path)) {
            File::delete($join_team_path);
        }
        $join_team->delete();
        notify()->success('Deleted', 'Team Successfully Deleted');
        return redirect()->route('admin.join-team.index');
    }
}
