@extends('layouts.mainlayout')

@section('title', 'Data Log Sewa')

@section('content')

    {{-- PAGE TITLE --}}
    <div class="pagetitle">
        <h1>Halaman Log Sewa Backdrop</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">Log Backdrop</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor HP</th>
                                <th scope="col">Tanggal Sewa</th>
                                <th scope="col">Tanggal Kembali</th>
                                {{-- <th scope="col">Bukti Pembayaran</th> --}}
                                <th scope="col">Harga Sewa</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Status Payment</th>
                                <th scope="col">Model Backdrop</th>
                                <th scope="col">Status Dikembalikan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->nama_lengkap }}</td>
                                    <td>{{ $item->user->alamat }}</td>
                                    <td>{{ $item->user->no_hp }}</td>
                                    <td>{{ $item->tanggal_sewa }}</td>
                                    <td>{{ $item->tanggal_kembali }}</td>
                                    {{-- <td>
                                        <img src="{{ asset($item->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                                            style="max-width: 100px; max-height: 100px;">
                                    </td> --}}
                                    <td>Rp. {{ number_format($item->harga_sewa, 0, ',', '.') }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->status_payment }}</td>
                                    <td>{{ $item->backdrop->nama_model }}</td>
                                    <td>{{ $item->status_dikembalikan }}</td>
                                    <td>
                                        <a href="{{ route('log_backdrop.show', $item->id) }}" class="btn btn-success" target="_blank"><i
                                                class="bi bi-printer"> cetak</i></a>
                                        <a href="{{ route('log_backdrop.edit', $item->id) }}" class="btn btn-warning"><i
                                                class="bi bi-pencil"> edit</i></a>
                                        <form action="{{ route('log_backdrop.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash3">
                                                    hapus</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </section>
@endsection
