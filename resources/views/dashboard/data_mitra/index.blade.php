@extends('dashboard.layouts.main')

@section('container')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Data Mitra </h5>
      {{-- <button type="button" class="btn btn-primary">
        <a href="/pengajuan/create"  style="color:white;"> Tambah</a>
      </button> --}}
      <table class="table table-striped" id="datatable">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Mitra</th>
            <th scope="col">Nama Usaha</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mitra as $p )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $p->nm }}</td>
              <td>{{ $p->data_ush->nama_ush }}</td>
              <td><a href="/datamitra/{{$p->id}}" class="bi bi-file-earmark-text" ></a>
                  <a href="" class="bi bi-trash" ></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection