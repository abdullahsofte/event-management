<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{

  public function index()
  {
    return view('admin.banner.index');
  }


  public function allData()
  {
    $banners = Banner::latest()->get();
    return response()->json($banners);
  }
  // data insert
  public function store(Request $request)
  {
      $this->validate($request, [
          'title' => 'required|max:100',
          'image' => 'required|image|mimes:jpg,png,jpeg,bmp,webp|max:1000',
          'ip_address' => 'max:15'
      ]);

      $image = $request->file('image');
      $imageName = 'banner' . rand() . '.' . $image->getClientOriginalExtension();
      Image::make($image)->resize(1920, 1280)->save('uploads/banner/' . $imageName);

      $banner = Banner::create([
          'title' => $request->title,
          'short_details' => $request->short_details,
          'offer_link' => $request->offer_link,
          'image' => 'uploads/banner/' . $imageName,
          'save_by' => 1,
          'updated_by' => 1,
          'ip_address' => $request->ip()
      ]);

      return response()->json($banner);
  }


  //  data show
  public function edit($id)
  {
    $banner = Banner::find($id)->toArray();
    $banner['image'] = asset($banner['image']);
    return response()->json($banner);
  }

  //  update
  public function update(Request $request)
{
    $this->validate($request, [
        'title' => 'required|max:100',
        'ip_address' => 'max:15'
    ]);

    $banner = Banner::findOrFail($request->id);

    if ($request->hasFile('image')) {
        if (file_exists($banner->image)) {
            unlink($banner->image);
        }
        $image = $request->file('image');
        $imageName = 'banner' . rand() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 1280)->save('uploads/banner/' . $imageName);
        $banner->image = 'uploads/banner/' . $imageName;
    }

    $banner->update([
        'title' => $request->title,
        'short_details' => $request->short_details,
        'offer_link' => $request->offer_link,
        'updated_by' => 1,
        'ip_address' => $request->ip()
    ]);

    return response()->json($banner);
}

  public function destroy($id)
  {
    $banner = Banner::where('id', $id)->first();
    if ($banner->image) {
      @unlink($banner->image);
    }
    $banner->delete();
    $data = "Data Deleted Successfully";
    return response()->json($data);
  }
}
