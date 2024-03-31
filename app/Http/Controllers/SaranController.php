<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function saran()
    {
        $saran = Saran::latest()->get();
        return view('saran.saran', compact('saran'));
    }
}
