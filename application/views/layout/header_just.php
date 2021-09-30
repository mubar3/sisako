<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SISAKO | Dashboard</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="assets/dashboard/plugins/datatables/dataTables.bootstrap.css">
  <!-- sweetalert -->
  <script src="assets/sweatalert/dist/sweetalert.js"></script>
  <link rel="stylesheet" href="./assets/sweatalert/dist/sweetalert.css">
  <!-- font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">

  <script type="text/javascript" src="assets/js/charts/loader.js"></script>
  <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
  <script src="assets/js/statistik.js"></script>

  <!-- <script src="<?php echo base_url()?>/assets/Chart.js/Chart.bundle.js"></script> -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$count=count($uri_segments);
$url_akhir=$count-1;
if($uri_segments[$url_akhir]=="agenda"){ ?>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plug/css/bootstrap.min.css'; ?>"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plug/css/style.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plug/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plug/add/fullcalendar/fullcalendar.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plug/add/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">
  <?php } ?>

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

 
