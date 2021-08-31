<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISAKO | Log in</title>
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

  <!-- sweetalert -->
  <script src="assets/sweatalert/dist/sweetalert.js"></script>
  <link rel="stylesheet" href="assets/sweatalert/dist/sweetalert.css">

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
<img class="logo" src="assets/img/logo_sako.png" height="150px" width="150px"></br>
</div>

    <a class=""><SPAN style="font-size:21px"><b>Sistem Informasi Satuan Komunitas</b></SPAN></a><br>
    <a class=""><b class="label alert-success" style="color:purple !important" >SISAKO</b>  <SPAN style="font-size:25px">Pramuka LP. Ma’arif NU</SPAN></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk mengelola</p>

    <form action="<?php echo base_url('Dashboard/auth/login'); ?>" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input required name="username" type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-6">
        <div class="checkbox icheck">
          <input name="ok" type="checkbox" required>
          <label>Saya bukan robot</label>
        </div>
        </div>

        <div class="col-xs-6">
            <button type="submit" class="btn btn-success btn-block btn-flat">Masuk</button>
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
<?php if ($this->session->flashdata('globalmsg')): ?>
<script type="text/javascript">
$(document).ready(function() {
swal({
title: "Gagal login!",
text: "<?php echo $this->session->flashdata('globalmsg'); ?>",
showConfirmButton: true,
type: 'warning'
});
});
</script>
<?php endif; ?>
</body>
</html>
