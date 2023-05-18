@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-body">
            <table class="table ">
                <tr><td colspan="5" class="table-primary";>  Data Diri Mitra</td></tr>
                <tr>
                    <td rowspan="6" width="200px">
                        @if($mitra->scanktp != null)
                                <embed src = "{{ asset('storage/dokumen/'.$mitra->foto) }}" width="300" height="200">
                            @else 
                                <div class="alert alert-info">Mitra belum mengupload foto nya.</div>
                        @endif
                    </td>
                    <td width="200px">Nama</td>
                    <td width="10px" >:</td>
                    <td colspan="4">{{ ucwords($mitra->nm) }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td width="10px" >:</td>
                    <td>{{ ucwords($mitra->tpt_lhr) }}</td>
                </tr>
                <tr>
                    <td width="150px">Tanggal Lahir</td>
                    <td width="10px" >:</td>
                    <td>{{ Carbon\Carbon::parse($mitra->tgl_lhr )->format("d-M-Y") }}</td>
                </tr>
                <tr>
                    <td>Status Pernikahan</td>
                    <td width="10px" >:</td>
                    <td >
                        @if ($mitra->sts_prk== "belum") 
                                Belum Kawin
                            @elseif ($mitra->sts_prk== "kawin") 
                                Kawin
                            @elseif ($mitra->sts_prk== "cerhidup")
                            Cerai Hidup
                            @else
                            Cerai Mati
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td width="10px" >:</td>
                    <td >
                        @if ($mitra->jk == "L")  Laki-Laki
                            @else Wanita
                        @endif
                    </td>
                </tr>
                <tr>
                    <td >Alamat</td>
                    <td width="10px" >:</td>
                    <td > {{ ucwords($mitra->almt) }} </td>
                </tr>
                <tr>
                    <td rowspan="9" width="200px"> 
                        @if($mitra->scanktp != null)
                                <embed src = "{{ asset('storage/dokumen/'.$mitra->scanktp) }}" width="300" height="200">
                            @else 
                                <div class="alert alert-info">Mitra belum mengupload scan KTP nya.</div>
                        @endif
                    </td>
                    <td >Kelurahan</td>
                    <td width="10px" >:</td>
                    <td > {{ ucwords($mitra->kel) }}</td>
                </tr>
                <tr>
                    <td >Kecamatan</td>
                    <td width="10px" >:</td>
                    <td > {{ ucwords($mitra->kel) }} </td>
                </tr>
                <tr>
                    <td >Kabupaten</td>
                    <td width="10px" >:</td>
                    <td > {{ ucwords($mitra->kab) }} </td>
                </tr>
                <tr>
                    <td >Nomor HP</td>
                    <td width="10px" >:</td>
                    <td > {{ $mitra->no_hp }} </td>
                </tr>
                <tr>
                    <td >Nomor KTP</td>
                    <td width="10px" >:</td>
                    <td > {{ $mitra->no_ktp }} </td>
                </tr>
                <tr>
                    <td >Tanggal KTP</td>
                    <td width="10px" >:</td>
                    <td > {{ $mitra->tgl_ktp }} </td>
                </tr>
                <tr>
                    <td >Pendidikan</td>
                    <td width="10px" >:</td>
                    <td > {{ strtoupper($mitra->pddk) }} </td>
                </tr>
                <tr>
                    <td >Kursus</td>
                    <td width="10px" >:</td>
                    <td > {{ ucwords($mitra->kursus) }} </td>
                </tr>
                <tr>
                    <td >Jabatan</td>
                    <td width="10px" >:</td>
                    <td > {{ ucwords($mitra->jbt)}} </td>
                </tr>
            </table>
            <table class="table ">
                <tr>
                <td colspan="6" class="table-primary";>  Data Usaha Mitra</td>
                </tr>
                <tr>
                    <td width="180px">Nama Usaha</td>
                    <td width="10px" >:</td>
                    <td  width="200px"> {{ ucwords($mitra->data_ush->nama_ush)}} </td>
                    <td width="180px">Jenis Usaha</td>
                    <td width="10px" >:</td>
                    <td > {{ ucwords($mitra->data_ush->jnsush)}} </td>
                </tr>
                <tr>
                    <td width="180px">Akta Usaha</td>
                    <td width="10px" >:</td>
                    <td  width="200px"> {{ $mitra->data_ush->akta_ush}} </td>
                    <td width="180px">Izin Usaha</td>
                    <td width="10px" >:</td>
                    <td > {{ $mitra->data_ush->izin_ush}} </td>
                </tr>
                <tr>
                    <td width="180px">Tahun Berdiri Usaha</td>
                    <td width="10px" >:</td>
                    <td  width="200px"> {{ $mitra->data_ush->thn_berdiri}} </td>
                    <td width="180px">NPWP</td>
                    <td width="10px" >:</td>
                    <td > {{ $mitra->data_ush->npwp}} </td>
                </tr>
                <tr>
                    <td width="180px">Alamat</td>
                    <td width="10px" >:</td>
                    <td  width="200px"> {{ ucwords($mitra->data_ush->almt_ush)}} </td>
                    <td width="180px">No HP</td>
                    <td width="10px" >:</td>
                    <td > {{ $mitra->data_ush->nohp_ush}} </td>
                </tr>
                <tr>
                    <td width="180px">Tempat Usaha</td>
                    <td width="10px" >:</td>
                    <td  width="200px"> {{ ucwords($mitra->data_ush->tmptush)}} </td>
                </tr>
            </table>
        </div>
    </div>
@endsection