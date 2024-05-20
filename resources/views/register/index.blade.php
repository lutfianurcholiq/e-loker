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
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="__blank" class="app-brand-link gap-2">
                    <img src="{{ asset('assets/image/logo/logo e-catlok.png')}}" alt="Logo e-catlok" width="200px">
                </a>
              </div>
              <!-- /Logo -->

              <form id="formAuthentication" class="mb-3" action="/registrasi" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama" autofocus value="{{ old('name') }}">
                      @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username" autofocus value="{{ old('username') }}">
                      @error('username')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                  </div>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}"/>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select select2 @error('gender') is-invalid @enderror" id="gender" name="gender"  data-placeholder="Pilih Jenis Kelamin">
                        <option></option>
                        @if (old('gender') == 'laki-laki')
                          <option value="laki-laki" selected>Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        @elseif (old('gender') == 'perempuan')
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan" selected>Perempuan</option>
                        @else
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        @endif
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                  <div class="col-lg-6">
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
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Masukkan Confirm Password">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                  </div>
                </div>
        
                <button class="btn btn-primary d-grid w-100 mb-4" type="submit">Daftar</button>
              </form>

              <p class="text-center">
                <span>Tidak Punya Akun?</span>
                <a href="/login">
                  <span>Daftar Disini</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('template/assets/vendor/libs/jquery/jquery.js')}}"></script>
    {{-- <script src="{{ asset('template/assets/vendor/libs/popper/popper.js')}}"></script> --}}
    <script src="{{ asset('template/assets/vendor/js/bootstrap.js')}}"></script>
    {{-- <script src="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script> --}}

    {{-- <script src="{{ asset('template/assets/vendor/js/menu.js')}}"></script> --}}
    <!-- endbuild -->

    <!-- Vendors JS -->
    {{-- Select2 Bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('template/assets/js/main.js')}}"></script>


    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
