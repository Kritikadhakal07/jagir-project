<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Services\UserService;
// use Illuminate\Http\JsonResponse;

use App\Http\Requests\UserRequest;
use Rinvex\Country\CountryLoader;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    use ApiResponse;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function addUser(UserRequest $request)
    {
         $data = $request->validated();
        $user = $this->userService->register($data);
        
        return $this->success($user, 'User registered successfully!');
    }

    public function login(LoginRequest $request)
    {
        $userService = new UserService();
    $user = $userService->authenticate($request->validated());

    //dd($user); 

    if ($user) {
        $token = $user['token'];
        Session::put('user_token', $token); 

        //dd(Session::get('user_token')); 

       return redirect()->route('profile.form')->with('status', 'Login successful!');
    // return view('profile-form');
    }

    return redirect()->route('login')->withErrors(['message' => 'Invalid credentials.']);
       
    }

    public function showLoginForm()
    {
        return view('login'); 
    }

    public function showSignupForm()
    {
        // Load countries data
        $countries = CountryLoader::countries(); // This returns an array of countries

        return view('signup', compact('countries'));
    }
    

    // public function create()
    // {
    //     $countries = Countries::all();
    //     return view('signup', compact('countries'));
    // }
}
