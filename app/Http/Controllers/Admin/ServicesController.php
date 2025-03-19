<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use League\OAuth1\Client\Server\Server;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['services'] = Service::orderBy('position')->get();
        return view('admin.services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create-and-edit');
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
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
        // Get Service Avater for store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Service Object Create
        $service = new Service();
        $service->title = $request->title;
        $service->link = $request->link;
        $service->thumbnail = $fileName;

        // Position Portion Store
        if(is_null($request->position)){
            // If request value is null, then max position + 1 
            $position = Service::max('position') + 1;
            $service->position =  $position;
        }else{
            $service->position = $request->position;
            // Get the lower position from the request value
            $lowerPositions = Service::where('position', '>=', $request->position)->get();
            // Loop for position increment
            foreach($lowerPositions as $lowerPosition){
                $lowerPosition->update([
                    'position' => $lowerPosition->position + 1,
                ]);
            }
        }
        $service->status = $request->filled('status');
        $service->save();
        $file->move('uploads/services/', $fileName);
        notify()->success('Success','Service Successfully Created');
        return redirect()->route('admin.service.index');
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
        // Find Service ID
        $data['service'] = Service::findOrFail($id);
        return view('admin.services.create-and-edit',$data);
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
        // Find Service Member Id
        $service = Service::findOrFail($id);

        // Service thumbnail Update
        if ($request->hasfile('thumbnail')) {
            // Existing Service thumbnail path
            $service_path = public_path('uploads/services/' . $service->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($service_path)) {
                File::delete($service_path);
            }
            // New Service thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/service/', $fileName);
        } else {
            // Old Service thumbnail store
            $fileName = $service->thumbnail;
        }
        
        // Position Update Portion
        if(is_null($request->position)){
            // Get max position
            $maxPosition = Service::max('position');
            if($service->position == $maxPosition){
                // Position update
                $service->update([
                    'position' => $maxPosition,
                ]);
            }else{
                // Get lower to max position, between existing position to max position
                $lowerToMaxPositions = Service::whereBetween('position', [$service->position, $maxPosition])->get();
                // Loop for Decrement position
                foreach($lowerToMaxPositions as $lowerToMaxPosition){
                    $lowerToMaxPosition->update([
                        'position' => $lowerToMaxPosition->position - 1,
                    ]);
                }
                // Existing position update
                $service->update([
                    'position' => $maxPosition,
                ]);
            }
        }elseif($service->position == $request->position){
            // if existing position == $request position, then request position save
            $service->update([
                'position' => $request->position,
            ]);
        }elseif($request->position >= $service->position){
            // Get lower to max position, between existing position to max position
            $lowerToMaxPositions = Service::whereBetween('position', [$service->position, $request->position])->get();
            // Loop for Decrement position
            foreach($lowerToMaxPositions as $lowerToMaxPosition){
                $lowerToMaxPosition->update([
                    'position' => $lowerToMaxPosition->position - 1,
                ]);
            }
            // Update new request position
            $service->update([
                'position' => $request->position,
            ]);
        }else{
            $request->position <= $service->position;
            // Max to lower position, between existing position to max position
            $maxToLowerPositions = Service::whereBetween('position', [$request->position, $service->position])->get();
            // Loop for Increment position
            foreach($maxToLowerPositions as $maxToLowerPosition){
                $maxToLowerPosition->update([
                    'position' => $maxToLowerPosition->position + 1,
                ]);
            }
            // Loop for Increment position
            $service->update([
                'position' => $request->position,
            ]);
        }
        // Update Service
        $service->update([
            'title' => $request->title,
            'link' => $request->link,
            'thumbnail' => $fileName,
            'status' => $request->filled('status')
        ]);
        notify()->success('Updated','Service Successfully Updated');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Service Id
        $service = Service::findOrFail($id);
        // Existing Service thumbnail path
        $service_path = public_path('uploads/services/' . $service->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($service_path)) {
            File::delete($service_path);
        }
        // Max position get
        $maxPositions = Service::where('position', '>', $service->position)->get();
        // Loop for Position Delete OR Decrease
        foreach($maxPositions as $maxPosition){
            $maxPosition->update([
                'position' => $maxPosition->position - 1,
            ]);
        }
        $service->delete(); 
        notify()->success('Deleted', 'Service Successfully Deleted');
        return redirect()->route('admin.service.index');
    }
}
