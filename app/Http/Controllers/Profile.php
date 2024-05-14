<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('User.Login&Register.profile', compact('user'));
    }
}
