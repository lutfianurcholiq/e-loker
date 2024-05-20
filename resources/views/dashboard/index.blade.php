@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm">
            <div class="card-body">
              <h5 class="card-title text-primary">Selamat Datang <strong class="text-capitalize">{{ auth()->user()->name }}</strong>  🎉</h5>
              <p class="mb-4">
                Kamu Sudah Melamar Sebanyak <span class="fw-bold">{{ $jmlh_apply }}</span> perusahaan. Semangat Terus Pantang Menyerah Dalam Mencari Kerja 🎆.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-between col-12 mb-4 order-2">
      <div class="card order-1 shadow-sm" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-success">Status Diterima</h5>
          <h3 class="card-text">{{ $diterima }}</h3>
        </div>
      </div>

      <div class="card order-2 shadow-sm" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-secondary">Status Menunggu</h5>
          <h3 class="card-text">{{ $menunggu }}</h3>
        </div>
      </div>
      
      <div class="card order-3 shadow-sm" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-danger">Status Ditolak</h5>
          <h3 class="card-text">{{ $ditolak }}</h3>
        </div>
      </div>
    </div>
    
</div>
    
@endsection