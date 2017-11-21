<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Hash as Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $table = 'users';
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



    public function getUserRegister()
    {
        return view('auth.register');
    }

    public function postUserRegister(Request $request)
    {
        $request->validate([
        'first_name'            => 'required',
        'last_name'             => 'required',
        'email'                 => 'required',
        'street'                => 'required',
        'apartment_number'      => 'required',
        'password'              => 'required',
        'password_confirmation' => 'required',
        'building_number'       => 'required',
        'number_of_occupants'   => 'required',
        'phone'                 => 'required',
    ]);
    if (!strcmp(Input::get('password'), Input::get('password_confirmation'))){
        $user = new User(Input::all());
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        return redirect()->route('home');
    } else {
        return Redirect::back()->withErrors(['error', "Password does not match!"]);
        }
    }
}

