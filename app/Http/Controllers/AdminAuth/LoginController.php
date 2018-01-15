<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdminLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
    
    public function postAdminLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $admin = Admin::where('email', $email)->first();
        
        if ($admin &&  Hash::check(Input::get('password'), $admin->password)) {
            Session::put('admin', $admin);
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['error', 'Wrong email or password!']);
    }

    
    public function logout()
    {
        $admin = Auth::guard('admin');
        $admin::logout();
        //session()->flush();
        return redirect()->back()->with('message',"You have just logout!"); 
    }

}
