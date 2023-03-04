@extends('dashboard.layouts.main')

@section('container')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ ucwords($kp->pengajuan->data_mitra->data_ush->nama_ush) }}</h5>
      @if (session('flash_message_success'))
        <div class="alert alert-success">
          {{ session('flash_message_success') }}
        </div>
      @endif

      <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100 active" id="kartupiutang-tab" data-bs-toggle="tab" data-bs-target="#kartupiutang-justified" type="button" role="tab" aria-controls="kartupiutang" aria-selected="true">Kartu Piutang</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="angsuran-tab" data-bs-toggle="tab" data-bs-target="#angsuran-justified" type="button" role="tab" aria-controls="angsuran" aria-selected="false">Angsuran</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
      </ul>

      <div class="tab-content pt-2" id="myTabjustifiedContent">
        <div class="tab-pane fade show active" id="kartupiutang-justified" role="tabpanel" aria-labelledby="kartupiutang-tab">
          <div calss="card">
            <form class="row g-3  contact-form" action="/kartupiutang/{{ $kp->id }}" method="POST" enctype="multipart/form-data"  >
              @method('put')
              @csrf
              <div class="row mb-3" style="padding-top:25px">
                <label for="tgl_penyaluran" class="col-sm-3 col-form-label">Tanggal Penyaluran</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control @error('tgl_penyaluran') is-invalid  @enderror"  name="tgl_penyaluran"  value="{{ old('tgl_penyaluran',$kp->tgl_penyaluran) }}">
                    @error('tgl_penyaluran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="row mb-3" >
                <label for="no_kontrak" class="col-sm-3 col-form-label">Nomor Kontrak</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('no_kontrak') is-invalid  @enderror" id="no_kontrak" name="no_kontrak" value="{{ old('no_kontrak', $kp->no_kontrak) }}" >
                    @error('no_kontrak')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="row mb-3" >
                <label for="inputEmail3" class="col-sm-3 col-form-label">Besar Pinjaman</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control " id="inputText" value="{{ $kp->formatRupiah('pinjaman') }}" disabled>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sbbln" class="col-sm-3 col-form-label">Jangka Waktu Peminjaman (Bulan)</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('waktu') is-invalid  @enderror" name="waktu"  value=" {{ old('waktu',$kp->waktu) }}"  >
                    @error('waktu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="sbthn" class="col-sm-3 col-form-label">Suku Bunga Efektif /Tahun (%) </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('sb_thn') is-invalid  @enderror" name="sb_thn" onkeyup="bagi();" id="sb_thn" value="  {{ old('sb_thn',$kp->sb_thn) }}" > 
                    @error('sb_thn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="sbbln" class="col-sm-3 col-form-label">Suku Bunga Efektif /Bulan (%)</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control  @error('sb_bln') is-invalid  @enderror" name="sb_bln" id="sb_bln"  value=" {{ old('sb_bln',$kp->sb_bln) }}" >
                    @error('sb_bln')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ri-send-plane-fill"></i></i> Simpan </button>
            </form>
          </div>
          @if($kp->sb_bln != null)
            <div style="padding-top:25px; overflow-x:auto"> 
              <table class="table table-bordered" style="text-align:center">
                <thead>
                  <tr>
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
                    @for ( 
                      $i =1,
                      $sumpokok = 0,
                      $sumjasa = 0,
                      $sum = 0,
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
        </div>
        <div class="tab-pane fade" id="angsuran-justified" role="tabpanel" aria-labelledby="angsuran-tab">
          <div style="margin-top:35px">
            <table class="table table-striped">
              <thead>
                <th> No </th>
                <th> Tanggal Pembayaran </th>
                <th> Bank </th>
                <th> Jumlah </th>
                <th> Bukti </th>
                <th> Status </th>
              </thead>
              <tbody>
              @foreach ($pembayaran as $p )
                <tr>
                  <td> {{ $loop->iteration }} </td>
                  <td> {{ date('d M Y',strtotime($p->tgl)) }} </td>
                  <td> @if ($p->bank == 'bri') BRI
                          @else Mandiri
                        @endif
                  </td>
                  <td> {{ $p->formatRupiah('jumlah') }}</td>
                  
                  <td><button type="button" class="btn btn-primary btn-sm"> <a href="/bukti/{{ $p->id }}"style="color:white;"> Lihat </a></button></td>
                  
                  <td> @if ( $p->status == "menunggu")
                          <button type="button" class="btn btn-success btn-sm">Valid</button>
                          <button type="button" class="btn btn-danger btn-sm">Tidak Valid</button>
                        @elseif( $p->status == "valid") <span class="badge bg-success">Valid</span>
                        @else <span class="badge bg-danger">Tidak Valid</span>
                      
                  @endif</td>
                </tr>
              @endforeach
                <tr>
                  <th colspan="3">Total Pembayaran</th>
                  <th>Rp. {{ number_format($totpembayaran,0,',','.' )}}</th>
                </tr>
                <tr>
                  <th colspan="3">Sisa Tagihan</th>
                  <th>Rp. {{ number_format($sum - $totpembayaran,0,',','.') }}</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
            Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
        </div>
      
      
      </div>

      
        
      
    </div>
  </div>

    <script type='text/javascript'>
    function bagi(){
      var sb_thn = document.getElementById('sb_thn').value; 
      var result = parseFloat(sb_thn)/12;
      if (!isNaN(result)){
        document.getElementById('sb_bln').value=result;
      }
    }
    </script>
@endsection