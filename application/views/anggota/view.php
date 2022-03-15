

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-database"></i>
              <h3 class="box-title"><?php echo $title ?></h3>
              <h3 >Total Anggota : <?php echo $total ?></h3>
              <div class="dropdown online pull-right">
                 <!-- <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                   <i class="fa fa-download"></i> Export
                   <span class="caret"></span>
                 </button> -->
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                   <li><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/excel/')?>">EXCEL</a></li>
                   <li><a href="<?php echo base_url('Dashboard/admin/data/anggota/list/printpdf/')?>">PRINT</a></li>
                 </ul>
               </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/list'); ?>">Terverifikasi (<?php echo $anggota_jumlah ?>)</a> | -->
                      <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/temp'); ?>">Belum Terverifikasi (<?php echo $anggota_jumlah ?>)</a> | -->
                      <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/list'); ?>">Jumlah (<?php echo $anggota_jumlah ?>)</a> | <a href="<?php echo base_url('Dashboard/admin/data/anggota/bin'); ?>">Sampah (<?php echo $anggota_bin ?>)</a> -->


                          <hr>
                          <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th>foto</th>
                              <th>NIK</th>
                              <th>Nama </th>
                              <th>Nomor Gudep</th>
                              <th>Alamat</th>
                              <th>Pangkalan</th>

                              <th>Jenis Kartu</th>
                              <!-- <th>Kabupaten</th> -->
                              <th>Active</th>
                              <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                $no = 1;
                                foreach ($anggota as $d) {
                              ?>
                            <tr id="row-<?= $d->id ?>">
                              <!-- <td><input class="select_id" type="checkbox" name="kartu[]" value="<?php echo $d->id;?>"></td> -->
                              <td><?php echo $no++ ?></td>
                              <td><img class="lazyload" style="width:70px;height:90px;" src="<?php echo base_url('/assets/img/foto/').$d->image ?>" width="70" height="90"></td>
                              <td><?php echo $d->nik ?></td>
                              <td><?php echo $d->nama_depan ?></td>
                              <td>  <?php echo substr_replace($d->no_gudep,".",2, 0);?></td>
                              <td><?php echo $d->desa.", ".$d->kecamatan.", ".$d->kabupaten ?></td>
                              <td><?php echo $d->pangkalan?></td>
                              <td><?php echo $d->emoney?></td>


                              <!-- <td ><button class="btn btn-success btn-sm" onClick="verifData(<?= $d->id ?>)"><i ></i>Verifikasi</button></a> -->


                              <?php if ($d->aktif==0){?>
                                <td ><button class="btn btn-success btn-sm" onClick="verifData(<?= $d->id ?>)"><i ></i>Verifikasi</button></a>
                              <?php }else{ ?>
                                <td><i class="glyphicon glyphicon-ok"></i></td>
                              <?php } ?>

                              <td width="12%"><a class="" href="<?php echo base_url('Dashboard/admin/data/anggota/list/edit/'.$d->id); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i></button></a>
                              <a class=""><button class="btn btn-danger btn-sm" onClick="deleteData(<?= $d->id ?>)"><i class="glyphicon glyphicon-trash"></i></button></a>

                              <a class="" href="<?php echo base_url('Dashboard/admin/data/anggota/list/detail/'.$d->id); ?>"><button class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-eye-open"></i></button></a>

                              <!-- <?php if ($this->session->userdata('role')==3){ ?> -->
                              <!-- <?php } ?> -->

                              </td>

                              <!-- <?php if ($this->session->userdata('role')==3){ ?> -->
                                <!-- <?php if ($d->active==0){ ?> -->
                                <!-- <?php } else { ?> -->
                                  <!-- <td><i class="glyphicon glyphicon-ok"></i></td> -->
                                <!-- <?php } ?> -->
                              <!-- <?php } else { ?> -->
                                <!-- <?php if ($d->active==0){ ?> -->
                                  <!-- <td><i class="glyphicon glyphicon-hourglass"></i></td> -->
                                <!-- <?php } else { ?> -->
                                  <!-- <td><i class="glyphicon glyphicon-ok"></i></td> -->
                                <!-- <?php } ?> -->
                              <!-- <?php } ?> -->

                            </tr>
                            <?php } ?>
                            </tbody>
                            <!-- <tfoot>
                            <tr>
                              <th>No</th>
                              <th>NIK</th>
                              <th>Nama </th>
                              <th>Nomor Gudep </th>
                              <th>Kabupaten</th>
                              <th>Kecamatan</th>
                              <th>Desa</th>

                              <th>Jenis Kartu</th>


                              <th>Active</th>
                              <th>Actions</th>
                            </tr>
                            </tfoot> -->
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
            $.get('<?php echo base_url('AnggotaController/delete_anggota/'); ?>', {id:id}, function(data) {
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

    function verifData(id) {
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
            $.get('<?php echo base_url('AnggotaController/verif_anggota/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  $('#row-' + id).remove();
                  swal("Ter-Verifikasi!", "Data berhasil di Verifikasi!", "success");
              }
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>
