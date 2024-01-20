<?php

namespace App\Http\Controllers\onlyStaff;

use App\Models\Kursus;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{
    public function index()
    {
        $data = Kursus::all();
        if (Auth::user()->role_id == '1') {
            return view('owner.kursus.index', ['data' => $data]);
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.kursus.index', ['data' => $data]);
        }
    }

    public function create()
    {
        return view('admin.kursus.create');
    }

    public function store(Request $request)
    {
        Kursus::create([
            'paket' => $request->paket,
            'harga' => $request->harga,
            'spesifikasi' => $request->spesifikasi,
        ]);

        return redirect()->route('kursus.index');
    }

    public function show($id, Request $request)
    {
        $data = Kursus::find($id);
    
        if (!$data) {
            return redirect()->route('kursus.index')->with('error', 'Data tidak ditemukan.');
        }
    
        // return view('admin.brosur.brosur_kursus', ['data' => $data]);
    
        // if (request('output') == 'pdf'){
        //     $pdf = Pdf::loadView('admin.brosur.brosur_kursus');
        //     return $pdf->download('invoice.pdf');
        // }
    }

    public function edit($id, Request $request)
    {
        $data = Kursus::where('id', $id)->first();
        return view('admin.kursus.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {

        $data = [
            'paket' => $request->paket,
            'harga' => $request->harga,
            'spesifikasi' => $request->spesifikasi,
        ];
        
        // Lakukan pembaruan data sesuai dengan $id
        Kursus::where('id', $id)->update($data);

        // Redirect ke halaman yang diinginkan setelah pembaruan berhasil
        return redirect()->route('kursus.index')->with('success', 'Data kursus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Kursus::where('id', $id)->delete();
        return redirect()->route('kursus.index');
    }
}