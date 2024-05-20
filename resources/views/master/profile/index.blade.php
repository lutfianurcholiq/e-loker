@extends('layouts.main')

@section('container')
    
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="fw-bold mb-0">{{ $title }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img class="mx-auto d-block" src="{{ asset('assets/image/avatar/avatar-man.jpg') }}" alt="Foto Profile" width="50%" style="border-radius: 50%;">
                            <div class="text-center mt-2 p-2 fs-6 text fw-bold">
                                <p class="font-capitalize">{{ auth()->user()->name }}</p>
                                <p>{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @foreach ($users as $user)
                                @if ($user->id == Auth::user()->id)
                                <form class="form form-horizontal" method="post" action="/profile/{{ $user->id }}">
                                    @method('put')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <label class="form-label">Name</label>
                                            </div>
                                            <div class="col-md-8 mb-2">
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="First Name" value="{{ old('name', $user->name) }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <label class="form-label">Username</label>
                                            </div>
                                            <div class="col-md-8 mb-2">
                                                <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="First Username" value="{{ old('username', $user->username) }}" readonly>
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <label class="form-label">Email</label>
                                            </div>
                                            <div class="col-md-8 mb-2">
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <label class="form-label">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-8 mb-2">
                                                <select name="gender" id="gender" class="form-select select2 @error('gender') is-invalid @enderror" data-placeholder="Pilih Jenis Kelamin">
                                                    <option></option>
                                                    @if (old('gender', $user->gender) == 'laki-laki')
                                                    <option value="laki-laki" selected>Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                    
                                                    @elseif(old('gender', $user->gender) == 'perempuan')
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
                                            <div class="col-md-4 mt-3">
                                                <label class="form-label">Password</label>
                                            </div>
                                            <div class="col-md-8 mb-2">
                                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <p class="text-danger">*no required</p>
                                            </div>
    
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection