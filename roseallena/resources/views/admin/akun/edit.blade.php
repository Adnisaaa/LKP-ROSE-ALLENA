@extends('layouts.mainlayout')

@section('title', 'Edit Data Backdrop')

@section('content')

{{-- PAGE TITLE --}}
<div class="pagetitle">
    <h1>Edit Akun Pengguna</h1>
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

  <form action="{{ route('akun.update', $data->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="my-3">
        <label for="#username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}" required>
    </div>
    <div class="mb-3">
        <label for="#email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
    </div>
    <div class="mb-3">
        <label for="#no_hp" class="form-label">Nomor HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $data->no_hp }}" required>
    </div>
    <div class="mb-3">
        <label for="#nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $data->nama_lengkap }}" required>
    </div>
    <div class="mb-3">
        <label for="#alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}" required>
    </div>
      <div class="mt-5">
          <button class="btn btn-primary" type="submit">Update</button>
      </div>
  </form>
</div>
</div>
@endsection