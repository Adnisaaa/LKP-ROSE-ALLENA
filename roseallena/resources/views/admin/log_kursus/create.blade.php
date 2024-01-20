@extends('layouts.mainlayout')

@section('title', 'Tambah Log Kursus')

@section('content')

    {{-- PAGE TITLE --}}
    <div class="pagetitle">
        <h1>Tambah Log Kursus Baru</h1>
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
            <form action="{{ route('log_kursus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-3">
                    <label for="#nama_lengkap" class="form-label">Nama Lengkap</label>
                    <select name="user_id" class="form-control" required="required">
                        @foreach ($user as $u)
                            <option value="{{ $u->id }}">{{ $u->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label for="#tgl_kursus" class="form-label">Tanggal Kursus</label>
                    <input type="date" class="form-control" id="tgl_kursus" name="tgl_kursus" required>
                </div>
                <div class="mb-3">
                    <label for="#status_payment" class="form-label">Status Payment</label>
                    <select name="status_payment" class="form-control" id="status_payment">
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                </div>
                <div class="my-3">
                    <label for="#kursus" class="form-label">Paket</label>
                    <select name="kursuses_id" id="kursuses_id" class="form-control" required="required">
                        @foreach ($kursus as $p)
                            <option value="{{ $p->id }}">{{ $p->paket }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
      </div>
    </div>

@endsection