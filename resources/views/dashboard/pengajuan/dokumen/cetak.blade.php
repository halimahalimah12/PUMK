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
      margin: 30mm 30mm 30mm 30mm;
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
    .nomor{
      width:30px;
      text-align: center;
    }
    .titikdua{
      width:20px;
      text-align: center;
    }
    .css-serial {
      counter-reset: serial-number;  /* Atur penomoran ke 0 */
    }
    .css-serial td:nth-child(2):before {
      counter-increment: serial-number;  /* Kenaikan penomoran */
      content: counter(serial-number);  /* Tampilan counter */
    }
    .css-serials {
      margin-left:20px;
      border-collapse: collapse; 
      border: 1px solid;
      counter-reset: serial-number;  /* Atur penomoran ke 0 */
    }
    .css-serials td:first-child:before {
      counter-increment: serial-number;  /* Kenaikan penomoran */
      content: counter(serial-number);  /* Tampilan counter */
    }
    .data{
      width:200px;
      padding-left:10px;
    }
    .isi{
      padding-left:10px;
    }
    .data1{
      width:150px;
      align:center;
    }
    .rp{
      padding-left:10px;
      font-weight: bold;
    }
  </style>
  <body>
    <div class="book">
      <div class="page">
        <center> <h3> <u> Proposal Peminjaman </u></h3> </center>
        <p class ="left"> Kepada Yth :</p>
        <p class ="left"> Direksi/ Kepala Cabang PT Angkasa Pura II (Persero) :</p>
        <p class ="left"> Cq . Vice President of CSR</p>
        <p class ="left"> di</p>
        <p class ="left"> ------------------</p>
        <p class ="left"> Dengan hormat,</p>
        <p class ="justify"> Dalam rangka meningkatkan usaha melalui pemanfaatan dana program kemitraan 
            perkenankanlah kami mengajukan proposal permohonan pinjaman Usaha Kecil Kepada  
            PT Angkasa Pura II (Persero).
        </p>
        <p class ="justify"> Adapun permohonan  kami  tersebut  untuk&emsp;keperluan  investasi / modal usaha sebesar </br>
            Rp. {{ $pengajuan1->formatRupiah('bsr_pinjaman') }} ( {{ ucwords(Terbilang::angka($pengajuan1->bsr_pinjaman)) }} )
            dengan rincian pemanfaatannya dapat dilihat pada data dibawah ini.</br>
            Sebagai bahan pertimbangan, bersama ini kami sampaikan informasi atau data sebagai 
            berikut :
        </p>
        <h4>I. BIODATA</h4> 
        {{-- Data Diri Penangung Jawab Usaha  --}}
        <table style ="margin-left:20px;" class="css-serial">
          <thead>
            <tr>
              <th align=left; width="20px"> A. </th>
              <th align=left colspan=4>Penanggung Jawab Usaha </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Nama lengkap</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->nm) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Tempat Lahir </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->tpt_lhr) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Tenggal Lahir </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->tgl_lhr) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td> Jenis Kelamin</td>
              <td class="titikdua">:</td>
              <td class="isi">
                    @if($pengajuan1->data_mitra->jk == "L" ) Laki - laki
                    @else Perempuan
                  @endif
              </td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Status Perkawinan</td>
              <td class="titikdua">:</td>
              <td class="isi">
                <?php if ($pengajuan1->data_mitra->sts_prk ==  "belum"){
                    echo "Belum Kawin";
                  } elseif ($pengajuan1->data_mitra->sts_prk == "kawin"){
                    echo "Sudah Kawin";
                  } elseif ($pengajuan1->data_mitra->sts_prk == "cermati"){
                    echo "Cerai Mati";
                  } else {
                    echo "Cerai Hidup";} 
                ?>
              </td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Kebangsaan </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->bangsa) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Alamat Rumah</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->almt) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Nomor Telpon </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->no_hp) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Nomor KTP</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->no_ktp) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Tanggal dikeluarkan </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->tgl_ktp) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Pendidikan terakhir/Umum</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->pddk) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Kursus</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->kursus) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Jabatan</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->data_mitra->jbt) }}</td>
            </tr> 
          </tbody>
        </table> 
        <br>
        <br>
        {{-- Data Diri penanggung jawab berikutnya --}}
        <table style ="margin-left:20px;" class="css-serial">
          <thead>
              <tr>
                <th align=left; width="20px"> B. </th>
                <th align=left colspan=4>Pihak Penanggung Jawab Usaha Berikutnya </th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Nama lengkap</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->nm) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Tempat Lahir </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->tpt_lhr) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Tenggal Lahir </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->tgl_lhr) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td> Jenis Kelamin</td>
              <td class="titikdua">:</td>
              <td class="isi">
                  @if($pengajuan1->pjb->jk == "L" ) Laki - laki
                    @else Perempuan
                  @endif
              </td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td width="250px">Status hubungan dengan penanggung jawab usaha</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->hub) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Kebangsaan </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->bangsa) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Alamat Rumah</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->almt) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Nomor Telpon </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->no_hp) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Nomor KTP</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->no_ktp) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Tanggal dikeluarkan </td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->tgl_ktp) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Pendidikan terakhir/Umum</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->pddk) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Kursus yang pernah diikuti</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->kursus) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td class="nomor">.</td>
              <td>Jabatan dalam Perusahaan</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($pengajuan1->pjb->jbt) }}</td>
            </tr> 
          </tbody>
        </table> 
        {{-- Data Perusahaa --}}
        <h4>II. DATA PERUSAHAAN</h4> 
        <table style ="margin-left:20px;page-break-after: always;" >
          <tbody>
            <tr>
              <td>A. </td>
              <td colspan=2>Nama Perusahaan</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->nama_ush) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td width="20px">1. </td>
              <td class="data">Akta Perusahaan</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->akta_ush) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td width="20px">2. </td>
              <td>Izin Usaha yang dimiliki</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->izin_ush) }}</td>
            </tr>
            <tr>
              <td>B. </td>
              <td colspan=2>Bidang Usaha</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->jnsush) }}</td>
            </tr>
            <tr>
              <td>C. </td>
              <td colspan=2>Jenis Usaha</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->jnsush) }}</td>
            </tr>
            <tr>
              <td>D. </td>
              <td colspan=2>Berdiri Sejak</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->thn_berdiri) }}</td>
            </tr>
            <tr>
              <td>E. </td>
              <td colspan=2>Alamat Perusahaan</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->almt_ush) }}</td>
            </tr>
            <tr>
              <td>F. </td>
              <td colspan=2>Nomor Telepon</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->nohp_ush) }}</td>
            </tr>
            <tr>
              <td>G. </td>
              <td colspan=2>NPWP</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->npwp) }}</td>
            </tr>
            <tr>
              <td>H. </td>
              <td colspan=2> Tabungan Rekening Bank</td>
              <td class="titikdua">:</td>
              <td class="isi">{{strtoupper($ush->bank) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td width="20px">1. </td>
              <td class="data">Nama / Alamat Bank</td>
              <td class="titikdua">:</td>
              <td class="isi">{{strtoupper($ush->bank) }} /  {{ ucwords($ush->almtbank) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td width="20px">2. </td>
              <td>Atas Nama</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->atsnm) }}</td>
            </tr>
            <tr>
              <td> </td>
              <td width="20px">3. </td>
              <td>Nomor Rekening</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ucwords($ush->norek) }}</td>
            </tr>
          </tbody>
        </table> 
        {{-- Aset --}}
        <h4>IV. NILAI ASSET (AKTIVA) : {{ $pengajuan1->aset->formatRupiah('totaset') }} </h4> 
        <h4>A. Asset(aktiva) yang berkaitan langsung dengan kegiatan usaha: </h4> 
        <table  class="css-serials" border=1 >
          <thead>
              <tr>
                <th align=center; colspan=2> ASSET  </th>
                <th class="titikdua">:</th>
                <th class="data1"> NILAI (RP) </th>
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
              <td class="isi">{{ $pengajuan1->aset->formatRupiah('bangunan') }}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Persediaan</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->aset->formatRupiah('persediaan') }}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Alat Kerja/Peralatan Usaha</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->aset->formatRupiah('alat') }}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Kas</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->aset->formatRupiah('kas')}}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Piutang</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->aset->formatRupiah('piutang') }}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Peralatan Produksi</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->aset->formatRupiah('peralatan') }}</td>
            </tr>
            <tr>
              <th colspan=2 align=center; > Total Nilai Asset</th>
              <th class="titikdua">:</th>
              <td class="rp">{{ $pengajuan1->aset->formatRupiah('totaset') }}</td>
            </tr>
          </tbody>
        </table> 
        {{-- Produksi --}}
        <h4>IV. PRODUKSI   </h4> 
        <h4>A. Alat Kerja dan Alat Bantu  </h4> 
        <table  class="css-serials" border=1 >
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
              <td class="isi">{{ucwords( $alt->nm_brg) }}</td>
              <td class="isi">{{$alt->formatRupiah('hrg_satuan')  }}</td>
              <td class="isi">{{$alt->formatRupiah('jmlh') }}</td>
            </tr>
          @endforeach
          <tr>
              <th colspan=3> Jumlah</th>
              <td class="rp">Rp {{  number_format($totalat,0,',','.' ) }}</td>
            
            </tr>
            
          </tbody>
        </table> 
        <h4>B. Tenaga Kerja.  </h4> 
        <table  class="css-serials"   border=1  style ="page-break-after: always;">
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
              <td class="isi">{{ucwords( $tng->nm_tngk) }}</td>
              <td class="isi">{{ucwords( $tng->jbt )}}</td>
              <td class="isi">{{$tng->formatRupiah('gaji')}}</td>
            </tr>
          @endforeach
          <tr>
              <th colspan=3> Jumlah</th>
              <td class="rp" >Rp {{ number_format($totgaji,0,',','.') }}</td>
            
            </tr>
            
          </tbody>
        </table> 
        <h4>C. Biaya Oprasional dan Lain-lain.  </h4> 
        <table style ="margin-left:20px;" class="css-serials" >
          <tbody>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Transport</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->oprasional->formatRupiah('transport') }}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Listrik</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->oprasional->formatRupiah('listrik') }}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Telepon</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->oprasional->formatRupiah('telpon')}}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">ATK</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->oprasional->formatRupiah('atk') }}</td>
            </tr>
            <tr>
              <td class="nomor">.</td>
              <td class="data">Lain-lain</td>
              <td class="titikdua">:</td>
              <td class="isi">{{ $pengajuan1->oprasional->formatRupiah('lain') }}</td>
            </tr>
            <tr>
              <th colspan=2 align=center; > Total Biaya Oprasional</th>
              <th class="titikdua">:</th>
              <td class="rp">{{ $pengajuan1->oprasional->formatRupiah('totop') }}</td>
            </tr>
          </tbody>
        </table> 
        {{-- Omzet --}}
        <h4>V. PENJUALAN (OMZET) </h4> 
        <h4>Besarnya penjualan dalam satu tahun seelum mendapatkan bantuan adalah sebagai berikut: </h4> 
        <table  class="css-serials" border=1 >
          <thead>
              <tr>
                <th > NO.  </th>
                <th class="data1">NAMA BARANG</th>
                <th class="data1"> HARGA SATUAN </th>
                <th  class="data1"> JML HARGA (Rp) </th>
              </tr>
          </thead>
          <tbody>
          @foreach ( $omzet as $omz )
              <tr>
              <td class="nomor">.</td>
              <td class="isi">{{ucwords( $omz->nm_brg) }}</td>
              <td class="isi"> {{$omz->formatRupiah('hrg_satuan')  }}</td>
              <td class="isi">{{$omz->formatRupiah('jmlh') }}</td>
            </tr>
          @endforeach
          <tr>
              <th colspan=3> Jumlah</th>
              <td class="rp">Rp {{ number_format($totomzet,0,',','.') }}</th>
            
            </tr>
            
          </tbody>
        </table> 
        {{-- Penempatan Modal --}}
        <h4>VI. PENEMPATAN MODAL  </h4> 
        <h4>Bantuan modal usaha yang dibutuhkan dari PT (Persero) Angkasa Pura II </h4> 
        <table class="css-serials" border=1>
          <thead>
              <tr>
                <th > NO.  </th>
                <th class="data1">URAIAN</th>
                <th class="data1" > JUMLAH (Rp) </th>
              </tr>
          </thead>
          <tbody>
            <tr style =" border: 1px solid;">
              <td class="nomor"></td>
              <td>Investasi</td>
              <td class="isi">{{ $pengajuan1->formatRupiah('investasi')}} </td>
            </tr>
            <tr style =" border: 1px solid;">
              <td class="nomor"></td>
              <td>Modal Usaha</td>
              <td class="isi">{{  $pengajuan1->formatRupiah('modal') }}</td>
            </tr>
            <tr style =" border: 1px solid;">
              <th colspan=2> Jumlah</th>
              <td class="rp">{{ $pengajuan1->formatRupiah('bsr_pinjaman') }} </td>
            </tr>
          </tbody>
        </table>
        {{-- Manfaat --}}
        <h4>VI. MANFAAT </h4> 
        <p>Dengan bantuan modal usaha tersebut, maka manfaat yang akan didapatkan adalah untuk pengembangan usaha serta kesempatan lapangan kerja, dengan uraian sebagai berikut: </p> 
        <table style ="margin-left:20px;" class="css-serial" >
          <tbody>
            @foreach ( $manfaat as $manfaat )
              <tr>
                <td></td>
                <td class="nomor">.</td>
                <td>{{ ucfirst($manfaat->manfaat) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <h4 style="page-break-before: always;">VII. Sebagai kelengkapan proposal bersama ini kami lampirkan : </h4> 
        <table style ="margin-left:20px; " class="css-serial" >
          <tbody>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Surat Pernyataan belum pernah dibina BUMN/pihak lain bermatrai Rp 10.000</td>
            </tr>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Surat Pernyataan penanggung jawab berikutnya dan bermatrai Rp 10.000</td>
            </tr>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Surat Pernyataan kesanggupan melunasi pinjaman tepat waktu bermatrai Rp 10.000</td>
            </tr>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Surat keterangan berusaha dari RT/RW setingkat</td>
            </tr>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Foto KTP Suami/Istri /penanggung jawab berikutnya</td>
            </tr>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Foto suami/istri/penanggung jawab berikutnya </td>
            </tr>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Foto Kartu Keluarga</td>
            </tr>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Foto kegiatan usaha</td>
            </tr>
            <tr>
              <td></td>
              <td class="nomor">.</td>
              <td>Denah Lokasi Usaha</td>
            </tr>
          </tbody>
        </table>
        <p>Demikian permohonan ini kami sampaikan atas perhatian dan persetujuan kami ucapkan terima kasi </p>
        <table style="float:right; text-align:center;">
          <body>
            <tr>
              <td>Pemohon</td>
            </tr>
            <tr>
              <td height="80px"></td>
            </tr>
            <tr>
              <td>( {{ ucwords($pengajuan1->data_mitra->nm )}} )</td>
            </tr>
          </body>
        </table>
      </div>
    </div>
  </body>
</html>