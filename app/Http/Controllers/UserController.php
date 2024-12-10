<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Webpatser\Countries\Countries;

class UserController extends Controller
{
    use ApiResponse;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function addUser(UserRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->userService->register($data);
    
        return $this->success($user, 'User registered successfully!');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->userService->authenticate($request->validated());

       
        if ($user) {
            
            $redirectUrl = route('profile.form');
            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'data' => [
                    'user' => $user['user'],
                    'token' => $user['token'],
                    'redirect_url' => $redirectUrl
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials.'
        ], 401);
    }

    // public function create()
    // {
    //     $countries = Countries::all();
    //     return view('signup', compact('countries'));
    // }
}
