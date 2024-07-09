<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\User;


class AuthenticationController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            session()->flash('success', 'Logged in!');
            return redirect()->intended('/');
        }
        session()->flash('error', 'Invalid Credentials!');
        return back()->withErrors(['email' => 'Invalid credentials!']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'USER',
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);
            session()->flash('success', 'Registration Success!');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed Registration: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 422);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out!');
    }
}
