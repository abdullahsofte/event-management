<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = Partner::all();
        return view('admin.partner.index', compact('partner'));
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
            'name'       => 'required', 'max:60',
            'image'      => 'required|max:1024||Image|mimes:jpg,png,jpeg,bmp',
            'ip_address' => 'max:15'
        ]);

        $image = $request->file('image');
        $imageName  = 'partner' . rand() .'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(380, 190)->save('uploads/partner/' .$imageName);
        
        $partner             = new Partner();
        $partner->name       = $request->name;
        $partner->image      = 'uploads/partner/'.$imageName;
        $partner->save_by    = Auth::user()->id;
        $partner->ip_address = $request->ip();
        $partner->save();
        return back()->with('success', 'Certification added successfully');
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
        $partner = Partner::where('id', $id)->first();
        return view('admin.partner.edit', compact('partner'));
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
        //
        $request->validate([
            'name'       => 'required', 'max:60',
            'image'      => 'max:1024||Image|mimes:jpg,png,jpeg,bmp',
            'ip_address' => 'max:15'
        ]);


        $partner = Partner::where('id', $id)->first();
        $image   = $request->file('image');
        if ($request->hasFile('image')) {
            if (!empty($partner->image) && file_exists($partner->image))
                unlink($partner->image);
            $imageName = 'partner' . rand() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(380, 190)->save('uploads/partner/' .$imageName);
            $partner->image = 'uploads/partner/'.$imageName;
        } else {
             $partner->image = $partner->image;
        }
        $partner->name       = $request->name;
        $partner->updated_by = Auth::user()->id;
        $partner->ip_address = $request->ip();
        $partner->save();
        return redirect()->route('partner.index')->with('success', 'partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::where('id', $id)->first();
        if ($partner->image) {
            @unlink($partner->image);
        }
        $partner->delete();
        return redirect()->route('partner.index')->with('success', 'Partner Deleted Successfully');
    }
}
