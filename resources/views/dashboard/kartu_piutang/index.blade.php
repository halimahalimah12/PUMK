@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-body">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Mitra</th>
                  <th scope="col">Nama Usaha</th>
                  <th >Besar Pinjaman </th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kp as $p )
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($p->pengajuan->data_mitra->nm) }}</td>
                    <td>{{ ucwords($p->pengajuan->data_mitra->data_ush->nama_ush) }}</td>
                    <td>{{ $p->formatRupiah('pinjaman') }}</td>                    
                    <td>
                        <a href="/kartupiutang/{{$p->id}}/edit" class="bi bi-file-earmark-text" ></a>
												<a href="" class="bi bi-trash" ></a>
											</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    </div
@endsection