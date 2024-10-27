<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Origin;
use Illuminate\Support\Facades\Session;

class OriginController extends Controller
{
    public function index()
    {
        $origin = Origin::latest()->get();
        return view('admin.origin.index', compact('origin'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);

        $origin = new origin();
        $origin->name = $request->name;
        $origin->save();
        if ($origin) {
            Session::flash('success', 'Origin added successfully');
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $origin = Origin::find($id);
        return view('admin.origin.edit', compact('origin'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $origin = Origin::find($id);

        $origin->name = $request->name;
        $origin->save();
        if ($origin) {
            Session::flash('success', 'Origin Update Successfully');
            return redirect()->route('origin.index');
        } else {
            Session::flash('error', 'Update Fail');
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        $origin = Origin::find($id);


        $origin->delete();
        if ($origin) {
            Session::flash('warning', 'Origin Delete Successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Delete fail');
            return redirect()->back();
        }
    }
}
