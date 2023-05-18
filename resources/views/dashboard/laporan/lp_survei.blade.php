@extends('dashboard.layouts.main')

@section('container')
  <div class="card">
    <div class="card-body">
      <div class="row" style="margin-top:20px">
        <div class="col">
          <h5 class="card-title">Laporan Survei </h5>
        </div>
        <div class="col" >
          <button class="btn btn-primary" style=" float:right" >
            <a href="/cetak-laporan-survei" class="bi bi-printer" style="color:white" > </a>
          </button>
        </div>
      </div>
      @can('admin')
        <div style="overflow-x:auto;">
          <table class="table" id="datatable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Usaha</th>
                <th scope="col">Nama Mitra</th>
                <th scope="col">Jenis Usaha</th>
                <th scope="col">Sektro Usaha</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengajuan as $p )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ ucwords($p->data_mitra->data_ush->nama_ush)}}</td>
                  <td>{{ ucwords($p->data_mitra->nm)}}</td>
                  <td>{{ $p->data_mitra->data_ush->jnsush}}</td>
                  <td>{{ $p->data_mitra->data_ush->sektorush }}</td>
                </tr>
              @endforeach 
            </tbody>
          </table>
        </div>
      @endcan
    </div>
  </div>

@endsection