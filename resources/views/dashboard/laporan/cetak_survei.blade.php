<!DOCTYPE html>
<html >
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    
  </head>
  <style>
    table,tr,td,th{
      text-align:center; border-collapse: collapse;
      font-size:11px;
      border: 1px solid;
    }
    #no{
      width:18px;
    }
    tr,td,th{
      width:70px;
    }
    #mengetahui{
      width:345px;
      border:none;
    }
    #nm{
      width:120px
    }
   
  </style>
  
  <body>
    <div class="book">
      <div class="page">
        
            <center> <h3> DAFTAR PERSETUJUAN CALON MITRA BINAAN TAHUN 2022 </br> 
                      PT. ANGKASA PURA II </br>
                      CABANG BANDARA SULTAN THAHA - JAMBI</h3> </center>
            
            <div style="padding-top:20px; font-size:12px">
              <table >
                <thead>
                  <tr>
                    <th id="no" rowspan="2" valign="middle" >No</th>
                    <th id="nm" rowspan="2" valign="middle" >NAMA USAHA & ALAMAT</th>
                    <th id="nm" rowspan="2" valign="middle">NAMA PIMPINAN </th>
                    <th  >SEKTOR USAHA</th>
                    <th rowspan="2" valign="middle">JUMLAH SDM</th>
                    <th rowspan="2" valign="middle">ASSET</th>
                    <th rowspan="2" valign="middle">OMZET PERBULAN</th>
                    <th rowspan="2" valign="middle">BIAYA PERBULAN</th>
                    <th rowspan="2" valign="middle">BANTUAN YG DIMINTA </th>
                    <th rowspan="2" valign="middle">KEMAMPUAN ANGSURAN</th>
                    <th rowspan="2" valign="middle">PINJAMAN LAMA</th>
                    <th rowspan="2" valign="middle">USULAN TIM SURVEI </th>
                    <th rowspan="2" valign="middle">PERSETUJUAN KTR PUSAT </th>
                    <th rowspan="2" id="no" valign="middle">KET </th>
                  </tr>
                  <tr>
                    <th >JENIS USAHA</th>
                  <tr>
                  <tr>
                    <td id="no">1</td>
                    @for($i=2; $i<14; $i++)
                      <td> {{ $i }}</td>
                    @endfor
                    <td id="no">14</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $pengajuan as $p )
                    <tr>
                      <td rowspan="2" id="no">{{ $loop->iteration }} </td>
                      <td id="nm" style="text-align:left" rowspan="2"> {{ strtoupper($p->data_mitra->data_ush->nama_ush) }} </br>
                          {{ ucwords($p->data_mitra->data_ush->almt_ush) }}</br>
                          {{ $p->data_mitra->kab }}
                      </td>
                      <td  >{{ $p->data_mitra->nm }} </td>
                      <td >{{ ucwords($p->data_mitra->data_ush->sektorush) }}</td>
                      <td rowspan="2">{{ $countsdm }}</td>
                      <td rowspan="2">{{ $p->aset->formatRupiah('totaset') }}</td>
                      <td rowspan="2">{{ number_format($sumomzet,0,',','.') }}</td>
                      <td rowspan="2">{{ $p->oprasional->formatRupiah('totop') }}</td>
                      <td rowspan="2">{{ $p->formatRupiah('bsr_pinjaman')  }}</td>
                      <td rowspan="2">{{ $p->formatRupiah('ksg_bayar')  }}</td>
                      @if( $pengajuanlama != NULL) 
                        <td rowspan="2"> {{ $pengajuanlama->kartu_piutang->formatRupiah('pinjaman') }}</td>
                        @else 
                        <td rowspan="2"> - </td>
                      @endif
                      <td rowspan="2">{{ $p->formatRupiah('bsr_usulan')  }}</td>
                      <td rowspan="2">{{ $p->formatRupiah('bsr_usulan')  }}</td>
                      @if( $pengajuanlama != NULL) 
                        <td rowspan="2"  id="no"> MBL </td>
                        @else 
                        <td rowspan="2"  id="no"> MBB </td>
                      @endif
                    </tr>
                    <tr>
                        <td >{{ $p->data_mitra->no_hp }}  </td>
                        <td >{{ ucwords($p->data_mitra->data_ush->jnsush) }} </td>
                    </tr>
                    <?php $sumusulan=0;
                          $sumusulan +=$p->bsr_usulan;
                          ?>
                  @endforeach
                    <tr>
                        <td id="no"></td>
                        <th id="nm" >JUMLAH</th>
                        @for( $n=0 ; $n<9 ; $n++)
                            <td></td>
                        @endfor
                        <th>Rp.{{ number_format($sumusulan,0,',','.') }}</th>
                        <th>Rp.{{ number_format($sumusulan,0,',','.') }}</th>
                        <td id="no"></td>
                    </tr>
                </tbody>
              </table>
            </div>
            <div style="padding-top:30px; font-size:12px">
              <table id="mengetahui">
                <tbody>
                  <tr id="mengetahui">
                    <th id="mengetahui" ></th>
                    <th id="mengetahui"></th>
                    <th id="mengetahui">Pembuat Daftar</th>
                  </tr>
                  <tr id="mengetahui">
                    <th id="mengetahui" >PLANNING SENIOR OFFICER</th>
                    <th id="mengetahui"></th>
                    <th id="mengetahui">PLANNING & DISTRIBUTION OFFICER</th>
                  </tr>
                  <tr id="mengetahui">
                    <th id="mengetahui" height="70px" valign=bottom>(............................................................................)</th>
                    <th id="mengetahui" height="70px"></th>
                    <th id="mengetahui" height="70px"valign=bottom>(............................................................................)</th>
                  </tr>
                  <tr id="mengetahui">
                    <th id="mengetahui" ></th>
                    <th id="mengetahui">Mengetahui:</th>
                    <th id="mengetahui"></th>
                  </tr>
                  <tr id="mengetahui">
                    <th id="mengetahui" ></th>
                    <th id="mengetahui">SM PLANNING $ DISTRIBUTION</th>
                    <th id="mengetahui"></th>
                  </tr>
                  <tr id="mengetahui">
                    <th id="mengetahui" ></th>
                    <th id="mengetahui" height="70px"valign=bottom>(............................................................................)</th>
                    <th id="mengetahui"></th>
                  </tr>
                </tbody>
              </table>
            </div>

      </div>
    </div>
  </body>
</html>