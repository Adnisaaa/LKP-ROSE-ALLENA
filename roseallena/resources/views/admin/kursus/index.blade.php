@extends('layouts.mainlayout')

@section('title', 'Data Kursus')

@section('content')

{{-- PAGE TITLE --}}
<div class="pagetitle">
  <h1>Halaman Paket Kursus</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
  <div class="d-flex justify-content-end">
    <a href="{{ route('kursus.create') }}" class="btn btn-primary align-items-end" style="margin-right: 10px;"> + Tambah Data</a>
    <button class="btn btn-success btn-print" id="printButton">
      <i class="bi bi-printer"></i> Cetak Semua Data
    </button>

  </div>
</div>
<!-- End Page Title -->
  
@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif
    
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">List Data Kursus</h5>

          <!-- Table with stripped rows -->
          <div class="table-responsive">
            <table class="table datatable" id="datatable">
              <thead>
                <tr>
                  <th scope="col" class="text-center">No.</th>
                  <th scope="col" class="text-center">Nama Paket</th>
                  <th scope="col" class="text-center">Harga</th>
                  <th scope="col" class="text-center">Spesifikasi Paket</th>
                  <th scope="col" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->paket }}</td>
                    <td> Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->spesifikasi }}</td>
                    <td class="btn-group d-flex justify-content-center">
                      <a href="{{ route('kursus.edit', $item->id) }}" class="btn btn-warning"><i class="bi bi-pencil"> edit</i></a>
                      <form action="{{ route('kursus.destroy', $item->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"> hapus</i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
  
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Menambahkan event listener untuk tombol cetak
    var printButton = document.getElementById('printButton');
    printButton.addEventListener('click', function () {
      var dataToPrint = document.querySelectorAll('.datatable tbody tr');
      var printWindow = window.open('', '_blank');

      printWindow.document.write('<html><head><title>Cetak Data Kursus</title></head><body>');
      printWindow.document.write('<h1>List Paket Kursus</h1>');
      printWindow.document.write('<table border="1">');
      printWindow.document.write('<thead><tr><th>No.</th><th>Nama Paket</th><th>Harga</th><th>Spesifikasi Paket</th></tr></thead><tbody>');

      dataToPrint.forEach(function (row) {
        var columns = row.getElementsByTagName('td');
        printWindow.document.write('<tr>');
        for (var i = 0; i < columns.length - 1; i++) { // Exclude the last column (Action)
          printWindow.document.write('<td>' + columns[i].innerText + '</td>');
        }
        printWindow.document.write('</tr>');
      });

      printWindow.document.write('</tbody></table></body></html>');
      printWindow.document.close();
      printWindow.print();
    });
  });
</script>

  
        
    
@endsection