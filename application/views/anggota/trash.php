

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
                              <th>Foto</th>
                              <th>Nama </th>
                              <th>TTL</th>
                              <th>Alamat</th>
                              <th>Pangkalan</th>
                              <th>Kelas</th>
                              <th>Nomor Gudep</th>
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
                              <td><?php echo $d->nama_depan ?></td>
                              <td><?php echo $d->tempat_lahir.", ".$d->tanggal_lahir ?></td>
                              <td><?php echo $d->desa.", ".$d->kecamatan.", ".$d->kabupaten ?></td>
                              <td><?php echo $d->pangkalan ?></td>
                              <td><?php echo $d->nama_kelas ?></td>
                              <td>  <?php echo substr_replace($d->no_gudep,".",2, 0);?></td>


                              <!-- <td ><button class="btn btn-success btn-sm" onClick="verifData(<?= $d->id ?>)"><i ></i>Verifikasi</button></a> -->



                              <td width="12%">
                                <a class=""><button class="btn btn-warning btn-sm" onClick="deleteData(<?= $d->id ?>)"><i class="glyphicon glyphicon-refresh"></i></button></a>


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
