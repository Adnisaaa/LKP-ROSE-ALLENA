@extends('layouts.mainlayout')

@section('title', 'Edit Log Backdrop')

@section('content')
{{-- PAGE TITLE --}}
<div class="pagetitle">
    <h1>Edit Log Backdrop</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">General</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->
<div class="card">
    <div class="card-body">
        <form action="{{ route('log_backdrop.update', ['log_backdrop' => $data->id]) }}" method="POST" enctype="multipart/form-data">                
            @csrf
            @method('put')
            <div class="my-3">
                <label for="#nama_lengkap" class="form-label">Nama Lengkap</label>
                <select name="user_id" class="form-control" required="required">
                    @foreach ($user as $u)
                        <option value="{{ $u->id }}" {{ $u->id == $data->user_id ? 'selected' : '' }}>
                            {{ $u->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>            
            <div class="my-3">
                <label for="#backdrop" class="form-label">Model Backdrop</label>
                <select name="backdrop_id" id="backdrop_id" class="form-control" required="required">
                    @foreach ($backdrop as $b)
                        {{-- <option value="" disabled>{{ $data->backdrop_id->nama_model }}</option> --}}
                        <option value="{{ $b->id }}">{{ $b->nama_model }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-3">
                <label for="#tanggal_sewa" class="form-label">Tanggal Sewa</label>
                <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" value="{{ $data->tanggal_sewa }}" required>
            </div>
            <div class="my-3">
                <label for="#tanggal_sewa" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ $data->tanggal_kembali }}" required>
            </div>
            {{-- <div class="mb-3">
                <label for="#bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" value="{{ $data->bukti_pembayaran }}" required>
            </div> --}}
            <div class="mb-3">
                <label for="#status_payment" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $data->deskripsi }}" required>
            </div>
            <div class="mb-3">
                <label for="#backdrop_id" class="form-label">Harga Sewa</label>
                <input type="text" class="form-control" id="harga_sewa" name="harga_sewa" value="{{ $data->harga_sewa }}" required> {{-- readonly> --}}
            </div>
            <div class="mb-3">
                <label for="#bukti_dp" class="form-label">Status Payment</label>
                <select name="status_payment" class="form-control" id="status_payment">
                    <option value="" disabled>Pilih Status</option>
                    <option value="Lunas" {{ $data->status_payment == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                    {{-- <option value="Belum Lunas" {{ $data->status_payment == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option> --}}
                    <option value="DP" {{ $data->status_payment == 'DP' ? 'selected' : '' }}>DP</option></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="#total_dp" class="form-label">Nominal Pembayaran</label>
                <input type="number" class="form-control" id="total_dp" name="total_dp" value="{{ $data->total_dp }}" required>
            </div>
            <div class="mb-3">
                <label for="#status_dikembalikan" class="form-label">Status Dikembalikan</label>
                <select class="form-control" id="status_dikembalikan" name="status_dikembalikan" required>
                    <option value="" disabled >Pilih Status</option>
                    <option value="Sudah Kembali" {{ $data->status_dikembalikan == 'Sudah Kembali' ? 'selected' : '' }}>Sudah Kembali</option>
                    <option value="Menunggu" {{ $data->status_dikembalikan == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Sedang Dipinjam" {{ $data->status_dikembalikan == 'Sedang Dipinjam' ? 'selected' : '' }}>Sedang Dipinjam</option>
                </select>
            </div>            
            
            <div class="mt-5">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
