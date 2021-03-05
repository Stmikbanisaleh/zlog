<html>

<head>
    <style>
    @page{
        margin:0.5cm;
    }
        .layer1 {
            width: 10cm;
            position: relative;
            /* background-color: red; */
            float: left;
            font-family: Courier, monospace;
            font-size: 9px;
        }

        .layer2 {
            width: 10cm;
            position: relative;
            /* background-color: red; */
            float: right;
            font-family: Courier, monospace;
            font-size: 9px;
            margin-left: 0cm;
        }

        .title {
            width: 20cm;
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .logo{
            position: relative;
            width: 70px;
            float: left;
        }

        .kop-address{
            position: relative;
            width: 200px;
            float: left;
            margin-left: 60px;
            /* background-color: red; */
        }

        td {
            font-size: 9px;
        }

        .content{
            position: relative;
            float: left;
            margin-top: 70px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="title">
        <b>E-CONSIGNMENT NOTE (e-connote)</b>
    </div>
    <div class="layer1">
        <div class="logo">
            <img src="<?= base_url('assets/file/website/icon.png') ?>" alt="" style="width: 50px;">
        </div>
        <div class="kop-address">
            JNE BEKASI <br>
            RUKO KRANJI PLAZA<br>
            JL. JEND SUDIRMAN NO. 6 <br>
            BEKASI<br>
            Telp. 085715055622
        </div>
        <div class="content">

            <table style="margin-bottom: 20px;">
                <tr>
                    <td style="width: 70px;">Kota Asal</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 100px;">BK001222</td>
                    <td style="width: 15px;"> </td>
                    <td style="width: 70px;">Kota Tujuan</td>
                    <td style="width: 3px;">:</td>
                    <td style="max-width: 100px;">PAPUA NEW GUINEA</td>
                </tr>
                <tr>
                    <td>No Pelanggan</td>
                    <td>:</td>
                    <td>P001D2345</td>
                    <td> </td>
                    <td>Pembayaran</td>
                    <td>:</td>
                    <td>CASH</td>
                </tr>
                <tr style="height: 10px;">
                    <td> </td>
                </tr>
                <tr>
                    <td>Pengirim</td>
                    <td>:</td>
                    <td></td>
                    <td> </td>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td>43272</td>
                </tr>
                <tr>
                    <td colspan="3"><b>Denda Andayani</b></td>
                    <td></td>
                    <td>Telp</td>
                    <td>:</td>
                    <td>0857121218871</td>
                </tr>
                <tr>
                    <td colspan="7" rowspan="3">Jl. Mayor Madmuin Hasibuan No.68, RT.004/RW.004, Margahayu, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17113</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td colspan="7" rowspan="3">BEKASI - INDONESIA</td>
                </tr>
            </table>

            <table style="margin-bottom: 20px;">
                <tr>
                    <td style="width: 70px;">Penerima</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 100px;"></td>
                    <td style="width: 15px;"> </td>
                    <td style="width: 70px;">Kode Pos</td>
                    <td style="width: 3px;">:</td>
                    <td style="max-width: 100px;">441122</td>
                </tr>
                <tr>
                    <td colspan="3"><b>Dedi Prasetio Al Ghazali</b></td>
                    <td></td>
                    <td>Telp</td>
                    <td>:</td>
                    <td>0857121218871</td>
                </tr>
                <tr>
                    <td colspan="7" rowspan="3">Jl. Mayor Madmuin Hasibuan No.68, RT.004/RW.004, Margahayu, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17113</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td colspan="7" rowspan="3">YOGYAKARTA - INDONESIA</td>
                </tr>
            </table>

            <table style="margin-bottom: 20px;">
                <tr>
                    <td style="width: 70px;">Adm</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 300px;"> </td>
                </tr>
                <tr>
                    <td style="width: 70px;">Instruksi Khusus</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 300px;"> </td>
                </tr>
                <tr>
                    <td style="width: 70px;">Catatan</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 300px;"> </td>
                </tr>
                <tr>
                    <td style="width: 70px;">Nilai Barang</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 300px;"> </td>
                </tr>
                <tr>
                    <td style="width: 70px;">Keterangan Barang</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 300px;">VOOC</td>
                </tr>
                <tr style="height: 4px;"> </tr>
                <!-- <tr>
                    <td colspan="3" style="text-align: center; font-size: 7px;"><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the <br>1500s, when an unknown printer</b></td>
                </tr> -->
            </table>
            
        </div>
    </div>
    <div class="" style="height: 9.8cm; width:1px; background-color: #bdbfbe; position: fixed; margin-left: 9.8cm; margin-top: 30px;"></div>
    <div class="layer2">
        <table style="width: 100%; margin-bottom: 15px;">
            <tr>
                <td colspan="3">27-01-2021 03:01:01</td>
                <td style="text-align: right; font-family: Arial, Helvetica, sans-serif;" colspan="3"><b>UNTUK PENGIRIM</b></td>
            </tr>
            <tr style="height: 7px;">
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td style="width: 15%;">Layanan</td>
                <td style="width: 1%;">:</td>
                <td style="width: 24%;"></td>
                <td style="width: 15%;">No e-connote</td>
                <td style="width: 1%;">:</td>
                <td style="width: 24%;">BK1G0045F44</td>
            </tr>
            <tr>
                <td colspan="6"><b>YES13 (JNE YES)</b></td>
            </tr>
            <tr>
                <td>Jenis Kiriman</td>
                <td>:</td>
                <td>DOOC</td>
                <td>Sample</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>

        <table margin-bottom: 40px;>
            <tr>
                <td rowspan="2" style="text-align: center;">Keterangan</td>
                <td rowspan="2" style="text-align: center;">Jml</td>
                <td rowspan="2" style="text-align: center;">Berat Asli</td>
                <td colspan="3" style="text-align: center;" style="text-align: center;">Dimensi</td>
                <td rowspan="2" style="text-align: center;">Berat Volume</td>
            </tr>
            <tr>
                <td style="text-align: center;">L</td>
                <td style="text-align: center;">H</td>
                <td style="text-align: center;">W</td>
            </tr>
            <tr>
                <td style="width: 30px;"></td>
                <td style="width: 50px; text-align: center;">1</td>
                <td style="width: 70px; text-align: center;">1.00</td>
                <td style="width: 35px; text-align: center;">X</td>
                <td style="width: 35px; text-align: center;">X</td>
                <td style="width: 35px; text-align: center;">X</td>
                <td style="width: 70px; text-align: center;">0.00</td>
            </tr>
        </table>

        <table style="width: 100%;">
            <tr>
                <td style="width: 70px;">Jumlah</td>
                <td style="width: 5px;">:</td>
                <td style="width: 200px;">1</td>
                <td style="width: 50px;">Berat</td>
                <td style="width: 5px;">:</td>
                <td style="width: 30px; text-align: right;">1</td>
            </tr>
            <!-- <tr>
                <td style="width: 70px;">Biaya Kirim</td>
                <td style="width: 30px;">: IDR</td>
                <td style="text-align: right;" colspan="4">Rp. 200.000.000</td>
            </tr>
            <tr>
                <td style="width: 70px;">Biaya Lain-lain</td>
                <td style="width: 30px;">: IDR</td>
                <td style="text-align: right;" colspan="4">Rp. 200.000.000</td>
            </tr>
            <tr>
                <td style="width: 70px;">Asuransi</td>
                <td style="width: 30px;">: IDR</td>
                <td style="text-align: right;" colspan="4">Rp. 200.000.000</td>
            </tr>
            <tr>
                <td style="width: 70px;">Adm Asuransi</td>
                <td style="width: 30px;">: IDR</td>
                <td style="text-align: right;" colspan="4">Rp. 200.000.000</td>
            </tr> -->
        </table>
    </div>
</body>

</html>
