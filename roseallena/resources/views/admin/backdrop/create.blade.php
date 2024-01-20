@extends('layouts.mainlayout')

@section('title', 'Tambah Data Backdrop')

@section('content')

{{-- PAGE TITLE --}}
<div class="pagetitle">
    <h1>Tambah Model Backdrop Baru</h1>
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
        <form action="{{ route('backdrop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <label for="#model" class="form-label">Nama Model</label>
                <input type="text" class="form-control" id="nama_model" name="nama_model" required>
            </div>
            <div class="mb-3">
                <label for="#gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <div class="mt-5">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection
