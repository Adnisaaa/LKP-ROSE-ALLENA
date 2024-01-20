@extends('layouts.mainlayout')

@section('title', 'Edit Log Kursus')

@section('content')

    {{-- PAGE TITLE --}}
    <div class="pagetitle">
        <h1>Edit Log Kursus</h1>
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
            <form action="{{ route('log_kursus.update', ['log_kursu' => $data->id]) }}" method="POST" enctype="multipart/form-data">                
                @csrf
                @method('put')
                <div class="my-3">
                    <label for="#nama_lengkap" class="form-label">Nama Lengkap</label>
                    {{-- <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $data->user->nama_lengkap }}" disabled> --}}
                    <select name="user_id" class="form-control" required="required">
                        @foreach ($user as $u)
                            <option value="{{ $u->id }}" {{ $u->id == $data->user_id ? 'selected' : '' }}>
                                {{ $u->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label for="#tgl_kursus" class="form-label">Tanggal Kursus</label>
                    <input type="date" class="form-control" id="tgl_kursus" name="tgl_kursus" value="{{ $data->tgl_kursus }}" required>
                </div>
                <div class="mb-3">
                    <label for="#status_payment" class="form-label">Status Payment</label>
                    <select name="status_payment" class="form-control" id="status_payment">
                        <option value="" disabled>Pilih Status</option>
                        <option value="Lunas" {{ $data->status_payment == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                        <option value="Belum Lunas" {{ $data->status_payment == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                    </select>
                </div>
                <div class="my-3">
                    <label for="#kursuses_id" class="form-label">Paket Kursus</label>
                    <select name="kursuses_id" id="kursuses_id" class="form-control" required="required">
                        @foreach ($kursus as $b)
                            <option value="{{ $b->id }}" {{ $b->id == $data->kursuses_id ? 'selected' : '' }}>
                                {{ $b->paket }}
                            </option>
                        @endforeach
                    </select>
                </div>                
                <div class="mt-5">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
