<head>
  <title> KARTANU | Cetak</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo.png" sizes="" type="image/png">
</head>
<?php foreach ($anggota as $d) {
  // code...
?>
<body>
<div style="float: left; margin-left: 35px; margin-top:22px;width: 550px;height: 350px;margin-bottom: 12px;background-size: 550px 350px;background-image: url('<?php echo base_url(); ?>assets/img/kartu/background2.jpg');">

 <img style="position: absolute;margin-left: -1px;margin-top: 20px;width: 2px;height:150px;" src="<?php echo base_url(); ?>assets/img/garis/as.png">
 <img style="position: absolute;margin-left: 200px;margin-top: 13px;width: 150px;height:2px;" src="<?php echo base_url(); ?>assets/img/garis/sa.png">
 <img style="position: absolute;margin-left: 200px;margin-top: 349px;width: 150px;height:2px;" src="<?php echo base_url(); ?>assets/img/garis/sa.png">


  <img style="position: absolute;margin-left: 18px;margin-top: 100px; width: 128px; height: 143px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/foto/<?php echo $d->image ?>">
                <img style="position: absolute;margin-left: 440px;margin-top: 250px; width: 85px; height: 85px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/qrcode/<?php echo $d->no_anggota ?>.png">


                <!-- <div style="position: absolute;margin-left: 20px;margin-top: 20px; width: 92px;height: 50px; background-color: #026537"><img style="width: 70px; padding-left: 12px;padding-top: 1px;" src="../assets/img/logo/<?php //echo "$a[gambar] "?>"></div> -->

                <!-- <p style="letter-spacing: 1px;margin-left: 122px;padding-top: 20px;width: 250px; text-align: center; font-size: 20px"><b>KARTU ANGGOTA</b></p> -->
                <!-- <p style="font-size: 17px;margin-top: -22px;margin-left: 160px;"><b>NAHDLATUL ULAMA</b></p> -->

                <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 20px;margin-top: 140px;width: 180px;height:30px;text-align:center;position: center;float: center">
                    <u><b><?php //echo $blangko["kepsek"];?></b></u><br><?php //echo $blangko["nip"];?>
                </p>

                    <img style="position: absolute;margin-left: 165px;margin-top: 290px;width: 45px;height:40px;text-align:center;position: center;" src="<?php echo base_url(); ?>assets/img/ttd/rois2.png">

                <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 225px;margin-top: 140px;width: 150px;height:30px;text-align:center;position: center;float: center">
                    <u><b><?php //echo $blangko1["kepsek"];?></b></u><br><?php //echo $blangko1["nip"];?>
                 </p>
                <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 190px;margin-top: 110px;width: 50px;height:10px;text-align:center;position: center;float: center">
                    <img src="">
                       <img style="position: absolute;margin-left: 145px;margin-top: 180px;width: 45px;height:45px;text-align:center;position: center;" src="<?php echo base_url(); ?>assets/img/ttd/adim2.png">
                       <img style="position: absolute;margin-left: 45px;margin-top: 169px;width: 57px;height:57px;text-align:center;position: center;" src="<?php echo base_url(); ?>assets/img/ttd/ttd.png">

                    <p style="font-family: arial;font-size: 12px;position: absolute;margin-left: 30px;margin-top: 250px; line-height: 15px; width: 100px;height:35px;text-align:center;position: center;float: center">
                       <b>Berlaku Hingga :</b><br>Seumur Hidup
                   </p>
                   <p style="font-family: arial;font-size: 11px;position: absolute;margin-left: 165px;margin-top: 260px; line-height: 11px; width: 220px;height:120px;text-align:center;position: center;float: center">
                      <b>Pengurus Cabang Nahdlatul Ulama</b><br><b>Kabupaten Mojokerto</b>
                    </p>
                    <p style="font-family: arial;font-size: 12px;position: absolute;margin-left: 105px;margin-top: 285px;line-height: 15px; width: 170px;height:120px;text-align:center;position: center;float: center">
                       Rais Syuriah<br>
                     </p>
                     <p style="font-family: arial;font-size: 12px;position: absolute;margin-left: 105px;margin-top: 320px; line-height: 15px; width: 170px;height:120px;text-align:center;position: center;float: center">
                        KH. Ahmad Jamzuri Syarif<br>
                      </p>
                     <p style="font-family: arial;font-size: 12px;position: absolute;margin-left: 290px;margin-top: 285px; line-height: 15px; width: 170px;height:120px;text-align:center;position: center;float: center">
                        Ketua Tanfidziyah<br>
                      </p>
                      <p style="font-family: arial;font-size: 12px;position: absolute;margin-left: 290px;margin-top: 320px; line-height: 15px; width: 170px;height:120px;text-align:center;position: center;float: center">
                         KH. Abdul Adzim alwi<br>
                       </p>
                <table cellpadding="" cellspacing="" style="margin-top: -7px;padding-top: 115px;padding-left: 155px; position: relative;font-family: arial;font-size: 13.5px;transition-property: 600px;width: 530px;height: 170px; line-height: 9.5px;">
                  <tr>
                      <td colspan="3"><b><?php echo strtoupper($d->nama);?></b></td>
                  </tr>
                    <tr>
                        <td>N.I.A</td>
                        <td>:</td>
                          <td><?php echo $d->no_anggota;?></td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php echo strtoupper ($d->tempat_lahir);?>, <?php echo date("d F Y", strtotime($d->tanggal_lahir));?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><?php echo ucwords ($d->pekerjaan);?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $d->jk;?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo strtoupper ($d->alamat);?></td>
                    </tr>
                    <tr style="margin-left: 10px;">
                        <td> &nbsp; &nbsp; &nbsp;RT/RW</td>
                        <td>:</td>
                        <td>0<?php echo strtoupper ($d->rt);?> / 0<?php echo strtoupper ($d->rw);?></td>
                    </tr>
                    <tr style="margin-left: 10px;">
                        <td> &nbsp; &nbsp; &nbsp;Desa/Kelurahan</td>
                        <td>:</td>
                        <td><?php echo ucwords ($d->desa);?></td>
                    </tr>
                    <tr style="margin-left: 10px;">
                        <td> &nbsp; &nbsp; &nbsp;Kecamatan</td>
                        <td>:</td>
                        <td><?php echo ucwords ($d->kecamatan);?></td>
                    </tr>
                    <tr style="margin-left: 10px;">
                        <td> &nbsp; &nbsp; &nbsp;Kab/Kota</td>
                        <td>:</td>
                        <td><?php echo ucwords ($d->kabupaten);?></td>
                    </tr>
                </table>
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
