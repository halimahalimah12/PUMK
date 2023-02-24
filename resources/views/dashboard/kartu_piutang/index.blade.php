@extends('dashboard.layouts.main')

@section('container')
  <div class="card">
    <div class="card-body">
      @if ( $user->is_admin == 0 )
          @if($pengajuan == NULL )
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:30px">
                <i class="bi bi-exclamation-octagon me-1"></i>Kartu piutang anda belum ada , Silahkan <a href="/pengajuan" class="alert-link" > <ins> pengajuan </ins> </a>lakukan  terlebih dahulu.
              </div>
            @else
              @if ($pengajuan->status == "menunggu")
                  <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top:30px">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Kartu piutang anda belum ada.
                    Saat ini pengajuan anda masih ditahap menunggu verifikasi, Mohon tunggu hingga pengajuan disetujui.
                  </div>
                @elseif($pengajuan->status == "lulus_survei")
                  <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:30px">
                    <i class="bi bi-info-circle me-1"></i>Kartu piutang anda belum ada.Saat ini pengajuan anda masih ditahap 
                        lulus survei dan berkas, Mohon tunggu hingga pengajuan disetujui.
                  </div>
                @else
                  @if($kp->tgl_penyaluran == NULL && $kp->sb_bln == NULL && $kp->sb_thn == NULL && $kp->no_kontrak == NULL)
                      <h5 class="card-title1">KARTU PIUTANG</h5>
                        <h5 class="card-title1">PROGRAM KEMITRAAN BANDARA SULTAN THAHA</h5>
                        @if($kp->tgl_penyaluran ==  NULL)
                          @else
                            <p >Tanggal Penyaluran : {{ date('d-m-Y',strtotime($kp->tgl_penyaluran))  }}</p>
                        @endif
                        <p >Besar Pinjaman     : {{ ($kp->formatRupiah('pinjaman')) }}</p>
                        <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:30px">
                          <i class="bi bi-info-circle me-1"></i>Mohon tunggu karena kartu piutang anda belum dibuat.
                        </div>
                    @else
                      <button class="btn btn-primary" style="margin-top:12px; float:right" >
                        <a href="/cetak-kartu-piutang/{{ $kp->id}}" class="bi bi-printer" style="color:white" > </a>
                      </button>
                        <h5 class="card-title1">KARTU PIUTANG</h5>
                        <h5 class="card-title1">PROGRAM KEMITRAAN BANDARA SULTAN THAHA</h5>
                        <p >Tanggal Penyaluran : {{ date('d-m-Y',strtotime($kp->tgl_penyaluran))  }}</p>
                        <p >Besar Pinjaman     : {{ ($kp->formatRupiah('pinjaman')) }}</p>
                      <div style="padding-top:25px; overflow-x:auto">
                        <table class="table table-bordered " style="text-align:center">
                          <thead>
                            <tr >
                              <th rowspan="2" valign="middle">ANG ke</th>
                              <th colspan="2" scope="col">Tajuh Tempo</th>
                              <th colspan="3">Rincian Anggaran</th>
                              <th rowspan="2">Saldo</th>
                            </tr>
                            <tr>
                              <th scope="col">Bulan</th>
                              <th scope="col">Tahun</th>
                              <th scope="col">Pokok</th>
                              <th scope="col">Jasa Pinj 0.25%</th>
                              <th scope="col">Jumlah </th>
                            <tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>{{ $kp->formatRupiah('pinjaman') }}</td>
                            </tr>
                            <?php $sumpokok = 0;
                                  $sumjasa = 0;
                                  $sum = 0;
                            ?>
                            @for ( 
                              $i =1,
                              $saldoawal = $kp->pinjaman,
                              $saldo = $kp->pinjaman,
                              $sb_bln = $kp->sb_bln/100,
                              $waktu = $kp->waktu,
                              $pokok = $saldoawal/$waktu,
                              $jasa = $saldoawal*$sb_bln,
                              $jasa1= $jasa/2;
                              $i <= 24  ; $i++)
                                <tr>
                                <td scope="row">{{ $i}}</td>
                                <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F ") }}</td>
                                <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y ") }}</td>
                                <td>Rp.{{ number_format(round($pokok), 0, ',','.') }} </td>
                                @if($i <= 12 )
                                    <td>Rp. {{ number_format(round($jasa), 0, ',','.') }} </td>
                                    <td>Rp. {{ number_format(round($jumlah = $pokok+$jasa), 0, ',','.') }} </td>
                                    <?php  $sumjasa += $jasa; 
                                          $sum += $jumlah;
                                    ?>
                                  @else 
                                    <td>Rp. {{ number_format(round($jasa1), 0, ',','.') }} </td>
                                    <td>Rp. {{ number_format(round($jumlah = $pokok+$jasa1), 0, ',','.') }} </td>
                                    <?php  $sumjasa += $jasa1; 
                                            $sum += $jumlah;
                                    ?>
                                @endif
                                <td>Rp.{{ number_format(round($saldo = $saldo-$pokok), 0, ',','.') }}</td>
                              </tr>
                              <?php 
                                $sumpokok += $pokok;
                              ?>
                            @endfor
                              <tr>
                                <th colspan="3">Jumlah </th>
                                <th>Rp. {{ number_format(round($sumpokok), 0, ',','.') }}</th>
                                <th>Rp. {{ number_format(round($sumjasa), 0, ',','.') }}</th>
                                <th>Rp. {{ number_format(round($sum), 0, ',','.') }}</th>
                                <th></th>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                  @endif
              @endif
          @endif
        @else
          <h5 class="card-title">Kartu Piutang</h5>
          @if (session('flash_message_success'))
            <div class="alert alert-success">
              {{ session('flash_message_success') }}
            </div>
          @endif
          <div style="overflow-x:auto">
            <table class="table table-striped" id="datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Mitra</th>
                  <th scope="col">Nama Usaha</th>
                  <th >Besar Pinjaman </th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kp as $p )
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($p->pengajuan->data_mitra->nm) }}</td>
                    <td>{{ ucwords($p->pengajuan->data_mitra->data_ush->nama_ush) }}</td>
                    <td>{{ $p->formatRupiah('pinjaman') }}</td>                    
                    <td>
                      <a href="/kartupiutang/{{$p->id}}/edit" class="bi bi-file-earmark-text" ></a>
                      @if ($p->tgl_penyaluran != NULL && $p->no_kontrak != NULL && $p->sb_bln != NULL && $p->sb_thn != NULL)
                        <a href="/cetak-kartu-piutang/{{ $p->id }}" class="bi bi-printer" > </a>
                      @endif
                      {{-- <a href="/kartupiutang/hapus/{{ $p->id }}" class="bi bi-trash" onclick="return confirm('Apakah anda yakin ? ')"></a> --}}
                    </td> 
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      @endif
    </div>
  </div
@endsection