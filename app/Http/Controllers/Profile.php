<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user) {
            return view('User.LoginRegisterLogoutProfile.profile', compact('user'));
        }

        return redirect()->route('login');
    }
}
