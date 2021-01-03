<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

   
    public function index()
    {
        $userId= Auth::user()->email;
        $users = DB::connection('mysql')
      ->select("select * from users WHERE email= '$userId'");
        return view('home')
        ->with('user',$users);
       
    }


    public function update_profile(Request $request)
    {
        $name = $request->get('name');
        $lastname = $request->get('lastname');
        $email = $request->get('email');
       
        $street = $request->get('street');
        $city = $request->get('city');
        $country = $request->get('country');
       
        $userId= Auth::user()->email;

        $updatedUser= DB::connection('mysql')->table('users')
        ->where('email',$userId )
        ->update(['name' => $name,
            'lastname' => $lastname,
            'email' => $email,
            
            'street' => $street,
            'city' => $city,
            'country' => $country,
            
           
        ]);

    //return $updatedUser;
    return redirect('home')
    ->with('success', 'Profile has been successfully updated');
    }

   

}
