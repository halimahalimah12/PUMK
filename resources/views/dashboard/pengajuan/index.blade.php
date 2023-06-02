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
              <div class="alert alert-info"> Silahkan Lengkapi <a href="/profil/" class="alert-link" > <ins> Data Diri </ins>  </a>  Terlebih Dahulu.</div>
            @elseif($ush->jnsush==NULL && $ush->akta_ush ==NULL && $ush->izin_ush==NULL && $ush->thn_bersiri==NULL && $ush->almt_ush==NULL && $ush->almt_ush==NULL && $ush->nohp_ush==NULL && $ush->npwp==NULL && $ush->tmptush==NULL      )
              <div class="alert alert-info"> Silahkan Lengkapi Data Usaha Terlebih Dahulu.</div>
            @else
              @empty($last)
                <button type="button" class="btn btn-primary" style="margin-bottom:12px"> <a href="/pengajuan/create"  style="color:white;"> Tambah</a></button>
                @else
                  @if($last->status == 'tidak' || $last->status == 'lunas')
                      <button type="button" class="btn btn-primary" style="margin-bottom:12px"> <a href="/pengajuan/create"  style="color:white;"> Tambah</a> </button>
                    @else
                  @endif
              @endempty
          @endif
          <div style="overflow-x:auto">
            <table class="table " id="datatable" >
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th> Tanggal</th>
                  <th scope="col">Status</th>
                  <th >Keterangan</th>
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
                        @elseif($p->status == "lunas")
                            <span class="badge bg-info">Pengajuan Lunas</span>
                        @else
                        <span class="badge bg-danger">Pengajuan Ditolak</span>
                      @endif
                    </td>
                    <td style="width:280px">{{ ucfirst($p->ket) }} </td>
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
              <table class="table " id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Mitra</th>
                    <th scope="col">Besar Pinjaman</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col" >Keterangan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pengajuan1 as $p )
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ ucwords($p->data_mitra->nm)}}</td>
                      <td>{{ $p->formatRupiah('bsr_pinjaman') }}</td>
                      <td>{{ $p->created_at}}</td>
                      <td>  
                        {{-- <input type="text" class="id" name="id" id="id{{ $p->id }}" value="{{ $p->id }}"> --}}
                        @if($p->status == 'menunggu') 
                            <button type="button" class="btn  btn-secondary btn-sm menunggu" data-bs-toggle="modal" data-bs-target="#menunggu-{{ $p->id }}" data-id="<?= $p['id']; ?>" >
                            Menunggu
                            </button>
                          @elseif($p->status == 'lulus')
                            <span class="badge bg-success">Pengajuan Diterima</span>
                          @elseif($p->status == 'lulus_survei')
                            <button type="button" class="btn  btn-warning btn-sm menunggu" data-bs-toggle="modal" data-bs-target="#menunggu-{{ $p->id }}">
                            Lulus Survei
                            </button>
                          @elseif($p->status == "lunas")
                            <span class="badge bg-info">Pengajuan Lunas</span>
                          @else
                            <span class="badge bg-danger">Pengajuan Ditolak</span>
                        @endif
                      </td>
                      <td scope="col" >{{ ucfirst($p->ket) }}</td>
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
                            <select class="form-select" name="status" v-model='selectValue'>
                              <option value = "menunggu">Menunggu</option>
                              <option value = "lulus_survei">Lulus Survei </option> 
                              <option value = "lulus">Pengajuan Diterima</option>
                              <option value = "tidak">Pengajuan Tidak Diterima</option>
                            </select>
                          </div>
                        </div>
                          <div v-if='selectValue == "lulus"' class="col-12">
                            <label for="bsrpemin" class="form-label">Besar Peminjaman yang diberikan </label>
                            <div class="input-group mb-3">
                              <span class="input-group-text">Rp.</span>
                              <input type="text" class="rupiah form-control hide" name="bsrpemin"  id="bsrpemin">
                            </div> 
                          </div> 
                          <div v-if='selectValue == "lulus_survei"' class="col-12 ">
                            <label for="ksg_bayar" class="form-label" id="lebksg_bayar">Kesanggupan Bayar Pinjaman </label>
                            <div class="input-group mb-3">
                              <span class="input-group-text">Rp.</span>
                              <input type="text" class="rupiah form-control hide" name="ksg_bayar" id="ksg_bayar">
                            </div>
                          </div>
                          <div v-if='selectValue == "lulus_survei"' class="col-12 ">
                            <label for="bsr_usulan" class="form-label" id="lebbsr_usulan">Besar Usulan Pinjaman dari Tim Survei </label>
                            <div class="input-group mb-3">
                              <span class="input-group-text rp2">Rp.</span>
                              <input type="text" class="rupiah form-control hide" name="bsr_usulan" id="bsr_usulan">
                            </div> 
                          </div>
                          <div v-if='selectValue != "menunggu"' class="col-12 ">
                            <label for="ket" class="form-label" id="lebket">Keterangan </label>
                            <input type="text" class="form-control hide" name="ket" id="ket">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <script>
                var modal_{{$p->id}} = new Vue({
                  el: '#menunggu-{{ $p->id }}',
                  data: {
                    selectValue: 'menunggu'
                  }
                });
              </script>
            @endforeach

          @endcan
      @endif
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
@endsection