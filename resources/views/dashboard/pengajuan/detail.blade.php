@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-9">
      <div class="card">
        <div class="card-body">
          @if($user->is_admin ==0 )
              <div style="overflow-x:auto; margin-top:30px">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Tanggal Pengajuan</td>
                      <td>:</td>
                      <td>{{ $pengajuan1->created_at  }}</td>
                    </tr>
                    <tr>
                      <td>Status Pengajuan</td>
                      <td>:</td>
                      <td>
                      @if($pengajuan1->status == 'menunggu') 
                          <span class="badge bg-secondary">Menunggu</span>
                        @elseif($pengajuan1->status == 'lulus')
                          <span class="badge bg-success">Pengajuan Diterima</span>
                        @else
                          <span class="badge bg-danger">Pengajuan Ditolak</span>
                      @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Nama Usaha</td>
                      <td>:</td>
                      <td>{{ ucwords($ush->nama_ush)  }}</td>
                    </tr>
                    <tr>
                      <td>Nama Penanggung Jawab Usaha</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->data_mitra->nm) }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              {{-- Data Diri Penangung Jawab Usaha  --}}
              <div class="fw-bold">Data Diri Penangung Jawab Usah</div>
              <div style="overflow-x:auto">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Nama </td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->data_mitra->nm) }}</td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir </td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->data_mitra->tpt_lhr)}}</td>
                    </tr>
                    <tr>
                      <td>Tenggal Lahir </td>
                      <td>:</td>
                      <td>{{ $pengajuan1->data_mitra->tgl_lhr}}</td>
                    </tr>
                    <tr>
                      <td> Jenis Kelamin</td>
                      <td>:</td>
                      <td>
                          @if( $pengajuan1->data_mitra->jk == "L" ) Laki - laki
                            @else Perempuan
                          @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Status Perkawinan</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->data_mitra->sts_prk)}}</td>
                    </tr>
                    <tr>
                      <td>Kebangsaan </td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->data_mitra->bangsa)}}</td>
                    </tr>
                    <tr>
                      <td>Alamat Rumah</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->data_mitra->almt)}}</td>
                    </tr>
                    <tr>
                      <td>Nomor Telpon </td>
                      <td>:</td>
                      <td>{{ $pengajuan1->data_mitra->no_hp}}</td>
                    </tr>
                    <tr>
                      <td>Nomor KTP</td>
                      <td>:</td>
                      <td>{{ $pengajuan1->data_mitra->no_ktp}}</td>
                    </tr>
                    <tr>
                      <td>Tanggal dikeluarkan </td>
                      <td>:</td>
                      <td>{{ $pengajuan1->data_mitra->tgl_ktp}}</td>
                    </tr>
                    <tr>
                      <td>Pendidikan terakhir/Umum</td>
                      <td>:</td>
                      <td>{{ $pengajuan1->data_mitra->pddk}}</td>
                    </tr>
                    <tr>
                      <td>Kursus</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->data_mitra->kursus)}}</td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->data_mitra->jbt)}}</td>
                    </tr>
                  </tbody>
                </table> 
              </div>
              {{-- Data Diri Usaha --}}
              <div class="fw-bold ">Data Perusahaan</div> 
              <div style="overflow-x:auto">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Nama Perusahaan</td>
                      <td>:</td>
                      <td>{{ ucwords($ush->nama_ush)}}</td>
                    </tr>
                    <tr>
                      <td>Akta Perusahaan </td>
                      <td>:</td>
                      <td>{{ $ush->akta_ush}}</td>
                    </tr>
                    <tr>
                      <td>Izin-izin Usaha yang dimiliki </td>
                      <td>:</td>
                      <td>{{ $ush->izin_ush}}</td>
                    </tr>
                    <tr>
                      <td> Bidang Usaha</td>
                      <td>:</td>
                      <td>{{ ucwords($ush->sektorush)}}</td>
                    </tr>
                    <tr>
                      <td>Jenis Usaha</td>
                      <td>:</td>
                      <td>{{ ucwords($ush->jnsush)}}</td>
                    </tr>
                    <tr>
                      <td>Berdiri Sejak </td>
                      <td>:</td>
                      <td>{{ $ush->thn_berdiri}}</td>
                    </tr>
                    <tr>
                      <td>Alamat Perusahaan</td>
                      <td>:</td>
                      <td>{{ ucwords($ush->almt_ush)}}</td>
                    </tr>
                    <tr>
                      <td>Nomor Telpon </td>
                      <td>:</td>
                      <td>{{ $ush->nohp_ush}}</td>
                    </tr>
                    <tr>
                      <td>NPWP</td>
                      <td>:</td>
                      <td>{{ $ush->npwp}}</td>
                    </tr>
                    <tr>
                      <td>Nama Bank </td>
                      <td>:</td>
                      <td>{{ strtoupper($ush->bank)}}</td>
                    </tr>
                    <tr>
                      <td>Atas Nama</td>
                      <td>:</td>
                      <td>{{ ucwords($ush->atsnm)}}</td>
                    </tr>
                    <tr>
                      <td>Nomor Rekening</td>
                      <td>:</td>
                      <td>{{ $ush->norek}}</td>
                    </tr>
                  </tbody>
                </table> 
              </div>
              {{-- Data Diri Penangung Jawab Berikutnya  --}}
              <div class="fw-bold "> Data Diri Penangung Jawab Berikutnya </div> 
              <div style="overflow-x:auto">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Nama </td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->pjb->nm) }}</td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir </td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->pjb->tpt_lhr)}}</td>
                    </tr>
                    <tr>
                      <td>Tenggal Lahir </td>
                      <td>:</td>
                      <td>{{ $pengajuan1->pjb->tgl_lhr}}</td>
                    </tr>
                    <tr>
                      <td> Jenis Kelamin</td>
                      <td>:</td>
                      <td>
                          @if( $pengajuan1->pjb->jk == "L" ) Laki - laki
                            @else Perempuan
                          @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Status Hubungan dengan Penangung Jawab Usaha</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->pjb->hub)}}</td>
                    </tr>
                    <tr>
                      <td>Kebangsaan </td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->pjb->bangsa)}}</td>
                    </tr>
                    <tr>
                      <td>Alamat Rumah</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->pjb->almt)}}</td>
                    </tr>
                    <tr>
                      <td>Nomor Telpon </td>
                      <td>:</td>
                      <td>{{ $pengajuan1->pjb->no_hp}}</td>
                    </tr>
                    <tr>
                      <td>Nomor KTP</td>
                      <td>:</td>
                      <td>{{ $pengajuan1->pjb->no_ktp}}</td>
                    </tr>
                    <tr>
                      <td>Tanggal dikeluarkan </td>
                      <td>:</td>
                      <td>{{ $pengajuan1->pjb->tgl_ktp}}</td>
                    </tr>
                    <tr>
                      <td>Pendidikan terakhir/Umum</td>
                      <td>:</td>
                      <td>{{ $pengajuan1->pjb->pddk}}</td>
                    </tr>
                    <tr>
                      <td>Kursus</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->pjb->kursus)}}</td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td>{{ ucwords($pengajuan1->pjb->jbt)}}</td>
                    </tr>
                  </tbody>
                </table> 
              </div>
              {{-- Asset --}}
              <div class="fw-bold "> Nilai Asset </div> 
              <div style="overflow-x:auto">
                <table  class="table table-bordered css-serials">
                  <thead>
                    <tr>
                      <th >No</th>
                      <th > ASSET  </th>
                      <th class="titikdua">:</th>
                      <th > NILAI (RP) </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Tanah</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->aset->formatRupiah('tanah') }}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Bangunan</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->aset->formatRupiah('bangunan') }}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Persediaan</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->aset->formatRupiah('persediaan') }}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Alat Kerja/Peralatan Usaha</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->aset->formatRupiah('alat') }}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Kas</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->aset->formatRupiah('kas') }}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Piutang</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->aset->formatRupiah('piutang') }}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Peralatan Produksi</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->aset->formatRupiah('peralatan') }}</td>
                    </tr>
                    <tr>
                      <th colspan=2 style="text-align:center"  > Total Nilai Asset</th>
                      <th class="titikdua">:</th>
                      <th class="isi"> {{ $pengajuan1->aset->formatRupiah('totaset') }}</th>
                    </tr>
                  </tbody>
                </table>
              </div>
              {{-- alat kerja --}}
              <div class="fw-bold "> Alat Kerja dan Alat Bantu </div> 
              <div style="overflow-x:auto">
                <table  class="table table-bordered css-serials" >
                  <thead>
                    <tr>
                      <th > NO.  </th>
                      <th class="data1">NAMA BARANG</th>
                      <th class="data1"> HARGA SATUAN </th>
                      <th  class="data1"> JML HARGA (Rp) </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $alat as $alt )
                        <tr>
                        <td class="nomor">.</td>
                        <td >{{ucwords( $alt->nm_brg) }}</td>
                        <td > {{$alt->formatRupiah('hrg_satuan')  }}</td>
                        <td > {{$alt->formatRupiah('jmlh') }}</td>
                      </tr>
                    @endforeach
                    <tr>
                      <th style="text-align:center" colspan=3> Jumlah</th>
                      <th align=left >Rp {{  number_format($totalat,0,',','.') }}</th>
                    </tr>
                  </tbody>
                </table> 
              </div>
              {{--Tenaga kerja --}}
              <div class="fw-bold "> Tenaga Kerja  </div> 
              <div style="overflow-x:auto">
                <table  class="table table-bordered css-serials" >
                  <thead>
                    <tr>
                      <th > NO.  </th>
                      <th class="data1" >NAMA </th>
                      <th class="data1"> JABATAN </th>
                      <th class="data1"> GAJI (Rp) </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $tenaga as $tng )
                      <tr>
                        <td class="nomor">.</td>
                        <td >{{ucwords( $tng->nm_tngk) }}</td>
                        <td >{{ucwords( $tng->jbt )}}</td>
                        <td > {{$tng->formatRupiah('gaji')}}</td>
                      </tr>
                    @endforeach
                    <tr>
                        <th colspan=3> Jumlah</th>
                        <th align=left >Rp {{ number_format($totgaji,0,',','.') }}</th>
                    </tr>
                  </tbody>
                </table> 
              </div>
              {{--Biaya Oprasional --}}
              <div class="fw-bold "> Biaya Oprasional  </div> 
              <div style="overflow-x:auto">
                <table  class="table table-bordered css-serials" >
                  <tbody>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Transport</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->oprasional->formatRupiah('transport') }}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Listrik</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->oprasional->formatRupiah('listrik')}}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Telepon</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->oprasional->formatRupiah('telpon')}}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">ATK</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->oprasional->formatRupiah('atk') }}</td>
                    </tr>
                    <tr>
                      <td class="nomor">.</td>
                      <td class="data">Lain-lain</td>
                      <td class="titikdua">:</td>
                      <td class="isi"> {{ $pengajuan1->oprasional->formatRupiah('lain') }}</td>
                    </tr>
                    <tr>
                      <th colspan=2 align=center; > Total Biaya Oprasional</th>
                      <th class="titikdua">:</th>
                      <th class="isi">{{ $pengajuan1->oprasional->formatRupiah('totop') }}</th>
                    </tr>
                  </tbody>
                </table> 
              </div>
              {{--Omzet --}}
              <div class="fw-bold "> Omzet </div> 
              <div style="overflow-x:auto">
                <table  class="table table-bordered css-serials" >
                  <thead>
                      <tr>
                        <th > NO.  </th>
                        <th class="data1">NAMA BARANG</th>
                        <th > HARGA SATUAN </th>
                        <th  class="data1"> JML HARGA (Rp) </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ( $omzet as $omz )
                      <tr>
                        <td class="nomor">.</td>
                        <td >{{ucwords( $omz->nm_brg) }}</td>
                        <td align=right> {{$omz->formatRupiah('hrg_satuan')  }}</td>
                        <td > {{$omz->formatRupiah('jmlh') }}</td>
                      </tr>
                    @endforeach
                    <tr>
                      <th colspan=3> Jumlah</th>
                      <th align=left >Rp {{ number_format($totomzet,0,',','.') }}</th>
                    </tr>
                  </tbody>
                </table> 
              </div>
              {{-- penempatan modal --}}
              <div class="fw-bold "> Penempataan Modal</div> 
              <div style="overflow-x:auto">
                <table  class="table table-bordered css-serials" >
                  <thead>
                      <tr>
                        <th > NO.  </th>
                        <th class="data1">URAIAN</th>
                        <th class="data1" > JUMLAH (Rp) </th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr >
                      <td class="nomor"></td>
                      <td >investasi</td>
                      <td class="rp"> {{ $pengajuan1->formatRupiah('investasi') }} </td>
                    </tr>
                    <tr >
                      <td class="nomor"></td>
                      <td >Modal Usaha</td>
                      <td class="rp">{{  $pengajuan1->formatRupiah('modal') }}</td>
                    </tr>
                    <tr >
                      <th colspan=2> Jumlah</th>
                      <th class="rp">Rp {{ $pengajuan1->formatRupiah('bsr_pinjaman') }} </th>
                    </tr>
                  </tbody>
                </table> 
              </div>
              {{-- dokumen --}}
              <div class="fw-bold "> Dokumen</div> 
              <div style="overflow-x:auto">
                <table class="table table-striped">
                  <tbody>
                      <tr>
                        <td>Pas Foto Penanggung Jawab Usaha</td>
                        <td>:</td>
                        <td><embed src = "{{ asset('storage/dokumen/'.$pengajuan1->data_mitra->foto) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Scan KTP Penanggung Jawab Usaha</td>
                        <td>:</td>
                        <td><embed src = "{{ asset('storage/dokumen/'.$pengajuan1->data_mitra->scanktp) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Pas Foto Penanggung Jawab Berikutnya</td>
                        <td>:</td>
                        <td><embed src = "{{ asset('storage/dokumen/'.$pengajuan1->pjb->foto) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Scan KTP Penanggung Jawab Berikutnya</td>
                        <td>:</td>
                        <td><embed src = "{{ asset('storage/dokumen/'.$pengajuan1->pjb->scanktp) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Bukti tanda keseriusan </td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/bukti-keseriusan/{{ $pengajuan1->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Scan KK</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/scan-kk/{{ $pengajuan1->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Foto Kegiatan Usah</td>
                        <td>:</td>
                        <td> <embed src = "{{ asset('storage/dokumen/'.$pengajuan1->foto_kegiatan) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Scan Surat Keterangan Berusaha dari RT/RW Setingkat</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/ket-berusaha/{{ $pengajuan1->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Surat Belum Dibina BUMN</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/surat-belum-dibina-bumn/{{ $pengajuan1->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Surat Penanggung Jawab berikutnya</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/surat-penanggung-jawab-berikutnya/{{ $pengajuan1->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Surat Kesanggupan Melunasi Peminjaman</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/surat-kesanggupan-melunasi/{{ $pengajuan1->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                  </tbody>
                </table> 
              </div>
            @else
            {{-- ADMIN --}}
              @can('admin')
                <div class="row">
                  <div class="col-lg-8 col-10 "><h5 class="card-title"> Detail Pengajuan</h5> </div>
                  <div class="col-lg-4 col-2">
                      <button class="btn btn-primary" style="margin-top:12px; float:right" >
                        <a href="/cetak/{{ $pengajuan->id }}" class="bi bi-printer" style="color:white" > </a>
                      </button>
                  </div>
                </div>
                <div style="overflow-x:auto">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td style="width:350px">Tanggal Pengajuan</td>
                        <td>:</td>
                        <td>{{ $pengajuan->created_at  }}</td>
                      </tr>
                      <tr>
                        <td>Status Pengajuan</td>
                        <td>:</td>
                        <td>
                          @if($pengajuan->status == 'menunggu') 
                              <span class="badge bg-secondary">Menunggu</span>
                            @elseif($pengajuan->status == 'lulus')
                              <span class="badge bg-success">Pengajuan Diterima</span>
                            @else
                              <span class="badge bg-danger">Pengajuan Ditolak</span>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Usaha</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->data_mitra->data_ush->nama_ush)  }}</td>
                      </tr>
                      <tr>
                        <td>Nama Penanggung Jawab Usaha</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->data_mitra->nm) }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                {{-- Data Diri Penangung Jawab Usaha  --}}
                <div class="fw-bold">Data Diri Penangung Jawab Usah</div>
                <div style="overflow-x:auto">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td style="width:350px">Nama </td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->data_mitra->nm) }}</td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir </td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->data_mitra->tpt_lhr)}}</td>
                      </tr>
                      <tr>
                        <td>Tenggal Lahir </td>
                        <td>:</td>
                        <td>{{ $pengajuan->data_mitra->tgl_lhr}}</td>
                      </tr>
                      <tr>
                        <td> Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            @if( $pengajuan->data_mitra->jk == "L" ) Laki - laki
                              @else Perempuan
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Status Perkawinan</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->data_mitra->sts_prk)}}</td>
                      </tr>
                      <tr>
                        <td>Kebangsaan </td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->data_mitra->bangsa)}}</td>
                      </tr>
                      <tr>
                        <td>Alamat Rumah</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->data_mitra->almt)}}</td>
                      </tr>
                      <tr>
                        <td>Nomor Telpon </td>
                        <td>:</td>
                        <td>{{ $pengajuan->data_mitra->no_hp}}</td>
                      </tr>
                      <tr>
                        <td>Nomor KTP</td>
                        <td>:</td>
                        <td>{{ $pengajuan->data_mitra->no_ktp}}</td>
                      </tr>
                      <tr>
                        <td>Tanggal dikeluarkan </td>
                        <td>:</td>
                        <td>{{ $pengajuan->data_mitra->tgl_ktp}}</td>
                      </tr>
                      <tr>
                        <td>Pendidikan terakhir/Umum</td>
                        <td>:</td>
                        <td>{{ $pengajuan->data_mitra->pddk}}</td>
                      </tr>
                      <tr>
                        <td>Kursus</td>
                        <td>:</td>
                        <td>{{ $pengajuan->data_mitra->kursus}}</td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->data_mitra->jbt)}}</td>
                      </tr>
                    </tbody>
                  </table> 
                </div>
                {{-- Data Diri Usaha --}}
                <div class="fw-bold ">Data Perusahaan</div> 
                <div style="overflow-x:auto">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td style="width:350px">Nama Perusahaan</td>
                        <td>:</td>
                        <td>{{ucwords($pengajuan->data_mitra->data_ush->nama_ush)}}</td>
                      </tr>
                      <tr>
                        <td>Akta Perusahaan </td>
                        <td>:</td>
                        <td>{{$pengajuan->data_mitra->data_ush->akta_ush}}</td>
                      </tr>
                      <tr>
                        <td>Izin-izin Usaha yang dimiliki </td>
                        <td>:</td>
                        <td>{{$pengajuan->data_mitra->data_ush->izin_ush}}</td>
                      </tr>
                      <tr>
                        <td> Bidang Usaha</td>
                        <td>:</td>
                        <td>{{ucwords($pengajuan->data_mitra->data_ush->sektorush)}}</td>
                      </tr>
                      <tr>
                        <td>Jenis Usaha</td>
                        <td>:</td>
                        <td>{{ucwords($pengajuan->data_mitra->data_ush->jnsush)}}</td>
                      </tr>
                      <tr>
                        <td>Berdiri Sejak </td>
                        <td>:</td>
                        <td>{{$pengajuan->data_mitra->data_ush->thn_berdiri}}</td>
                      </tr>
                      <tr>
                        <td>Alamat Perusahaan</td>
                        <td>:</td>
                        <td>{{ucwords($pengajuan->data_mitra->data_ush->almt_ush)}}</td>
                      </tr>
                      <tr>
                        <td>Nomor Telpon </td>
                        <td>:</td>
                        <td>{{$pengajuan->data_mitra->data_ush->nohp_ush}}</td>
                      </tr>
                      <tr>
                        <td>NPWP</td>
                        <td>:</td>
                        <td>{{$pengajuan->data_mitra->data_ush->npwp}}</td>
                      </tr>
                      <tr>
                        <td>Nama Bank </td>
                        <td>:</td>
                        <td>{{strtoupper($pengajuan->data_mitra->data_ush->bank)}}</td>
                      </tr>
                      <tr>
                        <td>Atas Nama</td>
                        <td>:</td>
                        <td>{{$pengajuan->data_mitra->data_ush->atsnm}}</td>
                      </tr>
                      <tr>
                        <td>Nomor Rekening</td>
                        <td>:</td>
                        <td>{{$pengajuan->data_mitra->data_ush->norek}}</td>
                      </tr>
                    </tbody>
                  </table> 
                </div>
                {{-- Data Diri Penangung Jawab Berikutnya  --}}
                <div class="fw-bold "> Data Diri Penangung Jawab Berikutnya </div> 
                <div style="overflow-x:auto">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>Nama </td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->pjb->nm )}}</td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir </td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->pjb->tpt_lhr)}}</td>
                      </tr>
                      <tr>
                        <td>Tenggal Lahir </td>
                        <td>:</td>
                        <td>{{ $pengajuan->pjb->tgl_lhr}}</td>
                      </tr>
                      <tr>
                        <td> Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            @if( $pengajuan->pjb->jk == "L" ) Laki - laki
                              @else Perempuan
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Status Hubungan dengan Penangung Jawab Usaha</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->pjb->hub)}}</td>
                      </tr>
                      <tr>
                        <td>Kebangsaan </td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->pjb->bangsa)}}</td>
                      </tr>
                      <tr>
                        <td>Alamat Rumah</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->pjb->almt)}}</td>
                      </tr>
                      <tr>
                        <td>Nomor Telpon </td>
                        <td>:</td>
                        <td>{{ $pengajuan->pjb->no_hp}}</td>
                      </tr>
                      <tr>
                        <td>Nomor KTP</td>
                        <td>:</td>
                        <td>{{ $pengajuan->pjb->no_ktp}}</td>
                      </tr>
                      <tr>
                        <td>Tanggal dikeluarkan </td>
                        <td>:</td>
                        <td>{{ $pengajuan->pjb->tgl_ktp}}</td>
                      </tr>
                      <tr>
                        <td>Pendidikan terakhir/Umum</td>
                        <td>:</td>
                        <td>{{ $pengajuan->pjb->pddk}}</td>
                      </tr>
                      <tr>
                        <td>Kursus</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->pjb->kursus)}}</td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ ucwords($pengajuan->pjb->jbt)}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                {{-- Asset --}}
                <div class="fw-bold "> Nilai Asset </div> 
                <div style="overflow-x:auto">
                  <table  class="table table-bordered css-serials">
                    <thead>
                      <tr>
                        <th >No</th>
                        <th > ASSET  </th>
                        <th class="titikdua">:</th>
                        <th > NILAI (RP) </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Tanah</td>
                        <td class="titikdua">:</td>
                        <td class="isi">{{ $pengajuan->aset->formatRupiah('tanah') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Bangunan</td>
                        <td class="titikdua">:</td>
                        <td class="isi">{{ $pengajuan->aset->formatRupiah('bangunan') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Persediaan</td>
                        <td class="titikdua">:</td>
                        <td class="isi">{{ $pengajuan->aset->formatRupiah('persediaan') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Alat Kerja/Peralatan Usaha</td>
                        <td class="titikdua">:</td>
                        <td class="isi">{{ $pengajuan->aset->formatRupiah('alat') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Kas</td>
                        <td class="titikdua">:</td>
                        <td class="isi">{{ $pengajuan->aset->formatRupiah('kas') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Piutang</td>
                        <td class="titikdua">:</td>
                        <td class="isi">{{ $pengajuan->aset->formatRupiah('piutang') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Peralatan Produksi</td>
                        <td class="titikdua">:</td>
                        <td class="isi">{{ $pengajuan->aset->formatRupiah('peralatan') }}</td>
                      </tr>
                      <tr>
                        <th colspan=2 style="text-align:center"  > Total Nilai Asset</th>
                        <th class="titikdua">:</th>
                        <th class="isi">{{ $pengajuan->aset->formatRupiah('totaset') }}</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
                {{-- alat kerja --}}
                <div class="fw-bold "> Alat Kerja dan Alat Bantu </div> 
                <div style="overflow-x:auto">
                  <table  class="table table-bordered css-serials" >
                    <thead>
                        <tr>
                          <th > NO.  </th>
                          <th class="data1">NAMA BARANG</th>
                          <th class="data1"> HARGA SATUAN </th>
                          <th  class="data1"> JML HARGA (Rp) </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ( $alat as $alt ) 
                        <tr>
                          <td class="nomor">.</td>
                          <td >{{ucwords( $alt->nm_brg) }}</td>
                          <td > {{$alt->formatRupiah('hrg_satuan')  }}</td>
                          <td > {{$alt->formatRupiah('jmlh') }}</td>
                        </tr>
                      @endforeach 
                      <tr>
                        <th style="text-align:center" colspan=3> Jumlah</th>
                        <th align=left >Rp {{  number_format($totalat,0,',','.') }}</th>
                      </tr>
                    </tbody>
                  </table> 
                </div>
                {{--Tenaga kerja --}}
                <div class="fw-bold "> Tenaga Kerja  </div> 
                <div style="overflow-x:auto">
                  <table  class="table table-bordered css-serials" >
                    <thead>
                      <tr>
                        <th > NO.  </th>
                        <th class="data1" >NAMA </th>
                        <th class="data1"> JABATAN </th>
                        <th class="data1"> GAJI (Rp) </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ( $tenaga as $tng )
                        <tr>
                          <td class="nomor">.</td>
                          <td >{{ucwords( $tng->nm_tngk) }}</td>
                          <td >{{ucwords( $tng->jbt )}}</td>
                          <td > {{$tng->formatRupiah('gaji')}}</td>
                        </tr>
                      @endforeach
                      <tr>
                        <th colspan=3 style="text-align:center" > Jumlah</th>
                        <th align=left >Rp {{ number_format($totgaji,0,',','.') }}</th>
                      </tr>
                    </tbody>
                  </table> 
                </div>
                {{--Biaya Oprasional --}}
                <div class="fw-bold "> Biaya Oprasional  </div> 
                <div style="overflow-x:auto">
                  <table  class="table table-bordered css-serials" >
                    <tbody>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Transport</td>
                        <td class="titikdua">:</td>
                        <td class="isi"> {{ $pengajuan->oprasional->formatRupiah('transport') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Listrik</td>
                        <td class="titikdua">:</td>
                        <td class="isi"> {{ $pengajuan->oprasional->formatRupiah('listrik') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Telepon</td>
                        <td class="titikdua">:</td>
                        <td class="isi"> {{ $pengajuan->oprasional->formatRupiah('telpon')}}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">ATK</td>
                        <td class="titikdua">:</td>
                        <td class="isi"> {{ $pengajuan->oprasional->formatRupiah('atk') }}</td>
                      </tr>
                      <tr>
                        <td class="nomor">.</td>
                        <td class="data">Lain-lain</td>
                        <td class="titikdua">:</td>
                        <td class="isi"> {{ $pengajuan->oprasional->formatRupiah('lain') }}</td>
                      </tr>
                      <tr>
                        <th colspan=2 style="text-align:center"  > Total Biaya Oprasional</th>
                        <th class="titikdua">:</th>
                        <th class="isi"> {{ $pengajuan->oprasional->formatRupiah('totop') }}</th>
                      </tr>
                    </tbody>
                  </table> 
                </div>
                {{--Omzet --}}
                <div class="fw-bold "> Omzet </div> 
                <div style="overflow-x:auto">
                  <table  class="table table-bordered css-serials" >
                    <thead>
                        <tr>
                          <th> NO.  </th>
                          <th class="data1">NAMA BARANG</th>
                          <th> HARGA SATUAN </th>
                          <th  class="data1" align=center> JML HARGA (Rp) </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ( $omzet as $omz )
                          <tr>
                          <td class="nomor">.</td>
                          <td >{{ucwords( $omz->nm_brg) }}</td>
                          <td align=right> {{$omz->formatRupiah('hrg_satuan')  }}</td>
                          <td > {{$omz->formatRupiah('jmlh') }}</td>
                        </tr>
                      @endforeach
                      <tr>
                        <th colspan=3 style="text-align:center" > Jumlah</th>
                        <th align=left >Rp {{ number_format($totomzet,0,',','.') }}</th>
                      </tr>
                    </tbody>
                  </table> 
                </div>
                {{-- penempatan modal --}}
                <div class="fw-bold "> Penempataan Modal</div> 
                <div style="overflow-x:auto">
                  <table  class="table table-bordered css-serials" >
                    <thead>
                        <tr>
                          <th > NO.  </th>
                          <th class="data1">URAIAN</th>
                          <th class="data1"  > JUMLAH (Rp) </th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr >
                        <td class="nomor"></td>
                        <td >investasi</td>
                        <td class="rp"> {{ $pengajuan->formatRupiah('investasi') }} </td>
                      </tr>
                      <tr >
                        <td class="nomor"></td>
                        <td >Modal Usaha</td>
                        <td class="rp"> {{  $pengajuan->formatRupiah('modal') }}</td>
                      </tr>
                      <tr>
                        <th colspan=2 style="text-align:center" > Jumlah</th>
                        <th class="rp"> {{ $pengajuan->formatRupiah('bsr_pinjaman') }} </th>
                      </tr>
                    </tbody>
                  </table> 
                </div>
                {{-- Dokumen --}}
                <div class="fw-bold "> Dokumen</div> 
                <div style="overflow-x:auto">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>Pas Foto Penanggung Jawab Usaha</td>
                        <td>:</td>
                          <td><embed src = "{{ asset('storage/dokumen/'.$pengajuan->data_mitra->foto) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Scan KTP Penanggung Jawab Usaha</td>
                        <td>:</td>
                        <td><embed src = "{{ asset('storage/dokumen/'.$pengajuan->data_mitra->scanktp) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Pas Foto Penanggung Jawab Berikutnya</td>
                        <td>:</td>
                        <td><embed src = "{{ asset('storage/dokumen/'.$pengajuan->pjb->foto) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Scan KTP Penanggung Jawab Berikutnya</td>
                        <td>:</td>
                        <td><embed src = "{{ asset('storage/dokumen/'.$pengajuan->pjb->scanktp) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                          <td>Bukti tanda keseriusan </td>
                          <td>:</td>
                          <td><button type="button" class="btn btn-primary btn-sm"> <a href="/bukti-keseriusan/{{ $pengajuan->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Scan KK</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/scan-kk/{{ $pengajuan->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Foto Kegiatan Usah</td>
                        <td>:</td>
                        <td> <embed src = "{{ asset('storage/dokumen/'.$pengajuan->foto_kegiatan) }}" width="200" height="200"></td>
                      </tr>
                      <tr>
                        <td>Scan Surat Keterangan Berusaha dari RT/RW Setingkat</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/ket-berusaha/{{ $pengajuan->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Surat Belum Dibina BUMN</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/surat-belum-dibina-bumn/{{ $pengajuan->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Surat Penanggung Jawab berikutnya</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/surat-penanggung-jawab-berikutnya/{{ $pengajuan->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                      <tr>
                        <td>Surat Kesanggupan Melunasi Peminjaman</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary btn-sm"> <a href="/surat-kesanggupan-melunasi/{{ $pengajuan->id }}"style="color:white;"> Lihat </a></button></td>
                      </tr>
                    </tbody>
                  </table> 
                </div>
              @endcan
          @endif
        </>
      </div>
    </div>
@endsection