@extends('layouts.mainlayout')
{{-- @extends('layouts.app') --}}

@section('title', 'Dashboard')

@section('content')
    <div class="pagetitle">
        {{-- PAGE TITLE --}}
        <h1>Selamat datang Owner ❤</h1>
        {{-- <br>
         --}}
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
    </div>
    <!-- End Page Title -->

{{-- CARD --}}
    {{-- <div class="col-lg-12"> --}}
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
    
                                </div>
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Data User <span>| Peserta</span>
                                    </h5>
    
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                        >
                                            <i class="bi bi-person-lines-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ \App\Models\User::where('role_id', 2)->count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
    
                                </div>
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                       Paket Kursus <span>| Paket</span>
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
                                <div class="filter">
    
                                </div>
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Desain Backdrop <span>| Desain</span>
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
                                <div class="filter">
    
                                </div>
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Log Kursus <span>| Jumlah</span>
                                    </h5>
    
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                          <h6>{{ App\Models\LogKursus::all()->count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="filter">
    
                                </div>
    
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Log Backdrop <span>| Jumlah</span>
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
                        
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="filter">
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        {{-- </div> --}}
    
@endsection