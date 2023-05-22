@extends('dashboard.layouts.main')

@section('container')
  @if($user->is_admin ==0 )
      @if(session()-> has('success'))
          @if($mitra->scanktp == NULL && $mitra->tpt_lhr == NULL && $mitra->tgl_lhr == NULL && $mitra->sts_prk == NULL && $mitra->jk == NULL && $mitra->almt == NULL && $mitra->no_hp == NULL && $mitra->pddk == NULL && $mitra->jbt == NULL && $mitra->kursus == NULL && $mitra->no_ktp == NULL)
              <div class="alert alert-info alert-dismissible fade show" role="alert" style="padding-bottom:1px">
                <p>
                  <i class="bi bi-emoji-smile"></i>
                  {{ session('success') }}  
                  <a href="/profil/" class="alert-link" > <ins> Klik </ins>  </a> untuk melengkapi data diri 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
            @else
              <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:60px">
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

    <section class="section ">
      <section class="section ">
        <div class="section-header">
              <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="row">

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

                {{-- menunggu ferifikasi pembayaran--}}
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <a href="/pembayaran"><h4>Sisa Piutang</h4></a>
                      </div>
                      <div class="card-body">
                      @if($kp != NULL)
                        @if($kp->totkp != NULL)
                          <h6>{{ $jmlhpem - $kp->totkp }}</h6>
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

                <!-- diagram grafis -->
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Reports <span>/Today</span></h5>
                      <div id="reportsChart"></div>
                      <script>
                        document.addEventListener("DOMContentLoaded", () => {
                          new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                              name: 'Sales',
                              data: [31, 40, 28, 51, 42, 82, 56],
                            }, {
                              name: 'Revenue',
                              data: [11, 32, 45, 32, 34, 52, 41]
                            }, {
                              name: 'Customers',
                              data: [15, 11, 32, 18, 9, 24, 11]
                            }],
                            chart: {
                              height: 350,
                              type: 'area',
                              toolbar: {
                                show: false
                              },
                            },
                            markers: {
                              size: 4
                            },
                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                            fill: {
                              type: "gradient",
                              gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                              }
                            },
                            dataLabels: {
                              enabled: false
                            },
                            stroke: {
                              curve: 'smooth',
                              width: 2
                            },
                            xaxis: {
                              type: 'datetime',
                              categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                            },
                            tooltip: {
                              x: {
                                format: 'dd/MM/yy HH:mm'
                              },
                            }
                          }).render();
                        });
                      </script>
                    </div>
                  </div>
                </div><!-- End Reports -->

                <!-- pembayaran -->
                <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                      <h5 class="card-title">Pembayaran</h5>
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mitra</th>
                            <th scope="col">Usaha</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ( $pembayarans as $p )
                              <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ ucwords($p->kartu_piutang->pengajuan->data_mitra->nm) }}</td>
                                <td>{{ ucwords($p->kartu_piutang->Pengajuan->data_mitra->data_ush->nama_ush) }}</td>
                                <td class="rupiah">{{ $p->jumlah }}</td>
                                <td> 
                                    @if($p->status == "menunggu")
                                        <a href="/pembayaran/valid/{{ $p->id }}"><button type="button" class="btn btn-success btn-sm"> Valid </button></a>
                                        <a href="/pembayaran/tidak-valid/{{ $p->id }}"><button type="button" class="btn btn-danger btn-sm"> Tidak Valid</button></a>
                                      @elseif( $p->status == "valid") <span class="badge bg-success">Valid</span>
                                      @else <span class="badge bg-danger">Tidak Valid</span>
                                    @endif
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div><!-- End Recent Sales -->

              </div>
            </div>
        </div>
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