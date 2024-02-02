<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="{{ asset('assets/image/logo/logo e-loker.png') }}" alt="Logo" style="widht: 60px; height: 55px;"></a>
            </div>
            <h3 class="auth-title mb-3">Registrasi</h3>

            <form action="/registrasi" method="post">
                @csrf
                <div class="form-group position-relative mb-4">
                    <input type="text" id="name" name="name" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="text" id="email" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="text" id="username" name="username" class="form-control form-control-xl @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="text" id="role" name="role" class="form-control form-control-xl @error('role') is-invalid @enderror" hidden readonly value="">
                </div>
                <div class="form-group position-relative mb-4">
                    <select name="gender" id="gender" class="form-control form-control-xl @error('gender') is-invalid @enderror">
                        <option value="">Pilih Jenis Kelamin</option>
                        @if (old('gender') == 'male')
                        <option value="male" selected>Laki-laki</option>
                        <option value="female">Perempuan</option>
                        @elseif(old('gender') == 'female')
                        <option value="male">Laki-laki</option>
                        <option value="female" selected>Perempuan</option>
                        @else
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>

                        @endif
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-xl @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password">
                    @error('confirm_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-1">Sign Up</button>
            </form>
            <div class="text-center mt-4 text-md fs-5" style="margin-bottom: 0.6em;">
                <p class='text-gray-600'>Sudah Punya Akun? <a href="/login" class="font-bold">Log in Disini</a>.</p>
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
