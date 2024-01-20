@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <div class="pagetitle">
        {{-- PAGE TITLE --}}
        <h2>DASHBOARD</h2>
        <br>
        <h1>Selamat datang di dashboard admin LKP ROSE ALLENA ❤</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
    </div>
    <!-- End Page Title -->

{{-- CARD --}}
        <section class="section dashboard">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Akun Pengguna <span>| Data Peserta</span>
                                    </h5>
    
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                        >
                                            <i class="bi bi-person-lines-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                {{-- {{ \App\Models\User::where('role_id', 2)->count() }} --}}
                                                @if (Auth::user()->role_id == '1') 
                                                    {{ \App\Models\User::where('role_id', 2)->count() }}
                                                @else (Auth::user()->role_id == '2') 
                                                    {{ \App\Models\User::where('role_id', 3)->count() }}
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                       Data Kursus <span>| Paket</span>
                                    </h5>
    
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                        >
                                            <i class="bi bi-file-earmark"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ \App\Models\Kursus::all()->count() }}</h6> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Data Backdrop <span>| Desain</span>
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ \App\Models\Backdrop::all()->count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Log Daftar Kursus <span>| Jumlah</span>
                                    </h5>
    
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-clipboard2-pulse"></i>
                                            {{-- <i class="bi bi-people"></i> --}}
                                        </div>
                                        <div class="ps-3">
                                          <h6>{{ App\Models\LogKursus::all()->count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Log Sewa Backdrop <span>| Jumlah</span>
                                    </h5>
    
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                        >
                                            <i
                                                class="bi bi-clipboard2-pulse"
                                            ></i>
                                        </div>
                                        <div class="ps-3">
                                          <h6>{{ App\Models\LogBackdrop::all()->count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="filter">
    
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>
        </section>
    
@endsection