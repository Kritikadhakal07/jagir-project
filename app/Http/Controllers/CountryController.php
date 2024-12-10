<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use App\Models\Country;

  

class CountryController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

     public function showSignupForm()
     {
         $countries = Country::all(); 
        //    dd($countries); 
         return view('signup', compact('countries'));
     }

}