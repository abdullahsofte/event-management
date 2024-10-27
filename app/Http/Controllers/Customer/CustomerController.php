<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\Quote;
use App\Models\Customer;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    public function customer()
    {
        if (Auth::guard('customer')->check()) {
            Session::flash('message', 'You have already login');
            return redirect()->route('customer.dashboard');
        } else {
            return view('website.customer.login');
        }
    }

    public function AuthCheck(Request $request)
    {

        $request->validate([
            // 'userphone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'password' => 'required',

        ]);
        // Auth::guard('customer')->logout();
        $credential = $request->only('password');
        $credential['phone'] = $request->phone;
   
        if (Auth::guard('customer')->attempt($credential)) {

         
            if($request->route == 'get-route'){
                return redirect()->route('get-route');
            }

            else{
                session()->flash('message', 'Login Successfully !');
                $redirect_url = route('customer.dashboard');
            }
            

            if(session()->has('redirect_url')){
                $redirect_url = session('redirect_url');
                session()->forget('redirect_url');
                return redirect()->to($redirect_url);
            }

            elseif(session()->has('question_url')){
                $redirect_url = session('question_url');
                session()->forget('question_url');
                return redirect()->to($redirect_url);
            }
            
            else{
                return redirect($redirect_url);
            }
            
            
            

        } else {
            Session::flash('error', 'Mobile number or password not match');
            return redirect()->back();
        }
    }


    public function signUp()
    {
        if (Auth::guard('customer')->check()) {
            Session::flash('message', 'You have already login');
            return redirect()->route('checkout.user');
        } else {
            return view('website.customer.signup');
        }
    }


    public function customerForm()
    {
        return view('website.customer.signup');
    }

    public function customerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'phone' => 'required|unique:customers|regex:/^01[13-9][\d]{8}$/|min:11',
            'password' => 'required|string|same:cpassword|min:1',
            'ip_address' => 'max:15'
        ]);
        
        $otp = rand(1000, 9999);
        // return $request;
       try {
            $customer = new Customer();
            $code = 'C' . $this->generateCode('Customer');
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->password = Hash::make($request->password);
            $customer->ip_address = $request->ip();
            $customer->code = $code;
            $customer->save_by = 0;
            $customer->updated_by = 0;
            $customer->save();
        return redirect()->route('customer.login')->with('success','Account created successfully');
       } catch (\Throwable $th) {
          return back()->with('error','Account created fail!');
       }
       
    }


    public function customerPasswordUpdate(Request $request)
    {


        $request->validate([
            'currentPass' => 'required',
            'password' => 'required|min:4|same:confirmed',
        ]);
        $currentPassword = Auth::guard('customer')->user()->password;
        if (Hash::check($request->currentPass, $currentPassword)) {
            if (!Hash::check($request->password, $currentPassword)) {
                $customer = Customer::find(Auth::guard('customer')->id());
                $customer->password = HasH::make($request->password);
                $customer->save();
                if ($customer) {
                    Session::flash('message', 'Password Update Successfully');
                    // Auth::guard('customer')->logout();
                    return back();
                } else {
                    Session::flash('error', 'Current password not match');
                    return back();
                }
            } else {
                Session::flash('error', 'Same as Current password');
                return back();
            }
        } else {
            Session::flash('error', '!Current password not match');
            return back();
        }
    }



    public function customerPanel()
    {
        if (Auth::guard('customer')->check()) {
            $order = Order::with('orderDetails')->where('customer_id', Auth::guard('customer')->user()->id)->latest()->get();
            $quote = Quote::where('customer_id',Auth::guard('customer')->user()->id)->get();
            return view('website.customer.dashboard', compact('order','quote'));
        } else {
            return redirect()->route('home');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        Session::flash('error', 'Logout Successfully');
        return redirect()->route('home');
    }
}
