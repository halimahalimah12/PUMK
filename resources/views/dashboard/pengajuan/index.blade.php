@extends('dashboard.layouts.main')

@section('container')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Pengajuan </h5>
      @if($user->is_admin ==0 )
          @if (session('success'))
            <div class="alert alert-success">
              {{ session ('success') }}, Silahkan tunggu pemberitahuan berikutnya. 
            </div>
          @endif 
        @else
          @if (session('success'))
            <div class="alert alert-success">
              {{ session ('success') }}
            </div>
          @endif 
      @endif
      @if($user->is_admin ==0 )
          @if($mitra->scanktp == NULL && $mitra->tpt_lhr == NULL && $mitra->tgl_lhr == NULL && $mitra->sts_prk == NULL && $mitra->jk == NULL && $mitra->almt == NULL && $mitra->no_hp == NULL && $mitra->pddk == NULL && $mitra->jbt == NULL && $mitra->kursus == NULL && $mitra->no_ktp == NULL        )
              <div class="alert alert-info"> Silahkan Lengkapi Data Diri Terlebih Dahulu.</div>
            @elseif($ush->jnsush==NULL && $ush->akta_ush ==NULL && $ush->izin_ush==NULL && $ush->thn_bersiri==NULL && $ush->almt_ush==NULL && $ush->almt_ush==NULL && $ush->nohp_ush==NULL && $ush->npwp==NULL && $ush->tmptush==NULL      )
              <div class="alert alert-info"> Silahkan Lengkapi Data Usaha Terlebih Dahulu.</div>
            @else
              @empty($last)
                <button type="button" class="btn btn-primary"> <a href="/pengajuan/create"  style="color:white;"> Tambah</a></button>
                @else
                  @if($last->status == 'tidak')
                      <button type="button" class="btn btn-primary"> <a href="/pengajuan/create"  style="color:white;"> Tambah</a> </button>
                    @else
                  @endif
              @endempty
          @endif
          <div style="overflow-x:auto">
            <table class="table " >
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th> Tanggal</th>
                  <th scope="col">Status</th>
                  @if ($pengajuan == NULL)
                  @else
                      @if ($ket->ket != NULL)
                      <th >Keterangan</th>
                      @endif
                  @endif
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pengajuan as $p )
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->created_at }}</td>
                    <td>  
                      @if($p->status == 'menunggu') 
                          <span class="badge bg-secondary">Menunggu</span>
                        @elseif($p->status == 'lulus')
                          <span class="badge bg-success">Pengajuan Diterima</span>
                        @elseif($p->status == 'lulus_survei')
                          <span class="badge bg-warning">Lulus Survei</span>
                        @else
                        <span class="badge bg-danger">Pengajuan Ditolak</span>
                      @endif
                    </td>
                    @if ($ket->ket != NULL)
                      <td style="width:420px">{{ $p->ket }} </td>
                    @endif
                    <td>
                      <a href="/show/{{ $p->id }}" class="bi bi-file-earmark-text" ></a>
                      <a href="/cetak/{{ $p->id }}" class="bi bi-printer"> </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          @can('admin')
            <!-- pengajua admin -->
            @if (session('flash_message_success'))
              <div class="alert alert-success">
                {{ session('flash_message_success') }}
              </div>
            @endif
            <div style="overflow-x:auto">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Usaha</th>
                    <th scope="col">Besar Pinjaman</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    @if ($pengajuan1 == NULL)
                      @else
                        @if ($ket->ket != NULL)
                            <th scope="col">Keterangan</th>
                          @endif
                    @endif
                      <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pengajuan1 as $p )
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ ucwords($p->data_mitra->data_ush->nama_ush)}}</td>
                      <td>{{ $p->formatRupiah('bsr_pinjaman') }}</td>
                      <td>{{ $p->created_at}}</td>
                      <td>  
                        @if($p->status == 'menunggu') 
                            <button type="button" class="btn  btn-secondary btn-sm menunggu" data-bs-toggle="modal" data-bs-target="#menunggu-{{ $p->id }}">
                            Menunggu
                            </button>
                          @elseif($p->status == 'lulus')
                            <span class="badge bg-success">Pengajuan Diterima</span>
                          @elseif($p->status == 'lulus_survei')
                            <button type="button" class="btn  btn-warning btn-sm menunggu" data-bs-toggle="modal" data-bs-target="#menunggu-{{ $p->id }}">
                            Lulus Survei
                            </button>
                          @else
                            <span class="badge bg-danger">Pengajuan Ditolak</span>
                        @endif
                      </td>
                        @if ( $p->ket != NULL )
                          <td scope="col" >{{ $p->ket }}</td>
                        @endif
                      <td>
                        <a href="/show/{{$p->id}}" class="bi bi-file-earmark-text" ></a>
                        <a href="/survei/{{$p->id}}" class="bi bi-file-earmark-check" ></a>
                        <a href="/pengajuan/{{$p->id}}/edit" class="bi bi-pencil-square" ></a>|
                        <a href="/hapus/{{$p->id}}" class="bi bi-trash" onclick="return confirm('Apakah anda yakin ? ')"></a>
                      </td>
                    </tr>
                  @endforeach 
                </tbody>
              </table>
            </div>
            {{-- Modal menunggu --}}
            @foreach ( $pengajuan1 as $p )
              <div class="modal fade" id="menunggu-{{ $p->id }}" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Basic Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3  contact-form" action="/konfirmasi/{{$p->id}}" method="post"   >
                      @method('put')
                      @csrf
                      <div class="modal-body">
                        <div class="col-4 form-group clearfix">
                          <label class="form-label" for ="status">Status</label>
                          <div class="col-sm-12">
                            <select class="form-select" name="status" id="status"  aria-label="Default select example">
                              <option value = "menunggu" {{ $p->status =="menunggu"  ? 'selected' : ''}}>Menunggu</option>
                              <option value = "lulus_survei" {{ $p->status =="lulus_survei"  ? 'selected' : ''}}> Lulus Survei </option> 
                              <option value = "lulus" {{ $p->status =="lulus"  ? 'selected' : ''}}>Lulus</option>
                              <option value = "tidak" {{ $p->status =="tidak"  ? 'selected' : ''}}>Tidak Lulus</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-12 " >
                          <label for="bsrpemin" class="form-label" id="bsrpin" >Besar Peminjaman yang diberikan </label>
                          <input type="text" class="form-control hide" name="bsrpemin"  id="bsrpemin">
                        </div> 
                        <div class="col-12 ">
                          <label for="ket" class="form-label" id="lebket">Keterangan </label>
                          <input type="text" class="form-control hide" name="ket" id="ket">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @endcan
      @endif
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script type='text/javascript'>
    $('.menunggu').on('click', function(e){
      console.log(e);
      $('#bsrpemin').hide();
        $('#bsrpin').hide();
        $('#lebket').hide();
        $('#ket').hide();
      });
    $('#status').on('change', function(e){
      console.log(e);
      var status= e.target.value;
      if (status == "lulus"){
        $('#bsrpin').show();
        $('#bsrpemin').show();
        $('#lebket').show();
        $('#ket').show();
      } else if ( status == "menunggu"){
        $('#bsrpemin').hide();
        $('#bsrpin').hide();
        $('#lebket').hide();
        $('#ket').hide();
      }
      else{
        $('#bsrpemin').hide();
        $('#bsrpin').hide();
        $('#lebket').show();
        $('#ket').show();
      }
    });
  </script>
@endsection