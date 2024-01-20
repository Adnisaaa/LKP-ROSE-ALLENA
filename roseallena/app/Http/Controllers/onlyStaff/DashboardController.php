<?php

namespace App\Http\Controllers\onlyStaff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == '1') {
            return view('owner.dashboard');
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.dashboard');
        }
        // return redirect()->route('admin.dashboard');
    }
}
