<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['testimonials'] = Testimonial::latest('id')->get();
        return view('admin.testimonials.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validaton check
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'designation' => 'string|max:191',
            'email' => 'string|max:55',
            'comment' => 'required|string|max:450',
            'thumbnail' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
        // Testimonial Image Store
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
        }
        // Testimonial Store
        Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'comment' => $request->comment,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        $file->move('uploads/testimonials/', $fileName);
        notify()->success('Success','Testimonial Successfully Created');
        return redirect()->route('admin.testimonial.index');
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
        // Find Testimonial ID
        $data['testimonial'] = Testimonial::findOrFail($id);
        return view('admin.testimonials.create-and-edit',$data);
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
        // Find Testimonial ID
        $testimonial = Testimonial::findOrFail($id);
        if ($request->hasfile('thumbnail')) {
            // Existing Testimonial thumbnail path
            $testimonial_path = public_path('uploads/testimonials/' . $testimonial->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($testimonial_path)) {
                File::delete($testimonial_path);
            }
            // New Testimonial thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/testimonials/', $fileName);
        } else {
            // Old Testimonial thumbnail store
            $fileName = $testimonial->thumbnail;
        }
        // Update Testimonial
        $testimonial->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'comment' => $request->comment,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Testimonial Successfully Updated');
        return redirect()->route('admin.testimonial.index');
    }


    /**
     * Approve the Testimonail .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approveTestimonial($id)
    {
        // Find Testimonial Id for approve
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->status == false)
        {
            // Testimonial Approved
            $testimonial->status = true;
            $testimonial->save();
            notify()->success('Approved', 'Testimonial Approved');
            return redirect()->route('admin.testimonial.index');
        } else {
            notify()->info('Approved', 'Testimonial Already Approved', );
        }
        return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Testimonial ID
        $testimonial = Testimonial::findOrFail($id);
        // Existing Testimonial thumbnail path
        $testimonial_path = public_path('uploads/testimonials/' . $testimonial->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($testimonial_path)) {
            File::delete($testimonial_path);
        }
        $testimonial->delete(); 
        notify()->success('Deleted', 'Testimonial Successfully Deleted');
        return redirect()->route('admin.testimonial.index');
    }
}
