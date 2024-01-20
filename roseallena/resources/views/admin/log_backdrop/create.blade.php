@extends('layouts.mainlayout')

@section('title', 'Tambah Log Backdrop')

@section('content')
    {{-- PAGE TITLE --}}
    <div class="pagetitle">
        <h1>Tambah Log Backdrop Baru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form action="{{ route('log_backdrop.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="#backdrop_id" class="form-label">Backdrop</label>
                    <select name="backdrop_id" id="backdrop_id" class="form-control" required="required">
                        @foreach ($backdrop as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_model }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label for="#tanggal_sewa" class="form-label">Tanggal Sewa</label>
                    <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" required>
                </div>
                <div class="my-3">
                    <label for="#tanggal_sewa" class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
                </div>
                <div class="mb-3">
                    <label for="#status_payment" class="form-label">Deskripsi | panjang backdrop</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="#harga_sewa" class="form-label">Harga Sewa</label>
                    <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" required>
                </div>
                {{-- <div class="mb-3">
                <label for="#bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required></input>
            </div> --}}
                <div class="mb-3">
                    <label for="#status_payment" class="form-label">Status Payment</label>
                    <select name="status_payment" class="form-control" id="status_payment">
                        <option value="Lunas">
                            Lunas
                        </option>
                        {{-- <option value="Belum Lunas">
                            Belum Lunas
                        </option> --}}
                        <option value="DP">
                            DP
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="#total_dp" class="form-label">Nominal DP</label>
                    <input type="number" class="form-control" id="total_dp" name="total_dp" disabled>
                </div>
                <div class="mb-3">
                    <label for="#total_lunas" class="form-label">Nominal Pembayaran Lunas</label>
                    <input type="number" class="form-control" id="total_lunas" name="total_lunas" disabled>
                </div>

                <input type="hidden" name="status_dikembalikan" value="Menunggu">

                <div class="mt-5">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            let statusPaymentValue = "";
            // Menangkap perubahan pada pilihan status payment
            $('#status_payment').on('change', function() {
                var status_payment = $(this).val();
                // console.log(status_payment);
    
                statusPaymentValue = status_payment;
                // console.log(statusPaymentValue);
    
                let total_dp = $('#total_dp');
                let totalLunas = $('#total_lunas');
    
                // Memeriksa apakah pilihannya DP atau Lunas
                if (statusPaymentValue === "DP") {
                    // Input "Nominal DP" diaktifkan, "Nominal Pembayaran Lunas" dinonaktifkan
                    total_dp.prop('disabled', false);
                    totalLunas.prop('disabled', true);
                } else if (statusPaymentValue === "Lunas") {
                    // Input "Nominal DP" dinonaktifkan, "Nominal Pembayaran Lunas" diaktifkan
                    total_dp.prop('disabled', true);
                    totalLunas.prop('disabled', false);
                } else {
                    // Input "Nominal DP" dan "Nominal Pembayaran Lunas" dinonaktifkan
                    total_dp.prop('disabled', true);
                    totalLunas.prop('disabled', true);
                }
            });
        });
    </script>
    

<script>
    $(document).ready(function() {
        // Menangkap perubahan pada pilihan Tanggal Sewa
        $('#tanggal_sewa').on('change', function() {
            var tanggal_sewa = $(this).val();

            // Mengatur nilai minimum untuk Tanggal Kembali agar tidak kurang dari Tanggal Sewa
            $('#tanggal_kembali').attr('min', tanggal_sewa);

            // Mengisi otomatis nilai pada Tanggal Kembali menjadi h+3 dari Tanggal Sewa
            var tanggalKembali = new Date(tanggal_sewa);
            tanggalKembali.setDate(tanggalKembali.getDate() + 3); // Menambahkan 3 hari
            var formattedTanggalKembali = tanggalKembali.toISOString().split('T')[0];
            $('#tanggal_kembali').val(formattedTanggalKembali);
        });
    });
</script>


@endsection
