<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    <div id="auth">
        
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <img src="{{ asset('assets/image/logo/logo e-loker.png') }}" alt="Logo" class="img-logo">
                    </div>
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                    
                    @endif
                    <h5 class="auth-title mb-3">Log in.</h5>
                    {{-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> --}}

                    <form method="post" action="/login">
                        @csrf
                        <div class="form-group position-relative mb-4">
                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror form-control-xl" placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative mb-4">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror form-control-xl" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> --}}
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-1" type="submit">Log in</button>
                    </form>
                    <div class="text-center mt-4 text-md fs-5" style="margin-bottom: 0.6em;">
                        <p class="text-gray-600">Belum Punya Akun? <a href="/registrasi" class="font-bold">Daftar Disini</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
