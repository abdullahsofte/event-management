<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Session\Session;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::latest()->get();
        return view('admin.ad.index', compact('ads'));
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
            'title' => 'required|max:100',
            'image' => 'required|max:1000||Image|mimes:jpg,png,jpeg,bmp',
            'ip_address' => 'max:15'
        ]);

        try {
            $image = $request->file('image');
            $imageName  = 'ad' . rand() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(540, 285)->save('uploads/ad/' .$imageName);

            $ad = new Ad();
            $ad->title = $request->title;
            $ad->link = $request->link;
            $ad->image = 'uploads/ad/'.$imageName;
            $ad->save_by = Auth::user()->id;
            $ad->ip_address = $request->ip();
            $ad->save();

            if ($ad) {

                return redirect()->back()->with('success', 'Ad Inserted Successfully');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ad not inserted');
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
        $ad = Ad::where('id', $id)->first();
        return view('admin.ad.edit', compact('ad'));
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
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:100',
            'image' => 'Image|mimes:jpg,png,jpeg,bmp',
            'ip_address' => 'max:15'
        ]);
        $ad = Ad::find($id);


         $image   = $request->file('image');
        if ($request->hasFile('image')) {
            if (!empty($ad->image) && file_exists($ad->image))
                unlink($ad->image);
            $imageName = 'ad' . rand() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(540, 285)->save('uploads/ad/' .$imageName);
            $ad->image = 'uploads/ad/'.$imageName;
        } else {
             $ad->image = $ad->image;
        }
        $ad->title = $request->title;
        $ad->link = $request->link;
        $ad->updated_by = Auth::user()->user_id;;
        $ad->ip_address = $request->ip();
        $ad->save();
        if ($ad) {
            return redirect()->route('ad.index')->with('success', 'Ad updated successfulyy');
        } else {
            return redirect()->bacK()->with('error', 'Fail updated');
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

        $ad = Ad::where('id', $id)->first();
        if ($ad->image) {
            @unlink($ad->image);
        }
        $ad->delete();
        return redirect()->route('ad.index')->with('success', 'Ad Deleted Successfully');
    }

    public function active($id)
    {
        $ad = Ad::where('id', $id)->first();
        if ($ad->status == 'd') {
            $ad->status = 'a';
            $ad->save();
        } else {
            $ad->status = 'd';
            $ad->save();
        }
        return back()->with('success', 'Banner Status Updated Successfully');
    }
}
