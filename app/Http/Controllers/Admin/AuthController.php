<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


  public function loginShow()
  {

    if (Auth::check()) {
      return redirect()->route('admin.index');
    } else {
      return view('auth.login');
    }
  }

  public function authCheck(Request $request)
  {
      $request->validate([
          'username' => 'required',
          'password' => 'required'
      ]);
  
      $credential = $request->only('username', 'password');
  
      if (Auth::attempt($credential)) {
          return redirect()->intended('/dashboard');
      } else {
          // Set the error message in session flash
          return redirect()->route('login')->with('error', 'Oops! Username or password is incorrect.');
      }
  }
  

  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
    
  }
}
