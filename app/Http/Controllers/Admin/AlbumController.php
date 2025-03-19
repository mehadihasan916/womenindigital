<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['albums'] = Album::orderBy('position')->get();
        return view('admin.albums.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.albums.create-and-edit');
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
            'title' => 'required|string|max:100',
        ]);

        // Album Object Create
        $album = new Album();
        $album->title = $request->title;

        // Position Store Portion
        if(is_null($request->position)){
            // If request value is null, then max position + 1
            $position = Album::max('position') + 1;
            $album->position =  $position;
        }else{
            $album->position = $request->position;
            // Get the lower position from the request value
            $lowerPositions = Album::where('position', '>=', $request->position)->get();
            // Loop for position increment
            foreach($lowerPositions as $lowerPosition){
                $lowerPosition->update([
                    'position' => $lowerPosition->position + 1,
                ]);
            }
        }
        $album->status = $request->filled('status');
        $album->save();
        notify()->success('Success','Album Successfully Created');
        return redirect()->route('admin.album.index');
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
        // Find album Id
        $data['album'] = Album::findOrFail($id);
        return view('admin.albums.create-and-edit',$data);
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
        // Find Album Id
        $album = Album::findOrFail($id);

        // Position Update Portion
        if(is_null($request->position)){
            // Get max position
            $maxPosition = Album::max('position');
            if($album->position == $maxPosition){
                // Position update
                $album->update([
                    'position' => $maxPosition,
                ]);
            }else{
                // Get lower to max position, between existing position to max position
                $lowerToMaxPositions = Album::whereBetween('position', [$album->position, $maxPosition])->get();
                // Loop for Decrement position
                foreach($lowerToMaxPositions as $lowerToMaxPosition){
                    $lowerToMaxPosition->update([
                        'position' => $lowerToMaxPosition->position - 1,
                    ]);
                }
                // Existing position update
                $album->update([
                    'position' => $maxPosition,
                ]);
            }
        }elseif($album->position == $request->position){
            // if existing position == $request position, then request position save
            $album->update([
                'position' => $request->position,
            ]);
        }elseif($request->position >= $album->position){
            // Get lower to max position, between existing position to max position
            $lowerToMaxPositions = Album::whereBetween('position', [$album->position, $request->position])->get();
            // Loop for Decrement position
            foreach($lowerToMaxPositions as $lowerToMaxPosition){
                $lowerToMaxPosition->update([
                    'position' => $lowerToMaxPosition->position - 1,
                ]);
            }
            // Update new request position
            $album->update([
                'position' => $request->position,
            ]);
        }else{
            $request->position <= $album->position;
            // Max to lower position, between existing position to max position
            $maxToLowerPositions = Album::whereBetween('position', [$request->position, $album->position])->get();
            // Loop for Increment position
            foreach($maxToLowerPositions as $maxToLowerPosition){
                $maxToLowerPosition->update([
                    'position' => $maxToLowerPosition->position + 1,
                ]);
            }
            // Update new request position
            $album->update([
                'position' => $request->position,
            ]);
        }
        // Update Album
        $album->update([
            'title' => $request->title,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Album Successfully Updated');
        return redirect()->route('admin.album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Album ID
        $album = Album::findOrFail($id);
        // Loop for Gallery Image Delte
        foreach($album->galleries as $gallery){
            // Existing gallery image path
            $gallery_path = public_path('uploads/galleries/' . $gallery->thumbnail);
            // Gallery image delete, if the imgage has
            if (File::exists($gallery_path)) {
                File::delete($gallery_path);
            }
        }
        // Max position get
        $maxPositions = Album::where('position', '>', $album->position)->get();
        // Loop for Position Delete OR Decrease
        foreach($maxPositions as $maxPosition){
            $maxPosition->update([
                'position' => $maxPosition->position - 1,
            ]);
        }
        $album->delete();
        notify()->success('Deleted', 'Album Successfully Deleted');
        return redirect()->route('admin.album.index');
    }
}
