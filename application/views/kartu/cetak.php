

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

              <!-- <form method="post" action="<?php echo base_url('Dashboard/admin/data/kartu/cetak_select');?>" target="_blank"> -->
              <!-- <form method="post" action="<?php echo base_url('KartuController/search_nik');?>" target="_blank"> -->
              <form method="post" action="<?php echo base_url('Dashboard/admin/data/kartu/cetak_kartu');?>" target="_blank">

              <i class="fa fa-print"></i>

              <h3 class="box-title"> <?php echo $title ?></h3>





            </div>
            <!-- /.box-header -->

            <div class="box-body">

            <div class="row">

                <div class="col-lg-6">
                  <div class="form-group">
                    <!--<label>Ranting NU</label>-->
                      <input type="number" name="nik" class="form-control" placeholder="NIK" id="myInput" >
                    </input>
                  </div>
                </div>

                <!-- <div class="col-lg-2">
                  <div class="form-group">
                    <label>Ranting NU</label>
                      <select required name="print" class="form-control" id="print">
                        <option value="2">Semua</option>
                        <option value="1">Sudah Cetak</option>
                        <option value="0">Belum Cetak</option>
                      </select>
                  </div>
                </div>

            <div class="col-lg-2">
                <a href="">
                <div class="form-group">
              <a href="<?php echo base_url('Dashboard/admin/data/kartu'); ?>">
              <button id="cari" type="submit" class="btn btn-primary" value="search">
                <i class="fa fa-eye"></i> Cari
              </button>
            </div>
          </div> -->
              <!-- </a> -->
              <!-- </a> -->

            <!-- <div class="col-lg-2">
              <div class="form-group">
              <button class="btn btn-success" type="submit">
                <i class="fa fa-download"></i> Cetak Kartu
              </button>
            </div>
            </div> -->





              <div class="col-md-3">
                <!-- <button type="submit" class="form-control btn btn-success"><i class="glyphicon glyphicon glyphicon-print"></i> Cetak Depan</button> -->

              </div>
              </div>

            <div class="input-group form-group btn-success" style="display: inline-block;">
            <span style="background: yellow" class="input-group-addon" id="sizing-addon2">
            <button type="submit" class="form-control btn btn-success"><i class="glyphicon glyphicon glyphicon-print"></i> Cetak </button>
            </span>
            <span style="background: yellow" class="input-group-addon">
                <input type="radio" name="select" value="1" class="flat">
            <label for="laki"> Kartu Depan</label>
              </span>
              <span style="background: yellow" class="input-group-addon">
                <input type="radio" name="select" value="2" class="flat">
            <label for="perempuan"> Kartu Belakang</label>
              </span>
            </div>

            </div>


                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">


                          <table id="cetak" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th><input type="checkbox" id="checkAll"></th>
                              <!-- <th></th> -->

                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Nomor Gudep</th>
                              <th>Kabupaten</th>
                              <th>Kecamatan</th>
                              <th>Desa</th>
                              <!-- <th>Tanggal Lahir</th>
                              <th>Usia</th> -->

                              <th>Terdaftar</th>

                              <!-- <th>Pilih</th> -->
                            </tr>
                            </thead>
                            <tbody id="myTable">

                              <!-- <input type="text" value="26" name="kartu[]">
                              <input type="text" value="27" name="kartu[]"> -->
                              <?php
                                $no = 1;
                              foreach ($anggota as $d) {
                            ?>
                          <tr id="row-<?= $d->id ?>">
                            <td><?php echo $no++ ?></td>
                            <td><input class="select_id" type="checkbox" name="kartu[]" value="<?php echo $d->id;?>" <?php if($d->print==1){echo "checked";} ?>></td>

                            <td><?php echo $d->nik ?></td>
                            <td><?php echo $d->nama_depan ?></td>
                            <td><?php echo $d->jk ?></td>
                            <td><?php echo $d->no_gudep ?></td>
                            <td><?php echo $d->kabupaten ?></td>
                            <td><?php echo $d->kecamatan ?></td>
                            <td><?php echo $d->desa ?></td>
                            <!-- <td><?php echo $d->waktu ?></td> -->
                            <td><?php echo date('d F, Y', strtotime($d->waktu)); ?></td>


                              <!-- <td align="center"> -->


                                <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/list/detail/'.$d->id); ?>"><button class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-eye-open"></i></button></a> -->

                                <!-- <a href="<?php echo base_url('Dashboard/admin/data/anggota/list/edit/'.$d->id); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i></button></a> -->
                                <!-- <input class="select_id" type="checkbox" name="kartu[]" value="<?php echo $d->id;?>"> -->

                                <!--  -->
                              <!-- </td> -->
                            </tr>
                            <?php } ?>
                            </tbody>
                            <!-- <tfoot>
                            <tr>
                              <th>No</th>
                              <th></th>
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Nomor Gudep</th>
                              <th>Kabupaten</th>
                              <th>Kecamatan</th>
                              <th>Desa</th>

                              <th>Terdaftar</th>

                            </tr>
                            </tfoot> -->
                          </table>

                  </div>
                </div>
              </div>
            </form>
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
            $.get('<?php echo base_url('AnggotaController/hapus/'); ?>', {id:id}, function(data) {
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
  <script>

            $(document).ready(function(){
              $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });

          $(document).ready(function(){

              $("#provinsi").change(function (){
                  var url = "AnggotaController/add_ajax_kab/"+$(this).val();
                  $('#kabupaten').load(url);
                  return false;
              })

          $("#kabupaten").change(function (){
                  var url = "AnggotaController/add_ajax_kec/"+$(this).val();
                  $('#kecamatan').load(url);
                  return false;
              })

          $("#kecamatan").change(function (){
                  var url = "AnggotaController/add_ajax_des/"+$(this).val();
                  $('#desa').load(url);
                  return false;
              })

              $("#desa").change(function (){
                      var url = "AnggotaController/add_ajax_kartu/"+$(this).val();
                      $('#desa').load(url);
                      return false;
                  })


              $('#date').on('change', function() {
                  var dob = new Date(this.value);
                  var today = new Date();
                  var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                  $('#umur').val(age);
              })



              $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
              });

              $("#cari").click(function (){
                      var url = "Dashboard/admin/data/kartu/filter/"+$('#nik').val()+"/"+$('#print').val();
                      window.location.replace(url);
              })

              $("#centang").click(function (){
                      var url = "KartuController/centang/"+$(this).val();
                      window.location.replace(url);
              })

          });
</script>
