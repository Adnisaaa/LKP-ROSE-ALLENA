@extends('layouts.mainlayout')

@section('title', 'Edit Data Kursus')

@section('content')

{{-- PAGE TITLE --}}
<div class="pagetitle">
    <h1>Edit Paket Kursus</h1>
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
  
    <form action="{{ route('kursus.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="my-3">
            <label for="#paket" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="paket" name="paket" value="{{ $data->paket }}" required>
        </div>
        <div class="mb-3">
            <label for="#harga" class="form-label">Harga Paket</label>
            <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}" required>
        </div>
        <div class="mb-3">
            <label for="#spesifikasi" class="form-label">Spesifikasi</label>
            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="{{ $data->spesifikasi }}" required>
        </div>
        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
  </div>
</div>

    

@endsection