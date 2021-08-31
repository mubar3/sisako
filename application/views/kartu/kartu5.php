<html>

<head>
  <title> KARTANU | Cetak</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo.png" sizes="" type="image/png">
</head>
<style>
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
</style>
<!-- <body style="width : 100%; height : 100% "> -->
<body style="margin:20px;">
<?php foreach ($anggota as $d) {
  // code...
?>
<!-- <div style="float: left; margin-left: -5px; margin-top:-24px;width: 550px;height: 351px;margin-bottom: 6px;background-size: 551px 350px;background-image: url('<?php echo base_url(); ?>assets/img/kartu/kartu1.png');"> -->
<div style="float: left; margin-left: -5px; margin-top:-24px;width: 550px;height: 351px;margin-bottom: 6px;background-size: 551px 350px;">

  <img style="position: absolute;float: left; margin-left: -5px;width: 550px;height: 351px;margin-bottom: 6px;" src="<?php echo base_url(); ?>assets/img/kartu/kartu1.png">
  <img style="position: absolute;margin-left: 399px;margin-top: 110px; width: 105px; height: 137px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/foto/<?php echo $d->image ?>">
                <!-- <img style="position: absolute;margin-left: 222px;margin-top: 115px; width: 30px; height: 30px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/qrcode/<?php echo $d->no_anggota ?>.png"> -->
                <p style="color: white; font-family: arial black;font-size: 30px;position: absolute;margin-left: 148px;margin-top: 23px; line-height: 13px; width: 200px;height:100px;text-align:left;position: center;float: center">
                                       <br>KARTANU
                                   </p>

                  <p style="color: white; font-family: arial;font-size: 13px;position: absolute;margin-left: 148px;margin-top: 56px; line-height: 13px; width: 250px;height:35px;text-align:left;position: center;float: center">
                                       <b>KARTU TANDA ANGGOTA</b><br><b> NAHDLATUL ULAMA</b>
                                   </p>
                                   <p style="color: white; font-family: arial;font-size: 12px;position: absolute;margin-left: 327px;margin-top: 255px; line-height: 15px; width: 250px;height:10px;text-align:center;position: center;float: center">
                       <b>Berlaku :</b><br>Seumur Hidup
                   </p>

                <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 190px;margin-top: 90px;width: 50px;height:10px;text-align:center;position: center;float: center">

                    <p style="font-family: arial;font-size:6px; color: white; position: absolute;margin-left: 190px;margin-top: 110px; line-height: 7px; width: 55px;height:65px;text-align:center;position: center;float: center">
                       <b></b><br>
                   </p>

                <table cellpadding="" cellspacing="" style="margin-top: 15px;padding-top: 90px;padding-left: 51px; position: relative;font-family:  Arial;font-size: 17px; color: white; transition-property: 600px;width: 350px;height: 145px; line-height: 3px;">
                  <tr>
                        <td><b>JAWA TIMUR</b></td>
                    </tr>
                   <tr>
                        <td><b><?php echo ucwords ($d->kabupaten);?></b></td>
                    </tr>

                  </table>
                      <img style="position: absolute;margin-left: 55px;margin-top: 16px; width: 70px; height: 70px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/qrcode/<?php echo $d->no_anggota ?>.png">

                    <table cellpadding="" cellspacing="" style="margin-top: 15px;padding-top: 85px;padding-left: 51px; position: relative;font-family: arial;font-size: 17px; color: white; transition-property: 600px;width: 400px;height: 145px; line-height: 3px;">
                    <tr>
                      <td><b><?php echo ucwords($d->nama);?></b></td>
                  </tr>
                    <tr>
                          <td><b><?php echo $d->no_anggota;?></b></td>
                    </tr>
                </table>

            </div>


          <?php } ?>
        </body>


        </html>
