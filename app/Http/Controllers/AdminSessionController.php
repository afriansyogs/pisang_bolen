<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSessionController extends Controller
{
    public function index() {
        return view('User.LoginRegisterLogoutProfile.loginAdmin');
    }
}
