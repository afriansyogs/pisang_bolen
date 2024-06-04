<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // $dasboard = Dashboard::latest()->get();
        // return view('dashboard_user', compact('dashboard'));
        return view('user/dashboard_user');
    }
}
