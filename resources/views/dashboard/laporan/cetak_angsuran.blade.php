<!DOCTYPE html>
<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Halaman Print A4</title>
    </head>
    <style>
        table,tr,td,th{
        text-align:center; 
        border-collapse: collapse;
        font-size:16px;
        border: 1px solid;
        }
    </style>

    <body>
        <div class="book">
        <div class="page">
            
                <center> 
                    <h3> DAFTAR RINCIAN SETORAN MITRA BINAAN </br> 
                        PT ANGKASA PURA II </br> 
                        CABANG BANDARA SULTAN THAHA - JAMBI
                    </h3> 
                </center>
                <div style="padding-top:20px; font-size:12px">
                <table >
                    <thead>
                    <tr>
                        <th rowspan="2" valign="middle">NO</th>
                        <th rowspan="2" valign="middle" width="100px">TANGGAL </br> SETOR</th>
                        <th rowspan="2" valign="middle" width="100px">NAMA MITRA </th>
                        <th rowspan="2" valign="middle" width="95px">SEKTOR USAHA</th>
                        <th colspan="3" halign="middle">ANGSURAN</th>
                    </tr>
                    <tr>
                        <th width="120px">POKOK (Rp)</th>
                        <th width="120px">JASA (Rp)</th>
                        <th width="130px">JUMLAH  (Rp)</th>
                    <tr>
                    </thead>
                    <tbody>
                    {{-- @foreach ( $kp as $p=>$kps)
                        <tr>
                            <th colspan="7">{{ $p }}</th>
                        </tr>
                        <tr>
                            @foreach ( $kps as $kp3 )
                                    <td>{{ $loop->iteration }} </td>
                                    @foreach ( $tanggal as $tgl )
                                        @if($tgl->tgl != NULL)
                                                @if($kp3->id == $tgl->kartu_piutang_id)
                                                    <td>{{ Carbon\Carbon::parse($tgl->tgl)->format("d-m-Y") }}  </td>
                                                @endif 
                                            @else
                                            <td>-</td>
                                        @endif
                                    @endforeach
                                    <td>{{ ucwords($kp3->pengajuan->data_mitra->nm)}}</td>
                                    <td>{{ ucwords($kp3->pengajuan->data_mitra->data_ush->jnsush)}}</td>
                                @foreach ($byr as $byrs  )
                                        @if($kp3->id == $byrs->kartu_piutang_id)
                                            <td>{{ $byrs->formatRupiah('pokok')}}</td>
                                            <td>{{ $byrs->formatRupiah('jasa')}}</td>
                                            <td>{{ $byrs->formatRupiah('jumlah')}}</td>
                                            <?php 
                                                $sumpokok=0;
                                                $sumjasa=0;
                                                $sum=0;
                                                $sumpokok += $byrs->pokok;
                                                $sumjasa += $byrs->jasa;
                                                $sum += $byrs->jumlah;
                                            ?>
                                        @endif
                                @endforeach  
                                
                        </tr>
                            @endforeach
                        <tr>
                            <th colspan="4"> Total Tahun {{ $p }}</th>
                            <th >{{ number_format($sumpokok,0,',','.')  }} </th>
                            <th >{{ number_format($sumjasa,0,',','.') }} </th>
                            <th >{{ number_format($sum,0,',','.') }} </th> 
                        </tr>
                    @endforeach --}}
                    @foreach ($byr as $byrs  )
                        @foreach ( $kp as $p=>$kps)
                            @foreach ( $kps as $kp3 )
                                @if($kp3->id == $byrs->kartu_piutang_id)
                                    <tr>
                                        <th colspan="7">{{ $p }}</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        @foreach ( $tanggal as $tgl )
                                            @if($tgl->tgl != NULL)
                                                    @if($kp3->id == $tgl->kartu_piutang_id)
                                                        <td>{{ Carbon\Carbon::parse($tgl->tgl)->format("d-m-Y") }}  </td>
                                                    @endif 
                                                @else
                                                <td>-</td>
                                            @endif
                                        @endforeach  
                                        <td>{{ ucwords($kp3->pengajuan->data_mitra->nm)}}</td>
                                        <td>{{ ucwords($kp3->pengajuan->data_mitra->data_ush->jnsush)}}</td>               
                                        <td>{{ $byrs->formatRupiah('pokok')}}</td>
                                        <td>{{ $byrs->formatRupiah('jasa')}}</td>
                                        <td>{{ $byrs->formatRupiah('jumlah')}}</td>
                                        <?php 
                                            $sumpokok=0;
                                            $sumjasa=0;
                                            $sum=0;
                                            $sumpokok += $byrs->pokok;
                                            $sumjasa += $byrs->jasa;
                                            $sum += $byrs->jumlah;
                                        ?>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        <tr>
                            <th colspan="4"> Total Tahun {{ $p }}</th>
                            <th >{{ number_format($sumpokok,0,',','.')  }} </th>
                            <th >{{ number_format($sumjasa,0,',','.') }} </th>
                            <th >{{ number_format($sum,0,',','.') }} </th> 
                        </tr>
                        <?php 
                                            $sumpokok += $sumpokok;
                                            $sumjasa += $sumjasa;
                                            $sum += $sum;
                                        ?>
                    @endforeach  

                    <tr>
                            <th colspan="4">Total Jumlah Piutang </th>
                            <th >{{ number_format($sumpokok,0,',','.')  }} </th>
                            <th >{{ number_format($sumjasa,0,',','.') }} </th>
                            <th >{{ number_format($sum,0,',','.') }} </th>
                    </tr>
                    </tbody>
                </table>
                </div>
        </div>
        </div>
    </body>
</html>