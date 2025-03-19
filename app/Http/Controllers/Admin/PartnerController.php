<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['partners'] = Partner::orderBy('position')->get();
        return view('admin.partners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create-and-edit');
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
            'thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
        // Get Partner thumbnail for store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Partner object create
        $partner = new Partner();
        $partner->thumbnail = $fileName;

        // Position  Store Portion
        if(is_null($request->position)){
            // If request value is null, then max position + 1 
            $position = Partner::max('position') + 1;
            $partner->position =  $position;
        }else{
            $partner->position = $request->position;
            // Get the lower position from the request value
            $lowerPositions = Partner::where('position', '>=', $request->position)->get();
            // Loop for position increment
            foreach($lowerPositions as $lowerPosition){
                $lowerPosition->update([
                    'position' => $lowerPosition->position + 1,
                ]);
            }
        }
        $partner->status = $request->filled('status');
        $file->move('uploads/partners/', $fileName);
        $partner->save();
        notify()->success('Success','Partner Successfully Created');
        return redirect()->route('admin.partner.index');
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
        // Find Partner Id
        $data['partner'] = Partner::findOrFail($id);
        return view('admin.partners.create-and-edit',$data);
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
        // Find Partner Id
        $partner = Partner::findOrFail($id);
        // Partner Avater Update
        if ($request->hasfile('thumbnail')) {
            // Existing partner thumbnail path
            $partner_path = public_path('uploads/partners/' . $partner->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($partner_path)) {
                File::delete($partner_path);
            }
            // New partner thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/partners/', $fileName);
        } else {
            // Old partner thumbnail store
            $fileName = $partner->thumbnail;
        }

        // Position Update Portion
        if(is_null($request->position)){
            // Get max position
            $maxPosition = Partner::max('position');
            if($partner->position == $maxPosition){
                // Position update
                $partner->update([
                    'position' => $maxPosition,
                ]);
            }else{
                // Get lower to max position, between existing position to max position
                $lowerToMaxPositions = Partner::whereBetween('position', [$partner->position, $maxPosition])->get();
                // Loop for Decrement position
                foreach($lowerToMaxPositions as $lowerToMaxPosition){
                    $lowerToMaxPosition->update([
                        'position' => $lowerToMaxPosition->position - 1,
                    ]);
                }
                // Existing position update
                $partner->update([
                    'position' => $maxPosition,
                ]);
            }
        }elseif($partner->position == $request->position){
            // if existing position == $request position, then request position save
            $partner->update([
                'position' => $request->position,
            ]);
        }elseif($request->position >= $partner->position){
            // Get lower to max position, between existing position to max position
            $lowerToMaxPositions = Partner::whereBetween('position', [$partner->position, $request->position])->get();
            // Loop for Decrement position
            foreach($lowerToMaxPositions as $lowerToMaxPosition){
                $lowerToMaxPosition->update([
                    'position' => $lowerToMaxPosition->position - 1,
                ]);
            }
            // Update new request position
            $partner->update([
                'position' => $request->position,
            ]);
        }else{
            // Max to lower position, between existing position to max position
            $request->position <= $partner->position;
            $maxToLowerPositions = Partner::whereBetween('position', [$request->position, $partner->position])->get();
            // Loop for Increment position
            foreach($maxToLowerPositions as $maxToLowerPosition){
                $maxToLowerPosition->update([
                    'position' => $maxToLowerPosition->position + 1,
                ]);
            }
            // Update new request position
            $partner->update([
                'position' => $request->position,
            ]);
        }
        // Partner Update
        $partner->update([
            'thumbnail' => $fileName,
            'status' => $request->filled('status')
        ]);
        notify()->success('Updated', 'Partner Successfully Updated');
        return redirect()->route('admin.partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Partner ID
        $partner = Partner::findOrFail($id);
        // Existing partner thumbnail path
        $partner_path = public_path('uploads/partners/' . $partner->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($partner_path)) {
            File::delete($partner_path);
        }
        // Max position get
        $maxPositions = Partner::where('position', '>', $partner->position)->get();
        // Loop for Position Delete OR Decrease
        foreach($maxPositions as $maxPosition){
            $maxPosition->update([
                'position' => $maxPosition->position - 1,
            ]);
        }
        $partner->delete(); 
        notify()->success('Deleted', 'Partner Successfully Deleted', );
        return redirect()->route('admin.partner.index');
    }
}
