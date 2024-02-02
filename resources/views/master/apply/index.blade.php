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
                            <li class="breadcrumb-item active" aria-current="page">Apply
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <p class="mb-0">Data Apply</p>
                </div> --}}
                <div class="card-body">
                    <a href="" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i> Add</a>
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Tanggal Apply</th>
                                <th>Media Apply</th>
                                <th>Status Apply</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apply as $ap)
                                @if ($ap->user_id == Auth::user()->id)
                                <tr class="text-capitalize">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $ap->nama_perusahaan }}</td>
                                    <td>{{ $ap->tgl_apply->format('d/m/Y') }}</td>
                                    <td>{{ $ap->media_apply }}</td>
    
                                    @if ($ap->status_apply == 'ditolak')
                                        <td><span class="badge text-bg-danger">{{ $ap->status_apply }}</span></td>
                                    @elseif($ap->status_apply == 'diterima')
                                        <td><span class="badge text-bg-success">{{ $ap->status_apply }}</span></td>
                                    @elseif($ap->status_apply == 'menunggu')
                                        <td><span class="badge text-bg-warning text-white">{{ $ap->status_apply }}</span></td>
                                    @elseif($ap->status_apply == 'baru apply')
                                        <td><span class="badge text-bg-primary">{{ $ap->status_apply }}</span></td>
                                    @elseif($ap->status_apply == 'sudah apply')
                                        <td><span class="badge text-bg-secondary">{{ $ap->status_apply }}</span></td>
                                    @endif
                                    <td>
                                        @if ($ap->status_apply == 'diterima' )
                                        <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                        @elseif($ap->status_apply == 'ditolak')
                                            <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                                        @else
                                            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-edit-status{{ $ap->id }}"><i class="fas fa-edit"></i></a>
                                            
                                        @endif
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-hapus{{ $ap->id }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Modal Edit --}}
                    @foreach ($apply as $ap)
                    <div class="modal fade" id="modal-edit-status{{ $ap->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Status Apply {{ auth()->user()->name }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/apply/{{ $ap->id }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="status_apply" class="mb-2">Status Apply</label>
                                            <select name="status_apply" id="status_apply" class="form-control @error('status_apply') is-invalid @enderror">
                                                <option value="">Pilih Status</option>
                                                @if (old('status_apply') == 'diterima')
                                                <option value="diterima" selected>Sudah Diterima</option>
                                                <option value="menunggu">Belum Diterima</option>
                                                <option value="ditolak">Ditolak</option>
                                                    
                                                @elseif(old('status_apply') == 'menunggu')
                                                <option value="diterima">Sudah Diterima</option>
                                                <option value="menunggu" selected>Belum Diterima</option>
                                                <option value="ditolak">Ditolak</option>
                                                
                                                @elseif(old('status_apply') == 'ditolak')
                                                <option value="diterima">Sudah Diterima</option>
                                                <option value="menunggu">Belum Diterima</option>
                                                <option value="ditolak" selected>Ditolak</option>

                                                @else
                                                <option value="diterima">Sudah Diterima</option>
                                                <option value="menunggu">Belum Diterima</option>
                                                <option value="ditolak">Ditolak</option>
                                                    
                                                @endif
                                            </select>
                                            @error('status_apply')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit Status</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapuus -->
                    <div class="modal fade" id="modal-hapus{{ $ap->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Konfirmasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin ingin menghapus lamaran {{ $ap->nama_perusahaan }}? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    <form action="/apply/{{ $ap->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- Modal Tambah --}}
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Data Apply</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/apply" method="POST" id="form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="mb-2">Nama Perusahaan</label>
                                            <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" placeholder="Ketik Nama Perusahaan" value="{{ old('nama_perusahaan') }}">
                                            @error('nama_perusahaan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="mb-2">Tanggal Apply</label>
                                            <input type="date" id="tgl_apply" name="tgl_apply" class="form-control @error('tgl_apply') is-invalid @enderror " value="{{ old('tgl_apply') }}">
                                            @error('tgl_apply')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="mb-2">Media Apply</label>
                                            <select name="media_apply" id="media_apply" class="select2 form-control @error('media_apply') is-invalid @enderror" data-placeholder="Pilih Media Apply">
                                                <option value="">Pilih Media</option>
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
                                        <div class="form-group">
                                            <label for="" class="mb-2">Status Apply</label>
                                            <select name="status_apply" id="status_apply" class="select2 form-control @error('status_apply') is-invalid @enderror" data-placeholder="Pilih Status">
                                                <option value="">Pilih Status</option>
                                                @if (old('status_apply') == 'baru apply')
                                                <option value="baru apply" selected>Baru Apply</option>
                                                <option value="sudah apply">Sudah Apply</option>
                                                
                                                @elseif(old('status_apply') == 'sudah apply')
                                                <option value="baru apply">Baru Apply</option>
                                                <option value="sudah apply" selected>Sudah Apply</option>
                                                
                                                @else
                                                <option value="baru apply">Baru Apply</option>
                                                <option value="sudah apply">Sudah Apply</option>
                                                    
                                                @endif
                                            </select>
                                            @error('status_apply')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection