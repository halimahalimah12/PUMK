<!DOCTYPE html>
<html >
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Halaman Print A4</title>
  </head>
  <style>
     table,tr,td,th{
      text-align:center; border-collapse: collapse;
      border: 1px solid;
    }
  </style>
  
  <body>
    <div class="book">
      <div class="page">
        
            {{-- <center> <h3> DAFTAR PERSETUJUAN CALON MITRA BINAAN TAHUN 2022 </h3> </center>
            <center> <h3 > PT ANGKASA PURA II </h3> </center>
            <center> <h3 > CABANG BANDARA SULTAN THAHA - JAMBI</h3> </center> --}}
            
            <div style="padding-top:20px; font-size:12px">
              <table >
                <thead>
                  <tr>
                    <th rowspan="2" valign="middle">No</th>
                    <th rowspan="2" valign="middle">NAMA USAHA & ALAMAT</th>
                    <th rowspan="2" valign="middle">NAMA PIMPINAN </th>
                    <th  >SEKTOR USAHA</th>
                    <th rowspan="2" valign="middle">JUMLAH SDM</th>
                    <th rowspan="2" valign="middle">ASSET</th>
                    <th rowspan="2" valign="middle">OMZET PERBULAN</th>
                    <th rowspan="2" valign="middle">BIAYA PERBULAN</th>
                    <th rowspan="2" valign="middle">BANTUAN YANG DIMINTA </th>
                    <th rowspan="2" valign="middle">KEMAMPUAN ANGSURAN</th>
                    <th rowspan="2" valign="middle">PINJAMAN LAMA</th>
                    <th rowspan="2" valign="middle">USULAN TIM SURVEI </th>
                    <th rowspan="2" valign="middle">PERSETUJUAN KTR PUSAT </th>
                    <th rowspan="2" valign="middle">KET </th>
                  </tr>
                  <tr>
                    <th >JENIS USAHA</th>
                  <tr>
                  <tr>
                    @for($i=1; $i<15; $i++)
                      <td> {{ $i }}</td>
                    @endfor
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $pengajuan as $p )
                    <tr>
                      <td rowspan="2">{{ $loop->iteration }} </td>
                      <td style="text-align:left" rowspan="2"> {{ strtoupper($p->data_mitra->data_ush->nama_ush) }} </br>
                          {{ ucwords($p->data_mitra->data_ush->almt_ush) }}</br>
                          {{ $p->data_mitra->kab }}
                      </td>
                      <td>{{ $p->data_mitra->nm }} </td>
                      <td >{{ ucwords($p->data_mitra->data_ush->sektorush) }}</td>
                      <td></td>
                      <td rowspan="2">{{ $p->aset->formatRupiah('totaset') }}</td>
                      <td rowspan="2">{{ number_format($sumomzet,0,',','.') }}</td>
                      <td></td>
                      <td rowspan="2">{{ $p->formatRupiah('bsr_pinjaman')  }}</td>
                      <td rowspan="2">{{ $p->formatRupiah('ksg_bayar')  }}</td>
                      <td></td>
                      <td rowspan="2">{{ $p->formatRupiah('bsr_usulan')  }}</td>
                      <td rowspan="2">{{ $p->formatRupiah('bsr_usulan')  }}</td>
                      <td></td>
                    </tr>
                    <tr>
                        <td >{{ $p->data_mitra->no_hp }}  </td>
                        <td >{{ ucwords($p->data_mitra->data_ush->jnsush) }} </td>
                    <tr>
                  @endforeach
                </tbody>
              </table>
            </div>
      </div>
    </div>
  </body>
</html>