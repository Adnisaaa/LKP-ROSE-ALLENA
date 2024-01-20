<?php

namespace App\Http\Controllers\onlyStaff;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function index()
    {
        // Mendapatkan role_id pengguna yang terautentikasi
        $userRole = Auth::user()->role_id;

        // Inisialisasi array kosong untuk menyimpan data pengguna yang akan ditampilkan
        $users = [];

        // Jika pengguna adalah owner (role_id == 1), tampilkan data role 2 (admin)
        if ($userRole == '1') {
            $users = User::whereIn('role_id', [2])->get();
            return view('owner.akun.index', ['users' => $users]);
            // return redirect()->route('owner.akun.index', ['users' => $users])->with('success', 'Berhasil menambahkan Admin baru.');
        }

        // Jika pengguna adalah admin (role_id == 2), tampilkan data role 3 (pengunjung)
        if ($userRole == '2') {
            $users = User::whereIn('role_id', [3])->get();
            return view('admin.akun.index', ['users' => $users]);
            // return redirect()->route('admin.akun.index', ['users' => $users])->with('success', 'Berhasil meenambahkan Admin baru.');
        }
    }


    // public function index()
    // {
    //     // data yg ditampilkan role 2 & 3
    //     $users = User::whereIn('role_id', [2, 3])->get();
    //     if (Auth::user()->role_id == '1') {
    //         return view('owner.akun.index', ['users' => $users]);
    //     }
    //     if (Auth::user()->role_id == '2') {
    //         return view('admin.akun.index', ['users' => $users]);
    //     }
        
    // }

    public function create()
    {
        if (Auth::user()->role_id == '1') {
            return view('owner.akun.create')->with('success', 'Berhasil menambahkan Admin baru.');
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.akun.create')->with('success', 'Berhasil menambahkan Pengguna baru.');
        }
        
    }

    public function store(Request $request) {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'role_id' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);


        if ($validator->fails()) {
            return redirect()->route('akun.create')
            ->withErrors($validator)
            ->withInput();
        }
        
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);
        return redirect()->route('akun.index');
    }

    public function show($id)
    {
        if (Auth::user()->role_id == '1') {
            return view('owner.backdrop.edit');
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.backdrop.edit');
        }
        
    }

    public function edit($id, Request $request)
    {
        $data = User::where('id', $id)->first();
        if (Auth::user()->role_id == '1') {
            return view('owner.akun.edit', ['data' => $data]);
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.akun.edit', ['data' => $data]);
        }
        
    }

    public function update(Request $request, $id)
    {
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ];

        // Melakukan pembaruan data dashboard
        User::where('id', $id)->update($data);

        // Redirect ke halaman Akun Pengguna
        return redirect()->route('akun.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('akun.index');
    }
}
