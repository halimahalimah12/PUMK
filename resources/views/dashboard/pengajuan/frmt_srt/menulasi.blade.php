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
                <p style="text-align: right"> Lampiran : 3 </p>
                <center> <h3> <u> SURAT  PERNYATAAN </u></h3> </center>
                <center> <h3> <u>KESANGGUPAN MELUNASI PINJAMAN</u></h3> </center>
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
                <p class="justify"> Saya sanggup mengembalikan Pokok dan Bunga Pinjaman tepat waktu, apabila saya tidak mengembalikan pinjaman tepat waktu sesuai tanggal jatuh tempo pinjaman, saya bersedia dikenakan sanksi secara hukum sesuai yang disyaratkan PT Angkasa Pura II (Persero).
                </p>
                <p class="justify">  Demikian pernyataan ini saya buat dengan sebenar-benarnya, tanpa tekanan dari pihak manapun juga. 
                </p>
                <table style="float:right; text-align:center;">
                    <body>
                        <tr>
                            <td >....... , ............</td>
                        </tr>
                        <tr>
                            <td style="text-align:center">Pemohon </td>
                        </tr>
                        <tr >
                            <td height="90px" style="font-size:10px">(matarai 10000)</td>
                        </tr>
                        <tr >
                            <td style="text-align:center">({{ ucwords($user->data_mitra->nm) }})</td>
                        </tr>
                    </body>
                </table>
            </div>
        </div>
    </body>
</html>