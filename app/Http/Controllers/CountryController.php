<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rinvex\Country\CountryLoader;

class CountryController extends Controller
{

    public function showSignupForm()
{
    $countries = CountryLoader::countries(); // Load countries
    return view('signup', compact('countries'));
}

    
}
