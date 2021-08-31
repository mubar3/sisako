<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li>
    <a href="<?php echo base_url('Dashboard/admin'); ?>">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>
  <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 0) { ?>
  <li>
    <a href="<?php echo base_url('Dashboard/admin/data/user/list'); ?>">
      <i class="fa fa-user"></i> <span>User</span>

    </a>
  </li>
  <?php } ?>

  <li>
    <a href="#">
      <i class="fa fa-database"></i> <span>Master Data</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-right pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/all'); ?>"><i class="fa fa-bars"></i> Semua Data </a></li>
      <!-- <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/kartu/priew'); ?>"><i class="fa fa-check"></i> Priview </a></li> -->
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/list'); ?>"><i class="fa fa-check"></i> Ter-verifikasi </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/temp'); ?>"><i class="fa fa-hourglass"></i> Belum Ter-verifikasi </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/jenis1'); ?>"><i class="fa fa-tag"></i> Kartu SISAKO </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/jenis3'); ?>"><i class="fa fa-tag"></i> Kartu Emoney </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/jenis2'); ?>"><i class="fa fa-tag"></i> Kartu SIPA & SISAKO </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/trash'); ?>"><i class="fa fa-trash"></i> Data Ditolak </a></li>
      <!-- <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/today'); ?>"><i class="fa fa-area-chart"></i> Daftar hari ini </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/emoney'); ?>"><i class="fa fa-money"></i> Pengguna E-Money </a></li> -->

      <?php //if($this->session->userdata('role')==3 || $this->session->userdata('role')==1){?>
        <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/add'); ?>"><i class="fa fa-plus"></i> Tambah Anggota </a></li>
        <!-- <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/anggota/bin'); ?>"><i class="fa fa-trash"></i> Sampah </a></li> -->
      <?php //} ?>
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

  <li>
    <a href="#">
      <i class="fa fa-print"></i> <span>Cetak Kartu</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-right pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/kartu'); ?>"><i class="fa fa-bars"></i> Semua Data </a></li>
        <!-- <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/kartu/priew'); ?>"><i class="fa fa-check"></i> Priview Kartu </a></li> -->
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/kartu/unprint'); ?>"><i class="fa fa-remove"></i> Belum Cetak </a></li>
      <li class="active"><a href="<?php echo base_url('Dashboard/admin/data/kartu/printed'); ?>"><i class="fa fa-check"></i> Sudah Cetak </a></li>
    </ul>
  </li>
   <?php if($this->session->userdata('role')==0){?>

  <?php } ?>


</ul>
