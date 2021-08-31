<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISAKO</title>
  <link rel="icon" href="assets/img/logo_sako.png" sizes="" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
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
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/dashboard/plugins/iCheck/flat/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">

<div class="alert alert-success">
  <img class="logo-default" src="<?php echo base_url().'assets/img/logo_sako.png'; ?>" alt="logo " style="margin-top:-10px; width:100px; height:100px;"/>
</div>
    <a class=""><b class="label bg-green">SISAKO</b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masukkan nomor induk keluarga (NIK) anda!</p>

    <form action="<?php echo base_url('check'); ?>" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input name="id" type="number" class="form-control" placeholder="Nomor Induk Keluarga" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="row">

        <!-- /.col -->
        <div class="col-xs-6">
        <div class="checkbox icheck">
          <input name="ok" type="checkbox" required>
          <label>Saya bukan robot</label>
        </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-success btn-block btn-flat">Cari data</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="assets/dashboard/plugins/jQuery/jquery-2.2.4.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/dashboard/plugins/iCheck/icheck.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
<!-- iCheck -->
<script src="assets/dashboard/plugins/iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="assets/dashboard/plugins/iCheck/flat/green.css">

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

</body>
</html>
