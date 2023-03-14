@extends('dashboard.layouts.main')

@section('container')
  <div class="card">
    <div class="card-body">
      <div class="row" style="margin-top:20px">
        <div class="col">
          <h5 class="card-title">Laporan Angsuran Mitra</h5>
        </div>
        <div class="col" >
          <button class="btn btn-primary" style=" float:right" >
            <a href="/cetak-laporan-angsuran" class="bi bi-printer" style="color:white" > </a>
          </button>
        </div>
      </div>

          @can('admin')
            <div style="overflow-x:auto">
              <table class="table table-striped" id="datatable">
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
                  @foreach ($kp as $p )
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ ucwords($p->pengajuan->data_mitra->nm)}}</td>
                      <td>{{ $p->pengajuan->data_mitra->data_ush->jnsush}}</td>
                      <td></td>
                      <td></td>
                      <td>{{ $totpembayaran }}</td>


                    </tr>
                  @endforeach 
                </tbody>
              </table>
            </div>
          @endcan
      
    </div>
  </div>

@endsection