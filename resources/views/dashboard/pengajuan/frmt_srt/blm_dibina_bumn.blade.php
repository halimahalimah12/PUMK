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
            margin: 15mm 30mm 15mm 25mm;
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
            text-align:justify; 
            border:none;
        }
    </style>
    <body>
        <div class="book">
            <div class="page">
                <p style="text-align: right"> Lampiran : 1 </p>
                <center> <h3> <u> SURAT  PERNYATAAN </u></h3> </center>
                <center> <h3> <u>BELUM DIBINA OLEH BUMN / PIHAK LAIN </u></h3> </center>
                <table>
                    <tr>
                        <td>Yang bertanda tangan dibawah ini</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama </td>
                        <td>:</td>
                        <td>{{ ucwords($user->data_mitra->nm) }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ ucwords($user->data_mitra->almt) }}</td>
                    </tr>
                    <tr>
                        <td>Nama Perusahaan</td>
                        <td>:</td>
                        <td>{{ ucwords($user->data_mitra->data_ush->nama_ush) }}</td>
                    </tr>
                    <tr>
                        <td>Bidang Usaha</td>
                        <td>:</td>
                        <td>{{ ucwords($user->data_mitra->data_ush->sektorush) }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Usaha</td>
                        <td>:</td>
                        <td>{{ ucwords($user->data_mitra->data_ush->almt_ush) }}</td>
                    </tr>
                </table>
                <div style="padding-top:40px">
                    <p> Dengan ini menyatakan bahwa :</p>
                    <table  style="padding-top:12px" >
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">1. </td>
                                <td class="justify">Saya belum / tidak sedang mendapat bantuan pinjaman dana untuk modal usaha dari BUMN / Pihak lainnya, apabila terbukti mendapat bantuan pinjaman dari perusahaaan lainnya maka saya akan mengembalikan bantuan pinjaman sesuai ketentuan yang berlaku dan saya bersedia dikenakan sanksi</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">2. </td>
                                <td class="justify">Saya tidak melakukan KKN dengan Pejabat / Pegawai  PT Angkasa Pura II (Persero)  baik di Kantor Cabang  maupun di Kantor Pusat, apabila dikemudian hari terbukti terdapat indikasi KKN maka saya bersedia dikenakan sanksi secara hukum</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">3. </td>
                                <td class="justify">Saya sanggup mentaati dan mematuhi semua ketentuan/aturan perjanjian pinjam meminjam yang  disyaratkan oleh PT Angkasa Pura II (Persero)  dan apabila saya tidak mentaati/mematuhinya sesuai perjanjian, saya bersedia dikenakan sanksi secara hukum</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>  Demikian pernyataan ini saya buat dengan sebenar-benarnya, tanpa tekanan dari pihak manapun juga. 
                </p>
                <table style="float:right; text-align:center;">
                    <body>
                        <tr>
                            <td >....... , ............</td>
                        </tr>
                        <tr>
                            <td>Pemohon</td>
                        </tr>
                        <tr>
                            <td height="90px" style="font-size:10px">(matarai 10000)</td>
                        </tr>
                        <tr>
                            <td>({{ ucwords($user->data_mitra->nm) }})</td>
                        </tr>
                    </body>
                </table>
            </div>
        </div>
    </body>
</html>