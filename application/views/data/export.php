    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <div class="row">

                <div class="col-md-10">
              <i class="fa fa-database"></i>
              <h3 class="box-title">Export data ke csv </h3>
            </div>

            <div class="col-md-2">
                  <!-- <a href='Dashboard/admin/data/user/add'> <button class="form-control btn btn-primary" data-toggle="modal" data-target="#import-anggota" ><i class="glyphicon glyphicon glyphicon-plus"></i> Tambah</button></a> -->
            </div>
            </div>

            <div style="margin: auto; width: 50%; padding: 10px;">
                 <div class="panel panel-info">
                  <div class="panel-heading"><i class="fa fa-file-excel-o"></i> DOWNLOAD SEMUA DATA TANPA PERIODE TANGGAL</div>
                  <div class="panel-body">
                    <div class='form-group'>
                        <div class='col-sm-9'>
                    <center><a target='blank' href='<?= base_url('Dashboard/admin/export_data'); ?>' class="pull-right btn btn-flat bg-aqua"><i class="glyphicon glyphicon-download-alt"></i> Unduh Semua Data</a></center>
                  </div></div>
               </div>
              </div>
            </div>

            <div style="margin: auto; width: 50%; padding: 10px;">
                 <div class="panel panel-info">
                  <div class="panel-heading"><i class="fa fa-file-excel-o"></i> DOWNLOAD FOTO SEMUA DATA TANPA PERIODE TANGGAL</div>
                  <div class="panel-body" >
                    <div class='form-group' >
                        <div class='col-sm-9' >
                    <center ><a target='blank' href='<?= base_url('Dashboard/admin/dawmload_zip_foto'); ?>' class="pull-right btn btn-flat bg-aqua"><i class="glyphicon glyphicon-download-alt"></i> Unduh Semua Data</a></center>
                  </div></div>
               </div>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                          <hr>
                          

                  </div>
                </div>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
