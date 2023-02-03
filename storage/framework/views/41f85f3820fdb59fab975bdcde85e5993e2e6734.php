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
      @page  {
          size: A4;
          margin: 30mm 10mm 10mm 10mm;
      }
      @media  print {
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
      table, th {
        border: 1px solid black;
        border-collapse: collapse;
        height:20px;
      }
      .isi{
        padding-left:10px;
      }
    .data1{
      width:50px;
    }
    .noborder{
      border: none;
      padding-left:10px;
    }
  </style>
  <body>
      <div class="book">
        <div class="page">
            <p style ="text-align:center"> PT ANGKASA PURA II (PERSERO)</p>
            <p style ="text-align:center"> PROGRAM KEMITRAAN</p>
            <p style ="text-align:center"> Survey Lapangan Calon Mitra Binaan</p>
            <p style ="text-align:center"> Kantor Cabang Bandara Sultan Thaha - Jambi</p>
                  
                    <table style ="margin-left:20px;  " rules="cols" >
                      <thead>
                          <tr>
                            <th align=center; width="20px"> No. </th>
                            <th align=center; colspan=2  > URAIAN </th>
                            <th align=center; width="250px"> PENJELASAN </th>
                            <th align=center; width="150px"> KETERANGAN</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr >
                            <td align=center>A</td>
                            <td colspan=2 class="isi"> Nama Usaha</td>
                            <td class="isi"><?php echo e(ucwords($pengajuan->data_mitra->data_ush->nama_ush)); ?> </td>
                            <td > </td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td colspan=2 class="isi">Nama Mitra B/Penanggung Jawab</td>
                            <td class="isi"> <?php echo e(ucwords($pengajuan->data_mitra->nm)); ?> </td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td colspan=2 class="isi">Penanggung Jawab Berikutnya</td>
                            <td class="isi"><?php echo e(ucwords($pengajuan->pjb->nm)); ?></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td align=center>B </td>
                            <td colspan=2 class="isi">Alamat Usaha</td>
                            <td class="isi"> <?php echo e(ucwords($pengajuan->data_mitra->data_ush->almt_ush)); ?></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td colspan=2 class="isi">No. Telp</td>
                            <td class="isi"> <?php echo e(ucwords($pengajuan->data_mitra->data_ush->nohp_ush)); ?></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td colspan=2 class="isi">Alamat Rumah</td>
                            <td class="isi"> <?php echo e(ucwords($pengajuan->data_mitra->almt)); ?></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td colspan=2 class="isi">No. Telp</td>
                            <td class="isi"> <?php echo e(ucwords($pengajuan->data_mitra->no_hp)); ?></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td colspan=2 class="isi">No. HP </td>
                            <td class="isi"> </td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td colspan=2 class="isi">Rmh. Tempat usaha Milik Sendiri/sewa</td>
                            <td class="isi"><?php echo e(ucwords($pengajuan->data_mitra->data_ush->tmptush)); ?></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td align=center>C </td>
                            <td colspan=2 class="isi">Jenis Usaha</td>
                            <td class="isi"></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td colspan=2 class="isi">Sektor Usaha</td>
                            <td class="isi"><?php echo e(ucwords($pengajuan->data_mitra->data_ush->jnsush)); ?> </td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td align=center> D </td>
                            <td colspan=2 class="isi">Hasil Evaluasi</td>
                            <td></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td width="20px" class="noborder">1.</td>
                            <td class="noborder">Data Keuangan</td>
                            <td ></td>
                            <td ></td>
                          </tr> 
                          <tr>
                            <td > </td>
                            <td class="noborder" ></td>
                            <td class="noborder">- Asset</td>
                            <td ></td>
                            <td ></td>
                          </tr> 
                          <tr>
                            <td > </td>
                            <td class="noborder"></td>
                            <td class="noborder">- Omzet/Bulan</td>
                            <td ></td>
                            <td ></td>
                          </tr> 
                          <tr>
                            <td > </td>
                            <td class="noborder"></td>
                            <td class="noborder">- Besar Pinjaman yang diminta</td>
                            <td ></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder"></td>
                            <td class="noborder">- Kesanggupan angsuran/Bulan</td>
                            <td ></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">2.</td>
                            <td class="noborder">SDM</td>
                            <td ></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder"></td>
                            <td class="noborder">- Tenaga Ahli/Terampil</td>
                            <td ></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder"></td>
                            <td class="noborder">- Tenaga Pembantu</td>
                            <td ></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">3.</td>
                            <td class="noborder">Rencana Pemanfaatan Pinjaman</td>
                            <td ></td>
                            <td ></td>
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder"></td>
                            <td class="noborder">- Modal Usaha</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder"></td>
                            <td class="noborder">- Investasi</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">4.</td>
                            <td class="noborder">Bahan Baku</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">5.</td>
                            <td class="noborder">Pinjaman dari BUMN/Bank lain</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder" >6.</td>
                            <td class="noborder">Kondisi Pemasaran</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">7.</td>
                            <td class="noborder">Waktu Mulai Usaha</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">8.</td>
                            <td class="noborder">Tempat  Pemasaran</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">9.</td>
                            <td class="noborder">Masa Pinjaman yang diusulkan</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder"></td>
                            <td class="noborder">- Lama Waktu Pinjaman</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">10.</td>
                            <td class="noborder">Informasi Kemitraan dengan <br>AP II diperoleh dari</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">11.</td>
                            <td class="noborder">Kendala yang dihadapi <br> dalam berusaha</br>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">12.</td>
                            <td class="noborder">Rencana dalam usaha</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">13.</td>
                            <td class="noborder">Track Record<br> (khusus yang memperpanjang)</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">14.</td>
                            <td class="noborder">Bukti Tanda Keseriusan</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                          <tr>
                            <td > </td>
                            <td class="noborder">15.</td>
                            <td class="noborder">Kesimpulan</td>
                            <td ></td>
                            <td ></td>
                            
                          </tr>
                      </tbody>
                    </table> 
                      <br>
                      <br>
                      <p align="right"> ...............................................</p>
                      <table >
                        <body>
                          <tr>
                            <td> Yang memberikan Penjelasan Pengusaha Kecil </td>
                          </tr>
                          <tr >
                            <td height="80px">              </td>
                          </tr>
                          <tr >
                            <td ></td>
                          </tr>
                        </body>
                      </table>
        </div>
        <div class="page">
          <iframe src="operating-system-concepts.pdf" width=100% height=800></iframe>
        </div>
      </div>
  </body>
</html><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/pengajuan/dokumen/form_survei.blade.php ENDPATH**/ ?>