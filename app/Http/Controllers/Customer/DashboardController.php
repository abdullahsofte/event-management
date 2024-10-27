<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\Quote;
use App\Models\Country;
use App\Models\Upazila;
use App\Models\Customer;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function __construct()
    {
        return $this->middleware('customerCheck');
    }
    public function dashboard()
    {
        $data['countries'] = Country::all();
        $data['districts'] = District::all();
        $data['upazilas'] = Upazila::all();
        $data['order'] = Order::with('orderDetails')->where('customer_id', Auth::guard('customer')->user()->id)->get();
        $data['quote'] = Quote::where('customer_id', Auth::guard('customer')->user()->id)->get();
        return view('website.customer.dashboard', $data);
    }

    public function customerUpdate(Request $request, Customer $customer)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'        => 'required|max:100',
            'phone'       => 'required|unique:customers,id|max:11',
            'email'       => 'unique:customers,id|max:50',
            'username'    => 'unique:customers,id|max:50',
            'ip_address'  => 'max:17'
        ]);

        $customer = Customer::where('id', auth()->guard('customer')->user()->id)->first();
        if ($request->profile_picture) {
            $image             = $request->file('profile_picture');
            $thum_picture      = Auth::guard('customer')->user()->name . uniqid() . '.' . $image->getClientOriginalExtension();
            $profile_picture   = Auth::guard('customer')->user()->name . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/customer/' . $thum_picture);
            Image::make($image)->resize(100, 100)->save('uploads/customer/profile_picture/' . $profile_picture);
        }

        // $Image = $this->imageUpload($request, 'profile_picture', 'uploads/customer');
        $code = 'C' . $this->generateCode('Customer');
        $customer->name            = $request->name;
        $customer->email           = $request->email;
        $customer->phone           = $request->phone;
        $customer->username        = $request->username;
        $customer->code            = $code;
        $customer->profile_picture = 'uploads/customer/profile_picture/' . $profile_picture;
        $customer->thum_picture    = 'uploads/customer/' . $thum_picture;
        $customer->save();
        if ($customer) {
            Session::flash('message', 'Profile Update Successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Profile Update fail');
            return back();
        }
    }

    public function addressChange(Request $request)
    {
        // return $request->all();
        $request->validate([
            // 'country_id'   => 'required',
            'district_id'  => 'required',
            'upazila_id'   => 'required',
            'address'      => 'required',
        ]);

        $customer = Customer::where('id', Auth::guard('customer')->user()->id)->first();
        // $customer->country_id  = $request->country_id;
        $customer->district_id = $request->district_id;
        $customer->upazila_id  = $request->upazila_id;
        $customer->address     = $request->address;
        $customer->save();
        return back()->with('success', 'address updated successfully');
    }

    public function quoteDetails($id)
    {

        $quote = Quote::with('customer')->where('id', $id)->first();
        //return $quote;
        return view('website.customer.quote', compact('quote'));
    }

    public function orderDelete($id)
    {
        $data = Order::where('id', $id)->first();
        // return Auth::guard('customer')->user()->id;
        if ($data && (Auth::guard('customer')->user()->id == $data->customer_id) && ($data->status == 'p')) {
            $data->delete();
            return back()->with('success', 'Order deleted successfully');
        } else {
            return back()->with('error', 'Iligale operation found!');
        }
    }
}
