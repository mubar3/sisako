<ul class="sidebar-menu" style="overflow: hidden;">
  <li class="header">MAIN NAVIGATION</li>
  <?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$count=count($uri_segments);
$url_akhir=$count-1;
if($uri_segments[$url_akhir]=="admin"){ ?><li class="active"> <?php } else {?><li><?php } ?>
    <a href="<?php echo base_url('Dashboard/admin'); ?>">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>

  <?php //if($this->session->userdata('role')==3 || $this->session->userdata('role')==1){?>
    
    <?php
if($uri_segments[$url_akhir]=="add"){ ?><li class="active"> <?php } else {?><li><?php } ?>

  <a href="<?php echo base_url('Dashboard/admin/data/anggota/add'); ?>"><i class="fa fa-plus"></i> Tambah Anggota </a></li>
    <!-- <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/bin'); ?>"><i class="fa fa-trash"></i> Sampah </a></li> -->
  <?php //} ?>

  <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 0) { ?>
    <?php
if($uri_segments[$url_akhir]=="listuser"){ ?><li class="active"> <?php } else {?><li><?php } ?>
    <a href="<?php echo base_url('Dashboard/admin/data/user/listuser'); ?>">
      <i class="fa fa-user"></i> <span>User</span>

    </a>
  </li>
  <?php } ?>

    <?php
if($uri_segments[$url_akhir]=="agenda"){ ?><li class="active"> <?php } else {?><li><?php } ?>
    <a href="<?php echo base_url('Dashboard/admin/agenda'); ?>">
      <i class="fa fa-list"></i> <span>Agenda</span>

    </a>
  </li>
    <?php
if($uri_segments[$url_akhir]=="galeri"){ ?><li class="active"> <?php } else {?><li><?php } ?>
    <a href="<?php echo base_url('Dashboard/admin/galeri'); ?>">
      <i class="fa fa-picture-o"></i> <span>Galeri</span>

    </a>
  </li>
    <?php
if($uri_segments[$url_akhir]=="import"){ ?><li class="active"> <?php } else {?><li><?php } ?>
    <a href="<?php echo base_url('Dashboard/admin/import'); ?>">
      <i class="fa fa-file-excel-o"></i> <span>Import Data</span>

    </a>
  </li>
    <?php
if($uri_segments[$url_akhir]=="export"){ ?><li class="active"> <?php } else {?><li><?php } ?>
    <a href="<?php echo base_url('Dashboard/admin/export'); ?>">
      <i class="fa fa-file-excel-o"></i> <span>Export Data</span>

    </a>
  </li>

    <?php
if($uri_segments[$url_akhir]=="all" or $uri_segments[$url_akhir]=="list" or $uri_segments[$url_akhir]=="temp" or $uri_segments[$url_akhir]=="jenis1" or $uri_segments[$url_akhir]=="jenis2" or $uri_segments[$url_akhir]=="jenis3" or $uri_segments[$url_akhir]=="trash"){ ?><li class="active"> <?php } else {?><li><?php } ?>
    <a href="#">
      <i class="fa fa-database"></i> <span>Data Anggota</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-right pull-right"></i>
      </span>
    </a>
    <ul  class="treeview-menu" >
    <?php
if($uri_segments[$url_akhir]=="all"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/anggota/all'); ?>"><i class="fa fa-bars"></i> Semua Data </a></li>
      <!-- <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/kartu/priew'); ?>"><i class="fa fa-check"></i> Priview </a></li> -->
    <?php
if($uri_segments[$url_akhir]=="list"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/anggota/list'); ?>"><i class="fa fa-check"></i> Ter-verifikasi </a></li>
    <?php
if($uri_segments[$url_akhir]=="temp"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/anggota/temp'); ?>"><i class="fa fa-hourglass"></i> Belum Ter-verifikasi </a></li>
    <?php
if($uri_segments[$url_akhir]=="jenis1"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/anggota/jenis1'); ?>"><i class="fa fa-tag"></i> Kartu SISAKO </a></li>
    <?php
if($uri_segments[$url_akhir]=="jenis3"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/anggota/jenis3'); ?>"><i class="fa fa-tag"></i> Kartu Emoney </a></li>
    <?php
if($uri_segments[$url_akhir]=="jenis2"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/anggota/jenis2'); ?>"><i class="fa fa-tag"></i> Kartu SIPA & SISAKO </a></li>
    <?php
if($uri_segments[$url_akhir]=="trash"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/anggota/trash'); ?>"><i class="fa fa-trash"></i> Data Ditolak </a></li>
      <!-- <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/today'); ?>"><i class="fa fa-area-chart"></i> Daftar hari ini </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/emoney'); ?>"><i class="fa fa-money"></i> Pengguna E-Money </a></li> -->
    </ul>
  </li>

  <!-- <li>
    <a href="#">
      <i class="fa fa-pie-chart"></i> <span>Kategori</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/banom'); ?>"><i class="fa fa-circle-o"></i> Banom </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/disabilitas'); ?>"><i class="fa fa-circle-o"></i> Disabilitas </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/jamkes'); ?>"><i class="fa fa-circle-o"></i> Jaminan Kesehatan </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/jk'); ?>"><i class="fa fa-circle-o"></i> Jenis Kelamin </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/pekerjaan'); ?>"><i class="fa fa-circle-o"></i> Pekerjaan </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/pendapatan'); ?>"><i class="fa fa-circle-o"></i> Pendapatan </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/pendidikan'); ?>"><i class="fa fa-circle-o"></i> Pendidikan </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/penyakit'); ?>"><i class="fa fa-circle-o"></i> Penyakit </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/status'); ?>"><i class="fa fa-circle-o"></i> Status Perkawinan </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/rumah'); ?>"><i class="fa fa-circle-o"></i> Kepemilikan Rumah </a></li>
    </ul>
  </li> -->

    <?php
if($uri_segments[$url_akhir]=="kartu" or $uri_segments[$url_akhir]=="unprint" or $uri_segments[$url_akhir]=="printed"){ ?><li class="active"> <?php } else {?><li><?php } ?>
    <a href="#">
      <i class="fa fa-print"></i> <span>Cetak Kartu</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-right pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
    <?php
if($uri_segments[$url_akhir]=="kartu"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/kartu'); ?>"><i class="fa fa-bars"></i> Semua Data </a></li>
        <!-- <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/kartu/priew'); ?>"><i class="fa fa-check"></i> Priview Kartu </a></li> -->
    <?php
if($uri_segments[$url_akhir]=="unprint"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/kartu/unprint'); ?>"><i class="fa fa-remove"></i> Belum Cetak </a></li>
    <?php
if($uri_segments[$url_akhir]=="printed"){ ?><li class="active"> <?php } else {?><li><?php } ?>
        <a href="<?php echo base_url('Dashboard/admin/data/kartu/printed'); ?>"><i class="fa fa-check"></i> Sudah Cetak </a></li>
    </ul>
  </li>
   <?php if($this->session->userdata('role')==0){?>

  <?php } ?>


</ul>
