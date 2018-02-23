<?php

namespace itmanagement\Http\Controllers\Auth;

use Illuminate\Http\Request;
use itmanagement\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('auth.admin.admin_login');
    }

    public function login(Request $request){
        // Validade the form data
        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required|min:6'
        ]);

        // Attempt to log the user as admin
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('admin')->attempt($credentials, $request->remember)){
            // If successful, then redirect to their intended location
            // INTENDED return to the page where the user try to access before to login in
            return redirect()->intended(route('admin.dashboard'));
        }
        else {
            // If unsuccessful, then redirect back the login with the form data
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }
}
