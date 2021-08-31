        <html>

        <head>
          <title> SISAKO | Cetak</title>
          <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo_sako.png" sizes="" type="image/png">
        </head>
        <!-- <style>
            @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
        body {
            -webkit-transform: scaleX(-1);
             transform: scaleX(-1);
        }
        </style> -->
        <!-- <body style="width : 100%; height : 100% "> -->
        <body style="margin:20px;">
        <?php foreach ($anggota as $d) {
          // code...
        ?>
        <body>
        <div style="float: left; margin-left: 35px; margin-top:22px;width: 550px;height: 350px;margin-bottom: 12px;background-size: 550px 350px;background-image: url('<?php echo base_url(); ?>assets/img/kartu/sisakodp.png');">

          <img style="position: absolute;margin-left: 24px;margin-top: 110px; width: 100px; height: 125px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/foto/<?php echo $d->image ?>">
                        <!-- <img style="position: absolute;margin-left: 440px;margin-top: 250px; width: 85px; height: 85px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/qrcode/<?php echo $d->no_anggota ?>.png"> -->


                        <!-- <div style="position: absolute;margin-left: 20px;margin-top: 20px; width: 92px;height: 50px; background-color: #026537"><img style="width: 70px; padding-left: 12px;padding-top: 1px;" src="../assets/img/logo/<?php //echo "$a[gambar] "?>"></div> -->

                        <!-- <p style="letter-spacing: 1px;margin-left: 122px;padding-top: 20px;width: 250px; text-align: center; font-size: 20px"><b>KARTU ANGGOTA</b></p> -->
                        <!-- <p style="font-size: 17px;margin-top: -22px;margin-left: 160px;"><b>NAHDLATUL ULAMA</b></p> -->

                        <table cellpadding="" cellspacing="" style="margin-top: 110px; margin-left: 150px; padding-top: 0px;padding-left: 0px; position: relative;font-family: sans-serif;font-size: 16px;color: black; transition-property: 600px;width: 400px;height:120px; line-height: 3px;">
                          <tr>
                            <td><b>Nama</b></td>
                            <td><b>:</b></td>
                              <td colspan="3"><b><?php echo strtoupper($d->nama_depan);?><b><?php echo strtoupper($d->nama_tengah);?><b><?php echo strtoupper($d->nama_belakang);?></b></td>
                          </tr>
                            <tr style="text-transform:capitalize;">
                              <td><b>T.T.L</b></td>
                              <td><b>:</b></td>
                                <td><b><?php echo strtolower ($d->tempat_lahir);?>, <?php echo date("d F Y", strtotime($d->tanggal_lahir));?></b></td>
                            </tr>
                            <tr style=" text-transform:capitalize;">
                              <td><b>Alamat</b></td>
                              <td><b>:</b></td>
                              <td><b><?php echo strtolower($d->alamat.", ".$d->desa);?></b></td>

                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td><b><?php echo strtolower($d->kecamatan.", ".$d->kabupaten);?></b></td>
                            </tr>
                            <tr style=" text-transform:capitalize;">
                              <td><b>Gugus Depan</b></td>
                              <td><b>:</b></td>
                                <td><b><?php echo strtolower($d->no_gudep);?></b></td>
                            </tr>
                            <tr style="padding-left: 270px;">
                              <td><b>Pangkalan</b></td>
                              <td><b>:</b></td>
                              <td><b>MI Nahdlatul Ulama' Tambaksumur</b></td>
                            </tr>
                            <tr style=" text-transform:capitalize;">
                              <td><b>Golongan</b></td>
                              <td><b>:</b></td>
                                <td><b><?php echo strtolower($d->golongan);?></b></td>
                            </tr>
                        </table>

                        <p style="color: black; font-family: Lucida Console;font-size: 30px;position: absolute;margin-left: 15px;margin-top: 420px; line-height: 15px; width: 350px;height:25px;text-align:center;position: left ;float: left"><?php echo substr_replace($d->nia,".",4, 0) ?><b></p>
                          <img style="position: absolute;margin-left: 445px;margin-top: 411px; width: 81px; height: 81px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/qrcode/351602000320200001.png">

                        <p style="color: #FFFFFF;margin-top: -180px;padding-left: 600px;padding-top: 4px;font-size: 11px;"> <b style="font-size: 18px;"><?php //echo $blangko["judul"];?></b>
                            <div style="color: #FFFFFF; padding-left: 480px;font-family: arial;font-size: 8px;text-align: center;padding-right: 20px;margin-top: -10px;opacity: 20px"><b><?php //echo $blangko["judul1"];?></b>
                            </div>
                        </p>
                            <div style="color: #000000; margin-left: 450px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 30px;width: 45%;text-align: left; line-height: 1.5em;margin-top: -20px;"><br><br><b><?php //echo $blangko["peraturan"];?></b></div>

                            <!-- <img style="border-radius: 2px;border:4px solid #fff;margin-left: 780px;font-family: arial;font-size: 11px;text-align: justify;width: 40px;margin-top: -75px;position: absolute;" src="../assets/img/qrcode/<?php //echo $r["qrcode"];?>"> -->
                        </p>

                    </div>

                    <div style="float: left; margin-left: 35px; margin-top:22px;width: 550px;height: 350px;margin-bottom: 12px;background-size: 550px 350px;background-image: url('<?php echo base_url(); ?>assets/img/kartu/sisakobl.png');">

                                    <p style="color: #FFFFFF;margin-top: -180px;padding-left: 600px;padding-top: 4px;font-size: 11px;"> <b style="font-size: 18px;"><?php //echo $blangko["judul"];?></b>
                                        <div style="color: #FFFFFF; padding-left: 480px;font-family: arial;font-size: 8px;text-align: center;padding-right: 20px;margin-top: -10px;opacity: 20px"><b><?php //echo $blangko["judul1"];?></b>
                                        </div>
                                    </p>
                                        <div style="color: #000000; margin-left: 450px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 30px;width: 45%;text-align: left; line-height: 1.5em;margin-top: -20px;"><br><br><b><?php //echo $blangko["peraturan"];?></b></div>

                                        <!-- <img style="border-radius: 2px;border:4px solid #fff;margin-left: 780px;font-family: arial;font-size: 11px;text-align: justify;width: 40px;margin-top: -75px;position: absolute;" src="../assets/img/qrcode/<?php //echo $r["qrcode"];?>"> -->
                                    </p>

                                </div>


                  <?php } ?>
        </body>
</html
