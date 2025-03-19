<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::latest('id')->get();
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create-and-edit');
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
            'short_description' => 'required|string|max:300',
            'body' => 'required',
            'link' => 'max:255',
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
        // Create Product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'link' => $request->link,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        $file->move('uploads/products/', $fileName);
        notify()->success('Success','Product Successfully Created');
        return redirect()->route('admin.product.index');
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
        // Find Product ID
        $data['product'] = Product::findOrFail($id);
        return view('admin.products.create-and-edit',$data);
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
        // Find Product ID
        $product = Product::findOrFail($id);
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

        // Update Product Thumbnail
        if ($request->hasfile('thumbnail')) {
            // Existing product thumbnail path
            $product_path = public_path('uploads/products/' . $product->thumbnail);
            // Delete old thumbnail, If the thumbnail has
            if (File::exists($product_path)) {
                File::delete($product_path);
            }
            // New product thumbnail store   
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/products/', $fileName);
        } else {
            // Old product thumbnail store
            $fileName = $product->thumbnail;
        }
        // Product Update
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'link' => $request->link,
            'thumbnail' => $fileName,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Updated', 'Product Successfully Updated');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find product ID
        $product = Product::findOrFail($id);
        // Existing product thumbnail path
        $product_path = public_path('uploads/products/' . $product->thumbnail);
        // Delete old thumbnail, If the thumbnail has
        if (File::exists($product_path)) {
            File::delete($product_path);
        }
        $product->delete(); 
        notify()->success('Deleted', 'Product Successfully Deleted', );
        return redirect()->route('admin.product.index');
    }
}
