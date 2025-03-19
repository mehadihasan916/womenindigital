<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teams'] = Team::orderBy('position')->get();
        return view('admin.teams.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Check
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'designation' => 'string|max:191',
            'thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
        // Get Team Member Avater
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Team Member Object Create
        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->thumbnail = $fileName;

        // Position Portion Store
        if(is_null($request->position)){
            // If request value is null, then max position + 1 
            $position = Team::max('position') + 1;
            $team->position =  $position;
        }else{
            $team->position = $request->position;
            // Get the lower position from the request value
            $lowerPositions = Team::where('position', '>=', $request->position)->get();
            // Loop for position increment
            foreach($lowerPositions as $lowerPosition){
                $lowerPosition->update([
                    'position' => $lowerPosition->position + 1,
                ]);
            }
        }
        $team->status = $request->filled('status');
        $file->move('uploads/teams/', $fileName);
        $team->save();
        notify()->success('Success','Team Successfully Created');
        return redirect()->route('admin.team.index');
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
        // Find Team member ID
        $data['team'] = Team::findOrFail($id);
        return view('admin.teams.create-and-edit',$data);
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
        // Find Team Member Id
        $team = Team::findOrFail($id);
        
        // Team Member Avater Update
        if ($request->hasfile('thumbnail')) {
            // Existing Team thumbnail path
            $team_path = public_path('uploads/teams/' . $team->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($team_path)) {
                File::delete($team_path);
            }
            // New Team thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/teams/', $fileName);
        } else {
            // Old Team thumbnail store
            $fileName = $team->thumbnail;
        }

        // Position Update Portion
        if(is_null($request->position)){
            // Get max position
            $maxPosition = Team::max('position');
            if($team->position == $maxPosition){
                // Position update
                $team->update([
                    'position' => $maxPosition,
                ]);
            }else{
                // Get lower to max position, between existing position to max position
                $lowerToMaxPositions = Team::whereBetween('position', [$team->position, $maxPosition])->get();
                // Loop for Decrement position
                foreach($lowerToMaxPositions as $lowerToMaxPosition){
                    $lowerToMaxPosition->update([
                        'position' => $lowerToMaxPosition->position - 1,
                    ]);
                }
                // Existing position update
                $team->update([
                    'position' => $maxPosition,
                ]);
            }
        }elseif($team->position == $request->position){
            // if existing position == $request position, then request position save
            $team->update([
                'position' => $request->position,
            ]);
        }elseif($request->position >= $team->position){
            // Get lower to max position, between existing position to max position
            $lowerToMaxPositions = Team::whereBetween('position', [$team->position, $request->position])->get();
            // Loop for Decrement position
            foreach($lowerToMaxPositions as $lowerToMaxPosition){
                $lowerToMaxPosition->update([
                    'position' => $lowerToMaxPosition->position - 1,
                ]);
            }
            // Update new request position
            $team->update([
                'position' => $request->position,
            ]);
        }else{
            $request->position <= $team->position;
            // Max to lower position, between existing position to max position
            $maxToLowerPositions = Team::whereBetween('position', [$request->position, $team->position])->get();
            // Loop for Increment position
            foreach($maxToLowerPositions as $maxToLowerPosition){
                $maxToLowerPosition->update([
                    'position' => $maxToLowerPosition->position + 1,
                ]);
            }
            // Update new request position
            $team->update([
                'position' => $request->position,
            ]);
        }

        // Update Team Member
        $team->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Team Successfully Updated');
        return redirect()->route('admin.team.index');
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
        $team = Team::findOrFail($id);
        // Existing Team thumbnail path
        $team_path = public_path('uploads/teams/' . $team->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($team_path)) {
            File::delete($team_path);
        }
        // Max position get
        $maxPositions = Team::where('position', '>', $team->position)->get();
        // Loop for Position Delete OR Decrease
        foreach($maxPositions as $maxPosition){
            $maxPosition->update([
                'position' => $maxPosition->position - 1,
            ]);
        }
        $team->delete();
        notify()->success('Deleted', 'Team Successfully Deleted');
        return redirect()->route('admin.team.index');
    }
}
