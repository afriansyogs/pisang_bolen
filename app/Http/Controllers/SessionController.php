<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{

    function index() {
        return view('Login&Register.login');
    }

    function login(Request $request) {
        Session::flash('username', $request->username);
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ], [
            'username.required'=>'Username wajib di isi',
            'password.required'=>'Password wajib di isi'
        ]);

        $infoLogin = [
            'username'=>$request->username,
            'password'=>$request->password
        ];

        if(Auth::attempt($infoLogin)) {
            return redirect('dashboard_user')->with('success', 'Berhasil Login');
        } else {
            return redirect('sesi')->withErrors('Username dan Pssword yang dimasukkan tidak valid');
        }
    }
}
