<!DOCTYPE html>
<html >
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Halaman Print A4</title>
  </head>
  <style type="text/css">
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #FAFAFA;
      font: 12pt "Times New Roman" ,"Times","Serif";
    }
    @page {
      size: A4;
      margin: 10mm 20mm 10mm 20mm;
    }
    @media print {
      html, body {
        width: 210mm;
        height: 297mm;        
      }
      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
      }
    }
    .left {
      text-align: left;
    }
    .justify {
      word-wrap: break-word;
      text-align: justify;
      text-justify: inter-word;
    }
    table,tr,th,td {
      text-align:center; border-collapse: collapse;
      border: 1px solid;
    }
    tr,td {
        height:20px;
    }
    .noborder{
      border:none;
      text-align:left;
    }
  </style>
  <body>
    <div class="book">
      <div class="page">
        @if( $user->is_admin == 0)
            <center> <h3> KARTU PIUTANG </h3> </center>
            <center> <h3 > PROGRAM KEMITRAAN BANDARA SULTAN THAHA</h3> </center>
            <table class="noborder" >
              <tr class="noborder">
                <td class="noborder">Nama Mitra</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ ucwords($pengajuan->data_mitra->nm )}}</td>
              </tr>
              <tr class="noborder">
                <td class="noborder">Nama Usaha</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ ucwords($pengajuan->data_mitra->data_ush->nama_ush) }}</td>
              </tr>
              <tr class="noborder">
                <td class="noborder">Tanggal Penyaluran </td>
                <td class="noborder">:</td>
                <td class="noborder">{{ date('d-m-Y',strtotime($kp->tgl_penyaluran)) }}</td>
              </tr>
              <tr class="noborder">
                <td class="noborder">Besar Pinjaman </td>
                <td class="noborder">:</td>
                <td class="noborder">{{ ($kp->formatRupiah('pinjaman')) }}</td>
              </tr>
              <tr class="noborder">
                <td class="noborder">Nomor Kontrak</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $kp->no_kontrak }}</td>
              </tr>
            </table>
            <div style="padding-top:20px">
              <table>
                <thead>
                  <tr>
                    <th rowspan="2" valign="middle">ANG ke</th>
                    <th colspan="2" scope="col">Jatuh Tempo</th>
                    <th colspan="3">Rincian Anggaran</th>
                    <th rowspan="2"  width="110px">Saldo</th>
                  </tr>
                  <tr>
                    <th scope="col" width="85px">Bulan</th>
                    <th scope="col" width="60px">Tahun</th>
                    <th scope="col" width="110px">Pokok</th>
                    <th scope="col">Jasa Pinj 0.25%</th>
                    <th scope="col"  width="110px">Jumlah </th>
                  <tr>
                </thead>
                <tbody>
                  <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{ $kp->formatRupiah('pinjaman') }}</td>
                  </tr>
                  <?php $sumpokok = 0;
                        $sumjasa = 0;
                        $sum = 0;
                        ?>
                    @for ( 
                      $i =1,
                      $saldoawal = $kp->pinjaman,
                      $saldo = $kp->pinjaman,
                      $sb_bln = $kp->sb_bln/100,
                      $waktu = $kp->waktu,
                      $pokok = $saldoawal/$waktu,
                      $jasa = $saldoawal*$sb_bln,
                      $jasa1= $jasa/2;
                      $i <= 24  ; $i++)
                        <tr>
                        <td scope="row">{{ $i}}</td>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F ") }}</td>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y ") }}</td>
                        <td>Rp.{{ number_format(round($pokok), 0, ',','.') }} </td>
                        @if($i <= 12 )
                            <td>Rp. {{ number_format(round($jasa), 0, ',','.') }} </td>
                            <td>Rp. {{ number_format(round($jumlah = $pokok+$jasa), 0, ',','.') }} </td>
                            <?php  $sumjasa += $jasa; 
                                  $sum += $jumlah;
                            ?>
                          @else 
                            <td>Rp. {{ number_format(round($jasa1), 0, ',','.') }} </td>
                            <td>Rp. {{ number_format(round($jumlah = $pokok+$jasa1), 0, ',','.') }} </td>
                            <?php  $sumjasa += $jasa1; 
                                    $sum += $jumlah;
                            ?>
                        @endif
                        <td>Rp.{{ number_format(round($saldo = $saldo-$pokok), 0, ',','.') }}</td>
                      </tr>
                      <?php 
                        $sumpokok += $pokok;
                      ?>
                    @endfor
                    <tr>
                    <th colspan="3">Jumlah </th>
                    <td>Rp. {{ number_format(round($sumpokok), 0, ',','.') }}</td>
                    <td>Rp. {{ number_format(round($sumjasa), 0, ',','.') }}</td>
                    <td>Rp. {{ number_format(round($sum), 0, ',','.') }}</td>
                    <td></td>
                    </tr>
                </tbody>
              </table>
            </div>
            <p>Angsuran Pinjaman dapat diangsur Melalui Bank Mandiri Cabang Jambi <br> 
              Rekening No 110-00-0469662-8 An. PT ANGKASA PURA II (Persero)<br> 
              Angsuran pinjaman dapat diangsur melalui Bank BRI Cabang Jambi<br> 
              Rekening No.00200-100-1765-30-4 An. PT ANGKASA PURA II (Persero)<br>  
              Kontak person yang dapat dihubungi Kantor HP 081328849726 an MUHAMMAD ARIEF 
            </p>
          @else 
            <center> <h3> KARTU PIUTANG </h3> </center>
            <center> <h3> PROGRAM KEMITRAAN BANDARA SULTAN THAHA</h3> </center>
            <table class="noborder">
              <tr class="noborder">
                <td class="noborder">Nama Mitra</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ ucwords($pengajuan->data_mitra->nm )}}</td>
              </tr>
              <tr class="noborder">
                <td class="noborder">Nama Usaha</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ ucwords($pengajuan->data_mitra->data_ush->nama_ush) }}</td>
              </tr>
              <tr class="noborder">
                <td class="noborder">Tanggal Penyaluran </td>
                <td class="noborder">:</td>
                <td class="noborder">{{ date('d-m-Y',strtotime($kp->tgl_penyaluran)) }}</td>
              </tr>
              <tr class="noborder">
                <td class="noborder">Besar Pinjaman </td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $kp->formatRupiah('pinjaman') }}</td>
              </tr>
              <tr class="noborder">
                <td class="noborder">Nomor Kontrak</td>
                <td class="noborder">:</td>
                <td class="noborder">{{ $kp->no_kontrak }}</td>
              </tr>
            </table>
            <div style="padding-top:25px">
            <table>
              <thead>
                <tr>
                  <th rowspan="2" valign="middle">ANG ke</th>
                  <th colspan="2" scope="col">Tajuh Tempo</th>
                  <th colspan="3">Rincian Anggaran</th>
                  <th rowspan="2"  width="110px">Saldo</th>
                </tr>
                <tr>
                  <th scope="col" width="85px">Bulan</th>
                  <th scope="col" width="60px">Tahun</th>
                  <th scope="col" width="110px">Pokok</th>
                  <th scope="col">Jasa Pinj 0.25%</th>
                  <th scope="col"  width="110px">Jumlah </th>
                <tr>
              </thead>
              <tbody>
                <tr>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  <td>{{ $kp->formatRupiah('pinjaman') }}</td>
                </tr>
                <?php $sumpokok = 0;
                      $sumjasa = 0;
                      $sum = 0;
                ?>
                    @for ( 
                      $i =1,
                      $saldoawal = $kp->pinjaman,
                      $saldo = $kp->pinjaman,
                      $sb_bln = $kp->sb_bln/100,
                      $waktu = $kp->waktu,
                      $pokok = $saldoawal/$waktu,
                      $jasa = $saldoawal*$sb_bln,
                      $jasa1= $jasa/2;
                      $i <= 24  ; $i++)
                        <tr>
                        <td scope="row">{{ $i}}</td>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F ") }}</td>
                        <td>{{ Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y ") }}</td>
                        <td>Rp.{{ number_format(round($pokok), 0, ',','.') }} </td>
                        @if($i <= 12 )
                            <td>Rp. {{ number_format(round($jasa), 0, ',','.') }} </td>
                            <td>Rp. {{ number_format(round($jumlah = $pokok+$jasa), 0, ',','.') }} </td>
                            <?php  $sumjasa += $jasa; 
                                  $sum += $jumlah;
                            ?>
                          @else 
                            <td>Rp. {{ number_format(round($jasa1), 0, ',','.') }} </td>
                            <td>Rp. {{ number_format(round($jumlah = $pokok+$jasa1), 0, ',','.') }} </td>
                            <?php  $sumjasa += $jasa1; 
                                    $sum += $jumlah;
                            ?>
                        @endif
                        <td>Rp.{{ number_format(round($saldo = $saldo-$pokok), 0, ',','.') }}</td>
                      </tr>
                      <?php 
                        $sumpokok += $pokok;
                      ?>
                    @endfor
                  <tr>
                  <th colspan="3">Jumlah </th>
                  <td>Rp. {{ number_format(round($sumpokok), 0, ',','.') }}</td>
                  <td>Rp. {{ number_format(round($sumjasa), 0, ',','.') }}</td>
                  <td>Rp. {{ number_format(round($sum), 0, ',','.') }}</td>
                  <td></td>
                  </tr>
              </tbody>
            </table>
          </div>
          <p>Angsuran Pinjaman dapat diangsur Melalui Bank Mandiri Cabang Jambi <br> 
            Rekening No 110-00-0469662-8 An. PT ANGKASA PURA II (Persero)<br> 
            Angsuran pinjaman dapat diangsur melalui Bank BRI Cabang Jambi<br> 
            Rekening No.00200-100-1765-30-4 An. PT ANGKASA PURA II (Persero)<br>  
            Kontak person yang dapat dihubungi Kantor HP 081328849726 an MUHAMMAD ARIEF 
          </p>
        @endif
      </div>
    </div>
  </body>
</html>