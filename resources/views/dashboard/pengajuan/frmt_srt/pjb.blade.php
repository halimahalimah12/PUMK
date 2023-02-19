<!DOCTYPE html>
<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        
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
            border:none;
        }
    </style>
    <body>
        <div class="book">
            <div class="page">
                <p style="text-align: right"> Lampiran : 2 </p>
                <center> <h3> <u>SURAT  PERSETUJUAN </u></h3> </center>
                <center> <h3> <u>PENANGGUNG JAWAB BERIKUTNYA ATAS PINJAMAN </u></h3> </center>
                <table >
                    <tr>
                        <td width=280px>Yang bertanda tangan dibawah ini</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama </td>
                        <td>:</td>
                        <td>..............................................</td>
                    </tr>
                    <tr>
                    <tr>
                        <td>Hubungan dengan penanggungjawab</td>
                        <td>:</td>
                        <td>..............................................</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                    <td>..............................................</td>
                    </tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>..............................................</td>
                    </tr>
                </table>
                <table style="padding-top:20px;  ">
                    <tr>
                        <td width=280px> Yang bertanda tangan dibawah ini</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama </td>
                        <td>:</td>
                        <td>{{ $user->data_mitra->nm }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{ $user->data_mitra->pekerjaan }}</td>
                    </tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $user->data_mitra->almt }}</td>
                    </tr>
                </table>
                <p class="justify">Dengan ini memberi persetujuan  untuk mengajukan permohonan bantuan pinjaman modal usaha dari  PT Angkasa Pura  II (Persero), sehubungan dengan program pembinaan pengusaha kecil dan koperasi.
                </p>
                <p class="justify">Apabila terjadi sesuatu hal penanggung jawab tidak dapat memenuhi kewajibannya, maka saya akan  memenuhi segala kewajiban dari pihak penanggung jawab usaha.
                </p>
                <p class="justify">Demikian persetujuan ini saya buat, untuk dipergunakan seperlunya.Terima kasih
                </p>
                <table style="text-align:center;">
                    <body>
                        <tr>
                            <td colspan=3 style="text-align:right">............... , .................................</td>
                        </tr>
                        <tr>
                            <td width=200px> Penanggung jawab usaha </td>
                            <td width=150px></td>
                            <td width=220px>Yang memberi pernyataan</td>
                        </tr>
                        <tr >
                            <td height="80px"></td>
                            <td height="80px"></td>
                            <td height="80px" style="text-align:left;font-size:10px">(matarai 10000)</td>
                        </tr>
                        <tr >
                            <td >({{ ucwords($user->data_mitra->nm) }})</td>
                            <td ></td>
                            <td >(....................................)</td>
                        </tr>
                    </body>
                </table>
            </div>
        </div>
    </body>
</html>