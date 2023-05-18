@extends('dashboard.layouts.main')

@section('container')
  <div class="card">
    <div class="card-body">
      <div class="row" style="margin-top:20px">
        <div class="col">
          <h5 class="card-title">Laporan Angsuran Mitra</h5>
        </div>
        
      </div>

          @can('admin')
          <div class="row" style="margin-left:400px" >
            
              <form action="/laporan-angsuran" method="GET">
                  <div class="input-group mb-3">
                    <div class="row" >
                      <div class="col" >
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date">
                      </div>
                      <div class="col" >
                        <label for="end_date" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="end_date">
                      </div>
                      <div class="col" >
                        <button class="btn btn-primary" type="submit" style="margin-top:36px">GET</button>   
                      </div>
                </form>
              <div class="col">
                @if( request()->start_date == NULL )
                <button type="button" class="btn btn-danger"  style=" float:right;margin-top:36px;">  <a href="/cetak-laporan-angsuran/" style="color:white" >PDF </a> </button>
                @else 
                <button type="button" class="btn btn-danger"  style=" float:right;margin-top:36px;">  <a href="/cetak-laporan-angsuran/?start_date={{$start_date}}&end_date={{ $end_date }}" style="color:white" >PDF </a> </button>
                @endif
              </div>
              <div class="col" >
                <button type="button" class="btn btn-success"  style=" float:right;margin-top:36px">  <a href="/cetak-laporan-angsuran"style="color:white" > EXCEL</a> </button>
              </div>
              
            </div>
            </div>  
          </div>
          <hr>
            <div style="overflow-x:auto">
              <table class="table" id="datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Mitra</th>
                    <th>Jenis Usaha</th>
                    <th>Pokok</th>
                    <th>Bunga</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                
                  @foreach ($byr as $p  )
                    @foreach ( $kp as $kps=> $kp1 )
                      @if( request()->start_date == NULL && request()->start_date==NULL )
                          @if($kp1->id == $p->kartu_piutang_id)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kp1->pengajuan->data_mitra->nm }}</td>
                            <td>{{ $kp1->pengajuan->data_mitra->data_ush->jnsush }}</td>
                            <td>{{ number_format($p->pokok, 0, ',','.') }}</td>
                            <td>{{ number_format($p->jasa, 0, ',','.') }}</td> 
                            <td>{{ number_format($p->jumlah, 0, ',','.') }}</td>
                          </tr> 
                          @endif
                        @else
                        @if($p->kartu_piutang_id == $kp1->id)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kp1->pengajuan->data_mitra->nm }}</td>
                            <td>{{ $kp1->pengajuan->data_mitra->data_ush->jnsush }}</td>
                            <td>{{ number_format($p->pokok, 0, ',','.') }}</td>
                            <td>{{ number_format($p->jasa, 0, ',','.') }}</td> 
                            <td>{{ number_format($p->jumlah, 0, ',','.') }}</td> 
                          </tr> 
                        @endif
                      @endif
                    @endforeach
                  @endforeach  
                            

                </tbody>
              </table>
            </div>
          @endcan
      
    </div>
  </div>

@endsection