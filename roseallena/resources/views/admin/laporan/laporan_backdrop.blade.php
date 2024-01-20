@extends('layouts.mainlayout')

@section('title', 'Laporan Log Sewa Backdrop')

@section('content')

    {{-- PAGE TITLE --}}
    <div class="pagetitle">
        <h1>LAPORAN - Log Backdrop</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Laporan Log Sewa Backdrop</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">

            <div class="box box-info">
                <div class="box-body">
                    <form method="post" action="{{ route('laporan_backdrop.filter') }}" enctype="multipart/form-data">
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
                                        <th>TANGGAL SEWA</th>
                                        <th>TANGGAL KEMBALI</th>
                                        <th>HARGA SEWA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @php $total = 0; @endphp
                                        @foreach ($data as $item)
                                            @php
                                                $total += $item->harga_sewa;
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->user->nama_lengkap }}</td>
                                                <td class="text-center">{{ $item->tanggal_sewa }}</td>
                                                <td class="text-center">{{ $item->tanggal_kembali }}</td>
                                                <td class="text-left">
                                                    {{ 'Rp. ' . number_format($item->harga_sewa, 0, ',', '.') . ' ,-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <th colspan="3" class="text-right">TOTAL</th>
                                            <td class="text-center text-bold text-white bg-primary">
                                                {{ 'Rp. ' . number_format($total, 0, ',', '.') . ' ,-' }}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection