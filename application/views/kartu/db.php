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
/* body {
    -webkit-transform: scaleX(-1);
     transform: scaleX(-1);
} */
</style>
<!-- <body style="width : 100%; height : 100% "> -->
<body>
<?php foreach ($anggota as $d) {
  // code...
?>
<div style="float: left;margin-top:0px;width: 850px;height: 260px;margin-bottom: -12px;background-size: 435px 260px;background-image: url('<?php echo base_url(); ?>assets/img/kartu/rev.png');">

                <img style="position: absolute;margin-left: 20px;margin-top: 75px; width: 92px; height: 115px;overflow: hidden;" class="img-responsive img" src="../assets/img/user/<?php //echo $r["gambar"];?>">

                <!-- <div style="position: absolute;margin-left: 20px;margin-top: 20px; width: 92px;height: 50px; background-color: #026537"><img style="width: 70px; padding-left: 12px;padding-top: 1px;" src="../assets/img/logo/<?php //echo "$a[gambar] "?>"></div> -->

                <p style="color: white;letter-spacing: 1px;margin-left: 80px;padding-top: 2px;width: 250px; text-align: center; font-size: 20px; font"><b>KARTANU</b></p>
                <!-- <p style="font-size: 17px;margin-top: -22px;margin-left: 120px;"><b>MUSLIMAT NAHDLATUL ULAMA</b></p> -->

                <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 20px;margin-top: 140px;width: 180px;height:30px;text-align:center;position: center;float: center">
                    <u><b><?php //echo $blangko["kepsek"];?></b></u><br><?php //echo $blangko["nip"];?>
                </p>

                 <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 80px;margin-top: 110px;width: 80px;height:20px;text-align:center;position: center;float: center">
                    <img src="../assets/img/tandatangan/<?php //echo $blangko["ttd"];?>">
                </p>

                <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 225px;margin-top: 140px;width: 150px;height:30px;text-align:center;position: center;float: center">
                    <u><b><?php //echo $blangko1["kepsek"];?></b></u><br><?php //echo $blangko1["nip"];?>
                </p>
                <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 190px;margin-top: 110px;width: 50px;height:10px;text-align:center;position: center;float: center">
                    <img src="../assets/img/tandatangan/<?php //echo $cap["gambar"];?>">

                   <p style="font-family: arial;font-size: 7px;position: absolute;margin-left: 255px;margin-top: 110px;width: 80px;height:10px;text-align:center;position: center;float: center">
                       <img src="../assets/img/tandatangan/<?php //echo $blangko1["ttd"];?>">
                    </p>

            <!-- <?php
                $tanggal = date ("j");
                $bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
                $bulan = $bulan[date("n")];
                $tahun = date("Y");
                $thn = $tahun+5;
                ?>Berlaku Hingga:<br><b><?php echo $tanggal ." ". $bulan ." ". $thn;?></b> -->

                <p style="color: #FFFFFF;margin-top: -180px;padding-left: 600px;padding-top: 4px;font-size: 11px;"> <b style="font-size: 18px;"><?php //echo $blangko["judul"];?></b>
                    <div style="color: #FFFFFF; padding-left: 480px;font-family: arial;font-size: 8px;text-align: center;padding-right: 20px;margin-top: -10px;opacity: 20px"><b><?php //echo $blangko["judul1"];?></b>
                    </div>
                </p>
                    <div style="color: #000000; margin-left: 450px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 30px;width: 45%;text-align: left; line-height: 1.5em;margin-top: -20px;"><br><br><b><?php //echo $blangko["peraturan"];?></b></div>

                    <img style="border-radius: 2px;border:0px solid #fff;margin-left: 780px;font-family: arial;font-size: 11px;text-align: justify;width: 40px;margin-top: -75px;position: absolute;" src="../assets/img/qrcode/<?php //echo $r["qrcode"];?>"><!--  -->
                </p>
            </div>


          <?php } ?>
        </body>


        </html>
