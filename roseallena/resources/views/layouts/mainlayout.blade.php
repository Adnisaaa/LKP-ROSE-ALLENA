<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | LKP Rose Allena</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo.png') }}" rel="logo">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatable/datatables.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="/assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">LKP Rose Allena</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->
                </ul>
            </nav><!-- End Icons Navigation -->
        </header>
        <!-- End Header -->

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar">
                    <!-- ======= Sidebar ======= -->
                    <aside id="sidebar" class="sidebar">
                            
                        <ul class="sidebar-nav" id="sidebar-nav">

                            <li class="nav-heading">Home</li>

                            <li class="nav-item @if (request()->route()->uri == 'admin') class='active' @endif">
                                <a class="nav-link " href="/admin">
                                    <i class="bi bi-grid"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li><!-- End Dashboard Nav -->
    
                            {{-- <li class="nav-heading">Pages</li> --}}
                            <li class="nav-heading">Menu</li>
                           
                            <li class="nav-item @if (request()->route()->uri == 'admin/akun') class='active' @endif">
                                <a class="nav-link collapsed" href="{{ route('akun.index') }}">
                                    <i class="bi bi-person"></i>
                                    <span>Akun Pengguna</span>
                                </a>
                            </li><!-- End Akun Pengguna Nav -->
    
                            <li class="nav-item @if (request()->route()->uri == 'admin/kursus') class='active' @endif">
                                <a class="nav-link collapsed" href="{{ route('kursus.index') }}">
                                    <i class="bi bi-file-earmark"></i>
                                    <span>Data Kursus</span>
                                </a>
                            </li><!-- End Data Kursus Nav -->
    
                            <li class="nav-item @if (request()->route()->uri == 'admin/backdrop') class='active' @endif">
                                <a class="nav-link collapsed" href="{{ route('backdrop.index') }}">
                                    <i class="bi bi-file-earmark"></i>
                                    <span>Data Backdrop</span>
                                </a>
                            </li><!-- End Data Backdrop Nav -->

                            <li class="nav-item @if (request()->route()->uri == 'admin/log_kursus') class='active' @endif">
                                <a class="nav-link collapsed" href="{{ route('log_kursus.index') }}">
                                    <i class="bi bi-people"></i>
                                    <span>Log Daftar Kursus</span>
                                </a>
                            </li><!-- End Log Kursus Nav -->
    
                            <li class="nav-item @if (request()->route()->uri == 'admin/log_backdrop') class='active' @endif">
                                <a class="nav-link collapsed" href="{{ route('log_backdrop.index') }}">
                                    <i class="bi bi-card-list"></i>
                                    <span>Log Sewa Backdrop</span>
                                </a>
                            </li><!-- End Log Sewa Nav -->
    
                            {{-- LOG MENU NAV --}}
                            {{-- <li class="nav-item">
                                <a
                                    class="nav-link collapsed"
                                    data-bs-target="#components-nav"
                                    data-bs-toggle="collapse"
                                    href="#"
                                >
                                <i class="bi bi-card-list"></i>
                                    <span>Log</span>
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </a>
                                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                                    <li class="@if (request()->route()->uri == 'admin/log_kursus') class='active' @endif">
                                        <a href={{ route('log_kursus.index') }}>
                                            <i class="bi bi-circle"></i><span>Log Daftar Kursus</span>
                                        </a>
                                    </li>
                                    <li class="@if (request()->route()->uri == 'admin/log_backdrop') class='active' @endif">
                                        <a href="{{ route('log_backdrop.index') }}">
                                            <i class="bi bi-circle"></i><span>Log Sewa Backdrop</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- END LOG MENU NAV --}}

                            <li class="nav-item">
                                <a
                                    class="nav-link collapsed"
                                    data-bs-target="#components-nav"
                                    data-bs-toggle="collapse"
                                    href="#"
                                >
                                    <i class="bi bi-menu-button-wide"></i>
                                    <span>Laporan</span>
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </a>
                                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                                    <li class="@if (request()->route()->uri == 'admin/akun') class='active' @endif">
                                        <a href="{{ route('laporan_kursus.index') }}">
                                            <i class="bi bi-circle"></i><span>Laporan Daftar Kursus</span>
                                        </a>
                                    </li>
                                    <li class="@if (request()->route()->uri == 'admin/akun') class='active' @endif">
                                        <a href="{{ route('laporan_backdrop.index') }}">
                                            <i class="bi bi-circle"></i><span>Laporan Sewa Backdrop</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- <li class="nav-item @if (request()->route()->uri == 'admin/backdrop') class='active' @endif">
                                <a class="nav-link collapsed" href="{{ route('laporan.index') }}">
                                    <i class="bi bi-file-earmark"></i>
                                    <span>Laporan Sewa Backdrop</span>
                                </a>
                            </li> --}}
    
    
    
                                {{-- <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-contact.html">
                                    <i class="bi bi-envelope"></i>
                                    <span>Contact</span>
                                </a>
                                </li><!-- End Contact Page Nav --> --}}
                    
                    
                                {{-- <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-faq.html">
                                    <i class="bi bi-question-circle"></i>
                                    <span>F.A.Q</span>
                                </a>
                                </li><!-- End F.A.Q Page Nav -->
                                
                                <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-login.html">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                    <span>Login</span>
                                </a>
                                </li><!-- End Login Page Nav --> --}}
    
    
                            <li class="nav-heading">Logout</li>

                            <li class="nav-item">
                                <a class="nav-link collapsed" href="/logout">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </aside><!-- End Sidebar-->
                </div>
    
                <div class="content">
                    <main id="main" class="main">
                        @yield('content')
                    </main>
                </div>
    
            </div>
        </div>
    

<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ 'assets/vendor/php-email-form/validate.js' }}"></script>

<script>
    $(document).ready(function() {
        // $(".edit").hide();
        $('#datatable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            "pageLength": 50,
            "responsive": true,
            "buttons": ["excel", "print","pdf"],
        }).buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
