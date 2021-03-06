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
        Airwaybill <b>(<?= $pengiriman->airwaybill; ?>)</b>
    </div>
    <div class="layer1">
        <div class="logo">
            <img src="<?= base_url('assets/file/website/icon.png') ?>" alt="" style="width: 50px;">
        </div>
        <div class="kop-address">
            <b><?= strtoupper($profile->nama_perusahaan); ?></b> <br>
            <?= strtoupper($profile->nama_jalan); ?><br>
            <?= strtoupper($profile->kecamatan); ?> <br>
            <?= strtoupper($profile->kabupaten); ?><br>
            Telp. <?= strtoupper($profile->no_telp1); ?>
        </div>
        <div class="content">

            <table style="margin-bottom: 20px;">
                <tr>
                    <td style="width: 70px;">Kota Asal</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 100px;"><?= $profile->kabupaten; ?></td>
                    <td style="width: 15px;"> </td>
                    <td style="width: 70px;">Kota Tujuan</td>
                    <td style="width: 3px;">:</td>
                    <td style="max-width: 100px;"> </td>
                </tr>
                <tr>
                    <td>No Pelanggan</td>
                    <td>:</td>
                    <td><?= $pengiriman->nomor; ?></td>
                    <td> </td>
                    <td>Pembayaran</td>
                    <td>:</td>
                    <td> </td>
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
                    <td><?= strtoupper($profile->kode_pos); ?></td>
                </tr>
                <tr>
                    <td colspan="3"><b><?= strtoupper($profile->nama_perusahaan); ?></b></td>
                    <td></td>
                    <td>Telp</td>
                    <td>:</td>
                    <td><?= strtoupper($profile->no_telp1); ?></td>
                </tr>
                <tr>
                    <td colspan="7" rowspan="3">
            <?= $profile->nama_jalan.", " ?><br>
            <?= $profile->kecamatan.", "; ?> <br>
            <?= $profile->kabupaten; ?><br></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td colspan="7" rowspan="3">INDONESIA</td>
                </tr>
            </table>

            <table style="margin-bottom: 20px;">
                <tr>
                    <td style="width: 70px;">Penerima</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 100px;"> </td>
                    <td style="width: 15px;"> </td>
                    <td style="width: 70px;">Kode Pos</td>
                    <td style="width: 3px;">:</td>
                    <td style="max-width: 100px;"><?= $pengiriman->kodepos; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><b><?= $pengiriman->agent; ?></b></td>
                    <td></td>
                    <td>Telp</td>
                    <td>:</td>
                    <td><?= $pengiriman->telp; ?></td>
                </tr>
                <tr>
                    <td colspan="7" rowspan="3"><?= $pengiriman->alamat_agent; ?>, <?= $pengiriman->kodepos; ?></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td colspan="7" rowspan="3">INDONESIA</td>
                </tr>
            </table>

            <table style="margin-bottom: 20px;">
                <tr>
                    <td style="width: 70px;">Tgl pengiriman</td>
                    <td style="width: 3px;">:</td>
                    <td style="width: 150px;"><?= $pengiriman->tgl_pengiriman; ?></td>
                </tr>
                <tr>
                    <td>Tgl estiimasi</td>
                    <td>:</td>
                    <td"><?= $pengiriman->tgl_estimasi; ?></td>
                </tr>
                <tr>
                    <td>Tgl selesai</td>
                    <td>:</td>
                    <td><?= $pengiriman->tgl_selesai; ?></td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>:</td>
                    <td> </td>
                </tr>
                <!-- <tr>
                    <td>Nilai Barang</td>
                    <td>:</td>
                    <td> </td>
                </tr> -->
                <tr style="height: 20px;">
                    <td> </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; font-size: 7px; padding-right: 15px; padding-top: 35px;"><b><?= $profile->kata_footer1?></b></td>
                </tr>
            </table>
            
        </div>
        </div>
        <div class="" style="height: 12.7cm; width:1px; background-color: #bdbfbe; position: fixed; margin-left: 9.8cm; margin-top: 30px;"></div>
    <div class="layer2">
        <table style="width: 100%; margin-bottom: 15px;">
            <tr>
                <td colspan="3"><?= $now ?></td>
                <td style="text-align: right; font-family: Arial, Helvetica, sans-serif;" colspan="3"><b>UNTUK PENGIRIM</b></td>
            </tr>
            <tr style="height: 7px;">
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td style="width: 15%;">Jalur Pengiriman </td>
                <td style="width: 1%;">:</td>
                <td style="width: 24%;"></td>
                <td style="width: 15%;">No Airwaybill </td>
                <td style="width: 1%;">:</td>
                <td style="width: 24%;"><?= $pengiriman->airwaybill; ?></td>
            </tr>
            <tr>
                <td colspan="6"><b><?= $pengiriman->jalur?></b></td>
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

        <table style="margin-bottom: 30px;">
            <tr>
                <td rowspan="2" style="text-align: center;">Keterangan</td>
                <td rowspan="2" style="text-align: center;">Jml</td>
                <td colspan="3" style="text-align: center;" style="text-align: center;">Dimensi</td>
                <td rowspan="2" style="text-align: center;">Berat Volume</td>
            </tr>
            <tr>
                <td style="text-align: center;">L</td>
                <td style="text-align: center;">H</td>
                <td style="text-align: center;">W</td>
            </tr>
			<?php foreach($pengiriman_detail as $value) {?>
            <tr>
                <td style="width: 30px;"><?= $value['nama_barang']; ?></td>
                <td style="width: 50px; text-align: center;"><?= $value['jml'];?> <?= ($value['satuan'])?></td>
                <td style="width: 35px; text-align: center;"><?= $value['l'] ?></td>
                <td style="width: 35px; text-align: center;"><?= $value['h'] ?></td>
                <td style="width: 35px; text-align: center;"><?= $value['w'] ?></td>
                <td style="width: 70px; text-align: center;"><?= $value['berat'] ?></td>
            </tr>
			<?php } ?>
        </table>

        <table>
            <tr>
                <td>Asuransi</td>
                <td>: </td>
                <td><b><?= $pengiriman->asuransi; ?></b></td>
            </tr>
        </table>
        <hr style="border: 0.2px; margin-top: -15px;">

        <table style="margin-top: 70px;">
            <tr>
                <td style="width: 170px; text-align: center;">Petugas</td>
                <td style="width: 170px; text-align: center;">Ttd. Pengirim</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align: center;">( <?= $profile->nama_perusahaan?> )</td>
                <td style="text-align: center;">(.......................)</td>
            </tr>
            <tr>
                <td style="padding-left: 40px;"><?= $now2 ?></td>
                <td></td>
            </tr>
        </table>

        <div class="note" style="margin-top: 15px; font-size: 7px;">
          <?= $profile->kata_footer2; ?>
        </div>
    </div>
</body>

</html>
