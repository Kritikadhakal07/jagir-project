<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.adminlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->is_admin) {
                return redirect()->route('admin.auth.dashboard');
            }
            Auth::logout();
        }
        return back()->withErrors(['email' => 'Wrong credentials']);
    }
}
