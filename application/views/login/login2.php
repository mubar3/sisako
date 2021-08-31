
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="robots" content="noindex, follow">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
<title>SISAKO</title>
<link rel="icon" href="assets/img/logo_sako.png" sizes="" type="image/png">

<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="https://web.kartanu.id/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://web.kartanu.id/assets/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="https://web.kartanu.id/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="https://web.kartanu.id/assets/css/forms/theme-checkbox-radio.css">
<link rel="stylesheet" type="text/css" href="https://web.kartanu.id/assets/css/forms/switches.css">
</head>
<body class="form" >
<div class="form-container">
<div class="form-form" style="background-color:darkgreen; width:100%!important; height:100%!important;">
<div class="form-form-wrap"style="background-color:darkgreen; width:100% !important">
<div class="form-container" style="background-color:darkgreen; width:100% !important">
<div class="form-content" style="background-color:darkgreen; width:100% !important">

<center>
  <img  width="200px" src="<?php echo base_url().'assets/img/logo_sako.png'; ?>">
</center><br>
<center>
<h3 class="" style="color:white;">Login ke <a href="index.html"><span class="brand-name" style="color:plum;">SISAKO</span></a></h3>
</center>
<!-- <form class="text-left" action="https://web.kartanu.id/login" method="post" name="form" id="signup_form"> -->
  <form action="<?php echo base_url('Dashboard/auth/login'); ?>" method="post" enctype="multipart/form-data" >
<input type="hidden" name="_token" value="FvktSsikMC4iuS0K1hnC3lNazdjjacMTKUaSSmOI">
<div class="form" >
<div id="username-field" class="field-wrapper input">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="purple" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
<input value="" name="username" id="username_or_email" placeholder="Email" title="Email" type="text" class="form-control">
</div>
<div id="password-field" class="field-wrapper input mb-2">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="purple" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
<input name="password" id="password" placeholder="Kata sandi" title="Kata sandi" type="password" class="form-control">
</div>
<div class="d-sm-flex justify-content-between">
<div class="field-wrapper toggle-pass">
<p class="d-inline-block" style="color:white;">Show Password</p>
<label class="switch s-primary">
<input type="checkbox" id="toggle-password" class="d-none">
<span class="slider round" style="background-color:plum;"></span>
</label>
</div>
<div class="field-wrapper" >
<button type="submit" class="btn" style="background-color:plum; color:white;">Log In</button>
</div>
</div>
</div>
</form>
<center>
<p class="terms-conditions" style="color:plum;">SISAKO © 2021 All Rights Reserved.</p>
</center>
</div>
</div>
</div>
</div>

<!-- <div class="form-image" style="background-color:darkgreen">
<div class="">
  <center>
  <img style="padding-top:200px" width="300px" src="<?php echo base_url().'assets/img/logo_sako.png'; ?>">
</center>
</div>
<br>
  <center>
  <a style="font-size: 15pt;text-decoration:none;color:white;">SISAKO</a>
  </center>
<br>
<center>
<a style="font-size: 15pt;text-decoration:none;color:white;">Sistem Informasi dan Data Anggota Satuan Komunitas Pramuka Ma’arif NU</a>
</center>


</div> -->
</div>

<script src="https://web.kartanu.id/assets/js/libs/jquery-3.1.1.min.js" type="7e68ecccdc81f362bf1f4b03-text/javascript"></script>
<script src="https://web.kartanu.id/bootstrap/js/popper.min.js" type="7e68ecccdc81f362bf1f4b03-text/javascript"></script>
<script src="https://web.kartanu.id/bootstrap/js/bootstrap.min.js" type="7e68ecccdc81f362bf1f4b03-text/javascript"></script>

<script src="https://web.kartanu.id/assets/js/authentication/form-1.js" type="7e68ecccdc81f362bf1f4b03-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7e68ecccdc81f362bf1f4b03-|49" defer=""></script></body>
</html>
