<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pagebuilder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PagebuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_builders'] = Pagebuilder::latest('id')->get();
        return view('admin.page-builder.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page-builder.create-and-edit');
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
            'title' => 'required|string|max:55',
            'page_banner' => 'required',
            'body' => 'required',
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

        // Page builder Object Create
        $page_builder = new Pagebuilder();
        $page_builder->title = $request->title;
        $page_builder->slug = Str::slug($request->title);
        $page_builder->page_banner = $request->page_banner;
        $page_builder->body = $request->body;
        $page_builder->status = $request->filled('status');
        $page_builder->save();
        notify()->success('Success','Page Builder Successfully Created');
        return redirect()->route('admin.page-builder.index');
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
        // Find page builder ID
        $data['page_builder'] = Pagebuilder::findOrFail($id);
        return view('admin.page-builder.create-and-edit',$data);
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
        // Find page builder ID
        $page_builder = Pagebuilder::findOrFail($id);
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

        // Update Page Builder
        $page_builder->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'page_banner' => $request->page_banner,
            'body' => $request->body,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Page Builder Successfully Updated');
        return redirect()->route('admin.page-builder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find page builder ID
        $page_builder = Pagebuilder::findOrFail($id);
        $page_builder->delete();
        notify()->success('Deleted','Page Builder Successfully Deleted');
        return redirect()->route('admin.page-builder.index');
    }
}
