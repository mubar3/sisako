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
              <h3 class="box-title">Master Data Users </h3>
            </div>

            <div class="col-md-2">
                  <a href='Dashboard/admin/data/user/add'> <button class="form-control btn btn-primary" data-toggle="modal" data-target="#import-anggota" ><i class="glyphicon glyphicon glyphicon-plus"></i> Tambah</button></a>
            </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                          <hr>
                          <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                              <th>No</th>
                              <!-- <th>Profil</th> -->
                              <th>Username</th>
                              <th>Password</th>
                              <th>Type</th>
                              <th>Nomor Gudep</th>
                              <th>Instansi</th>
                              <th>Verifikasi</th>


                              <th width="18%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                $no = 1;
                                foreach ($user as $u) {
                              ?>
                            <tr id="row-<?= $u->id_user ?>">
                              <td><?php echo $no++ ?></td>
                              <!-- <td><?php echo $u->fullname ?></td> -->
                              <td><?php echo $u->username ?></td>
                              <td><?php echo $u->password ?></td>
                              <td><?php echo $u->role ?></td>
                              <td><?php echo $u->no_gudep ?></td>
                              <td><?php echo $u->instansi ?></td>

                              <td align="left">

                                <?php if($u->aktif==0){ ?>
                                <a>  <button class="btn btn-success btn-sm" onClick="verifData(<?= $u->id_user ?>)"><i ></i>Verifikasi</button></a>
                                <?php } else { ?>
                                  <i class="glyphicon glyphicon-ok"></i>
                                <?php } ?>
                              </td>
                              <td>
                                <a href="<?php echo base_url('Dashboard/admin/data/user/edit/'.$u->id_user); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i></button></a>&nbsp;&nbsp;

                                <a class=""><button class="btn btn-danger btn-sm" onClick="deleteData(<?= $u->id_user ?>)"><i class="glyphicon glyphicon-trash"></i></button></a>


                              </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No</th>
                              <!-- <th>Profil</th> -->
                              <th>Username</th>
                              <th>Password</th>
                              <th>Type</th>
                              <th>Address</th>
                              <th>Instansi</th>
                              <!-- <th>Keterangan</th> -->
                              <th>Actions</th>
                            </tr>
                            </tfoot>
                          </table>

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

  <script>

  function verifData(id_user) {
      swal({
        title: "Verifikasi data",
        text: "Apakah anda yakin verifikasi data ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'Verifikasi',
        closeOnConfirm: false,
        closeOnCancel: true
      },
      function() {
        //$.get('<?php //echo base_url('AnggotaController/hapus/'); ?>', {id:id}, function(data) {
          $.get('<?php echo base_url('UsersController/verif_anggota/'); ?>', {id_user:id_user}, function(data) {
            if (data == 'succeed') {
                $('#row-' + id_user).remove();
                swal("Ter-Verifikasi!", "Data berhasil di Verifikasi!", "success");
            }
          });
      });
  }

  function deleteData(id) {
      swal({
        title: "Menghapus data",
        text: "Apakah anda yakin menghapus data ini?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Hapus',
        closeOnConfirm: false,
        closeOnCancel: true
      },
      function() {
        //$.get('<?php //echo base_url('AnggotaController/hapus/'); ?>', {id:id}, function(data) {
          $.get('<?php echo base_url('UsersController/hapus/'); ?>', {id:id}, function(data) {
            if (data == 'succeed') {
                $('#row-' + id).remove();
                swal("Dihapus!", "Data berhasil dihapus!", "success");
            }
          });
      });
  }
  function handleClickUpdate(e){
    e.preventDefault();
  }
  </script>
