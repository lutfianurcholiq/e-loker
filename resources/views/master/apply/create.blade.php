@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col">
        <button class="btn btn-primary mb-3" onclick="buttonBack()"><i class="bx bx-arrow-back"></i> Kembali</button>
    </div>
</div>
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
        <div class="card mb-4">
            <div class="card-body">
                <form action="/apply" method="POST" id="form">
                    @csrf
                    <div class="row">
                        <div class="col mb-2">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" placeholder="Ketik Nama Perusahaan" value="{{ old('nama_perusahaan') }}">
                            @error('nama_perusahaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-2">
                        <label for="tgl_apply" class="form-label">Tanggal Apply</label>
                        <input type="date" id="tgl_apply" name="tgl_apply" class="form-control @error('tgl_apply') is-invalid @enderror " value="{{ old('tgl_apply') }}">
                        @error('tgl_apply')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-2">
                        <label for="media_apply" class="form-label">Media Apply</label>
                        <select name="media_apply" id="media_apply" class="form-select select2 @error('media_apply') is-invalid @enderror" data-placeholder="Pilih Media Apply">
                            <option></option>
                            @if (old('media_apply') == 'glints')
                            <option value="glints" selected>Glints</option>
                            <option value="linkedin">Linkedin</option>
                            <option value="jobstreet">Jobstreet</option>
                            <option value="other">Other</option>
                            
                            @elseif(old('media_apply') == 'linkedin')
                            <option value="glints">Glints</option>
                            <option value="linkedin" selected>Linkedin</option>
                            <option value="jobstreet">Jobstreet</option>
                            <option value="other">Other</option>
                            
                            @elseif(old('media_apply') == 'jobstreet')
                            <option value="glints">Glints</option>
                            <option value="linkedin">Linkedin</option>
                            <option value="jobstreet" selected>Jobstreet</option>
                            <option value="other">Other</option>

                            @elseif(old('media_apply') == 'other')
                            <option value="glints">Glints</option>
                            <option value="linkedin">Linkedin</option>
                            <option value="jobstreet">Jobstreet</option>
                            <option value="other" selected>Other</option>
                            
                            @else
                            <option value="glints">Glints</option>
                            <option value="linkedin">Linkedin</option>
                            <option value="jobstreet">Jobstreet</option>
                            <option value="other">Other</option>
                                
                            @endif
                        </select>
                        @error('media_apply')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-2">
                        <label for="status_apply" class="form-label">Status Apply</label>
                        <select name="status_apply" id="status_apply" class="form-select select2 @error('status_apply') is-invalid @enderror" data-placeholder="Pilih Status" readonly>
                            <option value="menunggu" selected>Menunggu</option>
                        </select>
                        @error('status_apply')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                    
                    <hr>

                    <button class="btn btn-primary mt-1 float-end">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection