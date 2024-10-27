<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $brand = Brand::latest()->get();
        return view('admin.brand.index', compact('brand'));
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
            'name' => ['required','max:100','unique:brands'],
            'image' => 'required|max:1000||Image|mimes:jpg,png,jpeg,bmp',

        ]);
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $fileName = rand(111, 99999) . '.' . $extension;
        $imageResize = Image::make($image->getRealPath());
        $imageResize->resize(100, 100);
        $imageResize->save(public_path('uploads/brand/' . $fileName));
        $imageNameWithPath = 'uploads/brand/' . $fileName;
        try {
           
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->is_popular = $request->is_popular;
            $brand->image = $imageNameWithPath;
            
            $brand->save();

            if ($brand) {
                Session::flash('success', 'Brand Added Successfully');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Session::flash('error', 'Opps! Brand Added Fail');
            return redirect()->back();
        }
        // dd($request->all());

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
        $brand = Brand::where('id', $id)->first();
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand )
    {
        // dd($request->all());
        $request->validate([
            'name' => 'max:100|unique:brands,id',
        ]);
        $brandImage = '';
        if ($request->hasFile('image')) {
            if (!empty($brand->image) && file_exists($brand->image)) {
                unlink($brand->image);
            }
            $brandImage = $this->imageUpload($request, 'image', 'uploads/brand');
        } else {
            $brandImage = $brand->image;
        }
        // $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->is_popular = $request->is_popular;
        $brand->image = $brandImage;
        $brand->save();
        return redirect()->route('brand.index')->with('success','Brand Updated Successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (!empty($brand->image) && file_exists($brand->image)) {
            unlink($brand->image);
        }
        //  $brand = Brand::where('id',$id)->first();
         $product = Product::where('category_id', $brand->id)->count();
        if ($product > 0 ) {
            Session::flash('delete_check', 'Delete First dependency product');
            return back();
        } else {
          
            $brand->delete();
            if ($brand) {
                Session::flash('delete', 'Brand Delete Successfully');
                return redirect()->back();
            } else {
                Session::flash('error', 'Delete fail');
                return redirect()->back();
            }
        }
    }
}
