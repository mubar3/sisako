<link rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $today ?></h3>

              <p>Daftar Hari Ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-arrow-graph-up-right"></i>
            </div>
            <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/today') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
            <a class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $unverif ?></h3>
              <p>Belum Verifikasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="<?php echo base_url('Dashboard/admin/data/anggota/temp') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $verif ?></h3>

              <p>Di-Verifikasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-checkbox"></i>
            </div>
            <a href="<?php echo base_url('Dashboard/admin/data/anggota/list') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $anggota ?></h3>

              <p>Total</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url('Dashboard/admin/data/anggota/all') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      <?php if($this->session->userdata('role') == 6){ ?>
      <section class="col-lg-12">
        <form  role="form" action="<?php echo base_url('Dashboard/admin/cd'); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="col-lg-6">
                <div class="form-group">
                    <select name="users" class="form-control" required>
                        <option value="">INSTANSI</option>
                        <?php foreach ($users as $data) {
                            $selected='';
                            if(!empty($this->session->userdata('users_id')) && $this->session->userdata('users_id') == $data->id_user){$selected='selected';}
                            echo '<option value="'.$data->id_user.'" '.$selected.'>'.$data->instansi.'</option>';
                        }?>
                    </select>
                    <center><button type="submit" name="cari_user" class="input-group-text"><span  id="">Cari</span></button></center>
                </div>
            </div>
        </form>
      </div>
      <?php } ?>
      <section class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <i class="fa fa-user"></i>
              <h3 class="box-title">Grafik Per-Hari</h3>
            </div>
            <div class="container" style="width: 80%; height: 50%; margin: px auto;">
              <canvas id="Grafik_per_hari"></canvas>
            </div>
            <!-- <div class="box-footer clearfix">
              <a href="<?php echo base_url('Dashboard/admin/data/anggota/list/jk'); ?>">
              <button type="button" class="pull-right btn btn-default\\" id="sendEmail">Detail
                <i class="fa fa-arrow-circle-right">
              </i></button></a>
            </div> -->
          </div>
        </section>

            



        <section class="col-lg-6">
          <div class="box">
            <div class="box-header">
              <i class="fa fa-user"></i>
              <h3 class="box-title">Golongan</h3> : <h3 class="box-title">Total</h3>
                <h3 class="box-title"><?php echo $verif ?></h3>
            </div>
            <div class="container" style="width: 90%; height: 70%; margin: px auto;">
              <canvas id="Grafik_golongan"></canvas>
            </div>
            <!-- <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default\\" id="sendEmail">Detail
                <i class="fa fa-arrow-circle-right"></i></button>
            </div> -->
          </div>
        </section>

        <section class="col-lg-6">
          <div class="box">
            <div class="box-header">
              <i class="fa fa-user"></i>
              <h3 class="box-title">Jenis Kelamin</h3>  : <h3 class="box-title">Total</h3>
                <h3 class="box-title"><?php echo $verif ?></h3>
            </div>
            <div class="container" style="width: 90%; height: 70%; margin: px auto;">
              <canvas id="Grafik_jk"></canvas>
            </div>
            <!-- <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default\\" id="sendEmail">Detail
                <i class="fa fa-arrow-circle-right"></i></button>
            </div> -->
          </div>
        </section>

        <!-- <section class="col-lg-6">
          <div class="box">
            <div class="box-header">
              <i class="fa fa-user"></i>
              <h3 class="box-title">Agama</h3>
            </div>
            <div class="box-body">
              <div id="chart_agama"></div>
            </div>

          </div>
        </section> -->

        <section class="col-lg-6">
          <div class="box">
            <div class="box-header">
              <i class="fa fa-user"></i>
              <h3 class="box-title">Jenis Kartu</h3> : <h3 class="box-title">Total</h3>
                <h3 class="box-title"><?php echo $verif ?></h3>
            </div>
            <div class="container" style="width: 90%; height: 70%; margin: px auto;">
              <canvas id="Grafik_kartu"></canvas>
            </div>
            <!-- <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default\\" id="sendEmail">Detail
                <i class="fa fa-arrow-circle-right"></i></button>
            </div> -->
          </div>
        </section>

        <!-- <section class="col-lg-6">
          <div class="box">
            <div class="box-header">
              <i class="fa fa-user"></i>
              <h3 class="box-title">Provinsi</h3>
            </div>
            <div class="box-body">
              <div id="chart_provinsi"></div>
            </div> -->
            <!-- <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default\\" id="sendEmail">Detail
                <i class="fa fa-arrow-circle-right"></i></button>
            </div> -->
          </div>
        </section>




      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    var ctx = document.getElementById('Grafik_per_hari').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
          <?php
            if (count($input)>0) {
              foreach ($input as $data) {
                echo "'" .$data->waktu ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah Anggota',
            backgroundColor: '#ADD8E6',
            borderColor: '##93C3D2',
            data: [
              <?php
                if (count($input)>0) {
                   foreach ($input as $data) {
                    echo $data->total . ", ";
                  }
                }
              ?>
            ]
        }]
    },
});

    </script>

<script type="text/javascript">
    var ctx = document.getElementById('Grafik_golongan').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: [
          <?php
            if (count($golongan)>0) {
              foreach ($golongan as $data) {
                echo "'" .$data->golongan ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah Anggota',
            backgroundColor: ["red", "blue", "green", "black", "brown", "lightblue"],
            borderColor: ["red", "blue", "green", "black", "brown", "lightblue"],
            data: [
              <?php
                if (count($golongan)>0) {
                   foreach ($golongan as $data) {
                    echo $data->total . ", ";
                  }
                }
              ?>
            ]
        }]
    },
});

    </script>

<script type="text/javascript">
    var ctx = document.getElementById('Grafik_jk').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: [
          <?php
            if (count($jk)>0) {
              foreach ($jk as $data) {
                echo "'" .$data->jk ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah Anggota',
            backgroundColor: ["red", "blue"],
            borderColor: ["red", "blue"],
            data: [
              <?php
                if (count($jk)>0) {
                   foreach ($jk as $data) {
                    echo $data->total . ", ";
                  }
                }
              ?>
            ]
        }]
    },
});

    </script>

<script type="text/javascript">
    var ctx = document.getElementById('Grafik_kartu').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
            if (count($emoney)>0) {
              foreach ($emoney as $data) {
                echo "'" .$data->emoney ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah Anggota',
            // backgroundColor: ["black", "brown", "lightblue"],
            // borderColor: ["black", "brown", "lightblue"],
            backgroundColor: '#ADD8E6',
            borderColor: '##93C3D2',
            
            data: [
              <?php
                if (count($emoney)>0) {
                   foreach ($emoney as $data) {
                    echo $data->total . ", ";
                  }
                }
              ?>
            ]
        }]
    },
});

    </script>
