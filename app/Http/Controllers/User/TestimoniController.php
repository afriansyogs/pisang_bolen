<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TestimoniController extends Controller
{
    public function index() {
        return view('testimoni/user/testimoni');
    }
}
