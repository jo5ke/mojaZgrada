<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building as Building;
use App\Admin as Admin;
use App\User as User;

class AdminController extends Controller
{
    //

    public function getInvoices()
    {
        return view('invoices');
    }

    public function getEditUsers()
    {
        $admin = Admin::where('id' , Auth::guard('admin'))->first();
        $building = $admin->building;
        return view('editusers' , ['building' => $building]);
    }

    public function getEditUserAccount($uid)
    {
        $user = User::where('id',$uid)->first();
        return view('admin.edituser',['user' => $user]);
    }

    public function postEditUserAccount(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->number_of_occupants = $request->number_of_occupants;
        $user->phone = $request->phone;
        $user->apartment_number= $request->apartment_number;
        $user->password = Hash::make(Input::get('password'));
        $user->username = "Stan".$request->apartment_number;
        $user->save();

        return redirect()->back();
    }

    public function deleteUserAccount(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $user->delete();
        return redirect()->route('getEditUserAccounts');
    }






}
