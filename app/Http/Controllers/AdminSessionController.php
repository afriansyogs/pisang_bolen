<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('loginAdmin')->with('success', 'You have Successfully Logged Out');
    }
}
