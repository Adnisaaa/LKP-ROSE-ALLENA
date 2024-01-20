<?php

namespace App\Http\Controllers\onlyStaff;

use App\Models\User;
use App\Models\Backdrop;
use App\Models\LogBackdrop;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LogBackdropController extends Controller
{
    public function index()
    {
        $data = LogBackdrop::all();
        if (Auth::user()->role_id == '1') {
            return view('owner.log_backdrop.index', ['data' => $data]);
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.log_backdrop.index', ['data' => $data]);
        }
    }

    public function create()
    {
        $user = User::where('role_id', 3)->get();
        $backdrop = Backdrop::all();
        return view('admin.log_backdrop.create', ['user' => $user, 'backdrop' => $backdrop]);
    }
    
    public function store(Request $request)
    {
        // $path = 'uploads';
        // $file = $request->file('bukti_pembayaran');
        // $fileName = $file->getClientOriginalName();
    
        // $file->move($path, $fileName);
    
        // Validasi jika tanggal sewa yang baru tidak boleh sama dengan yang sudah ada
        $existingLogBackdrop = LogBackdrop::where('tanggal_sewa', $request->tanggal_sewa)->first();

        if ($existingLogBackdrop) {
            return redirect()->back()->with('error', 'Maaf, tanggal sewa sudah penuh.');
        }

        // Menggunakan relasi untuk menyimpan data terkait
        $logBackdrop = LogBackdrop::create([
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            // 'bukti_pembayaran' => $path . '/' . $fileName,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi' => $request->deskripsi,
            'status_payment' => $request->status_payment,
            'user_id' => $request->user_id,
            'backdrop_id' => $request->backdrop_id,
            'status_dikembalikan' => $request->status_dikembalikan,
            'total_dp' => $request->total_dp
        ]);
    
        // Mengakses data terkait melalui relasi
        $user = $logBackdrop->user;
        $backdrop = $logBackdrop->backdrop;
    
        return redirect()->route('log_backdrop.index')->with('success', 'Data Log berhasil ditambahkan.');
    }
    
    public function edit($id, Request $request)
    {
        $data = LogBackdrop::where('id', $id)->first();
        $user = User::where('role_id', 3)->get();
        $backdrop = Backdrop::all();
        
        return view('admin.log_backdrop.edit', ['data' => $data,'user' => $user, 'backdrop' => $backdrop]);
    }

    public function update(Request $request, $id)
    {
        // $path = 'uploads'; // Nama folder di dalam direktori public_html

        // $file = $request->file('bukti_pembayaran'); 
        // $fileName = $file->getClientOriginalName();

        // Upload the file to the public_html/uploads directory
        // $file->move($path, $fileName);

        $data = [
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            // 'bukti_pembayaran' => $path . '/' . $fileName,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi' => $request->deskripsi,
            'status_payment' => $request->status_payment,
            'user_id' => $request->user_id,
            'backdrop_id' => $request->backdrop_id,
            'status_dikembalikan' => $request->status_dikembalikan,
            'total_dp' => $request->total_dp
        ];
        
        // Mengakses data terkait melalui relasi
        $logBackdrop = LogBackdrop::find($id);
        $logBackdrop->update($data);

        return redirect()->route('log_backdrop.index')->with('success', 'Data Log berhasil diperbarui.');
    }

    public function show($id, Request $request)
    {
        $data = LogBackdrop::find($id);
    
        if (!$data) {
            return redirect()->route('log_backdrop.index')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('admin.invoice.invoice_backdrop', ['data' => $data]);
    
        if (request('output') == 'pdf'){
            $pdf = Pdf::loadView('admin.invoice.invoice_backdrop');
            return $pdf->download('invoice.pdf');
        }
    }
    

    public function destroy($id)
    {
        LogBackdrop::where('id', $id)->delete();
        return redirect()->route('log_backdrop.index');
    }
}
