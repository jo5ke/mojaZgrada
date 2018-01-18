<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building as Building;
use App\Admin as Admin;
use App\User as User;

class BuildingController extends Controller
{
    //
    public function getRegisterBuilding()
    {
        $admin = Admin::where('id' , Auth::guard('admin'))->first();
        $aid = $admin->id;
        return view('building.register' , ['aid' => $aid]);
    }
    
    public function postRegisterBuilding(Request $request)
    {
        $request->validate([
        'id'                                      => 'required',
        'adress'                                  => 'required',
        'adress_no'                               => 'required',  
        'city'                                    => 'required',  
        'number_of_apartments'                   => 'required',  
        'invoice'                                 => 'required',  
        'pib'                                     => 'required',  
        'mat'                                     => 'required',  
    ]);
        $building = new Building(Input::all());
        $building->admin_id = Input::get('aid');
        $building->save();

        return view('registration-payment' , [ 'building' => $building]);
    }

    public function postBuildingPayment(Request $request)
    {
        // ovde treba saveovati zgradu ili obrisati ako je placanje neuspesno, to tek kad se sredi placanje.


        $building = Building::where('id',$request->bid)->first(); // napraviti hidden input na registration-payment!
         //  $quantity = $building->number_of_appartments;

        // route za kreiranje stanova/usera
        return redirect()->route('createApartments' , ['building' => $building]);

        // ova ruta treba da se premesti u create Appartments funkciju
        return redirect()->route('getAdminDashboard');
    }

    public function getAdminDashboard()
    {
        $admin = Admin::where('id' , Auth::guard('admin'))->with('buildings')->first();
        return view('admin.dashboard' , ['admin' => $admin]);
    }

    public function createApartments()
    {
        for($i=1; $i<= $building->number_of_appartments;$i++){
            $user = new User();
            $user->username = "Stan".$i;
            $user->password = "newpass";
            $user->building_id = $bid;
            $user->save();
        }
    }








}
