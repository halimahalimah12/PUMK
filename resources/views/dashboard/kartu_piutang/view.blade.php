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
          <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Kartu Piutang</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Angsuran</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
      </ul>

      <div class="tab-content pt-2" id="myTabjustifiedContent">
        <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
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
                  <input type="text" class="form-control @error('waktu') is-invalid  @enderror" name="waktu"  value="24 {{ old('waktu',$kp->waktu) }}"  >
                        @error('waktu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="sbthn" class="col-sm-3 col-form-label">Suku Bunga Efektif /Tahun (%) </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('sb_thn') is-invalid  @enderror" name="sb_thn" value=" 6 {{ old('sb_thn',$kp->sb_thn) }}" > 
                          @error('sb_thn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="sbbln" class="col-sm-3 col-form-label">Suku Bunga Efektif /Bulan (%)</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control  @error('sb_bln') is-invalid  @enderror" name="sb_bln" value=" 0.05{{ old('sb_bln',$kp->sb_bln) }}">
                        @error('sb_bln')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              
              <button type="submit" class="btn btn-primary"><i class="ri-send-plane-fill"></i></i> Kirim </button>
            </form>
          </div>
          @if($kp->sb_bln != null)
            <div style="padding-top:25px; overflow-x:auto"> 
              <table class="table table-bordered" style="text-align:center">
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
                    <th scope="col">Jasa Pinj 0.25%</th>
                    <th scope="col">Pokok</th>
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
                        $sumsaldo =0;
                        ?>
                    @for ( 
                      $i =1, 
                      $saldo = $kp->pinjaman,
                      $sb_bln = $kp->sb_bln/100,
                      $waktu = $kp->waktu,
                      $pembagi = 1-1/pow(1+$sb_bln,$waktu),
                      $jumlah = $saldo*$sb_bln/ $pembagi;
                      $i  <= 24 ; $i++)
                        <tr>
                        <td scope="row">{{ $i}}</td>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F ") }}</td>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y ") }}</td>
                        <td>Rp. {{ number_format(round($jasa=$saldo*$sb_bln), 0, ',','.') }} </td>
                        <td>Rp.{{ number_format(round($pokok=$jumlah-$jasa), 0, ',','.') }} </td>
                        <td>Rp. {{ number_format(round($jumlah), 0, ',','.') }} </td>
                        <td>Rp.{{ number_format(round($saldo = $saldo-$pokok), 0, ',','.') }}</td>
                      </tr>
                      <?php 
                        $sumpokok += $pokok;
                        $sumjasa += $jasa;
                        $sum += $jumlah;
                        $sumsaldo += $saldo;
                      ?>
                    @endfor
                    <tr>
                    <th colspan="3">Jumlah </th>
                    <th>Rp. {{ number_format(round($sumjasa), 0, ',','.') }}</th>
                    <th>Rp. {{ number_format(round($sumpokok), 0, ',','.') }}</th>
                    <th>Rp. {{ number_format(round($sum), 0, ',','.') }}</th>
                    <th></th>
                    </tr>
                </tbody>
              </table>
            </div>
          @endif
        </div>
        <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
            Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
        </div>
        <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
            Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
        </div>
      </div>
    </div>
  </div>
@endsection