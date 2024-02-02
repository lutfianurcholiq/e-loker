@extends('layouts.main')

@section('container')
    
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3 class="text-muted fw-bold">{{ $title }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="mx-auto d-block" src="{{ asset('assets/image/avatar/avatar-man.jpg') }}" alt="Foto Profile" width="50%" style="border-radius: 50%;">
                        <div class="text-center mt-2 p-2 fs-6 text fw-bold">
                            <p>{{ auth()->user()->name }}</p>
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
                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="First Name" value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Username</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="First Username" value="{{ old('username', $user->username) }}" readonly>
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Gender</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                                                <option value="">Select Gender</option>
                                                @if (old('gender', $user->gender) == 'male')
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                                
                                                @elseif(old('gender', $user->gender) == 'female')
                                                <option value="male">Male</option>
                                                <option value="female" selected>Female</option>
                                                
                                                @else
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                    
                                                @endif
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
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

@endsection