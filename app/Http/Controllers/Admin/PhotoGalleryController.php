<?php

namespace App\Http\Controllers\Admin;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = PhotoGallery::latest()->get();
        return view('admin.photogallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:120',
            'image' => 'required|Image|mimes:jpg,jpeg,png,bmp,tiff,webp',
            'ip_address' => 'max:15'
        ]);
        $image = $request->file('image');
        $imageName  = 'gallery' . rand() .'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(740, 520)->save('uploads/gallery/' .$imageName);
 
        
        $gallery             = new PhotoGallery();
        $gallery->title      = $request->title;
        $gallery->image     = 'uploads/gallery/'.$imageName;
        $gallery->save_by    = 1;
        $gallery->ip_address = $request->ip();
        $gallery->save();
        if ($gallery) {
            Session::flash('status', 'success');
            return redirect()->route('photo-gallery.index');
        } else {
            Session::flash('errors', ' something went wrong');
        }
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
        $gallery = PhotoGallery::find($id);
        return view('admin.photogallery.edit', compact('gallery'));
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
        $request->validate([
            'title' => 'required|string|max:100',
            'image' => 'Image|mimes:jpg,jpeg,png,bmp,tiff,webp',
            'ip_address' => 'max:15'
        ]);
        $gallery = PhotoGallery::find($id);
     
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            if (!empty($gallery->image) && file_exists($gallery->image))
                unlink($gallery->image);
            $imageName  = 'gallery' . rand() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(740, 520)->save('uploads/gallery/' .$imageName);
            $gallery->image = 'uploads/gallery/'.$imageName;
        } else {
             $gallery->image = $gallery->image;
        }

        $gallery->title = $request->title;
        $gallery->update_by = 1;
        $gallery->ip_address = $request->ip();
        $gallery->save();
        if ($gallery) {
            Session::flash('success', 'Photo Update Successfully');
            return redirect()->route('photo-gallery.index');
        } else {
            Session::flash('errors', ' something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = PhotoGallery::find($id);
        if (!empty($gallery->image) && file_exists($gallery->image)) {
            unlink($gallery->image);
        }
        $gallery->delete();
        if ($gallery) {
            Session::flash('info', 'Delete Successfully');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Something Went Wrong');
            return redirect()->back();
        }
    }
}
