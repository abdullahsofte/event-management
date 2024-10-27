<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SubscriberController extends Controller
{

    public function index()
    {
        $service = Subscriber::latest()->get();
        return view('admin.subscriber.index', compact('service'));
    }

    public function store(Request $request)
    {
        //    dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'ip_address' => 'max:15'
        ]);

        $service = new Subscriber();
        $service->name = $request->name;
        $service->phone = $request->phone;
        $service->email = $request->email;
        $service->message = $request->message;
        $service->ip_address = $request->ip();
        $service->save();
        if ($service) {
            session()->flash('success', 'Message Successfully Sent');
            return redirect()->back();
        } else {
            session()->flash('error', 'Subscribe fail');
            return redirect()->back();
        }
    }
    public function delete(Subscriber $service ){
        $service->delete();
        if ($service) {
            Session::flash('info', 'delete  Successfully');
            return back();
        } 
    }
}
