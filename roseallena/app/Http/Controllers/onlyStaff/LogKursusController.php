<?php

namespace App\Http\Controllers\onlyStaff;

use App\Models\User;
use App\Models\Kursus;
use App\Models\LogKursus;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LogKursusController extends Controller
{
    public function index()
    {
        $data = LogKursus::all();
        if (Auth::user()->role_id == '1') {
            return view('owner.log_kursus.index', ['data' => $data]);
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.log_kursus.index', ['data' => $data]);
        }
        
    }

    public function create()
    {
        $user = User::where('role_id', 3)->get();
        $kursus = Kursus::all();
        return view('admin.log_kursus.create', ['user' => $user, 'kursus' => $kursus]);
    }

    public function store(Request $request)
    {   
        $logKursus = LogKursus::create([
            'tgl_kursus' => $request->tgl_kursus,
            'status_payment' => $request->status_payment,
            'user_id' => $request->user_id,
            'kursuses_id' => $request->kursuses_id,
        ]);

        // Mengakses data terkait melalui relasi
        $user = $logKursus->user;
        $kursus = $logKursus->kursus;

        return redirect()->route('log_kursus.index');
    }

    public function edit($id, Request $request)
    {
        // dd($log_kursu);

        // $data = LogKursus::find($log_kursu);
        // $user = User::where('role_id', 3)->get();

        $data = LogKursus::where('id', $id)->first();
        $user = User::where('role_id', 3)->get();
        $kursus = Kursus::all();

        return view('admin.log_kursus.edit', [
            'data' => $data,
            'user' => $user, 
            'kursus' => $kursus
            
            
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'tgl_kursus' => $request->tgl_kursus,
            'status_payment' => $request->status_payment,
            'user_id' => $request->user_id,
            'kursuses_id' => $request->kursuses_id,
        ];
        // Mengakses data terkait melalui relasi
        $logKursus = LogKursus::find($id);
        $logKursus->update($data);

        return redirect()->route('log_kursus.index')->with('success', 'Data Log berhasil diperbarui.');
    }

    public function show($id, Request $request)
    {
        // Ambil satu data berdasarkan ID
        $data = LogKursus::find($id);
    
        // Periksa apakah data ditemukan
        if ($data) {
            return view('admin.invoice.invoice_kursus', ['data' => $data]);
        } else {
            // Handle jika data tidak ditemukan
            return redirect()->route('log_kursus.index')->with('error', 'Data tidak ditemukan.');
        }
    }
    
    
    public function destroy($id)
    {
        LogKursus::where('id', $id)->delete();
        return redirect()->route('log_kursus.index');
    }
}