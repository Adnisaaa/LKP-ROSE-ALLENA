<?php

namespace App\Http\Controllers\onlyStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogKursus;

class LaporanKursusController extends Controller
{
    public function index()
    {
        $data = LogKursus::all();
        return view('admin.laporan.laporan_kursus', ['data' => $data]);
    }

    public function filter(Request $request)
    {
        $tgl1 = $request->input('tanggal_awal');
        $tgl2 = $request->input('tanggal_akhir');

        $data = LogKursus::whereBetween('tgl_kursus', [$tgl1, $tgl2])->get();

        return view('admin.laporan.laporan_kursus', compact('data', 'tgl1', 'tgl2'));
    }
}
