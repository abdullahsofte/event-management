<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Inventory;
use App\Models\Origin;
use App\Models\ProductFeature;
use App\Models\Subsubcategory;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $product = Product::latest()->get();
        $productCode = $this->generateCode('Product', 'P');
        return view('admin.product.index', compact('product', 'productCode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data['brand'] = Brand::get();
        $data['category'] = Category::get();
        $data['origin'] = Origin::get();
        $productCode = $this->generateCode('Product', 'P');
        $data['product'] = Product::latest()->take('10')->get();
        return view('admin.product.create', $data, compact('productCode'));
    }

    // public function getSubcategory($id)
    // {
    //     $subCategory = SubCategory::where('category_id', $id)->get();
    //     return response()->json($subCategory);
    // }
    // public function getsubSubcategory($id){
    //     $subSubcategory = Subsubcategory::where('sub_category_id',$id)->get();
    //     return response()->json($subSubcategory);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);
    
        $slug = Str::slug($request->name . '-' . time());
        $i = 0;
        while (true) {
            if (Category::where('slug', '=', $slug)->exists()) {
                $i++;
                $slug .= '_' . $i;
                continue;
            }
            break;
        }
    
        try {
            $image = $request->file('image');
            $imageName  = 'product' . rand() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(855, 570)->save('uploads/product/' . $imageName);
    
            DB::beginTransaction();
            $productCode            = $this->generateCode('Product', 'P');
            $product                = new Product();
            $product->name          = $request->name;
            $product->slug          = $slug;
            $product->code          = $productCode;
            $product->category_id   = $request->category_id;
            $product->origin_id     = $request->origin_id;
            $product->brand_id      = $request->brand_id;
            $product->price         = $request->price;
            $product->size          = $request->size;
            $product->discount      = $request->discount;
            $product->is_feature    = $request->is_feature ?? 0;
            $product->is_offer      = $request->is_offer ?? 0;
            $product->new_status    = $request->new_status ?? 0;
            $product->short_details = $request->short_details;
            $product->description   = $request->description;
            $product->image         = 'uploads/product/' . $imageName;
            $product->save_by       = 1;
            $product->ip_address    = $request->ip();
            $product->save();
    
            $productImages = $this->imageUpload($request, 'otherImage', 'uploads/otherImage');
            if (is_array($productImages) && count($productImages)) {
                foreach ($productImages as $image) {
                    $imagePath = new ProductImage();
                    $imagePath->product_id = $product->id;
                    $imagePath->otherImage = $image;
                    $imagePath->save();
                }
            }
    
            DB::commit();
            Session::flash('success', 'Product Added Successfully');
            return back();
    
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
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

    public function removeImage($id)
    {
        try {
            $removeImage = ProductImage::find($id);
            if (!empty($removeImage->otherImage) && file_exists($removeImage->otherImage)) {
                unlink($removeImage->otherImage);
            }
            $removeImage->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['brand'] = Brand::get();
        $data['category'] = Category::get(); 
        $data['origin'] = Origin::get(); 
        $data['product'] = Product::with('category', 'origin')->where('slug', $slug)->first();
        return view('admin.product.edit', $data);
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
        ]);

        try {
             $product = Product::find($id);
             $duplicate = Product::where('id', '!=', $id)->where('code', $request->code)->get();
                if (count($duplicate) > 0) {
                    Session::flash('error', ' Product Code duplicate found ');
                    return back();
                } else {
                   

                    $image = $request->file('image');
                    if ($request->hasFile('image')) {
                        if (!empty($product->image) && file_exists($product->image))
                            unlink($product->image);
                        $imageName  = 'product' . rand() .'.'. $image->getClientOriginalExtension();
                        Image::make($image)->resize(855, 570)->save('uploads/product/' .$imageName);
                        $product->image = 'uploads/product/'.$imageName;
                    } else {
                        $product->image = $product->image;
                    }

                    $slug                        = Str::slug($request->name . '-' . time());
                    $product->name               = $request->name;
                    $product->code                = $request->code;
                    $product->slug               = $slug;
                    $product->category_id        = $request->category_id;
                    $product->origin_id          = $request->origin_id;
                    $product->brand_id           = $request->brand_id;
                    $product->price              = $request->price;
                    $product->size              = $request->size;
                    $product->discount           = $request->discount;
                    $product->is_feature         = $request->is_feature ?? 0;
                    $product->is_offer           = $request->is_offer ?? 0;
                    $product->new_status         = $request->new_status ?? 0;
                    $product->short_details      = $request->short_details;
                    $product->description        = $request->description;
                    $product->save_by            = Auth::user()->id;
                    $product->ip_address         = $request->ip();
                    $product->save();
        
                    // multiple image
                    $productImages = $this->imageUpload($request, 'otherImage', 'uploads/otherImage');
                    if (is_array($productImages) && count($productImages)) {
                        foreach ($productImages as $image) {
                            $imagePath = new ProductImage();
                            $imagePath->product_id = $product->id;
                            $imagePath->otherImage = $image;
                            $imagePath->save();
                        }
                    }
                  
                    return redirect()->route('product.index')->with('success','Product updated successfully');
                
                }
            } catch (\Throwable $th) {
                Session::flash('errors', 'something went wrong');
                    return redirect()->back();
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
         $product = Product::with('productImage')->where('id',$id)->first();

        if (file_exists($product->image)) {
            @unlink($product->image);
        }
       
        if($product->productImage == true){
            foreach($product->productImage as $item){
                @unlink($item->otherImage);
                $item->delete();
            }
        }
        $product->delete();
        
        return back()->with('success', 'product deleted successfully');
    }

    public function featureRemove($id){
        ProductFeature::where('id',$id)->delete();
        return response()->json('data deleted successfully');
    }
}
