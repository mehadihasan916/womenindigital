<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = Event::latest('id')->get();
        return view('admin.events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create-and-edit');
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
            'short_description' => 'required|string|max:300',
            'link' => 'nullable|max:255',
            'date' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
        // Get Body Data
        $content = $request->body;
        // Disable libxml errors and allow user to fetch error information
        libxml_use_internal_errors(true);
        // Body content object create
        $dom = new \DomDocument();
        // Load HTML from a string
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $content); //Language Support for Bangla
        // Get image name from summer note editor
        $imageFile = $dom->getElementsByTagName('imageFile');
        // Fetch Images And Store
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();


        // Get Event Thumbnail for store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Event Store
        Event::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'link' => $request->link,
            'date' => $request->date,
            'body' => $request->body,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        $file->move('uploads/events/', $fileName);
        notify()->success('Success','Event Successfully Created');
        return redirect()->route('admin.event.index');
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
        // Find Event ID
        $data['event'] = Event::findOrFail($id);
        return view('admin.events.create-and-edit',$data);
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
        // Find Event ID
        $event = Event::findOrFail($id);

        // Event Thumbnail Update
        if ($request->hasfile('thumbnail')) {
            // Existing event thumbnail path
            $event_path = public_path('uploads/events/' . $event->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($event_path)) {
                File::delete($event_path);
            }
            // New event thumbnail store
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/events/', $fileName);
        } else {
            // Old event thumbnail store
            $fileName = $event->thumbnail;
        }
        // Event Update
        $event->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'link' => $request->link,
            'date' => $request->date,
            'body' => $request->body,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Event Successfully Updated');
        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Event ID
        $event = Event::findOrFail($id);
        // Existing event thumbnail path
        $event_path = public_path('uploads/events/' . $event->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($event_path)) {
            File::delete($event_path);
        }
        $event->delete(); 
        notify()->success('Deleted', 'Event Successfully Deleted');
        return redirect()->route('admin.event.index');
    }
}
