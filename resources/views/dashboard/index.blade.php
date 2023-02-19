@extends('dashboard.layouts.main')

@section('container')
  @if($user->is_admin ==0 )
      @if(session()-> has('success'))
          @if($mitra->scanktp == NULL && $mitra->tpt_lhr == NULL && $mitra->tgl_lhr == NULL && $mitra->sts_prk == NULL && $mitra->jk == NULL && $mitra->almt == NULL && $mitra->no_hp == NULL && $mitra->pddk == NULL && $mitra->jbt == NULL && $mitra->kursus == NULL && $mitra->no_ktp == NULL)
              <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding-bottom:1px">
                <p>
                  <i class="bi bi-emoji-smile"></i>
                  {{ session('success') }}  
                  <a href="/profil/" class="alert-link" > <ins> Klik </ins>  </a> untuk melengkapi data diri 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
            @else
              <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding-bottom:1px">
                <p>
                  <i class="bi bi-emoji-smile"></i>
                  {{ session('success') }}  {{-- Selamat Datang di Sistem Informasi PUMK. --}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
          @endif
        @else
      @endif
    @else
  @endif
  {{-- <div class="notice notice-info">
          <strong>Notice</strong> notice-info
      </div>

  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      Buku Paduan
  </div> --}}

  {{-- <div class="card">
              <div class="card-header">Alur Pengajuan</div>
              <div class="card-body">
              <div class="container">
              
              
                <table class="table " style="margin-top:10px" >
                  <thead>
                      <tr class="table-primary">
                          <th > 1. Pengajuan Survei 
                          </th> 
                      </tr>
                      <tr>
                      <td> Silahkan mengisi form survei
                      
                      
                      </td>    
                      </tr>
                  </thead>
                </table>
              </div>
              </div>          
  </div> --}}

@endsection