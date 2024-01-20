<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|max:255',
            'username' => 'required|max:255',
            'role_id' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register.index')->withErrors($validator, 'register');
        }

        User::create([
            // 'name' => $request->name,
            'username' => $request->username,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }
}