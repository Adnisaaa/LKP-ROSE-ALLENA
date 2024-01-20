@extends('layouts.mainlayout')

@section('title', 'Tambah Data Backdrop')

@section('content')

{{-- PAGE TITLE --}}
<div class="pagetitle">
    <h1>Tambah Akun Pengguna Baru</h1>
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

        <form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <label for="#username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="#email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="#password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="#nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="mb-3">
                <label for="#alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="#no_hp" class="form-label">Nomor HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <input type="hidden" name="role_id" value="3" id="">

            <div class="mt-5">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>

    </div>
</div>

    
@endsection
