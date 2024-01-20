@extends('layouts.mainlayout')

@section('title', 'Data Log Kursus')

@section('content')

{{-- PAGE TITLE --}}
<div class="pagetitle">
  <h1>Halaman Log Daftar Kursus</h1>
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

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Log Kursus</h5>

          <!-- Table with stripped rows -->
          <table class="table datatable" id="datatable">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Hp</th>
                    <th scope="col">Tanggal Kursus</th>
                    <th scope="col">Status Payment</th>
                    <th scope="col">Paket Kursus</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->nama_lengkap }}</td>
                        <td>{{ $item->user->alamat }}</td>
                        <td>{{ $item->user->no_hp }}</td>
                        <td>{{ $item->tgl_kursus }}</td>
                        <td>{{ $item->status_payment }}</td>
                        <td>{{ $item->kursus->paket }}</td>

                        <td>
                          <a href="{{ route('log_kursus.show', $item->id) }}" class="btn btn-success" target="_blank"><i class="bi bi-printer"> cetak</i></a>
                          <a href="{{ route('log_kursus.edit', $item->id) }}" class="btn btn-warning"><i class="bi bi-pencil"> edit</i></a>
                          <form action="{{ route('log_kursus.destroy', $item->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"> hapus</i></button>
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