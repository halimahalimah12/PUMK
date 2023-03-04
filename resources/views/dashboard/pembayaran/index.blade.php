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
                  <input type="text" class="form-control rupiah @error('jumlah') is-invalid @enderror" name="jumlah"  >
                  @error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                </div>
              </div>
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
                <p style="visibility: hidden;display: none;"> 
                @for ( 
                      $sum =0,
                      $i =1,
                      $saldoawal = $kp->pinjaman,
                      $sb_bln = $kp->sb_bln/100,
                      $waktu = $kp->waktu,
                      $pokok = $saldoawal/$waktu,
                      $jasa = $saldoawal*$sb_bln,
                      $jasa1= $jasa/2;
                      $i <= 24  ; $i++)
                        @if($i <= 12 )
                            Rp. {{ number_format(round($jumlah = $pokok+$jasa), 0, ',','.') }}
                            <?php  
                                  $sum += $jumlah;
                            ?>
                          @else 
                            Rp. {{ number_format(round($jumlah = $pokok+$jasa1), 0, ',','.') }} 
                            <?php 
                            $sum += $jumlah;
                            ?>
                        @endif
                @endfor
                </p>
                <tr>
                  <th colspan="3" style="text-align:center">Sisa Tagihan</th>
                  <th>Rp. {{ number_format($sum - $totpembayaran,0,',','.') }}</th>
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
@endsection