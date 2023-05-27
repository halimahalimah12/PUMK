@extends('dashboard.layouts.main')

@section('container')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Pembayaran</h5>
      
      @if($user->is_admin ==0 )
          @if (session('success'))
                <div class="alert alert-success">
                  {{ session ('success') }}, Silahkan tunggu pemberitahuan berikutnya. 
                </div>
            @elseif(session('gagal'))
                <div class="alert alert-danger">
                  {{ session ('gagal') }} 
                </div>
          @endif 
          @if($pengajuan == NULL  )
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:30px">
                  <i class="bi bi-exclamation-octagon me-1"></i>Anda belum bisa melakukan angsuran karena anda belum melakukan pengajuan, Silahkan lakukan <a href="/pengajuan" class="alert-link" > <ins> pengajuan </ins> </a> terlebih dahulu.
              </div>
            @else
              @if ($pengajuan->status == "menunggu")
                  <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top:30px">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Anda belum bisa melakukan angsuran karena  
                    Saat ini pengajuan anda masih ditahap menunggu verifikasi, Mohon tunggu hingga pengajuan disetujui.
                  </div>
                @elseif($pengajuan->status == "lulus_survei")
                  <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:30px">
                    <i class="bi bi-info-circle me-1"></i>Anda belum bisa melakukan angsuran karena Saat ini pengajuan anda masih ditahap 
                        lulus survei dan berkas, Mohon tunggu hingga pengajuan disetujui.
                  </div>
                @elseif($pengajuan->status == "lulus")
                  @if($kp == NULL || $kp->sb_bln == NULL && $kp->sb_thn ==NULL ||$detailkp == NULL )
                      <div class="alert alert-warning">
                          Anda belum bisa melakukan pembayaran angsuran karena kartu piutang anda belum ada, Silahkan menunggu hingga kartu piutang anda dibuat oleh admin. 
                      </div>
                    @else 
                      <p style="visibility: hidden;display: none;"> 
                          @for ( 
                                $sum =0,
                                $sumpokok = 0,
                                $sumjasa = 0,
                                $saldoawal = 0,
                                $i =1,
                                $saldoawal = $kp->pinjaman,
                                $sb_bln = $kp->sb_bln/100,
                                $waktu = $kp->waktu,
                                $pokok = $saldoawal/$waktu,
                                $jasa = $saldoawal*$sb_bln,
                                $jasa1= $jasa/2;
                                $i <= 24  ; $i++)
                                  @if($i <= 12 )
                                      {{ number_format(round($jasa), 0, ',','.') }}
                                      {{ number_format(round($jumlah = $pokok+$jasa), 0, ',','.') }}
                                      <?php  
                                            $sumjasa += $jasa; 
                                            $sum += $jumlah;
                                      ?>
                                    @else 
                                      {{ number_format(round($jasa1), 0, ',','.') }}  
                                      {{ number_format(round($jumlah = $pokok+$jasa1), 0, ',','.') }} 
                                      <?php 
                                        $sum += $jumlah;
                                        $sumjasa += $jasa1;
                                      ?>
                                  @endif
                                <?php $sumpokok += $pokok; ?>
                          @endfor
                      </p>
                      <input type="hidden" class="form-control "  id="getpokok"  value="{{  $pokok }}">
                      <input type="hidden" class="form-control "  id="getjasa"  value="{{  $jasa }}">
                      <input type="hidden" class="form-control "  id="getjasa1"  value="{{  $jasa1 }}">
                      @if($pem ->isNotEmpty() )
                        <input type="hidden" class="form-control "  id="getbulan"  value="{{  $totbulan }}">
                        @else
                        <input type="hidden" class="form-control "  id="getbulan"  value="0">
                      @endif
                      <form class="row g-3  contact-form" action="/pembayaran"  method="POST" enctype="multipart/form-data"  >
                        @csrf
                        <input type="hidden"  name="idkp" value="{{ $kp->id }}">
                        <div class="row mb-3" style="padding-top:25px">
                          <label for="tgl" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
                          <div class="col-sm-9">
                              <input type="date" class="form-control @error('tgl') is-invalid  @enderror"  name="tgl"  >
                              @error('tgl')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                        </div>
                        <div class="row mb-3" >
                          <label for="bank" class="col-sm-3 col-form-label">Bank </label>
                          <div class="col-sm-9">
                            <select class="form-select @error('bank') is-invalid  @enderror" id="bank" name="bank" >
                              <option>-- Pilih --</option> 
                              <option value="bri">BRI</option> 
                              <option value="mandiri">Mandiri</option> 
                            </select>
                            @error('bank')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                        </div>
                        <div class="row mb-3" >
                          <label for="jumlah" class="col-sm-3 col-form-label ">Jumlah Pembayaran</label>
                          <div class="col-sm-9">
                            <div class="input-group mb-3">
                              <span class="input-group-text">Rp.</span>
                              <input type="text" class="form-control rupiah  @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" onkeyup="sum();" >
                              @error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                          </div>
                        </div>
                            <input type="hidden" class="form-control " name="pokok" id="pokok"  readonly>
                            <input type="hidden" class="form-control " name="jasa" id="jasa" readonly >
                            <input type="hidden" class="form-control " name="bulan" id="bulan" readonly >
                        <div class="row mb-3">
                          <label for="foto" class="col-sm-3 col-form-label">Bukti Pembayaran</label>
                          <div class="col-sm-9">
                              <input type="file" class="form-control @error('foto') is-invalid  @enderror" name="foto"    >
                              @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="ri-send-plane-fill"></i></i> Simpan </button>
                      </form>
                    <div style="margin-top:35px;overflow-x:auto;">
                      <table class="table ">
                        <thead>
                          <th> No</th>
                          <th> Tanggal Pembayaran </th>
                          <th> Bank </th>
                          <th> Jumlah </th>
                          <th> Bukti </th>
                          <th> Status </th>
                        </thead>
                        <tbody>
                          @if($pem ->isNotEmpty())
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
                                <td> @if ($p->status == "valid") <span class="badge bg-success">Valid</span>
                                      @elseif( $p->status == "tidak") <span class="badge bg-danger">Tidak Valid</span>
                                      @else <span class="badge bg-secondary">Menunggu</span>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                              <tr>
                                <th colspan="3" style="text-align:center">Total Pembayaran</th>
                                <th>Rp. {{ number_format($totpembayaran,0,',','.' )}}</th>
                              </tr>
                              <tr>
                                <th colspan="3" style="text-align:center">Sisa Tagihan</th>
                                <th>Rp. {{ number_format($sum - $totpembayaran,0,',','.') }}</th>
                              </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                  @endif
                @elseif($pengajuan->status == "lunas")
                <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:30px">
                    <i class="bi bi-info-circle me-1"></i>Anda tidak bisa melakukan pembayaran angsuran kerena pengajuan anda telah lunas, silahkan melakukan pengajuan lagi.
                  </div>
              @endif
          @endif
          {{-- ADMIN --}}
        @else
          @can('admin')
            @if (session('success'))
              <div class="alert alert-success">
                {{ session ('success') }}
              </div>
            @endif 
            <div style="margin-top:35px;overflow-x:auto">
              <table class="table" id="datatable" >
                <thead>
                  <th> No </th>
                  <th> Nama Mitra </th>
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
                      <td> <a href="/kartupiutang/{{$p->kartu_piutang_id}}/edit" >{{ $p->kartu_piutang->pengajuan->data_mitra->nm }}</a></td>
                      <td> {{ date('d M Y',strtotime($p->tgl)) }} </td>
                      <td> @if ($p->bank == 'bri') BRI
                              @else Mandiri
                            @endif
                      </td>
                      <td> {{ $p->formatRupiah('jumlah') }}</td>
                      
                      <td><button type="button" class="btn btn-primary btn-sm"> <a href="/bukti/{{ $p->id }}"style="color:white;"> Lihat </a></button></td>
                      
                      <td> @if($p->status == "menunggu")
                              <a href="/pembayaran/valid/{{ $p->id }}"><button type="button" class="btn btn-success btn-sm"> Valid </button></a>
                              <a href="/pembayaran/tidak-valid/{{ $p->id }}"><button type="button" class="btn btn-danger btn-sm"> Tidak Valid</button></a>
                            @elseif( $p->status == "valid") <span class="badge bg-success">Valid</span>
                            @else <span class="badge bg-danger">Tidak Valid</span>
                          @endif
                          @if($p->kartu_piutang->pengajuan->status != "lunas")
                            @if ($lunas == $kp->totkp)
                                <a href="/lunas/{{ $p->kartu_piutang->pengajuan->id }}"><button type="button" class="btn btn-success btn-sm"> Lunas </button></a>
                            @endif
                            @else
                          @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endcan
      @endif 
    </div>
      {{-- <form class="row g-3  contact-form" action="/pembayaran/valid/{{ $p->id }}" method="post">
                            <input type="text" class="form-control " name="typenotifikasi" id="typenotifikasi" value="Status Pembayaran" >
                            <input type="text" class="form-control " name="tujuan" id="tujuan" value="{{ $p->Kartu_piutang->Pengajuan->user_id }}" >
                            <input type="text" class="form-control " name="pesan1" value="Status pembayaran anda valid. ">
                            <button type="button" class="btn btn-success btn-sm"> Valid </button>
                          </form> --}}
  
  <script type='text/javascript'>
    function sum(){
      var jumlahValue  = document.getElementById('jumlah').value;;
      var pokokValue = document.getElementById('getpokok').value;
      var jasaValue  = document.getElementById('getjasa').value;
      var jasa1Value  = document.getElementById('getjasa1').value;
      var sumbulanValue  = document.getElementById('getbulan').value;

      var test1 = jumlahValue.replaceAll(",","");
      var test2 = parseInt(pokokValue);
        
      if( test1 <  test2 ) {
        document.getElementById('pokok').value=jumlahValue;
        document.getElementById('jasa').value=0;
        document.getElementById('bulan').value=1;

      }  else  {
        var jasa = test1-test2;
        var test3 = test2;
        var test8 = parseInt(sumbulanValue)+1;
        
        if (jasa < test2){         
          if (test8  <= 12 ){
            jasa=jasa-jasaValue;
            document.getElementById('jasa').value=jasaValue;
          } else {
            jasa=jasa-jasa1Value;
            document.getElementById('jasa').value=jasa1Value;
          }
          test2 = test2+jasa;
          document.getElementById('pokok').value=test2;
          document.getElementById('bulan').value=1;
        } else {
        var test6 = parseInt(jasaValue);
        var test7 = parseInt(jasa1Value);
          for( var i = 1; jasa > test2  ; i++){ 
            var test9 =  parseInt(sumbulanValue);
            var pokok1 = parseInt(pokokValue);
              //HITUNG POKOK
                if( i <= 2){
                  test2 = test2 * i;
                }else{
                  test2 = test2 + pokok1;
                }
                if(test9 < 12){
                    test9 =  test9 + i;
                    var test10 = parseInt(sumbulanValue);
                    if ( test9 >= 12 ){
                      var test12 = test9 - 12;
                      var test11 = test9 - test12 ;
                      var test13 = test11 - test10;
                      if ( test11 <= 12 ){
                          var jv2= jasaValue * test13;
                          if (test12 < test9 ){
                            var jv3 = jasa1Value * test12;
                          }
                          var hasiljasa = jv2+jv3;
                          var  j = test1-test2-hasiljasa;
                          var pk = test2+j; 
                          document.getElementById('pokok').value=pk;
                          document.getElementById('jasa').value=hasiljasa;
                          document.getElementById('bulan').value=i;
                      }                      
                    }else {
                      var hasiljasa = jasaValue * i;
                      var sisa = test1-test2-hasiljasa;
                      var pokok= test2+sisa;
                      document.getElementById('bulan').value=i;
                      document.getElementById('pokok').value=pokok;
                      document.getElementById('jasa').value=hasiljasa;
                    }
                }else{
                  var hasiljasa = jasa1Value * i;
                  var sisa = test1-test2-hasiljasa;
                  var pokok= test2+sisa;
                  document.getElementById('bulan').value=i;
                  document.getElementById('pokok').value=pokok;
                  document.getElementById('jasa').value=hasiljasa;
                  
                }
          }
        }
      }
      
    }
  </script>

@endsection