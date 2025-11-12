<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthManager extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function loginPost(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(auth()->attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
            return redirect(route('login'))->with('error', 'Invalid credentials provided');
    }

    public function register() {
        return view('auth.register');
    }

    public function registerPost(Request $request) {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save()) {
            return redirect(route('login'))->with('success', 'Registration successful. Please login.');
        } else {
            return redirect(route('register'))->with('error', 'Registration failed. Please try again.');
        }
    }
}
