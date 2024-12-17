<?php
namespace App\Services;

use App\Models\Signup;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @return Signup
     */
    public function register(array $data): Signup
    {
        return Signup::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Authenticate a user based on provided credentials.
     *
     * @param array $credentials
     * @return array|null
     */
    public function authenticate(array $credentials): ?array
    {
        $user = Signup::where('email', $credentials['email'])->first();
        //dd($user);
        if ($user && Hash::check($credentials['password'], $user->password)) {
            $token = $user->createToken('YourAppName')->plainTextToken;
            return ['user' => $user, 'token' => $token];
        }

       
        \Log::warning('Invalid login attempt with email: ' . $credentials['email']);

        return null;
    }
}
