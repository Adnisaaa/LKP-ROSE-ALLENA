<?php

namespace App\Http\Controllers\onlyStaff;

use App\Models\Backdrop;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BackdropController extends Controller
{
    public function index()
    {
        $data = Backdrop::all();
        if (Auth::user()->role_id == '1') {
            return view('owner.backdrop.index', ['data' => $data]);
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.backdrop.index', ['data' => $data]);
        }
    }

    public function create()
    {
        return view('admin.backdrop.create');
    }

    public function store(Request $request)
    {
        $path = 'uploads'; // Nama folder di dalam direktori public_html

        $file = $request->file('gambar');
        $fileName = $file->getClientOriginalName();

        // Upload the file to the public_html/uploads directory
        $file->move($path, $fileName);

        Backdrop::create([
            'nama_model' => $request->nama_model,
            'gambar' => $path . '/' . $fileName,
        ]);

        return redirect()->route('backdrop.index');
    }

    public function show($id, Request $request)
    {
        $data = Backdrop::find($id);
    
        if (!$data) {
            return redirect()->route('backdrop.index')->with('error', 'Data tidak ditemukan.');
        }
    
        // return view('admin.brosur.brosur_backdrop', ['data' => $data]);
    
        // if (request('output') == 'pdf'){
        //     $pdf = Pdf::loadView('admin.brosur.brosur_backdrop');
        //     return $pdf->download('invoice.pdf');
        // }
    }

    public function edit($id, Request $request)
    {
        $data = Backdrop::where('id', $id)->first();
        return view('admin.backdrop.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $path = 'uploads'; // Nama folder di dalam direktori public_html

        $file = $request->file('gambar');
        $fileName = $file->getClientOriginalName();

        // Upload the file to the public_html/uploads directory
          $file->move($path, $fileName);

        $data = [
            'nama_model' => $request->nama_model,
            'gambar' => $path . '/' . $fileName,
        ];

        Backdrop::where('id', $id)->update($data);

        return redirect()->route('backdrop.index')->with('success', 'Data backdrop berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Backdrop::where('id', $id)->delete();
        return redirect()->route('backdrop.index');
    }
}
