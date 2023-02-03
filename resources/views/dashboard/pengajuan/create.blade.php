
@extends('dashboard.layouts.main')


@section('container')

    <div class="col-lg-12">
      <div class="card">
        <div class="card-header text-white bg-primary text-center">
          <h5>Pengajuan Form</h5>
        </div>
        <div class="card-body">
            <form class="row g-3  contact-form" action="/pengajuan" method="POST" enctype="multipart/form-data"  >
              @csrf    
              @if($user->is_admin ==0 )
                  <div class="col-12 ">
                    <label for="nm_ush" class="form-label" style="margin-top:10px;">Nama Usaha</label>
                    <input type="text" class="form-control" name="nm_ush" id="nm_ush" value="{{ old('nmush', $ush->nama_ush) }}" disabled>
                  </div> 
                  <div class="col-12 ">
                    <label for="nm_pjstu" class="form-label" >Nama Penanggung Jawab Satu</label>
                    <input type="text" class="form-control" name="nm_pjstu" id="nm_pjstu" value="{{ old('nama', $mitra->nm) }}" disabled>
                  </div>
                @else
                  <div class="col-12 ">
                    <label for="nama_ush" class="form-label" style="margin-top:10px;">Nama Usaha</label>
                    <input type="text" class="form-control" name="nama_ush" id="nama_ush" value="{{ old('namaush') }}" disabled>
                  </div> 
                  <div class="col-12 ">
                    <label for="nm" class="form-label" >Nama Mitra</label>
                    <input type="text" class="form-control" name="nm" id="nm" value="{{ old('nm') }}" onkeyup="isi_otomatis()" >
                  </div>
              @endif
              {{-- Data Diri Penanggung Jawab Berikutnya --}}
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Biodata Penanggung Jawab Berikutnya</h5>
                      <div class="col-12 "> 
                        <label for="nm_pjb" class="form-label" >Nama  </label>
                        <input type="text" class="form-control @error('nm_pjb') is-invalid @enderror" name="nm_pjb" id="nm_pjb" value="{{ old('nm_pjb') }}"  >
                          @error('nm_pjb')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                      <div class="row ">
                          <div class="col-6 form-group clearfix ">
                              <label for="tpt_lhr" class="form-label">Tempat Lahir</label>
                              <input type="text" class="form-control @error('tpt_lhr') is-invalid @enderror "  id="tpt_lhr" name="tpt_lhr" value="{{ old('tpt_lhr') }}" >
                                @error('tpt_lhr')<div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div>
                          <div class="col-6 form-group clearfix">
                              <label for="tgl_lhr" class="form-label">Tanggal Lahir</label>
                              <div class="col-sm-10">
                                <input type="date" class="form-control @error('tgl_lhr') is-invalid  @enderror"  name="tgl_lhr" value="{{ old('tgl_lhr') }}">
                                  @error('tgl_lhr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-6">
                              <label for="gender" class="form-label">Jenis Kelamin</label>
                              <div class="form-check " >
                                  <input class="form-check-input @error('gender') is-invalid  @enderror" type="radio" name="gender" id="gender" value="L" {{  old('gender') == 'L' ? 'checked':'' }}>
                                  <label class="form-check-label" for="gender">Laki-Laki</label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input @error('gender') is-invalid  @enderror" type="radio" name="gender" id="gender" value="P"  {{ old('gender') == 'P' ? 'checked':'' }}>
                                  <label class="form-check-label" for="gender">Perempuan</label>
                              </div>                                  
                              @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="col-6 form-group clearfix">
                              <label for="hub" class="form-label">Status Hubungan dengan Penanggung Jawab Usaha </label>
                              <input type="text" class="form-control @error('hub') is-invalid  @enderror" id="hub" name="hub"value="{{ old('hub') }}">
                              @error('hub')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                      </div>
                      <div class="col-12 form-group clearfix">
                          <label for="almt" class="form-label">Alamat</label>
                          <input type="text" class="form-control @error('almt') is-invalid  @enderror" id="almt" name="almt"value="{{ old('almt') }}">
                            @error('almt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                      <div class="col-12 form-group clearfix">
                          <label for="bangsa" class="form-label">Kebangsaan</label>
                          <input type="text" class="form-control @error('bangsa') is-invalid  @enderror" id="bangsa" name="bangsa" value="Indonesia" disabled>
                            @error('bangsa')<div class="invalid-feedback" >{{ $message }}</div>@enderror
                      </div>
                      <div class="row">
                          <div class="col-4 form-group clearfix">
                              <label for="no_hp" class="form-label">No Telephone</label>
                              <input type="text" class="form-control @error('no_hp') is-invalid  @enderror"  id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                                @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="no_ktp" class="form-label">No KTP </label>
                              <input type="text" class="form-control @error('no_ktp') is-invalid  @enderror" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}">
                                @error('no_ktp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="tgl_ktp" class="form-label">Tanggal KTP</label>
                              <div class="col-sm-12">
                                <input type="date" class="form-control @error('tgl_ktp') is-invalid  @enderror"  name="tgl_ktp" value="{{ old('tgl_ktp') }}">
                                  @error('tgl_ktp') <div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-4 form-group clearfix">
                              <label class="form-label " for ="pddk">Pendidikan Terakhir</label>
                              <div class="col-sm-12">
                                  <select class="form-select @error('pddk') is-invalid  @enderror " name="pddk" aria-label="Default select example">
                                          <option value = "" >- Pilih -</option>
                                          <option value="SD" {{ old('pddk') =="SD" ? 'selected' : ''}}>SD</option>
                                          <option value="SMP" {{ old('pddk') =="SMP" ? 'selected' : ''}}>SMP</option>
                                          <option value="SMA" {{ old('pddk') =="SMA" ? 'selected' : ''}}>SMA</option>
                                          <option value="D1" {{ old('pddk') =="D1" ? 'selected' : ''}}>D1</option>
                                          <option value="D1" {{ old('pddk') =="D2" ? 'selected' : ''}}>D2</option>
                                          <option value="D3" {{ old('pddk') =="D3" ? 'selected' : ''}}>D3</option>
                                          <option value="S1" {{ old('pddk') =="S1" ? 'selected' : ''}}>S1</option>
                                          <option value="S2" {{ old('pddk') =="S2" ? 'selected' : ''}}>S2</option>
                                          <option value="S3" {{ old('pddk') =="S3" ? 'selected' : ''}}>S3</option>
                                  </select>
                                  @error('pddk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="kursus" class="form-label">Kursus </label>
                              <input type="text" class="form-control @error('kursus') is-invalid  @enderror"  id="kursus" name="kursus" value="{{ old('kursus') }}">
                                @error('kursus') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              <p>* Jika tidak ada, dikosongkan saja </p>
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="jbt" class="form-label">Jabatan</label>
                              <input type="text" class="form-control @error('jbt') is-invalid  @enderror"  id="jbt" name="jbt" value="{{ old('jbt') }}">
                                @error('jbt')  <div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div> 
                      </div>
                      <div class="col-10 form-group clearfix">
                          <label for="foto" class="form-label">Pas Foto</label>
                          <div class="row">
                            <div class="col-sm-10">
                              <input class="form-control @error('foto') is-invalid  @enderror"  type="file" id="foto" name="foto" value="{{ old('foto') }}">
                                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div> 
                          </div>
                      </div>  
                      <div class="col-10 form-group clearfix">
                          <label for="scanktp" class="form-label">Scan KTP</label>
                          <div class="row">
                            <div class="col-sm-10">
                              <input class="form-control @error('scanktp') is-invalid  @enderror"  type="file" id="scanktp" name="scanktp" value="{{ old('scanktp') }}">
                                @error('scanktp')  <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div> 
                          </div>
                      </div> 
              </div>
              {{-- Asset --}}
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Asset</h5>
                  <h6>Asset (Aktiva) yang berkaitan langsung dengan kegiatan usaha</h6>
                      <div class="row mb-3">
                        <label for="tanah" class="col-sm-2 col-form-label">Tanah</label>
                        <div class="col-sm-10">
                          <input type="text" class="rupiah form-control @error('tanah') is-invalid @enderror" name="tanah" id="tanah"  onkeyup="sum();" value="{{ old('tanah') }}">
                          @error('tanah')  <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="bangunan" class="col-sm-2 col-form-label">Bangunan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('bangunan') is-invalid @enderror" name="bangunan" id="bangunan" onkeyup="sum();" value="{{ old('bangunan') }}">
                          @error('bangunan') <div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tanah" class="col-sm-2 col-form-label">Persediaan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('persediaan') is-invalid @enderror" name="persediaan" id="persediaan" onkeyup="sum();" value="{{ old('persediaan') }}">
                          @error('persediaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="alat" class="col-sm-2 col-form-label">Peralatan Usaha</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('alat') is-invalid @enderror" name="alat" id="alat" onkeyup="sum();" value="{{ old('alat') }}">
                          @error('alat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="kas" class="col-sm-2 col-form-label">kas</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('kas') is-invalid @enderror" name="kas" id="kas" onkeyup="sum();" value="{{ old('kas') }}">
                          @error('kas') <div class="invalid-feedback">{{ $message }}</div>  @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="piutang" class="col-sm-2 col-form-label">Piutang</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('piutang') is-invalid @enderror" name="piutang" id="piutang" onkeyup="sum();" value="{{ old('piutang') }}">
                          @error('piutang') <div class="invalid-feedback">{{ $message }}</div>  @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="peralatan" class="col-sm-2 col-form-label">Peralatan Produksi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('peralatan') is-invalid @enderror" name="peralatan" id="peralatan" onkeyup="sum();" value="{{ old('peralatan') }}">
                          @error('peralatan') <div class="invalid-feedback">{{ $message }}</div>  @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label  for="totaset" class="col-sm-2 col-form-label">Total Aset</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('totaset') is-invalid @enderror" name="totaset" id="totaset" style="padding-bottom:5px" value="{{ old('totaset') }}">
                          @error('totaset') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                      </div>
              </div>
              {{-- Alat --}}
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Alat kerja dan alat bantu</h5>
                  <table class="table table-striped" >
                      <thead >
                        <tr>
                          <th> Nama Barang </th>
                          <th> Harga Satuan (Rp)</th>
                          <th> Jumlah Harga (Rp)</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach (range(0,3) as  $x)
                          <tr>        
                            <td > <input type="text" name="nm_brg[]" id="nm_brg-{{ $x }}" class="form-control @error('nm_brg[]') is-invalid  @enderror " value="{{ old('nm_brg[]') }}">    
                            @error('nm_brg[]')  <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </td>  
                            <td > <input type="text" name=" hrg_satuan[]" id="hrg_satuan-{{ $x }}" class="form-control " value="{{ old('hrg_satuan[]') }}"></td>
                            <td > <input type="text" name="jmlh[]" id="jmlh-{{ $x }}" class="form-control " value="{{ old('jmlh[]') }}"></td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>  
              </div>
              {{-- Tenaga kerja --}}
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Tenaga Kerja</h5>
                  <table class="table table-striped" >
                      <thead >
                        <tr>
                          <th> Nama  </th>
                          <th> Jabatan</th>
                          <th> Gaji (Rp)</th>
                          <th> <a href="javascript:void(0);" class="addtenagakerja btn btn-primary" style="float:right;" name="addtenagakerja" id="addtenagakerja">+ </a></th>
                        </tr>
                      </thead>
                      <tbody id="tngkerja" class="tngkerja">
                        <tr>
                          <td > <input type="text" name="nmkry[]" class="form-control @error('nmkry') is-invalid  @enderror " value="{{ old('nmkry[]') }}">
                                @error('nmkry[]')  <div class="invalid-feedback">{{ $message }}</div> @enderror
                          </td>
                          <td > <input type="text" name="jbtkry[]" class="form-control @error('jbtkry[]') is-invalid  @enderror" value="{{ old('jbtkry[]') }}"></td>
                          <td > <input type="text" name="gaji[]" class="form-control @error('gaji[]') is-invalid  @enderror" value="{{ old('gaji[]') }}"> </td>
                          <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                        </tr>
                      </tbody >
                  </table> 
              </div>
              {{-- biaya oprasional --}}
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Biaya Oprasional</h5>
                  <div class="row mb-3">
                    <label for="transport" class="col-sm-2 col-form-label">Transport</label>
                    <div class="col-sm-10">
                      <input type="text" class="uang form-control @error('transport') is-invalid @enderror" name="transport" id="transport" onkeyup="sum1();" value="{{ old('transport') }}">
                        @error('transport') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="listrik"  class="col-sm-2 col-form-label">Listrik</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('listrik') is-invalid @enderror" name="listrik" id="listrik" onkeyup="sum1();" value="{{ old('listrik') }}" >
                      @error('listrik')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="telp"  class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" onkeyup="sum1();" value="{{ old('telp') }}">
                      @error('telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="atk" class="col-sm-2 col-form-label">ATK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('atk') is-invalid @enderror" name="atk" id="atk" onkeyup="sum1();" value="{{ old('atk') }}">
                      @error('atk') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="lain" class="col-sm-2 col-form-label">Lain-Lain</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('lain') is-invalid @enderror" name="lain" id="lain" onkeyup="sum1();" value="{{ old('lain') }}">
                      @error('lain') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label  for="totop" class="col-sm-2 col-form-label">Total Oprasional</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('totop') is-invalid @enderror" name="totop" id="totop" style="padding-bottom:5px" value="{{ old('totop') }}">
                      @error('totop') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>
              </div>
              {{-- omzet --}}
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Penjualan (Omzet)</h5>
                    <table class="table table-striped" >
                      <thead >
                        <tr>
                          <th> Nama Barang </th>
                          <th> Harga Satuan (Rp)</th>
                          <th> Jumlah Harga (Rp)</th>
                          <th> <a href="javascript:void(0);" class="addomzet btn btn-primary" style="float:right;" name="addomzet" id="addomzet">+ </a></th>
                          
                        </tr>
                      </thead>
                      <tbody id="omzet" class="omzet">
                        <tr>
                          <td > <input type="text" name="nmomzet[]" class="form-control @error('nmomzet') is-invalid  @enderror " value="{{ old('nmomzet[]') }}"> 
                                  @error('nmomzet[]') <div class="invalid-feedback">{{ $message }}</div> @enderror
                          </td>
                          <td > <input type="text" name="hrgomzet[]" class="form-control" value="{{ old('hrgomzet[]') }}"> </td>
                          <td > <input type="text" name="jmlhomzet[]" class=" form-control" value="{{ old('jmlhomzet[]') }}" onkeyup="getItems()"> </td>
                          <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                        </tr>
                      </tbody > 
                      {{-- <tr>
                          <td colspan="2" align="center" > <h5 text="bold" style="padding-top: 7px;"> <b> Jumlah </b></h5></td>
                          <td> <input type="text" name="totomzet" class="form-control" value="{{ old('gaji') }}"> </td>
                        </tr>  --}}
                  </table> 
              </div> 
              {{-- Penempatan Modal --}}
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Penempatan Modal</h5>
                  <div class="col-12 ">
                    <label for="modal" class="form-label"> Modal Usaha</label>
                    <input type="text" class="form-control @error('modal') is-invalid @enderror" name="modal" id="modal" onkeyup="sum_modal();" value="{{ old('modal') }}">
                      @error('modal')<div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-12 ">
                    <label for="invst" class="form-label"> Investasi Usaha</label>
                    <input type="text" class="form-control " name="invest" id="invest" onkeyup="sum_modal();" value="{{ old('invest') }}">
                    <p>* Isi strip (-) jika tidak ada Investasi Usaha</p>
                  </div>
                  <div class="col-12 ">
                    <label for="bsr_pjm" class="form-label">Besar Pinjaman yang Diajukan </label>
                    <input type="text" class="form-control @error('bsr_pjm') is-invalid @enderror" name="bsr_pjm" id="bsr_pjm" value="{{ old('bsr_pjm') }}">
                      @error('bsr_pjm') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
              </div>
              {{-- Manfaat --}}
              <div class="card-body">
                    <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Manfaat</h5>
                    <table class="table table-striped" id="tabel1">
                      <thead >

                      <table class="table table-striped" >
                        <thead >
                          <tr>
                            <th> Manfaat </th>
                            <th> <a href="javascript:void(0);" class="addmanfaat btn btn-primary" style="float:right;" name="addmanfaat">+ </a></th>
                          </tr>
                        </thead>
                        <tbody id="manfaat" class="manfaat">
                          <tr>
                            <td > <input type="text" name="manfaat[]" class="form-control" value="{{ old('manfaat[]') }}"> </td>
                            <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                          </tr>
                        </tbody >
                      </table>              
              </div>
              {{-- bukti keseriusan --}}
              <div class="col-12  " style="margin-top:15px">
                    <div class="mb-3">
                        <label for="bkt_serius" class="form-label">Bukti tanda keseriusan </label>
                        <input class="form-control @error('bkt_serius') is-invalid @enderror" type="file" id="bkt_serius" name="bkt_serius">
                          @error('bkt_serius')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div> 
              </div>
              {{-- scan kk --}}
              <div class="col-12  " style="margin-top:15px">
                    <div class="mb-3">
                        <label for="kk" class="form-label">Scan KK </label>
                        <input class="form-control @error('kk') is-invalid @enderror" type="file" id="kk" name="kk">
                          @error('kk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div> 
              </div>    
              {{-- Kegiatan usaha --}}
              <div class="col-12 " style="margin-top:0px">
                    <div class="mb-3">
                        <label for="foto_kegiatan" class="form-label">Foto Kegiatan Usaha</label>
                        <input class="form-control @error('foto_kegiatan') is-invalid @enderror" type="file" id="foto_kegiatan" name="foto_kegiatan">
                        @error('foto_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div> 
              </div>
              {{-- surat usaha dari rt --}}
              <div class="col-12 " style="margin-top:0px">
                    <div class="mb-3">
                        <label for="surat_ush" class="form-label">Scan Surat Keterangan Berusaha dari RT/RW Setingkat</label>
                        <input class="form-control @error('surat_ush') is-invalid @enderror" type="file" id="surat_ush" name="surat_ush">
                          @error('surat_ush')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div> 
              </div> 
              {{-- Blm bina BUMN --}}
              <div class="col-md-4" style="margin-top:0px">
                    <label for="inputEmail5" class="form-label">Format Surat Belum Dibina BUMN </label>
                    <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
              </div>
              <div class="col-md-8" >
                    <label for="srt_blmbina" class="form-label">Upload Surat Belum Dibina BUMN </label>
                    <input class="form-control @error('srt_blmbina') is-invalid @enderror" type="file" id="srt_blmbina" name="srt_blmbina">
                      @error('srt_blmbina') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              {{-- PJ berikutnya --}}
              <div class="col-md-4">
                    <label for="inputEmail5" class="form-label">Format Surat Penanggung Jawab berikutnya </label>
                    <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
              </div>
              <div class="col-md-8">
                    <label for="srt_pjb" class="form-label">Upload Surat Penanggung Jawab berikutnya  </label>
                    <input class="form-control @error('srt_pjb') is-invalid @enderror" type="file" id="srt_pjb" name="srt_pjb">
                      @error('srt_pjb') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              {{-- melunasi --}}
              <div class="col-md-4">
                    <label for="inputEmail5" class="form-label">Format Surat Kesanggupan Melunasi Peminjaman</label>
                    <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
              </div>
              <div class="col-md-8">
                    <label for="srt_ksglns" class="form-label">Upload Surat Kesanggupan Melunasi Peminjaman  </label>
                    <input class="form-control @error('srt_ksglns') is-invalid @enderror" type="file" id="srt_ksglns" name="srt_ksglns">
                        @error('srt_ksglns')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <hr>
              <div class="row">
                  <div class="form-group form-navigation">
                      <label for="confirm1"> </label>
                          <center>
                              <div class="alert alert-warning" style="color:black !important">
                                Sebelum Melakukan Pengiriman Pengajuan , Periksa Kembali Isian Data. 
                                <br>
                                <b>Data Tidak Dapat Diperbarui, Maka Pastikan Semua Data Telah Terisi Dengan Benar.</b>
                              </div>
                              <button type="submit" class="btn btn-primary" name="simpan" id="simpan"><i class="ri-send-plane-fill"></i></i> Kirim </button>
                          </center>
                  </div>
              </div>
              {{ csrf_field() }}
            </form>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    
    <script type='text/javascript'>

      $('thead').on('click','.addtenagakerja',function(){
        var tr = "<tr>"+
                    "<td> <input type='text' name='nmkry[]'   class='form-control' value='{{ old('nmkry[]') }}' > </td>"+
                    "<td> <input type='text' name='jbtkry[]'  class='form-control' value='{{ old('jbtkry[]') }}' > </td>"+
                    "<td> <input type='text' name='gaji[]'    class='form-control' value='{{ old('gaji[]') }}' > </td>"+
                    "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
                  "</tr>"
            $('#tngkerja').append(tr);
      });
      $('thead').on('click','.addomzet',function(){
        var tr = "<tr>"+                         
                    "<td> <input type='text' name='nmomzet[]'   class='form-control' > </td>"+
                    "<td> <input type='text' name='hrgomzet[]'  class='form-control'> </td>"+
                    "<td> <input type='text' name='jmlhomzet[]' class='form-control'> </td>"+
                    "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
                  "</tr>"
            $('#omzet').append(tr);
      });
      $('thead').on('click','.addmanfaat',function(){
        var tr = "<tr>"+
                    "<td> <input type='text' name='jmlh[]' class='form-control'> </td>"+
                    "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
                "</tr>"
            $('#manfaat').append(tr);
      });
      $('tbody').on('click','.deleterow',function(){
        $(this).parent().parent().remove();
      });
      function sum(){
        var tanahValue      = document.getElementById('tanah').value;
        var bangunanValue   = document.getElementById('bangunan').value;
        var persediaanValue = document.getElementById('persediaan').value;
        var alatValue       = document.getElementById('alat').value;
        var kasValue        = document.getElementById('kas').value;
        var piutangValue    = document.getElementById('piutang').value;
        var peralatranValue = document.getElementById('peralatan').value;
        var result          = parseInt(tanahValue)+parseInt(bangunanValue)+parseInt(persediaanValue)+parseInt(alatValue)+parseInt(kasValue)+parseInt(piutangValue)+parseInt(peralatranValue);
          if (!isNaN(result)){
            document.getElementById('totaset').value=result;
          }
      }

      function sum1(){
        var transportValue  = document.getElementById('transport').value;
        var listrikValue    = document.getElementById('listrik').value;
        var telpValue       = document.getElementById('telp').value;
        var atkValue        = document.getElementById('atk').value;
        var lainValue       = document.getElementById('lain').value;
        var result          = parseInt(transportValue)+parseInt(listrikValue)+parseInt(telpValue)+parseInt(atkValue)+parseInt(lainValue);
          if (!isNaN(result)){
            document.getElementById('totop').value=result;
          }
      }

      function sum_modal(){
        var modalValue  = document.getElementById('modal').value;
        var investValue    = document.getElementById('invest').value;
        var result          = parseInt(modalValue)+parseInt(investValue);
          if (!isNaN(result)){
            document.getElementById('bsr_pjm').value=result;
          }
      }
    </script>

@endsection

