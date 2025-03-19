<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\IndomitableWomen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class IndomitableWomenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['indomitableWomens'] = IndomitableWomen::orderBy('position')->get();
        return view('admin.indomitable-womens.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.indomitable-womens.create-and-edit');
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
            'designation' => 'required|string|max:191',
            'short_description' => 'required|string|max:300',
            'page_banner' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);

        // Get Page Banner
        $page_banner = $request->page_banner;
        // Disable libxml errors and allow user to fetch error information
        libxml_use_internal_errors(true);
        // Bannaer content object create
        $banner_dom = new \DomDocument();
        // Load HTML from a string
        $banner_dom->loadHtml('<?xml encoding="utf-8" ?>' . $page_banner); //Language Support for Bangla
        // Get image name from summer note editor
        $bannerImageFile = $banner_dom->getElementsByTagName('imageFile');
        // Fetch Images And Store
        foreach($bannerImageFile as $item => $bannerImage){
            $bannerData = $bannerImage->getAttribute('src');
            list($type, $bannerData) = explode(';', $bannerData);
            list(, $bannerData)      = explode(',', $bannerData);
            $bannerImgeData = base64_decode($bannerData);
            $bannerImageName= "upload/" . time().$item.'.png';
            $path = public_path() . $bannerImageName;
            file_put_contents($path, $bannerImgeData);
            $bannerImage->removeAttribute('src');
            $bannerImage->setAttribute('src', $bannerImageName);
        }
        $page_banner = $banner_dom->saveHTML();
        
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

        // Get Indomitable Women thumbnail for store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Indomitabel Women Object Create
        $indo_women = new IndomitableWomen();
        $indo_women->name = $request->name;
        $indo_women->designation = $request->designation;
        $indo_women->short_description = $request->short_description;
        $indo_women->page_banner = $request->page_banner;
        $indo_women->body = $request->body;
        $indo_women->thumbnail = $fileName;

        // Position Portion Store
        if(is_null($request->position)){
            // If request value is null, then max position + 1 
            $position = IndomitableWomen::max('position') + 1;
            $indo_women->position =  $position;
        }else{
            $indo_women->position = $request->position;
            // Get the lower position from the request value
            $lowerPositions = IndomitableWomen::where('position', '>=', $request->position)->get();
            // Loop for position increment
            foreach($lowerPositions as $lowerPosition){
                $lowerPosition->update([
                    'position' => $lowerPosition->position + 1,
                ]);
            }
        }
        $indo_women->status = $request->filled('status');
        $file->move('uploads/indomitable-womens/', $fileName);
        $indo_women->save();
        notify()->success('Success','Indomitable Women Successfully Created');
        return redirect()->route('admin.indomitable-women.index');
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
        // Find indomitablewome ID
        $data['indomitableWomen'] = IndomitableWomen::findOrFail($id);
        return view('admin.indomitable-womens.create-and-edit',$data);
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
        // Find indomitable women ID
        $indo_women = IndomitableWomen::findOrFail($id);
        // Get Page Banner
        $page_banner = $request->page_banner;
        // Disable libxml errors and allow user to fetch error information
        libxml_use_internal_errors(true);
        // Bannaer content object create
        $banner_dom = new \DomDocument();
        // Load HTML from a string
        $banner_dom->loadHtml('<?xml encoding="utf-8" ?>' . $page_banner); //Language Support for Bangla
        // Get image name from summer note editor
        $bannerImageFile = $banner_dom->getElementsByTagName('imageFile');
        // Fetch Images And Store
        foreach($bannerImageFile as $item => $bannerImage){
            $bannerData = $bannerImage->getAttribute('src');
            list($type, $bannerData) = explode(';', $bannerData);
            list(, $bannerData)      = explode(',', $bannerData);
            $bannerImgeData = base64_decode($bannerData);
            $bannerImageName= "upload/" . time().$item.'.png';
            $path = public_path() . $bannerImageName;
            file_put_contents($path, $bannerImgeData);
            $bannerImage->removeAttribute('src');
            $bannerImage->setAttribute('src', $bannerImageName);
        }
        $page_banner = $banner_dom->saveHTML();

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

        // Indomitable Women thumbnail Update
        if ($request->hasfile('thumbnail')) {
            // Existing Indomitable Women thumbnail path
            $indo_women_path = public_path('uploads/indomitable-womens/' . $indo_women->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($indo_women_path)) {
                File::delete($indo_women_path);
            }
            // New Indomitable Women thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/indomitable-womens/', $fileName);
        } else {
            // old Indomitable Women thumbnail store   
            $fileName = $indo_women->thumbnail;
        }

        // Position Update Portion
        if(is_null($request->position)){ 
            // Get max position
            $maxPosition = IndomitableWomen::max('position');
            if($indo_women->position == $maxPosition){
                // Position update
                $indo_women->update([
                    'position' => $maxPosition,
                ]);
            }else{
                // Get lower to max position, between existing position to max position
                $lowerToMaxPositions = IndomitableWomen::whereBetween('position', [$indo_women->position, $maxPosition])->get();
                // Loop for Decrement position
                foreach($lowerToMaxPositions as $lowerToMaxPosition){
                    $lowerToMaxPosition->update([
                        'position' => $lowerToMaxPosition->position - 1,
                    ]);
                }
                // Existing position update
                $indo_women->update([
                    'position' => $maxPosition,
                ]);
            }
        }elseif($indo_women->position == $request->position){
            // if existing position == $request position, then request position save
            $indo_women->update([
                'position' => $request->position,
            ]);
        }elseif($request->position >= $indo_women->position){
            // Get lower to max position, between existing position to max position
            $lowerToMaxPositions = IndomitableWomen::whereBetween('position', [$indo_women->position, $request->position])->get();
            // Loop for Decrement position
            foreach($lowerToMaxPositions as $lowerToMaxPosition){
                $lowerToMaxPosition->update([
                    'position' => $lowerToMaxPosition->position - 1,
                ]);
            }
            // Update new request position
            $indo_women->update([
                'position' => $request->position,
            ]);
        }else{
            $request->position <= $indo_women->position;
            // Max to lower position, between existing position to max position
            $maxToLowerPositions = IndomitableWomen::whereBetween('position', [$request->position, $indo_women->position])->get();
            // Loop for Increment position
            foreach($maxToLowerPositions as $maxToLowerPosition){
                $maxToLowerPosition->update([
                    'position' => $maxToLowerPosition->position + 1,
                ]);
            }
            // Update new request position
            $indo_women->update([
                'position' => $request->position,
            ]);
        }
        
        // Update Indomitable Women
        $indo_women->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'short_description' => $request->short_description,
            'page_banner' => $request->page_banner,
            'body' => $request->body,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Indomitable Women Successfully Updated');
        return redirect()->route('admin.indomitable-women.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Indomitable Women ID
        $indo_women = IndomitableWomen::findOrFail($id);
        // Existing Indomitable Women thumbnail path
        $indo_women_path = public_path('uploads/indomitable-womens/' . $indo_women->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($indo_women_path)) {
            File::delete($indo_women_path);
        }
        // Max position get
        $maxPositions = IndomitableWomen::where('position', '>', $indo_women->position)->get();
        // Loop for Position Delete OR Decrease
        foreach($maxPositions as $maxPosition){
            $maxPosition->update([
                'position' => $maxPosition->position - 1,
            ]);
        }
        $indo_women->delete(); 
        notify()->success('Deleted','Indomitable Women Successfully Deleted');
        return redirect()->route('admin.indomitable-women.index');
    }
}
