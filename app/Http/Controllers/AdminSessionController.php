<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminSessionController extends Controller
{
    public function index() {
        return view('Produk.Admin.loginAdmin');
    }

    public function login_prosesAdmin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            Log::info('Admin logged in: ' . Auth::guard('admin')->user()->email);
            return redirect()->intended('/dashboard_admin')->with('success', 'You have Successfully Logged In');
        } else {
            Log::warning('Admin login failed for email: ' . $request->email);
            return redirect()->route('loginAdmin')->with('failed', 'Invalid Credentials');
        }
    }

    public function registerAdmin() {
        return view('Produk.Admin.registerAdmin');
    }

    public function register_prosesAdmin(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Confirm password does not match',
        ]);

        $admin = Admin::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('admin')->login($admin, true);

        return redirect('/loginAdmin')->with('success', 'Registration Successful');
    }


    public function logoutAdmin() {
        Log::info('Admin logged out: ' . Auth::guard('admin')->user()->email);
        Auth::guard('admin')->logout();
        return redirect()->route('loginAdmin')->with('success', 'You have Successfully Logged Out');
    }
}

