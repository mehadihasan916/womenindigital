<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['newses'] = News::latest('id')->get();
        return view('admin.news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation check
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

        // Get News Thumbnail for store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // News Store
        News::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        $file->move('uploads/news/', $fileName);
        notify()->success('Success','News Successfully Created');
        return redirect()->route('admin.news.index');
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
        // Find News ID
        $data['news'] = News::findOrFail($id);
        return view('admin.news.create-and-edit',$data);
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
        // Find News ID
        $news = News::findOrFail($id);

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

        // News Thumbnail Update
        if ($request->hasfile('thumbnail')) {
            // Existing news thumbnail path
            $news_path = public_path('uploads/news/' . $news->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($news_path)) {
                File::delete($news_path);
            }
            // New news thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/news/', $fileName);
        } else {
            // Old news thumbnail store
            $fileName = $news->thumbnail;
        }
        // News Update
        $news->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'News Successfully Updated', );
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find news ID
        $news = News::findOrFail($id);
        // Existing news thumbnail path
        $news_path = public_path('uploads/news/' . $news->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($news_path)) {
            File::delete($news_path);
        }
        $news->delete(); 
        notify()->success('Deleted', 'News Successfully Deleted');
        return redirect()->route('admin.news.index');
    }
}
