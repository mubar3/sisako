

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
              <i class="fa fa-database"></i>
              <h3 class="box-title">Master Data Users </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                       <a href="<?php echo base_url('Dashboard/admin/data/anggota/list'); ?>">All (<?php echo $this->session->userdata("user_jumlah"); ?>)</a> | <a href="<?php echo base_url('Dashboard/admin/data/user/list/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_user"); ?>)</a>
                          <hr>
                          <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Rumah</th>
                              <th width="18%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                $no = 1;
                                foreach ($anggota as $d) {
                              ?>
                            <tr id="row-<?= $d->id ?>">
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $d->nama ?></td>
                              <td><?php echo $d->rumah ?></td>
                              <td align="center">
                                <a href="<?php echo base_url('Dashboard/admin/data/user/edit/'.$d->id); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;
                                <?php
                                $in = $this->session->userdata("nama");
                                $out = $d->nama;
                                if($in == $out)
                                {
                                ?>
                                    <button disabled="disabled" class="btn btn-danger btn-sm" onClick="deleteData(<?= $u->id_user ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                                <?php
                                }else {
                                ?>
                                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $d->id ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                                <?php
                                }
                                ?>
                              </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Rumah</th>
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
          title: "Are you sure?",
          text: "You will not be able to recover this Data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, delete it!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('UsersController/softdelete/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  $('#row-' + id).remove();
                  swal("Deleted!", "Your Data has been deleted!", "success");
              }
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>
  


