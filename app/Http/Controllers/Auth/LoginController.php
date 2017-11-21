<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth as Auth;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getUserLogin()
    {
        return view('auth.login');
    }

    public function postUserLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $user = User::where('email', $email)->first();
        
        if ($user &&  Hash::check(Input::get('password'), $user->password)) {
            Session::put('user', $user);
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['error', 'Wrong email or password!']);
    }


}
