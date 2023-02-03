@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ ucwords($kp->pengajuan->data_mitra->data_ush->nama_ush) }}</h5>
            @if (session('flash_message_success'))
              <div class="alert alert-success">
                {{ session('flash_message_success') }}
              </div>
            @endif

          <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Kartu Piutang</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Angsuran</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
          </ul>

          <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                <div calss="card">
                  <form class="row g-3  contact-form" action="/kartupiutang/{{ $kp->id }}" method="POST" enctype="multipart/form-data"  >
                    @method('put')
                    @csrf
                    <div class="row mb-3" style="padding-top:25px">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Penyaluran</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control @error('tgl') is-invalid  @enderror"  name="tgl" value="{{ old('tgl', $kp->tgl_penyaluran) }}">
                                  @error('tgl')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3" >
                      <label for="no_kontrak" class="col-sm-3 col-form-label">Nomor Kontrak</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_kontrak" name="no_kontrak" value="{{ old('no_kontrak', $kp->no_kontrak) }}" >
                      </div>
                    </div>
                    <div class="row mb-3" >
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Besar Pinjaman</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText" value="{{ $kp->formatRupiah('pinjaman') }}" disabled>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="sbthn" class="col-sm-3 col-form-label">Suku Bunga Efektif /Tahun </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="sbthn" value="0.06">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="sbbln" class="col-sm-3 col-form-label">Suku Bunga Efektif /Bulan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="sbbln" value="0.5">
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="ri-send-plane-fill"></i></i> Kirim </button>
                  </form>
                </div>
                <div style="padding-top:25px">
                  <table class="table table-bordered">
                    <thead>
                      <tr >
                        <th rowspan="2" align="center" valign="middle">ANG ke</th>
                        <th colspan="2" align="center" scope="col">Tajuh Tempo</th>
                        <th colspan="4" align="center">Rincian Anggaran</th>
                      </tr>
                      <tr>
                        <th scope="col">Bulan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Pokok</th>
                        <th scope="col">Jasa Pinj 0.25%</th>
                        <th scope="col">Jumlah </th>
                        <th scope="col">Saldo</th>
                      <tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(1)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(1)->format("Y ") }}</td> --}}
                        <td>28</td>
                        <td>2016-05-25</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(2)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(2)->format("Y") }}</td> --}}
                        <td>35</td>
                        <td>2014-12-05</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(3)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(3)->format("Y") }}</td> --}}
                        <td>45</td>
                        <td>2011-08-12</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(4)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(4)->format("Y") }}</td> --}}
                        <td>34</td>
                        <td>2012-06-11</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(5)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(5)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(6)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(6)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(7)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(7)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(8)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(8)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(9)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(9)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(10)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(10)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">11</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(11)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(11)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">12</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(12)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(12)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">13</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(13)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(13)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">14</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(14)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(14)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">15</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(15)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(15)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">16</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(16)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(16)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">17</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(17)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(17)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">18</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(18)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(18)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">19</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(19)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(19)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">20</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(20)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(20)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">21</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(21)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(21)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">22</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(22)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(22)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">23</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(23)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(23)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                      <tr>
                        <th scope="row">24</th>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth(24)->format("F ") }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($awal)->addMonth(24)->format("Y") }}</td> --}}
                        <td>47</td>
                        <td>2011-04-19</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                  Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
            </div>
            <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
                  Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
            </div>
          </div>
        </div>
    </div>
@endsection