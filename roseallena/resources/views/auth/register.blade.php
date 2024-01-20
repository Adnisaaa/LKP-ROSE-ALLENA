@extends('layouts/authlayout')

@section('authcontent')
<div class="container">

  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                <p class="text-center small">Masukkan detail pribadi untuk membuat akun</p>
              </div>

              <form class="row g-3 needs-validation" action="{{ route('register.store') }}" method="post" nonvalidate>
                @csrf
                {{-- <div class="col-12">
                  <label for="yourName" class="form-label">Nama Lengkap</label>
                  <input type="text" name="name" class="form-control" id="yourName" required>
                  <div class="invalid-feedback">Please, enter your name!</div>
                </div> --}}

                <div class="col-12">
                  <label for="yourUsername" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <input type="text" name="username" class="form-control" id="yourUsername" placeholder="masukkan username" required>
                    <div class="invalid-feedback">Please choose a username.</div>
                  </div>
                </div>
                
                <div class="col-12">
                  <label for="yourEmail" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="yourEmail" placeholder="masukkan email" required>
                  <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="yourPassword" placeholder="masukkan password" required>
                  <div class="invalid-feedback">Please enter your password!</div>
                </div>
                <input type="hidden" name="role_id" value="2" id="">

                {{-- <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                    <label class="form-check-label" for="acceptTerms">Saya setuju dan menerima <a href="#">syarat dan ketentuan</a></label>
                    <div class="invalid-feedback">You must agree before submitting.</div>
                  </div>
                </div> --}}
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">Sudah punya akun? <a href="/login">Login</a></p>
                </div>
              </form>

            </div>
          </div>

          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">❤</a>
          </div>

        </div>
      </div>
    </div>

  </section>

</div>
@endsection