<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register()
    {
        return view("register");
    }

    public function store(Request $request)
    {
        $hashedPassword = Hash::make($request->password);
        $employee = new User();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->password = $hashedPassword;
        $employee->save();
        return redirect()->back()->with('success', 'Employee registered successfully!');
    }


    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->user_type === 'admin') {
                // Redirect admin users to the admin dashboard
                return view('dashboard');
            } elseif ($user->user_type === 'user') {
                // Redirect regular users to their dashboard
                return view('user_dashboard');
            } else {
                // Handle other user types or scenarios here
                return redirect()->intended('/');
            }
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Redirect to desired page after logout
    }
}
