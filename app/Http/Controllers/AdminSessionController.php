<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && $request->password == $admin->password) {
            Auth::guard('admin')->login($admin, true);
            return redirect('/dasbhoard_admin')->with('success', 'You have Successfully Logged In');
        } else {
            return redirect()->route('loginAdmin')->with('failed', 'Invalid Credentials');
        }
    }

    public function registerAdmin() {
        return view('Produk.Admin.registerAdmin');
    }

    public function register_prosesAdmin(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
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
        Auth::guard('admin')->logout();
        return redirect()->route('loginAdmin')->with('success', 'You have Successfully Logged Out');
    }
}
