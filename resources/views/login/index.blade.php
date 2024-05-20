<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
{{-- head --}}
@include('layouts.header')
{{-- end head --}}

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder"><img src="{{ asset('assets/image/logo/logo e-catlok.png')}}" alt="Logo e-catlok" width="200px"></span>
                </a>
              </div>
              <!-- /Logo -->
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong class="text-center">{{ session('success') }}</strong>
                    </div>
                @endif
                <form id="formAuthentication" class="mb-3" action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username" autofocus value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password"
                            aria-describedby="password">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 mt-4">
                        <button class="btn btn-primary d-grid w-100" type="submit">Log In</button>
                    </div>
                </form>

              <p class="text-center">
                <span>Tidak Punya Akun?</span>
                <a href="/registrasi">
                  <span>Daftar Disini</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('template/assets/vendor/libs/jquery/jquery.js')}}.."></script>
    <script src="{{ asset('template/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('template/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ asset('template/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('template/assets/js/main.js')}}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
