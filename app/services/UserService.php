<?php

namespace App\Services;

use App\Models\Signup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
   
    public function register(array $data): Signup
    {
        return Signup::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), 
            'privacy_consent' => $data['privacy_consent'],
        ]);
    }

    public function authenticate(array $credentials)
    {
        $user = Signup::where('email', $credentials['email'])->first(); 
    
        if ($user && Hash::check($credentials['password'], $user->password)) { 
            $token = $user->createToken('YourAppName')->plainTextToken; 
            return ['user' => $user, 'token' => $token];
        }
    
        return null; 
    }
    

}
