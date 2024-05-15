<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function index() {
        return view('user.LoginRegisterLogoutProfile.login');
    }

    public function login_proses(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => $request->username,
            'password' => $request->password,
        ];

        $remember = true;

        if(Auth::attempt($data, $remember)) {
            return redirect('/');
        } else {
            return redirect()->route('login')-> with('failed', 'Incorrect Username or Password');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have Successfully Logout');
    }

    public function register() {
        return view('user.LoginRegisterLogoutProfile.register');
    }

    public function register_proses(Request $request) {
        $request->validate([
            'username' => 'required',
            'nomor' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Confirm password does not match',
        ]);

        $data['name'] = $request->username;
        $data['number'] = $request->nomor;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);


        User::create($data);

        $login = [
            'name' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($login)) {
            return redirect('/login');
        } else {
            return redirect()->route('register')-> with('failed', 'Incorrect Username, Email or Password');
        }
    }
}
