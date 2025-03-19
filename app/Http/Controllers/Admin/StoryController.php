<?php

namespace App\Http\Controllers\Admin;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['stories'] = Story::orderBy('position')->get();
        return view('admin.stories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stories.create-and-edit');
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

        // Get Story Avater for store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Story Object Create
        $story = new Story();
        $story->title = $request->title;
        $story->short_description = $request->short_description;
        $story->body = $request->body;
        $story->thumbnail = $fileName;

        // Position Portion Store
        if(is_null($request->position)){
            // If request value is null, then max position + 1 
            $position = Story::max('position') + 1;
            $story->position =  $position;
        }else{
            $story->position = $request->position;
            // Get the lower position from the request value
            $lowerPositions = Story::where('position', '>=', $request->position)->get();
            // Loop for position increment
            foreach($lowerPositions as $lowerPosition){
                $lowerPosition->update([
                    'position' => $lowerPosition->position + 1,
                ]);
            }
        }
        $story->status = $request->filled('status');
        $file->move('uploads/stories/', $fileName);
        $story->save();
        notify()->success('Success','Story Successfully Created');
        return redirect()->route('admin.story.index');
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
        // Find Story ID
        $data['story'] = Story::findOrFail($id);
        return view('admin.stories.create-and-edit',$data);
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
        // Find Story Id
        $story = Story::findOrFail($id);
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

        // Update story thumbnail
        if ($request->hasfile('thumbnail')) {
            // Existing Story thumbnail path
            $story_path = public_path('uploads/stories/' . $story->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($story_path)) {
                File::delete($story_path);
            }
            // New Story thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/stories/', $fileName);
        } else {
            // Old Story thumbnail store
            $fileName = $story->thumbnail;
        }
        
        // Position Update Portion
        if(is_null($request->position)){
            // Get max position
            $maxPosition = Story::max('position');
            if($story->position == $maxPosition){
                // Position update
                $story->update([
                    'position' => $maxPosition,
                ]);
            }else{
                // Get lower to max position, between existing position to max position
                $lowerToMaxPositions = Story::whereBetween('position', [$story->position, $maxPosition])->get();
                // Loop for Decrement position
                foreach($lowerToMaxPositions as $lowerToMaxPosition){
                    $lowerToMaxPosition->update([
                        'position' => $lowerToMaxPosition->position - 1,
                    ]);
                }
                // Existing position update
                $story->update([
                    'position' => $maxPosition,
                ]);
            }
        }elseif($story->position == $request->position){
            // if existing position == $request position, then request position 
            $story->update([
                'position' => $request->position,
            ]);
        }elseif($request->position >= $story->position){
            // Get lower to max position, between existing position to max position
            $lowerToMaxPositions = Story::whereBetween('position', [$story->position, $request->position])->get();
            // Loop for Decrement position
            foreach($lowerToMaxPositions as $lowerToMaxPosition){
                $lowerToMaxPosition->update([
                    'position' => $lowerToMaxPosition->position - 1,
                ]);
            }
            // Update new request position
            $story->update([
                'position' => $request->position,
            ]);
        }else{
            $request->position <= $story->position;
            // Max to lower position, between existing position to max position
            $maxToLowerPositions = Story::whereBetween('position', [$request->position, $story->position])->get();
            // Loop for Increment position
            foreach($maxToLowerPositions as $maxToLowerPosition){
                $maxToLowerPosition->update([
                    'position' => $maxToLowerPosition->position + 1,
                ]);
            }
            // Update new request position
            $story->update([
                'position' => $request->position,
            ]);
        }
        // Update Story thumbnail
        $story->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Story Successfully Updated');
        return redirect()->route('admin.story.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Story ID
        $story = Story::findOrFail($id);
        // Existing Story thumbnail path
        $story_path = public_path('uploads/stories/' . $story->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($story_path)) {
            File::delete($story_path);
        }
        // Max position get
        $maxPositions = Story::where('position', '>', $story->position)->get();
        // Loop for Position Delete OR Decrease
        foreach($maxPositions as $maxPosition){
            $maxPosition->update([
                'position' => $maxPosition->position - 1,
            ]);
        }
        $story->delete(); 
        notify()->success('Deleted', 'Story Successfully Deleted');
        return redirect()->route('admin.story.index');
    }
}
