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
          <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Detail Angsuran</button>
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
                  <input type="text" class="form-control  @error('sb_bln') is-invalid  @enderror" name="sb_bln" id="sb_bln"style="background-color: #e9ecef; cursor:auto;"  value=" {{ old('sb_bln',$kp->sb_bln) }}" readonly>
                    @error('sb_bln')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ri-send-plane-fill"></i></i> Simpan </button>
            </form>
          </div>
          @if($kp->sb_bln != null)
            
        <form class="row g-3  contact-form" action="/detailkartupiutang" method="POST" enctype="multipart/form-data"  >
                @csrf    
          {{method_field('post')}}
          @if($iddetailkp == NULL)
            <div >
              <button type="submit" class="btn btn-primary" style="float:right; float: right;display: block;margin-top:15px;"><i class="ri-send-plane-fill"></i></i> Simpan </button>
            </div>
            @else
              @if( $iddetailkp->kartupiutang_id != $kp->id )
                <div >
                  <button type="submit" class="btn btn-primary" style="float:right; float: right;display: block;margin-top:15px;"><i class="ri-send-plane-fill"></i></i> Simpan </button>
                </div>
              @endif
          @endif
              <div style="padding-top:25px; overflow-x:auto"> 
                <table class="table table-bordered" style="text-align:center">
                  <thead>
                    <tr>
                      <th rowspan="2" valign="middle">ANG ke</th>
                      <th colspan="2" scope="col">Tajuh Tempo</th>
                      <th colspan="3">Rincian Anggaran</th>
                      <th rowspan="2">Saldo (Rp.)</th>
                    </tr>
                    <tr>
                      <th scope="col">Bulan</th>
                      <th scope="col">Tahun</th>
                      <th scope="col">Pokok (Rp.)</th>
                      <th scope="col">Jasa Pinj 0.25% (Rp.)</th>
                      <th scope="col">Jumlah (Rp.) </th>
                    <tr>
                  </thead>
                  <tbody>
                    <tr>
                      @for( $n=0 ; $n<6 ; $n++)
                      <td>0</td>
                      @endfor
                      <td>{{ number_format($kp->pinjaman, 0, ',','.') }}</td>
                    </tr>
                    @if($iddetailkp == NULL)
                        @for ( 
                              $i =1,
                              $sumjasa =0,
                              $sum = 0,
                              $uanglebih = 0,
                              $sumpokok =0,
                              $saldo = $kp->pinjaman;
                              $i <= 24  ; $i++)
                                <tr>
                                <td style="display:none"><input type="hidden" name="kartupiutang_id[]" value="{{$kp->id }}" ></td>
                                <td scope="row">{{ $i}}</td>
                                <td><input name="bulan[]" id="bulan"value="{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F") }}" style="border:none; width:90px" readonly></td>
                                <td><input name="tahun[]" value="{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y") }}" style="border:none; width:90px" readonly></td>
                                <td><input name="pokok[]" value="{{ number_format(round($pokok), 0, ',','.')}}" style="border:none; width:100px" readonly> </td>
                                @if($i <= 12 )
                                    <td><input name="jasa[]" value="{{  number_format(round($jasa), 0, ',','.')}} " style="border:none; width:100px" readonly></td>
                                    <td><input name="jumlah[]" value="{{ number_format( round($jumlah), 0, ',','.') }}" style="border:none; width:100px" readonly > </td>
                                    <?php  $sumjasa += $jasa; 
                                          $sum += $jumlah;
                                    ?>
                                  @else 
                                    <td><input name="jasa[]" value="{{  number_format(round($jasa1), 0, ',','.')}} " style="border:none; width:100px" readonly ></td>
                                    <td><input name="jumlah[]" value="{{  number_format(round($jumlah1), 0, ',','.')}}" style="border:none; width:100px" readonly > </td>
                                    <?php  $sumjasa += $jasa1; 
                                          $sum += $jumlah1;
                                    ?>
                                @endif
                                <td><input readonly name="sisasaldo[]" value="{{  number_format(round(abs($saldo = $saldo-$pokok)), 0, ',','.')}}" style="border:none; width:100px" readonly ></td>
                                
                              </tr>
                              <?php 
                                $sumpokok += $pokok;
                              ?>
                              
                          @endfor
                          <tr>
                              <th colspan="3">Jumlah </th>
                              <th><input name="sumpokok" value="{{ number_format($sumpokok, 0, ',','.') }}" style="border:none; width:100px"  ></th>
                              <th><input name="sumjasa"value="{{ number_format($sumjasa, 0, ',','.') }}" style="border:none; width:100px"></th>
                              <th><input name="sum" value="{{ number_format($sum, 0, ',','.') }}" style="border:none; width:100px"></th>
                              <th></th>
                              </tr>
                      @else
                        @if( $iddetailkp->kartupiutang_id != $kp->id )
                            @for ( 
                              $i =1,
                              $sumjasa =0,
                              $sum = 0,
                              $uanglebih = 0,
                              $sumpokok =0,
                              $saldo = $kp->pinjaman;
                              $i <= 24  ; $i++)
                                <tr>
                                <td style="display:none"><input type="hidden" name="kartupiutang_id[]" value="{{$kp->id }}" ></td>
                                <td scope="row">{{ $i}}</td>
                                <td><input  name="bulan[]" id="bulan"value="{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F") }}" ></td>
                                <td><input name="tahun[]" value="{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y") }}"></td>
                                <td><input name="pokok[]" value="{{ round($pokok)}}"> </td>
                                @if($i <= 12 )
                                    <td><input name="jasa[]" value="{{ round($jasa)}} " ></td>
                                    <td><input name="jumlah[]" value="{{ round($jumlah) }}" > </td>
                                    <?php  $sumjasa += $jasa; 
                                          $sum += $jumlah;
                                    ?>
                                  @else 
                                    <td><input name="jasa[]" value="{{ round($jasa1)}} " ></td>
                                    <td><input name="jumlah[]" value="{{ round($jumlah1)}}" > </td>
                                    <?php  $sumjasa += $jasa1; 
                                          $sum += $jumlah1;
                                    ?>
                                @endif
                                <td><input name="sisasaldo[]" value="{{ round(abs($saldo = $saldo-$pokok))}}" ></td>
                                
                              </tr>
                              <?php 
                                $sumpokok += $pokok;
                              ?>
                            @endfor
                          @else
                            @foreach ( $detailkp as $d )
                                <tr>
                                  <td scope="row">{{ $loop->iteration }}</td>
                                  <td>{{ $d->bulan}}</td>
                                  <td>{{ $d->tahun }}</td>
                                  <td>{{ number_format($d->pokok, 0, ',','.') }} </td>
                                      <td> {{ number_format($d->jasa, 0, ',','.') }} </td>
                                      <td> {{ number_format($d->jumlah , 0, ',','.') }} </td>
                                  <td>{{ number_format($d->sisasaldo , 0, ',','.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                          <th colspan="3">Jumlah </th>
                          <th> {{ number_format($kp->jmlhpokok, 0, ',','.') }}</th>
                          <th> {{ number_format($kp->jmlhjasa, 0, ',','.') }}</th>
                          <th> {{ number_format($kp->totkp, 0, ',','.') }}</th>
                          <th></th>
                          </tr>
                            
                        @endif
                    @endif
                  </tbody>
                </table>
              </div>
        </form>
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
              @if ($pembayaran != NULL && $totpembayaran !=NULL )
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
                        @endif
                    </td>
                  </tr>
                @endforeach
                  <p style="visibility: hidden;display: none;">{{ $uanglebih = $kp->totkp-$totpembayaran }}</p>
                  <tr>
                    <th colspan="3">Total Pembayaran</th>
                    <th>Rp. {{ number_format($totpembayaran,0,',','.' )}}</th>
                  </tr>
                  <tr>
                    <th colspan="3">Sisa Tagihan</th>
                    @if($totpembayaran  < $kp->totkp )
                        <th>Rp. {{ number_format($sisatagihan= $kp->totkp-$totpembayaran,0,',','.') }}</th>
                      @else 
                        <th>Rp. {{ number_format($sisatagihan= $kp->totkp-$totpembayaran - $uanglebih,0,',','.') }}</th>
                    @endif
                  </tr>
                    @if($totpembayaran > $kp->totkp )
                      <tr>
                        <th colspan="3">Uang Lebih</th>
                        <th>Rp. {{ number_format(abs($uanglebih),0,',','.') }}</th>
                      </tr>
                    @endif
              @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
          <div style="padding-top:25px; overflow-x:auto"> 
              <table class="table table-bordered" style="text-align:center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Bayar</th>
                    <th>Jumlah Bulan</th>
                    <th>Pokok</th>
                    <th>Jasa Pinj 0.25%</th>
                    <th>Sisa Pinjaman</th>
                    <th>Ket</th>
                  </tr>
                </thead>
                <tbody>
                @if ($pembayaran != NULL && $totpembayaran !=NULL )
                  <tr>
                    @for( $n=0 ; $n<6 ; $n++)
                      <td>0</td>
                    @endfor
                    <td>{{ number_format($kp->totkp,0,',','.')}}</td>
                      <td></td>
                  </tr>
                    @for(  $n=1,$jmlhpokok=0 ,$jmlhjasa=0, $jumlahbayar=0 , $jmlhbulan=0 ; $n<=1 ; $n++)
                        @foreach ( $pembayaranvalid as $p )
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->tgl }}</td>
                            <td>{{ number_format($p->jumlah,0,',','.') }}</td>
                                <?php $jumlahbayar += $p->jumlah ?> 
                            <td>{{ $p->bulan }}</td>
                                <?php $jmlhbulan += $p->bulan ?> 
                            <td>{{ number_format($p->pokok,0,',','.') }}</td>
                                <?php $jmlhpokok += $p->pokok ?> 
                            <td>{{ number_format($p->jasa,0,',','.') }}</td>
                                <?php $jmlhjasa += $p->jasa ?> 
                            @if ( $kp->totkp > $p->jumlah)
                                <td>{{ number_format($kp->totkp=$kp->totkp - $p->jumlah ,0,',','.') }}</td>
                              @else 
                                <td>{{ number_format($kp->totkp=$kp->totkp - $p->jumlah-$uanglebih ,0,',','.') }}</td>
                            @endif
                            <td>@if ($p->bank == 'bri') BRI
                                @else Mandiri
                                @endif
                            </td>
                          </tr>
                        @endforeach
                    @endfor
                    <tr>
                      <th colspan="2"> Jumlah </th>
                      <th >  {{ number_format($jumlahbayar,0,',','.') }}</th>
                      <th > {{ number_format($jmlhbulan,0,',','.') }} </th>
                      <th > {{ number_format($jmlhpokok,0,',','.') }} </th>
                      <th > {{ number_format($jmlhjasa ,0,',','.') }} </th>
                      @if($p->jumlah > $kp->totkp)
                        <th colspan="2" > Uang Lebih: {{ number_format(abs($uanglebih) ,0,',','.') }} </th>
                      @endif
                    </tr>
                @endif
                </tbody>
              </table>
            </div>
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