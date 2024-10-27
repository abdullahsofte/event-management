<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    public function index(){
        $faq = Faq::latest()->get();
        return view('admin.faq.index',compact('faq'));
    }
    public function store(Request $request){

   
       $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);
        $faq = new Faq();
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();
        if ($faq) {
            Session::flash('status', 'success');
            return back();
        } else {
            Session::flash('errors', 'something went wrong');
        }
        return redirect()->back();
    }
    public function edit($id){
        $faq = Faq::find($id);
        return view('admin.faq.edit',compact('faq'));
    }
 
    public function update(Request $request , $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
    
        ]);
        $faq = Faq::where('id', $id)->first();
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();
        if ($faq) {
            return redirect()->route('faq.index')->with('success', 'faq updated successfully');
        } else {
            return back()->with('error', 'Update Fail!');
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $faq = Faq::where('id', $id)->first();
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'faq Deleted Successfully');
    }
    
}
