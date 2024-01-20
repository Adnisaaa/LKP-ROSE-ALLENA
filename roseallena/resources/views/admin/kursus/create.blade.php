 @extends('layouts.mainlayout')

@section('title', 'Tambah Data Kursus')

@section('content')

 {{-- PAGE TITLE --}}
 <div class="pagetitle">
    <h1>Tambah Paket Kursus Baru</h1>
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
    
    <form action="{{ route('kursus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="my-3">
            <label for="#paket" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="paket" name="paket" required>
        </div>
        <div class="mb-3">
            <label for="#harga" class="form-label">Harga Paket</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="#spesifikasi" class="form-label">Spesifikasi</label>
            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" required>
        </div>
        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
    </form>
  </div>
</div>

            

@endsection