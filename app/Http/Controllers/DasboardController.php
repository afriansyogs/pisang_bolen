<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DasboardController extends Controller
{
    public function index(): View
    {
        // $dasboard = Dasboard::latest()->get();
        // return view('dasboard_user', compact('dasboard'));
        return view('dasboard_user');
    }
}
