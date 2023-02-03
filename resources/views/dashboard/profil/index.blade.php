@extends('dashboard.layouts.main')

@section('container')

  <div class="card">
      <div class="card-body">
          <h5 class="card-title">Biodata Mitra</h5>
        <form  method="post" action="{{ route('profil.update')  }}" enctype="multipart/form-data" >
          @csrf
          @if (session('success'))
              <div class="alert alert-success">
                {{ session ('success') }}
              </div>
          @endif 

          <div class="row">  
            <div class="col-lg-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title " >Data Diri Mitra</h3>
                  </div>
                  <div class="panel-body">
                      <div class="form-group">
                          <label for="nama" class="form-label">Nama Mitra</label>
                          <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $mitra->nm) }}" disabled>                 
                      </div>

                      <div class="row ">
                          <div class="col-6 form-group clearfix ">
                              <label for="tmptlahir" class="form-label">Tempat Lahir</label>
                              <input type="text" class="form-control @error('tmptlahir') is-invalid @enderror "  id="tmptlahir" name="tmptlahir" value="{{ old('tmptlahir', $mitra->tpt_lhr) }}" >
                                @error('tmptlahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="col-6 form-group clearfix">
                              <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control @error('tgllahir') is-invalid  @enderror"  name="tgllahir" value="{{ old('tgllahir', $mitra->tgl_lhr) }}">
                                    @error('tgllahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                          </div>
                      </div>

                      <div class="row form-group clearfix" >
                          <div class="col-6 ">
                              <label for="stsper" class="form-label">Status Pernikahan</label>
                              <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input @error('stsper') is-invalid  @enderror" type="radio" name="stsper" id="stsper" value="belum"  {{ $mitra->sts_prk == 'belum' ? 'checked':'' }}  {{ old('stsper') =="belum" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="stsper"> Belum Kawin</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input @error('stsper') is-invalid  @enderror" type="radio" name="stsper" id="stsper" value="kawin"  {{ $mitra->sts_prk == 'kawin' ? 'checked':'' }} {{ old('stsper') =="kawin" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="stsper">Kawin </label>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input @error('stsper') is-invalid  @enderror" type="radio" name="stsper" id="stsper" value="cerhidup" {{ $mitra->sts_prk == 'cerhidup' ? 'checked':'' }}  {{ old('stsper') =="cerhidup" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="stsper">Cerai Hidup</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input @error('stsper') is-invalid  @enderror" type="radio" name="stsper" id="stsper"  value=" cermati" {{ $mitra->sts_prk == 'cermati' ? 'checked':'' }} {{ old('stsper') =="cermati" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="stsper"> Cerai Mati</label>
                                    </div>
                                </div>
                              </div>
                              @error('stsper')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="col-6">
                              <label for="gender" class="form-label">Jenis Kelamin</label>
                              <div class="form-check">
                                  <input class="form-check-input @error('gender') is-invalid  @enderror" type="radio" name="gender" id="gender" value="L" {{ old('gender') =="L" ? 'checked' : ''}}{{  $mitra->jk == 'L' ? 'checked':'' }} >
                                  <label class="form-check-label" for="gender">Laki-Laki </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input @error('gender') is-invalid  @enderror" type="radio" name="gender" id="gender" value="P"  {{ old('gender') =="P" ? 'checked' : ''}}{{ $mitra->jk == 'P' ? 'checked':'' }} >
                                  <label class="form-check-label" for="gender">Perempuan</label>
                              </div>
                              @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                      </div>

                      <div class="col-12 form-group clearfix">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control @error('alamat') is-invalid  @enderror" id="alamat" name="alamat"value="{{ old('alamat', $mitra->almt) }}">
                            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>

                      <div class="row ">
                          <div class="col-4 form-group clearfix">
                              <label for="klh" class="form-label">Kelurahan</label>
                              <input type="text" class="form-control @error('klh') is-invalid  @enderror"  id="klh" name="klh" value="{{ old('klh', $mitra->kel) }}">
                                @error('klh')<div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="kec" class="form-label">Kecamatan </label>
                              <input type="text" class="form-control @error('kec') is-invalid  @enderror"  id="kec" name="kec"value="{{ old('kec', $mitra->kec) }}">
                                @error('kec')  <div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="kab" class="form-label">Kabupaten </label>
                              <input type="text" class="form-control @error('kab') is-invalid  @enderror"   id="kab" name="kab" value="{{ old('kab', $mitra->kab) }}">
                                @error('kab')<div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-4 form-group clearfix">
                              <label for="notlp" class="form-label">No Telephone</label>
                              <input type="text" class="form-control @error('notlp') is-invalid  @enderror"  id="notlp" name="notlp" value="{{ old('notlp', $mitra->no_hp) }}">
                                @error('notlp') <div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>        
                          <div class="col-4 form-group clearfix">
                              <label for="noktp" class="form-label">No KTP </label>
                              <input type="text" class="form-control @error('noktp') is-invalid  @enderror" id="noktp" name="noktp" value="{{ old('noktp', $mitra->no_ktp) }}">
                                @error('noktp') <div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="tglktp" class="form-label">Tanggal KTP</label>
                              <div class="col-sm-12">
                                <input type="date" class="form-control @error('tglktp') is-invalid  @enderror"  name="tglktp" value="{{ old('tglktp', $mitra->tgl_ktp) }}">
                                  @error('tglktp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-4 form-group clearfix">
                              <label class="form-label" for ="pddk">Pendidikan Terakhir</label>
                              <div class="col-sm-12">
                                  <select class="form-select @error('pddk') is-invalid  @enderror" name="pddk" aria-label="Default select example">
                                      @if ( $mitra->pddk  != NULL){
                                            <option selected >{{ old('pddk',$mitra->pddk ) }}</option>
                                            
                                        } 
                                      @endif
                                          <option value = "">- Pilih -</option>
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
                              <input type="text" class="form-control @error('kursus') is-invalid  @enderror"  id="kursus" name="kursus" value="{{ old('kursus', $mitra->kursus) }}">
                                @error('kursus')<div class="invalid-feedback">{{ $message }}</div> @enderror
                              <p>* Jika tidak ada, dikosongkan saja </p>
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="jbt" class="form-label">Jabatan</label>
                              <input type="text" class="form-control @error('jbt') is-invalid  @enderror"  id="jbt" name="jbt" value="{{ old('jbt', $mitra->jbt) }}">
                                @error('jbt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div> 
                      </div>           

                      <div class="col-10 form-group clearfix">
                          <label for="foto" class="form-label">Pas Foto</label>
                          <div class="row">
                              <div class="col-sm-10">
                                <input class="form-control @error('foto') is-invalid  @enderror"  type="file" id="foto" name="foto" value="{{ old('foto', $mitra->foto) }}">
                                  @error('foto') <div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div> 
                                @if($mitra->foto==NULL)
                                  @else
                                  <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary btn-sm"> <a href="/foto"style="color:white;"> Lihat </a></button>
                                  </div>
                                @endif
                          </div>
                      </div>  

                      <div class="col-10 form-group clearfix">
                          <label for="scanktp" class="form-label">Scan KTP</label>
                          <div class="row">
                            <div class="col-sm-10">
                                <input class="form-control @error('scanktp') is-invalid  @enderror"  type="file" id="scanktp" name="scanktp" value="{{ old('scanktp', $mitra->scanktp) }}">
                                  @error('scanktp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div> 
                            @if($mitra->scanktp==NULL)
                              @else
                                <div class="col-sm-2">
                                  <button type="button" class="btn btn-primary btn-sm"> <a href="/scanktp"style="color:white;"> Lihat </a></button>
                                </div>
                            @endif
                          </div>
                      </div>        
                  </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title " >Data Usaha Mitra</h3>
                  </div>
                  <div class="panel-body">
                      <div class="form-group">
                          <div class="col-12 form-group ">
                              <label for="nmush" class="form-label" value="">Nama Usaha</label>
                              <input type="text" class="form-control " id="nmush" name="nmush" value="{{ old('nmush', $ush->nama_ush) }}"disabled>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-6 form-group clearfix">
                              <label for="jnsush" class="form-label">Jenis Usaha</label>
                              <div class="col-sm-12">
                                  <select class="form-select @error('jnsush') is-invalid  @enderror" id="jnsush" name="jnsush" >
                                      @if ( $ush->jnsush != NULL){
                                            <option selected >{{ old ('jnsush',$ush->jnsush) }}
                                              @if ($ush->jnsush=="industri") Industri
                                              @elseif($ush->jnsush=="perdagangan") Perdagangan
                                              @elseif($ush->jnsush=="jasa") Jasa
                                              @elseif($ush->jnsush=="perikanan") Perikanan
                                              @elseif($ush->jnsush=="pertanian") Pertanian
                                              @else Perternakan
                                              @endif
                                            </option>
                                        }
                                          
                                      @endif
                                          <option selected  value ="">- Pilih -</option>            
                                          <option value="industri" {{ old('jnsush') =="industri" ? 'selected' : ''}}>Industri</option>
                                          <option value="jasa" {{ old('jnsush') =="jasa" ? 'selected' : ''}}>Jasa</option>
                                          <option value="perdagangan" {{ old('jnsush') =="perdagangan" ? 'selected' : ''}}>Perdagangan</option>
                                          <option value="perikanan" {{ old('jnsush') =="perikanan" ? 'selected' : ''}}>Perikanan</option>
                                          <option value="pertanian" {{ old('jnsush') =="pertanian" ? 'selected' : ''}}>Pertanian</option>
                                          <option value="perternakan" {{ old('jnsush') =="perternakan" ? 'selected' : ''}}>Perternakan</option>
                                  </select>
                                  @error('jnsush')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                          </div>

                          <div class="col-6 form-group ">
                              <label for="thnbrd" class="form-label" value="">Tahun Berdiri</label>
                              <input type="text" class="form-control @error('thnbrd') is-invalid  @enderror"  id="thnbrd" name="thnbrd" value="{{ old('thnbrd', $ush->thn_berdiri) }}">
                                @error('thnbrd') <div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-6 form-group ">
                              <label for="aktaush" class="form-label" value="">Akta Usaha</label>
                              <input type="text" class="form-control @error('aktaush') is-invalid  @enderror" id="aktaush" name="aktaush" value="{{ old('aktaush', $ush->akta_ush) }}">
                                @error('aktaush')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                              <div class="col-6 form-group ">
                                  <label for="izinush" class="form-label" value="">Izin Usaha</label>
                                  <input type="text" class="form-control @error('izinush') is-invalid  @enderror"  id="izinush" name="izinush" value="{{ old('izinush', $ush->izin_ush) }}">
                                      @error('izinush')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                              </div>
                      </div>

                      <div class="row">
                          <div class=" form-group col-6">
                              <label for="almtush" class="form-label" value="">Alamat Usaha</label>
                              <input type="text" class="form-control @error('almtush') is-invalid  @enderror"  id="almtush" name="almtush" value="{{ old('almtush', $ush->almt_ush) }}">
                                @error('almtush')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class=" form-group col-6 ">
                              <label for="notlpush" class="form-label" value="">No Telphone Usaha</label>
                              <input type="text" class="form-control @error('notlpush') is-invalid  @enderror"   id="notlpush" name="notlpush" value="{{ old('notlpush', $ush->nohp_ush) }}">
                                @error('notlpush')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                      </div>
                      
                      <div class="row">
                          <div class="col-6 form-group ">
                              <label for="npwp" class="form-label" value="">NPWP</label>
                              <input type="text" class="form-control @error('npwp') is-invalid  @enderror"  id="npwp" name="npwp" value="{{ old('npwp', $ush->npwp) }}">
                                @error('npwp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                          <div class=" col-6 form-group clearfix form-check" style=" margin-top:9px">
                              <label for="tmptush" class="form-label">Tempat Usaha</label> <br>
                              <div class="row">
                                <div class="col-3">
                                    <label class=" form-check-label">
                                      <input  class="form-check-input  @error('tmptush') is-invalid  @enderror"  value="sewa" name="tmptush"   type="radio" {{ old('tmptush') =="sewa" ? 'checked' : ''}}{{ $ush->tmptush == 'sewa' ? 'checked':'' }} >Sewa
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class=" form-check-label">
                                      <input   class="form-check-input @error('tmptush') is-invalid  @enderror" value="sendiri" name="tmptush"   type="radio" {{ old('tmptush') =="sendiri" ? 'checked' : ''}} {{ $ush->tmptush == 'sendiri' ? 'checked':'' }} >Milik Sendiri
                                    </label>
                                </div>
                                @error('tmptush')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-4 form-group clearfix">
                              <label class="form-label" for ="bank">Bank</label>
                              <div class="col-sm-12">
                                  <select class="form-select @error('bank') is-invalid  @enderror" name="bank" aria-label="Default select example">
                                      @if ( $ush->bank  != NULL){
                                            <option selected >{{ old('bank',$ush->bank ) }}</option>
                                          @if ($ush->bank == "mandiri"){
                                            Mandiri
                                          } @else {
                                            BRI
                                          }
                                          @endif
                                      }
                                      @endif
                                          <option value="" >- Pilih -</option>
                                          <option value="mandiri" {{ old('bank') =="mandiri" ? 'selected' : ''}} {{ $ush->bank== 'mandiri' ? 'checked':'' }}>Mandiri</option>
                                          <option value="bri" {{ old('bank') =="bri" ? 'selected' : ''}} {{ $ush->bank== 'bri' ? 'checked':'' }}>BRI</option>
                                  </select>
                                   @error('bank')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="atsnm" class="form-label">Atas Nama </label>
                              <input type="text" class="form-control @error('atsnm') is-invalid  @enderror"  id="atsnm" name="atsnm" value="{{ old('atsnm', $ush->atsnm) }}">
                                @error('atsnm')<div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="norek" class="form-label">Nomor Rekening</label>
                              <input type="text" class="form-control @error('norek') is-invalid  @enderror"  id="norek" name="norek" value="{{ old('norek', $ush->norek) }}">
                                @error('norek') <div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div> 
                      </div>   
                  </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="form-group clearfix">
                <label for="confirm1"> </label>
                    <center>
                        <div class="alert alert-warning" style="color:black !important">
                        Sebelum Melakukan Update Data , Periksa Kembali Isian Data , Pastikan Semua Data Telah Terisi Dengan Benar
                          <br>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i></i> Update Data </button>
                    </center>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>

@endsection