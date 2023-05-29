@extends('dashboard.layouts.main')

@section('container')
  @if($user->is_admin ==0 )
      

    <section class="section ">
      <section class="section ">
        <div class="section-header">
              <h1>Dashboard</h1>
        </div>
        @if(session()-> has('success'))
          @if($mitra->scanktp == NULL && $mitra->tpt_lhr == NULL && $mitra->tgl_lhr == NULL && $mitra->sts_prk == NULL && $mitra->jk == NULL && $mitra->almt == NULL && $mitra->no_hp == NULL && $mitra->pddk == NULL && $mitra->jbt == NULL && $mitra->kursus == NULL && $mitra->no_ktp == NULL)
              <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:10px; ">
                <p style="text-align:left;align-items:center">
                  <i class="bi bi-emoji-smile"></i>
                  {{ session('success') }}  
                  <a href="/profil/" class="alert-link" > <ins> Klik </ins>  </a> untuk melengkapi data diri 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
            @else
              <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:10px; ">
                <p style="text-align:left;align-items:center">
                  {{-- Selamat Datang di Sistem Informasi PUMK. --}}
                  <i class="bi bi-emoji-smile"></i>
                  {{ session('success') }}  
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
          @endif
          @else
        @endif

        @if($mitra->unreadNotifications->count() != NULL )
        <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:5px">
                <p style="text-align:left;align-items:center">
                  <i class="bi bi-info"></i> 
                  Mohon untuk mengecek notifikasi, karena ada notifikasi baru.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
        @endif


        <div class="section-body">
            <div class="row">
              <div class="row">

                {{-- Pengajuan diterima --}}
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pengajuan Diterima</h4>
                      </div>
                      <div class="card-body">
                        <h6>{{ $diterima }}</h6>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- sisa piutang--}}
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <a href="/pembayaran"><h4>Sisa Piutang</h4></a>
                      </div>
                      <div class="card-body">
                      @if($pengajuan != NULL)
                          @if($kp != NULL)
                            @if($kp->totkp != NULL)
                              <h6 class="rupiah">{{ abs($jmlhpem - $kp->totkp) }}</h6>
                              @else
                              <h6>0</h6>
                            @endif
                            @else
                              <h6>0</h6>
                          @endif
                        @else
                          <h6>0</h6>
                      @endif
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        </div>
      </section>
    </section>

    @else
    <section class="section ">
      <section class="section ">
        <div class="section-header">
              <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="row">

                {{-- mitra --}}
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Mitra</h4>
                      </div>
                      <div class="card-body">
                        {{ $jmlhmitra }}
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Pengajuan diterima --}}
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pengajuan Diterima</h4>
                      </div>
                      <div class="card-body">
                        <h6>{{ $diterima }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
                
                {{-- menunggu ferifikasi pengajuan --}}
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <a href="/pengajuan"><h4>Menunggu Verifikasi Pengajuan</h4></a>
                      </div>
                      <div class="card-body">
                        <h6>{{ $menunggu }}</h6>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- menunggu ferifikasi pembayaran--}}
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <a href="/pembayaran"><h4>Menunggu Verifikasi Pembayaran</h4></a>
                      </div>
                      <div class="card-body">
                        <h6>{{ $pembayaran }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <!-- diagram grafis -->
                @if(empty($mitra->kab) )
                  <div class="col-lg-6">
                    <div class="card" style="width:476px">
                      <div class="card-body">
                      {!! $chart->container() !!}
                      </div>
                    </div>
                  </div>
                @endif
                <!-- pembayaran -->
                <div class="col-6">
                  <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                      <h5 class="card-title">Pembayaran</h5>
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">Mitra</th>
                            <th scope="col">Bukti</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ( $pembayarans as $p )
                            @if($p->status == "menunggu")
                              <tr>
                                <th scope="row">{{ ucwords($p->kartu_piutang->pengajuan->data_mitra->nm) }}</th>
                                            <td><button type="button" class="btn btn-primary btn-sm"> <a href="/bukti/{{ $p->id }}"style="color:white;"> Lihat </a></button></td>
                                <td class="rupiah">{{ $p->jumlah }}</td>
                                <td> 
                                    
                                        <a href="/pembayaran/valid/{{ $p->id }}"><button type="button" class="btn btn-success btn-sm"> Valid </button></a>
                                        <a href="/pembayaran/tidak-valid/{{ $p->id }}"><button type="button" class="btn btn-danger btn-sm"> Tidak Valid</button></a>
                                </td>
                              </tr>
                            @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
        </div>
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}
      </section>
    </section>
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