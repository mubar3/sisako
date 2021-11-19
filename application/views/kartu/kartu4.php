<html>

<head>
  <link href="//db.onlinewebfonts.com/c/f2ecc6ef740fcf60de095b0b087dd58d?family=OCR+A+Extended" rel="stylesheet" type="text/css"/>
  <style>
  @import url(//db.onlinewebfonts.com/c/f2ecc6ef740fcf60de095b0b087dd58d?family=OCR+A+Extended);
  @font-face {font-family: "OCR A Extended"; src: url("//db.onlinewebfonts.com/t/f2ecc6ef740fcf60de095b0b087dd58d.eot"); src: url("//db.onlinewebfonts.com/t/f2ecc6ef740fcf60de095b0b087dd58d.eot?#iefix") format("embedded-opentype"), url("//db.onlinewebfonts.com/t/f2ecc6ef740fcf60de095b0b087dd58d.woff2") format("woff2"), url("//db.onlinewebfonts.com/t/f2ecc6ef740fcf60de095b0b087dd58d.woff") format("woff"), url("//db.onlinewebfonts.com/t/f2ecc6ef740fcf60de095b0b087dd58d.ttf") format("truetype"), url("//db.onlinewebfonts.com/t/f2ecc6ef740fcf60de095b0b087dd58d.svg#OCR A Extended") format("svg"); }

  </style>
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

<body style="padding-top: 60px; padding-left: 0px;">
  <div style="  position: absolute; margin-left: 630px;
            height: 90%;  border-left: 2px dashed;" ></div>

<?php foreach ($anggota as $d) {
  // code...
?>
<!-- <div style="float: left; margin-left: 20px; margin-top:-13px;width: 550px;height: 350px;margin-bottom: 12px;background-size: 550px 350px;background-image: url('<?php echo base_url(); ?>assets/img/kartu/pramuka.png');"> -->
  <div style=" padding: 25px; float: left; margin-left: 7px; margin-top:-64px;width: 570px;height: 350px;margin-bottom: 12px;background-size: 570px 350px;background-image: url('<?php echo base_url(); ?>assets/img/kartu/pramuka.png'); background-repeat: no-repeat; background-origin: content-box;">

  <img style="position: absolute;margin-left: 34px;margin-top: 98px; width: 105px; height: 140px;overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/foto/<?php echo $d->image ?>">

                <table cellpadding="" cellspacing="" style="margin-top: -7px;padding-top: 110px;padding-left: 160px; font-family: Arial; font-size: 15px;color: black; width: 520px;height: 80px; line-height: 16px; text-align:left;position: absolute ;float: center">
                  <tr style="padding-left: 270px;">
                    <td><b>Nama</b</td>
                    <td><b>:</b></td>
                      <td colspan="3"><b><?php echo strtoupper($d->nama_depan);?></b></td>
                  </tr>
                    <tr style="text-transform:capitalize;">
                      <td><b>T.T.L</b></td>
                      <td><b>:</b></td>
                        <td> <b><?php echo strtolower ($d->tempat_lahir);?>, <?php echo tgl_indo($d->tanggal_lahir);?></b></td>
                    </tr>
                    <?php  
                    $rt = 'RT.'.$d->rt;
                    $rw = 'RW.'.$d->rw;
                    ?>
                    <tr style="line-height: 17px; text-transform:capitalize;">
                      <td style="vertical-align: text-top;"><b>Alamat</b></td>
                        <td style="vertical-align: text-top;"><b>:</b></td>
                        <td><b><?php echo strtolower($d->alamat).', ';?>
                        <?php 
                        if(!empty($d->rt) or !empty($d->rw)){
                        echo $rt.'/'.$rw.', ';
                        }
                        ?>
                        <?php echo ucwords ($d->desa);?>, <?php echo ucwords ($d->kecamatan);?>, <?php echo strtolower($d->kabupaten);?></b></td>
                    </tr>
                    <tr>
                      <td><b>Gudep</b></td>
                      <td><b>:</b></td>
                          <td><b><?php echo substr_replace($d->no_gudep,".",2, 0);?></b></td>
                    </tr>
                    <tr style="line-height: 15px">
                      <td style="vertical-align: text-top;"><b>Pangkalan</b></td>
                      <td style="vertical-align: text-top;"><b>:</b></td>
                          <td><b><?php echo $d->pangkalan;?></b></td>
                    </tr>
                    <tr>
                      <td><b>Golongan</b></td>
                      <td><b>:</b></td>
                          <td><b><?php echo $d->golongan;?></b></td>
                    </tr>
                </table>
                <p style="font-family: 'OCR A Extended' ;font-size: 31px;position: absolute;margin-left: 35px;margin-top: 265px; line-height: 15px; width: ;height:120px;text-align:center;position: center;float: center">
                  <b>
                    <?php
                    $nia1 = substr($d->nia,0,4);
                    $nia2 = substr($d->nia,4,4);
                    $nia3 = substr($d->nia,8,4);
                    $nia4 = substr($d->nia,12,4);
                    echo $nia1.' '.$nia2.' '.$nia3.' '.$nia4;


                    ?>
                  </b><br>
                 </p>

                  <img style="position: absolute;margin-left: 440px;margin-top: 250px; width: 70px;height:70px; overflow: hidden;" class="img-responsive img" src="<?php echo base_url(); ?>assets/img/qrcode/<?php echo $d->nia?>.png">
            </div>

            <!-- <div style="float: left; margin-left: 20px; margin-top:-13px;width: 550px;height: 350px;margin-bottom: 12px;background-size: 550px 350px;background-image: url('<?php echo base_url(); ?>assets/img/kartu/belakang.png');">
            </div> -->


          <?php } ?>
</body>


<?php
function tgl_indo($tanggal){
$bulan = array (
  1 =>   'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember'
);
$pecahkan = explode('-', $tanggal);

// variabel pecahkan 0 = tanggal
// variabel pecahkan 1 = bulan
// variabel pecahkan 2 = tahun

return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
