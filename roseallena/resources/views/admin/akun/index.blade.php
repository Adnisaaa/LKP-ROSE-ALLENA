@extends('layouts.mainlayout')

@section('title', 'Data Akun')

@section('content')

{{-- PAGE TITLE --}}
<div class="pagetitle">
  <h1>Halaman Akun Pengguna</h1>
  {{-- {{ $users }} --}}
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
  <div class="d-flex justify-content-end">
    <a href="{{ route('akun.create') }}" class="btn btn-primary align-items-end"> + Tambah Data</a>
  </div>
</div>
<!-- End Page Title -->
  
<!-- Message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    

<section class="section">
  <div class="row">

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Akun Pengguna</h5>

          <!-- Table with stripped rows -->
          <table class="table datatable" id="datatable">
            <thead class="text-center">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($users as $akun)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $akun->username }}</td>
                <td>{{ $akun->email }}</td>
                <td>{{ $akun->nama_lengkap }}</td>
                <td>{{ $akun->alamat }}</td>
                <td>{{ $akun->no_hp }}</td>
                <td class="btn-group">
                  @if($akun->role_id != 1)
                  <a href="{{ route('akun.edit', $akun->id) }}" class="btn btn-warning"><i class="bi bi-pencil"> edit</i></a>
                  <form action="{{ route('akun.destroy', $akun->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"> hapus</i></button>
                  </form>
                  @endif
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