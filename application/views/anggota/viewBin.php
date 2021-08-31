

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-danger">
            <div class="box-header">
              <i class="fa fa-trash"></i>
              <h3 class="box-title">Data Terhapus</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/list'); ?>">Jumlah (<?php echo $anggota_jumlah ?>)</a> | <a href="<?php echo base_url('Dashboard/admin/data/anggota/bin'); ?>">Sampah (<?php echo $anggota_bin ?>)</a> -->
                      <hr>
                          <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th>No Anggota</th>
                              <th>Nama</th>
                              <!-- <th>Tempat Lahir</th> -->
                              <th>Tanggal Lahir</th>
                              <th>Desa</th>
                              <th>Kecamatan</th>
                              <!-- <th>Kabupaten</th> -->
                              <!-- <th>Active</th> -->
                              <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                $no = 1;
                                foreach ($anggota as $d) {
                              ?>
                            <tr id="row-<?= $d->id ?>">
                              <td><?php echo $no++ ?></td>
                              <td><div class="label bg-green"><?php echo $d->no_anggota ?></div></td>
                              <td><?php echo $d->nama ?></td>
                              <!-- <td><?php echo $d->tempat_lahir ?></td> -->
                              <td><?php echo $d->tanggal_lahir ?></td>
                              <td><?php echo $d->desa ?></td></td>
                              <td><?php echo $d->kecamatan ?></td></td>
                              <td align="center">

                                <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/list/detail/'.$d->id); ?>"><button class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-eye-open"></i></button></a> -->

                                <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/list/edit/'.$d->id); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i></button></a> -->
                                <button class="btn btn-danger btn-sm pull-right" onClick="deleteData(<?= $d->id ?>)"><i class="glyphicon glyphicon-refresh"></i></button>

                              </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No</th>
                              <th>No Anggota</th>
                              <th>Nama</th>
                              <!-- <th>Tempat Lahir</th> -->
                              <th>Tanggal Lahir</th>
                              <th>Desa</th>
                              <th>Kecamatan</th>
                              <!-- <th>Kabupaten</th> -->
                              <!-- <th>Active</th> -->
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
    function deleteData(id) {
        swal({
          title: "Mengembalikan data",
          text: "Apakah anda yakin mengembalikan data ini?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-warning',
          confirmButtonText: 'Kembalikan',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
          //$.get('<?php //echo base_url('AnggotaController/hapus/'); ?>', {id:id}, function(data) {
            $.get('<?php echo base_url('AnggotaController/restore_anggota/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  $('#row-' + id).remove();
                  swal("Dikembalikan!", "Data berhasil dikembalikan!", "success");
              }
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>
