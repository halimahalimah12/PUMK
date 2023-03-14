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
      @endif 
          <div calss="card">

            <p style="visibility: hidden;display: none;"> 
                @for ( 
                      $sum =0,
                      $sumpokok = 0,
                      $sumjasa = 0,
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
                  <input type="hidden" class="form-control "  id="getsumjasa"  value="{{  $sumjasa }}">
                  <input type="hidden" class="form-control "  id="getsumpokok"  value="{{  $sumpokok }}">
                
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
              <div class="row mb-3">
                <label for="foto" class="col-sm-3 col-form-label">Bukti Pembayaran</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control @error('foto') is-invalid  @enderror" name="foto"    >
                    @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ri-send-plane-fill"></i></i> Simpan </button>
            </form>
          </div>

          <div style="margin-top:35px">
            <table class="table table-striped">
              <thead>
                <th> No</th>
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
                  <td> {{ $p->status }}</td>
                </tr>
              @endforeach
                <tr>
                  <th colspan="3" style="text-align:center">Total Pembayaran</th>
                  <th>Rp. {{ number_format($totpembayaran,0,',','.' )}}</th>
                </tr>
                
                <tr>
                  <th colspan="3" style="text-align:center">Sisa Tagihan</th>
                  <th>Rp. {{ number_format($sum - $totpembayaran,0,',','.') }}</th>
                  <th>Rp. {{ number_format($pokok,0,',','.') }}</th>
                </tr>
              </tbody>
            </table>
          </div>
        @else
          @can('admin')
          @if (session('success'))
            <div class="alert alert-success">
              {{ session ('success') }}
            </div>
          @endif 
            <div style="margin-top:35px;overflow-x:auto">
            <table class="table table-striped" id="datatable" >
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
                  
                  <td> @if($p->status == "menunggu")
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
          @endcan
      @endif 
  
  <script type='text/javascript'>
    function sum(){
      var jumlahValue  = document.getElementById('jumlah').value;;
      var pokokValue = document.getElementById('getpokok').value;
      var sumjasaValue  = document.getElementById('getsumjasa').value;
      var sumpokokValue  = document.getElementById('getsumpokok').value;

        var test1 = jumlahValue.replaceAll(",","");
        var test2 = parseInt(pokokValue);
        var test4 = parseInt(sumpokokValue);
        var test5 = sumjasaValue/24;


      {{-- if( test1 <  test2 ) {
        document.getElementById('pokok').value=jumlahValue;
        document.getElementById('jasa').value=0;
      }  else  {
        var jasa = test1-test2;
        
        var test3 = test2;
        
        if (jasa < test2){
          document.getElementById('pokok').value=test2;
          document.getElementById('jasa').value=jasa;
        } else {
          for( var i = 1; jasa > test2  ; i++){ 
              if( i <= 2){
                test2 = test2 * i;
                document.getElementById('pokok').value=test2;
              }else{
                test2 = test2 + test3;
                document.getElementById('pokok').value=test2;
              }
          }
          jasa= test1-test2;

          document.getElementById('jasa').value=jasa;

        }
      } --}}
      
      if( test1 <  test2 ) {
        document.getElementById('pokok').value=jumlahValue;
        document.getElementById('jasa').value=0;
      }  else  {
        var jasa = test1-test2;

        var test3 = test2;
        var test6 = test5;
        
        if (jasa < test2){          
          document.getElementById('jasa').value=test5;
          jasa=jasa-test5;
          test2 = test2+jasa;
          document.getElementById('pokok').value=test2;
        } else {
          for( var i = 1; jasa > test2  ; i++){ 
              if( i <= 2){
                test2 = test2 * i;
                test5 = test5 * i;
                var  j = test1-test2-test5;
                var pk = test2+j;

                document.getElementById('pokok').value=pk;
                document.getElementById('jasa').value=test5;
              }else{
                test2 = test2 + test3;
                test5 = test5 + test6;
                jasa= test1-test2-test5;
                var pokok= test2+jasa;
                document.getElementById('pokok').value=pokok;
                document.getElementById('jasa').value=test5;
              }
          }
          
        }
      }
    }
  </script>

@endsection