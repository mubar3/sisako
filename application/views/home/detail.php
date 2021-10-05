<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISAKO | Pramuka Ma'arif NU</title>
  <!-- <link rel="icon" href="assets/img/logo.png" sizes="" type="image/png"> -->
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="assets/img/logo_sako.png" sizes="" type="image/png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <base href="<?php echo base_url();?>" />
  <base src="<?php echo base_url();?>" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/dashboard/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dashboard/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dashboard/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/dashboard/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/dashboard/plugins/morris/morris.css">

  <script type="text/javascript" src="assets/dashboard/plugins/flot/jquery.flot.js"></script>

  <link rel="stylesheet" href="assets/dashboard/plugins/flot/jquery.flot.js">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/dashboard/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<!-- <div class="content-wrapper">
  <section class="content">
    <h4><strong>DETAIL DATA KARTANU</strong></h4>
<table class="table">
  <tr>
    <th>Nama Lengkap</th>
    <td><?php echo $edit->nama ?></td>
  </tr>
  <tr>

  </tr>

</table>
  </section>
</div> -->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Identitas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach ($edit_anggota as $e) { ?>
              <!-- <form action="<?php echo base_url(). 'AnggotaController/tambah_aksi'; ?>" method="post" onsubmit="return validasi();" enctype="multipart/form-data"> -->

                  <table class="table table-striped" border="0" width="200px" cellpadding="0" cellspacing="0">
                      <tr>
                        <td ><img class="img-responsive" width="170" height="200" src="assets/img/foto/<?php echo $e->image ?>"></td>
                        <td></td>

                        <!-- <td><img class="pull-right" width="120" height="120" src="assets/img/qrcode/<?php echo $e->nia.'.png';?>"></td> -->
                    </tr>
                    <tr>
                      <!-- <td ><img class="img-responsive" width="200" height="200" src="assets/img/foto/<?php echo $e->image ?>"></td> -->
                      <!-- <td></td>
                      <td><img class="pull-right" width="120" height="120" src="assets/img/qrcode/<?php echo $e->no_anggota.'.png';?>"></td> -->

                    </tr>

                    <!-- <tr>
                      <td width="20%">N.I.A</td>
                      <td width="10px">:</td>
                       <td ><?php echo $e->nia?></td>
                    </tr> -->
                    <tr>
                      <td width="20%">N.I.A</td>
                      <td width="10px">:</td>
                       <td >
                         <?php
                         $nia1 = substr($e->nia,0,4);
                         $nia2 = substr($e->nia,4,4);
                         $nia3 = substr($e->nia,8,4);
                         $nia4 = substr($e->nia,12,4);
                         echo $nia1.' '.$nia2.' '.$nia3.' '.$nia4;
                         ?>
                       </td>
                    </tr>

                    <tr>
                      <td width="20%">NISN/NSS/NSM</td>
                      <td width="10px">:</td>
                       <td ><?php echo $e->nisn?></td>
                    </tr>

                    <tr>
                      <td width="20%">NIK</td>
                      <td width="10px">:</td>
                       <td ><?php echo $e->nik?></td>
                    </tr>

                    <!-- <tr>
                      <td width="20%">Nomor Gugus Depan</td>
                      <td width="10px">:</td>
                       <td ><?php echo $e->no_gudep?></td>
                    </tr> -->
                    <tr>
                      <td width="20%">Nomor Gugus Depan</td>
                      <td width="10px">:</td>
                       <td>  <?php echo substr_replace($e->no_gudep,".",2, 0);?></td>
                    </tr>

                    <tr>
                      <td width="20%">Nama</td>
                      <td width="10px">:</td>
                       <td ><?php echo $e->nama_depan?></td>
                    </tr>

                  </table>

  <div class="form-group row">
        <div class="col-sm-12">
          <label>&nbsp;</label>
          <center><button onclick="playAudio();" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  <b>Tampilkan Data</b>
              </button></center>
        </div>
      </div>

<script>
var x = document.getElementById("myAudio");

function playAudio() {
document.getElementById("myAudio").play();
}

function pauseAudio() {
document.getElementById("myAudio").pause();
}
</script>

<div class="collapse m-t-10" id="collapseExample">
      <div class="form-group row">
        <!-- <label class="col-sm-3 col-form-label">Pangkalan</label>
        <div class="col-sm-9">
          <?php echo $e->pangkalan?>
      </div> -->
      </div>
  <table class="table table-striped" border="0" width="200px" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20%">Pangkalan</td>
    <td width="10px">:</td>
     <td ><?php echo $e->pangkalan?></td>
  </tr>

  <tr>
    <td width="20%">Agama</td>
    <td width="10px">:</td>
     <td ><?php echo $e->agama?></td>
  </tr>

  <tr>
    <td width="20%">Golongan Darah</td>
    <td width="10px">:</td>
     <td ><?php echo $e->golongan_darah?></td>
  </tr>

  <tr>
    <td>Tempat Lahir</td>
    <td width="10px">:</td>
     <td ><?php echo $e->tempat_lahir?></td>
  </tr>

  <tr>
    <td>Tanggal Lahir</td>
    <td width="10px">:</td>
     <td ><?php echo date("d-m-Y", strtotime($e->tanggal_lahir));?></td>
  </tr>

  <tr>
    <td>Usia</td>
    <td width="10px">:</td>
     <td ><?php echo $e->usia?></td>
  </tr>

  <tr>
    <td>Golongan</td>
      <td width="10px">:</td>
      <td ><?php echo $e->golongan?></td>
  </tr>

  <!-- <tr>
    <td>Nomor Gugus Depan</td>
    <td width="10px">:</td>
     <td ><?php echo $e->no_gudep?></td>
  </tr> -->

  <tr>
    <td>Alamat</td>
    <td width="10px">:</td>
     <td ><?php echo $e->alamat?></td>
  </tr>

  <tr>
  <td width="20%">RT / RW</td>
  <td width="10px">:</td>
  <td ><?php echo $e->rt?> / <?php echo $e->rw?></td>
  </tr>

  <tr>
    <td>Desa</td>
    <td width="10px">:</td>
     <td ><?php echo $e->desa?></td>
  </tr>

  <tr>
    <td>Kecamatan</td>
    <td width="10px">:</td>
     <td ><?php echo $e->kecamatan?></td>
  </tr>

  <tr>
    <td>Kabupaten</td>
    <td width="10px">:</td>
     <td ><?php echo $e->kabupaten?></td>
  </tr>

  <tr>
    <td>Provinsi</td>
    <td width="10px">:</td>
     <td ><?php echo $e->provinsi?></td>
  </tr>

  <tr>
    <td>Jenis Kelamin</td>
      <td width="10px">:</td>
      <td ><?php echo $e->jk?></td>
  </tr>

  <tr>
    <td>Aktifitas organisasi saat ini</td>
      <td width="10px">:</td>
      <td ><?php echo $e->aktifitas_organisasi?></td>
  </tr>

  <tr>
    <td>Jenis Kartu</td>
      <td width="10px">:</td>
      <td ><?php echo $e->emoney?></td>
  </tr>

  <tr>
    <td>Terdaftar</td>
      <td width="10px">:</td>
      <td ><?php echo $e->waktu?></td>
  </tr>

</table>
<div class="box-header with-border">
  <h3 class="box-title">Pengalaman Organisasi</h3>
</div>

<table class="table table-striped" border="0" width="200px" cellpadding="0" cellspacing="0">

  <tr>
    <td width="20%">1. Nama Organisasi</td>
    <td width="10px">:</td>
     <td ><?php echo $e->nama_organisasi1?></td>
  </tr>

  <tr>
    <td width="20%">Jabatan</td>
    <td width="10px">:</td>
     <td ><?php echo $e->jabatan1?></td>
  </tr>

  <tr>
    <td width="20%">Tahun</td>
    <td width="10px">:</td>
     <td ><?php echo $e->tahun1?></td>
  </tr>

  <tr>
    <td width="20%">2. Nama Organisasi</td>
    <td width="10px">:</td>
     <td ><?php echo $e->nama_organisasi2?></td>
  </tr>

  <tr>
    <td width="20%">Jabatan</td>
    <td width="10px">:</td>
     <td ><?php echo $e->jabatan2?></td>
  </tr>

  <tr>
    <td width="20%">Tahun</td>
    <td width="10px">:</td>
     <td ><?php echo $e->tahun2?></td>
  </tr>

  <tr>
    <td>3. Nama Organisasi</td>
    <td width="10px">:</td>
     <td ><?php echo $e->nama_organisasi3?></td>
  </tr>

  <tr>
    <td>Jabatan</td>
    <td width="10px">:</td>
     <td ><?php echo $e->jabatan3?></td>
  </tr>

  <tr>
    <td>Tahun</td>
    <td width="10px">:</td>
     <td ><?php echo $e->tahun3?></td>
  </tr>


</table>
<center><table>
  <tr><td>&nbsp;<td></tr>
  <tr><b style="font-size: 25px; font-family : serif"> QRcode </b></tr>
  <tr>
    <td><img class="pull-right" width="150" height="150" src="assets/img/qrcode/<?php echo $e->nia.'.png';?>"></td>
    <!-- <td ><img class="img-responsive" width="370" height="400" src="assets/img/kartu/depan.png"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td ><img class="img-responsive" width="370" height="400" src="assets/img/kartu/belakang.png"></td> -->
  </tr>

</table></center>
<audio id="myAudio">
  <source src="./assets/audio/yalalwathon.mp3" type="audio/mp3">
    Browsermu tidak mendukung tag audio
  </audio>
</div>
</div>

  <!-- <audio autoplay>
    <source src="./assets/audio/yalalwathon.mp3" type="audio/mpeg">
    Browsermu tidak mendukung tag audio, upgrade donk!
</audio> -->
                <!-- <div class="box-body">
                <div class="form-group">
                  <a href="<?php echo base_url('Dashboard/admin/data/anggota/all'); ?>"><input type="button" value="Kembali" class="btn btn-warning"></a>
                <?php } ?>

                </div>
              </div> -->

              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      </form>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function validasi(){
      var notelepon = document.getElementById('telp').value;
      var mail = document.getElementById('email').value;
      var number = /^[0-9]+$/;
      var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

      if(!mail.match(re))
      {
        alert('Email Tidak Valid');
        return false;
      }

      if(!notelepon.match(number))
      {
        alert('No Telphone Harus Angka');
        return false;
      }

      if(notelepon.length >= 13)
      {
        alert('No Telphone Harus 12 digit');
        return false;
      }

      return true;
    }
  </script>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <!-- <script>
          $(document).ready(function(){
              $("#provinsi").change(function (){
                  var url = "AnggotaController/add_ajax_kab/"+$(this).val();
                  $('#kabupaten').load(url);
                  return false;
              })

          $("#kabupaten").change(function (){
                  var url = "AnggotaController/add_ajax_kec/"+$(this).val();
                  $('#kecamatan').load(url);
                  return false;
              })

          $("#kecamatan").change(function (){
                  var url = "AnggotaController/add_ajax_des/"+$(this).val();
                  $('#desa').load(url);
                  return false;
              })
          });
      </script> -->
      <script src="assets/dashboard/plugins/jQuery/jquery-2.2.4.min.js"></script>
      <!-- DataTables -->
      <script src="assets/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script>
        // $(function () {
        //  $("#example1").DataTable();
          $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "scrollX": true,
        });
        $('#ceta').DataTable({
          "paging": true,
          "scrollX": true,
          // "lengthChange": true,
          "searching": true,
          "ordering": true,
          // "autoWidth": false,

      });
      </script>
      <!-- jQuery UI 1.11.4 -->
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
      <script src="assets/dashboard/plugins/jQueryUI/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.6 -->
      <script src="assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
      <!-- Morris.js charts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="assets/dashboard/plugins/morris/morris.min.js"></script>
      <!-- Sparkline -->
      <script src="assets/dashboard/plugins/sparkline/jquery.sparkline.min.js"></script>
      <!-- jvectormap -->
      <script src="assets/dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="assets/dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="assets/dashboard/plugins/knob/jquery.knob.js"></script>
      <!-- daterangepicker -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
      <script src="assets/dashboard/plugins/daterangepicker/daterangepicker.js"></script>
      <!-- datepicker -->
      <script src="assets/dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="assets/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <!-- Slimscroll -->
      <script src="assets/dashboard/plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="assets/dashboard/plugins/fastclick/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="assets/dashboard/dist/js/app.min.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="assets/dashboard/dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="assets/dashboard/dist/js/demo.js"></script>
      <!-- select2 -->
      <script src="assets/dashboard/plugins/select2/select2.full.min.js"></script>
