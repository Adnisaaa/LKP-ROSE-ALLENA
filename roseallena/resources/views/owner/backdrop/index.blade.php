@extends('layouts.mainlayout')

@section('title', 'Data Backdrop')

@section('content')

{{-- PAGE TITLE --}}
<div class="pagetitle">

    <h1>Halaman Model Backdrop</h1>
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
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Backdrop</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Model</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_model }}</td>
                                    <td>
                                        <img src="{{ asset($item->gambar) }}" alt="Model Backdrop"
                                            style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    @if (Auth::user()->role_id == '1')
                                        <td> - </td>
                                    @else (Auth::user()->role_id == '2')
                                        <td>
                                            <a href="{{ route('backdrop.edit', $item->id) }}" class="btn btn-warning"><i
                                                    class="bi bi-pencil"> edit</i></a>
                                            <form action="{{ route('backdrop.destroy', $item->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3">
                                                    hapus</i></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
