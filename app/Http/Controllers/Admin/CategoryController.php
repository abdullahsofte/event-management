<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $category = Category::get();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $category = Category::get();
        return view('admin.category.list', compact('category'));
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
            'name' => 'required', 'max:100',
            'ip_address' => 'max:15'
        ]);
       
        try {
            $slug = Str::slug($request->name . '-' . time());
          
            $category = new Category();
            $category->name = $request->name;
            $category->is_popular = $request->is_popular;
            $category->slug = $slug;
            $category->save_by = Auth::user()->id;
            $category->ip_address = $request->ip();
            $category->save();

            if ($category) {
                Session::flash('success', 'Category Added Successfully');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Session::flash('error', 'Opps! category Added Fail',$th);
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
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('admin.category.edit', compact('category'));
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
            'name' => 'max:100',
            'ip_address' => 'max:15'
        ]);
        // dd($request->all());
        $category = Category::find($id);
         $duplicate = Category::where('id', '!=', $id)->where('name', $request->name)->get();
         
       
        // $phone->code = rand(4);
        // $pone->save();
        
        // If($only (,phoe-,code) )

        if (count($duplicate) > 0) {
            Session::flash('duplicate', ' Duplicate Category');
            return back();
        } else {
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
            $category->name = $request->name;
            $category->slug = $slug;
            $category->details = $request->details;
            $category->is_popular = $request->is_popular;
            $category->updated_by = Auth::user()->user_id;;
            $category->ip_address = $request->ip();
            $category->save();
            if ($category) {
                Session::flash('success', 'Category Update Successfully');
                return redirect()->route('category.index');
            } else {
                Session::flash('error', 'Update Fail');
                return redirect()->bacK();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $product = Product::where('category_id', $category->id)->count();
        $sub = SubCategory::where('category_id', $category->id)->count();
        if ($product > 0 OR $sub > 0) {
            Session::flash('delete_check', 'Delete First dependency subcategory or product');
            return back();
        } else {
            if (!empty($category->image) && file_exists($category->image)) {
                unlink($category->image);
            }
            $category->delete();
            if ($category) {
                Session::flash('delete', 'Category Delete Successfully');
                return redirect()->back();
            } else {
                Session::flash('error', 'Delete fail');
                return redirect()->back();
            }
        }
    }

    public function  test()
    {
        return 'hlw';
    }

    public function required($id)
    {
        $ad = Category::where('id', $id)->first();
        if ($ad->quote == '1') {
            $ad->quote = '0';
            $ad->save();
        } else {
            $ad->quote = '1';
            $ad->save();
        }
        return back()->with('success', 'Updated Successfully');
    }
}
