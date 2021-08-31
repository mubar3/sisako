<html>

<head>
  <title> KARTANU | Cetak</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo.png" sizes="" type="image/png">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bootstrap/css/bootstrap.min.css">
</head>
<style>
    @media print
{
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<body>
  <div class="row">

<?php foreach ($anggota as $d) {
  // code...
?>
  <div class="col-md-3">
<div>
  <img style="position:absolute" class="img-responsive" src="<?php echo base_url(); ?>assets/img/kartu/rev.png">

<!--  <img style="position: absolute;margin-left: 11px;margin-top: 11px;width: 1px;height:127px;" src="<?php echo base_url(); ?>assets/img/garis/as.png">
 <img style="position: absolute;margin-left: 60px;margin-top: 4px;width: 100px;height:1px;" src="<?php echo base_url(); ?>assets/img/garis/sa.png">
 <img style="position: absolute;margin-left: 60px;margin-top: 145px;width: 150px;height:1px;" src="<?php echo base_url(); ?>assets/img/garis/sa.png"> -->

  <img style="position: absolute;margin-left: 250px;margin-top: 69px; width: 77px; height: 89px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/foto/<?php echo $d->image ?>">
                <!-- <img style="position: absolute;margin-left: 222px;margin-top: 115px; width: 30px; height: 30px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/qrcode/<?php echo $d->no_anggota ?>.png"> -->
                <p style="color: white; font-family: arial black;font-size: 21px;position: absolute;margin-left: 95px;margin-top: 17px; line-height: 8px; width: 200px;height:100px;text-align:left;position: center;float: center">
                                       <br>KARTANU
                                   </p>

                  <p style="color: white; font-family: arial;font-size: 9px;position: absolute;margin-left: 96px;margin-top: 38px; line-height: 8px; width: 250px;height:35px;text-align:left;position: center;float: center">
                                       <b>KARTU TANDA ANGGOTA</b><br><b> NAHDLATUL ULAMA</b>
                                   </p>
                                   <p style="color: white; font-family: arial;font-size: 7px;position: absolute;margin-left: 180px;margin-top: 168px; line-height: 8px; width: 250px;height:10px;text-align:center;position: center;float: center">
                       <b>Berlaku :</b><br>Seumur Hidup
                   </p>

                <!-- <p style="font-family: arial;font-size: 2px;position: absolute;margin-left: 40px;margin-top: 40px;width: 50px;height:30px;text-align:center;position: center;float: center">
                    <u><b><?php //echo $blangko["kepsek"];?></b></u><br><?php //echo $blangko["nip"];?>
                </p> -->



                <!-- <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 225px;margin-top: 140px;width: 150px;height:30px;text-align:center;position: center;float: center">
                    <u><b><?php //echo $blangko1["kepsek"];?></b></u><br><?php //echo $blangko1["nip"];?>
                 </p> -->
                <!-- <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 190px;margin-top: 90px;width: 50px;height:10px;text-align:center;position: center;float: center">

                    <p style="font-family: arial;font-size:6px; color: white; position: absolute;margin-left: 190px;margin-top: 110px; line-height: 7px; width: 55px;height:65px;text-align:center;position: center;float: center">
                       <b></b><br>
                   </p> -->

                <table cellpadding="" cellspacing="" style="margin-top: 15px;padding-top: 50px;padding-left: 45px; position: relative;font-family:  Arial;font-size: 11px; color: white; transition-property: 600px;width: 350px;height: 90px; line-height: 3px;">
                  <tr>
                        <td><b>JAWA TIMUR</b></td>
                    </tr>
                   <tr>
                        <td><b><?php echo ucwords ($d->kabupaten);?></b></td>
                    </tr>

                  </table>
                      <img style="position: absolute;margin-left: 45px;margin-top: 4px; width: 50px; height: 50px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/qrcode/<?php echo $d->no_anggota ?>.png">

                    <table cellpadding="" cellspacing="" style="margin-top: 12px;padding-top: 50px;padding-left: 37px; position: relative;font-family: arial;font-size: 11px; color: white; transition-property: 600px;width: 270px;height: 90px; line-height: 3px;">
                    <tr>
                      <td><b><?php echo strtoupper($d->nama);?></b></td>
                  </tr>
                    <tr>
                          <td><b><?php echo $d->no_anggota;?></b></td>
                    </tr>
                </table>
                <!-- <p style="color: #FFFFFF;margin-top: -180px;padding-left: 600px;padding-top: 4px;font-size: 11px;"> <b style="font-size: 18px;"><?php //echo $blangko["judul"];?></b>
                    <div style="color: #FFFFFF; padding-left: 480px;font-family: arial;font-size: 8px;text-align: center;padding-right: 20px;margin-top: -10px;opacity: 20px"><b><?php //echo $blangko["judul1"];?></b>
                    </div>
                </p> -->
                    <!-- <div style="color: #000000; margin-left: 450px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 30px;width: 45%;text-align: left; line-height: 1.5em;margin-top: -20px;"><br><br><b><?php //echo $blangko["peraturan"];?></b></div> -->

                    <!-- <img style="border-radius: 2px;border:4px solid #fff;margin-left: 780px;font-family: arial;font-size: 11px;text-align: justify;width: 40px;margin-top: -75px;position: absolute;" src="../assets/img/qrcode/<?php //echo $r["qrcode"];?>"> -->
                <!-- </p> -->

            </div>

</div>
          <?php } ?>
        </div>
        </body>


        </html>
