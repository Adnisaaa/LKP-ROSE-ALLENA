<?php

namespace App\Http\Controllers\onlyStaff;

use App\Models\LogBackdrop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LaporanBackdropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LogBackdrop::all();
        if (Auth::user()->role_id == '1') {
            return view('owner.laporan.laporan_backdrop', ['data' => $data]);
        }
        if (Auth::user()->role_id == '2') {
            return view('admin.laporan.laporan_backdrop', ['data' => $data]);
        }
        
    }

    public function filter(Request $request)
    {
        $tgl1 = $request->input('tanggal_awal');
        $tgl2 = $request->input('tanggal_akhir');
    
        $data = LogBackdrop::whereBetween('tanggal_sewa', [$tgl1, $tgl2])->get();
    
        return view('admin.laporan.laporan_backdrop', compact('data', 'tgl1', 'tgl2'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
