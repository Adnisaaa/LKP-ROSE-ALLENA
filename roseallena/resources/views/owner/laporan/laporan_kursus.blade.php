@extends('layouts.mainlayout')

@section('title', 'Laporan Log Kursus Backdrop')

@section('content')

    {{-- PAGE TITLE --}}
    <div class="pagetitle">
        <h1>LAPORAN</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Laporan</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    
    <section class="section">
        <div class="row">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Laporan Log Kursus MakeUp</h3>
                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('laporan_kursus.filter') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Mulai Tanggal</label>
                                    <input autocomplete="off" type="date" name="tanggal_awal"
                                        class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Sampai Tanggal</label>
                                    <input autocomplete="off" type="date" name="tanggal_akhir"
                                        class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <br />
                                    <input type="submit" name="submit" value="TAMPILKAN"
                                        class="btn btn-sm btn-primary btn-block">
                                </div>
                            </div>
                            
                        </div>
                    </form>

                    <div class="card mt-5">
                        <!-- /.card-header -->
                        <div class="card-body py-5 ">
                            <table id="table" class="table ">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA LENGKAP</th>
                                        <th>TANGGAL KURSUS</th>
                                        <th>PAKET KURSUS</th>
                                        <th>HARGA PAKET</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @php $total = 0; @endphp
                                        @foreach ($data as $item)
                                            @php
                                                $total += $item->kursus->harga;
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->user->nama_lengkap }}</td>
                                                <td class="text-center">{{ $item->tgl_kursus }}</td>
                                                <td class="text-center">{{ $item->kursuses_id }}</td>
                                                <td class="text-left">
                                                    {{ 'Rp. ' . number_format($item->kursus->harga, 0, ',', '.') . ' ,-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <th colspan="3" class="text-right">TOTAL</th>
                                            <td class="text-center text-bold text-white bg-primary">
                                                {{ 'Rp. ' . number_format($total, 0, ',', '.') . ' ,-'}}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            
                            
                        </div>
                        <!-- /.card-body -->
                        {{-- <table class="table table-bordered table-striped">
                            <tr>
                                <th colspan="4" class="text-right">TOTAL</th>
                                <td class="text-center text-bold text-white bg-primary">
                                    {{ 'Rp. ' . number_format($total, 0, ',', '.') . ' ,-' }}</td>
                            </tr>
                        </table> --}}
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection
