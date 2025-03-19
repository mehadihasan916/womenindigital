<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Gallery With Album
        $data['galleries'] = Gallery::with('album')->latest('id')->get();
        return view('admin.galleries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get Gallery With Album
        $data['albums'] = Album::latest('id')->get(['id', 'title']);
        return view('admin.galleries.create-and-edit', $data);
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
            'album_id' => 'required',
            'thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
        // Get Event Thumbnail for store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Gallery Create
        Gallery::create([
            'album_id' => $request->album_id,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        $file->move('uploads/galleries/', $fileName);
        notify()->success('Success','Gallery Successfully Created');
        return redirect()->route('admin.gallery.index');
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
        // Find Gallery Id
        $data['gallery'] = Gallery::findOrFail($id);
        // Get Album Data
        $data['albums'] = Album::latest('id')->get(['id', 'title']);
        return view('admin.galleries.create-and-edit', $data);
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
        // Fidn Gallery Id
        $gallery = Gallery::findOrFail($id);
        if ($request->hasfile('thumbnail')) {
            // Existing gallery thumbnail path
            $gallery_path = public_path('uploads/galleries/' . $gallery->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($gallery_path)) {
                File::delete($gallery_path);
            }
            // New Gallery Avater store
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/galleries/', $fileName);
        } else {
            // Old Gallery thumbnail store
            $fileName = $gallery->thumbnail;
        }
        // Gallery Update
        $gallery->update([
            'album_id' => $request->album_id,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Success','Gallery Successfully Updated');
        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Gallery ID
        $gallery = Gallery::findOrFail($id);
        // Existing Gallery thumbnail path
        $gallery_path = public_path('uploads/galleries/' . $gallery->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($gallery_path)) {
            File::delete($gallery_path);
        }
        $gallery->delete();
        notify()->success('Deleted', 'Gallery Successfully Deleted');
        return redirect()->route('admin.gallery.index');

    }
}
