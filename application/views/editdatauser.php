<!-- <?php include "header.php"; ?> -->

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
              <h3 class="box-title">Edit Master Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach($edit_user as $eu){ ?>
              <form action="<?php echo base_url(). 'UsersController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id" value="<?php echo $eu->id_user ?>">
                    <input type="text"  id="nama" name="nama" class="form-control" value="<?php echo $eu->nama ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="<?php echo $eu->tempat_lahir ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir"  name="tanggal_lahir" class="form-control" value="<?php echo $eu->tanggal_lahir ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Alamat</label>
                      <input type="text" class="form-control" id='alamat' name="alamat" value="<?php echo $eu->alamat ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Desa</label>
                      <input type="desa" class="form-control" id='desa' name="desa" value="<?php echo $eu->desa ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="file"  id="kecamatan" name="kecamatan" class="form-control"/>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Kecamatan</label>
                      <input type="text" class="form-control" name="kecamatan" value="<?php echo $eu->kecamatan ?>">
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('Dashboard/admin/data/user/list'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
                  <input type="reset" name="reset" value="Cancel" class="btn btn-success">
                </div>
              </form>
              <?php } ?>
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

  <script type="text/javascript">
    function validasi(){
      var notelepon = document.getElementById('telp').value;
      var mail = document.getElementById('email').value;
      var number = /^[0-9]+$/;
  		var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

      if(!mail.match(re))
      {
        alert('Email Tidak Valid');
        return false;
      }

      if(!notelepon.match(number))
      {
        alert('No Telphone Harus Angka');
        return false;
      }

      if(notelepon.length >= 13)
      {
        alert('No Telphone Harus 12 digit');
        return false;
      }

  		return true;
    }
  </script>
<?php include "footer.php"; ?>
