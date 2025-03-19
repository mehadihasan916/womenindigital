<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::latest('id')->get();
        return view('admin.blogs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create-and-edit');
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

        // Get Blog Thumbnail for store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Blog Store
        Blog::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        $file->move('uploads/blogs/', $fileName);
        notify()->success('Success', 'Blog Successfully Created');
        return redirect()->route('admin.blog.index');
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
        // Find Blog ID
        $data['blog'] = Blog::findOrFail($id);
        return view('admin.blogs.create-and-edit',$data);
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
        // Find Blog ID
        $blog = Blog::findOrFail($id);

        // Blog Thumbnail Update
        if ($request->hasfile('thumbnail')) {
            // Existing blog thumbnail path
            $blog_path = public_path('uploads/blogs/' . $blog->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($blog_path)) {
                File::delete($blog_path);
            }
            // New Blog thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/blogs/', $fileName);
        } else {
            // Old Blog thumbnail store
            $fileName = $blog->thumbnail;
        }
        // Blog Update
        $blog->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Blog Successfully Updated', );
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Blog ID
        $blog = Blog::findOrFail($id);
        
        // Existing blog thumbnail path
        $blog_path = public_path('uploads/blogs/' . $blog->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($blog_path)) {
            File::delete($blog_path);
        }
        $blog->delete(); 
        notify()->success('Deleted', 'Blog Successfully Deleted');
        return redirect()->route('admin.blog.index');
    }
}
