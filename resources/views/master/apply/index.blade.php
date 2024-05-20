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
        <div class="col-12">
            <div class="card">
                <div class="card-datatable table-responsive">
                    {{-- <div class="card-header">
                        <p class="mb-0">Data Apply</p>
                    </div> --}}
                    <div class="card-body">
                        <a href="/apply/create" class="btn btn-primary mb-2"><i class="bx bx-plus"></i> Add</a>
                        <table class="datatables-basic table border-top table-striped" id="dataTable">
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
                                        <td>{{ $ap->tgl_apply  }}</td>
                                        <td>{{ $ap->media_apply }}</td>
        
                                        @if ($ap->status_apply == 'ditolak')
                                            <td><span class="badge bg-danger">{{ $ap->status_apply }}</span></td>
                                        @elseif($ap->status_apply == 'diterima')
                                            <td><span class="badge bg-success">{{ $ap->status_apply }}</span></td>
                                        @elseif($ap->status_apply == 'menunggu')
                                            <td><span class="badge bg-warning text-white">{{ $ap->status_apply }}</span></td>
                                        @elseif($ap->status_apply == 'baru apply')
                                            <td><span class="badge bg-primary">{{ $ap->status_apply }}</span></td>
                                        @elseif($ap->status_apply == 'sudah apply')
                                            <td><span class="badge bg-secondary">{{ $ap->status_apply }}</span></td>
                                        @endif
                                        <td>
                                            @if ($ap->status_apply == 'diterima' )
                                                <button class="btn btn-success"><i class="bx bx-check-circle"></i></button>
                                            @elseif($ap->status_apply == 'ditolak')
                                                <button class="btn btn-danger"><i class="bx bx-x-circle"></i></button>
                                            @else
                                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $ap->id }}"><i class="bx bx-edit"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>


                        {{-- Modal Edit --}}
                        @foreach ($apply as $ap)
                        <div class="modal fade" id="staticBackdrop{{ $ap->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit Status Apply Perusahaan {{ $ap->nama_perusahaan }}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/apply/{{ $ap->id }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col mb-2">
                                                <p class="text-capitalize">Status Saat ini : <b class="font-bold text-uppercase">{{ $ap->status_apply }}</b></p>
                                                <label for="status_apply" class="form-label">Status Apply</label>
                                                <select name="status_apply" id="status_apply" class="form-select @error('status_apply') is-invalid @enderror" data-placeholder="Pilih Media Apply">
                                                    <option>Pilih Status Apply</option>
                                                    @if (old('status_apply'))
                                                    <option value="diterima" selected>Diterima</option>
                                                    <option value="ditolak">Ditolak</option>
                                                    
                                                    @elseif(old('status_apply') == 'ditolak')
                                                    <option value="diterima">Diterima</option>
                                                    <option value="ditolak" selected>Ditolak</option>
    
                                                    @else
                                                    <option value="diterima">Diterima</option>
                                                    <option value="ditolak">Ditolak</option>
                                                        
                                                    @endif
                                                </select>
                                                @error('status_apply')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col mt-1">
                                                <div class="float-end">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit Status</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- end Modal Edit --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection