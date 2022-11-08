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
              <h3 class="box-title">Add Master Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo base_url(). 'UsersController/tambah_aksi'; ?>" method="post" onsubmit="return validasi();" enctype="multipart/form-data">
                <!-- <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="fulname" class="form-control" placeholder="Fullname ... " required>
                  </div>
                </div> -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nama Admin</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Admin ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email ... " >
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="hp" class="form-control" placeholder="No HP ... " >
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Alamat Admin</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Admin ... " >
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Provinsi </label>
                <select name="provinsi" class="form-control" id="provinsi">
			               <option>- Select Provinsi -</option>
			                  <?php
				                foreach($province as $prov){
					              echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
				                }
			                  ?>
		          </select>
            </div>
          </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Kabupaten </label>
                <select name="kabupaten" class="form-control" id="kota">
                  <option>- Pilih Kabupaten -</option>
                </select>
              </div>
            </div>

<div class="col-lg-6">
  <div class="form-group">
    <label>Kecamatan </label>
    <select name="kecamatan" class="form-control" id="kecamatan">
      <option>- Pilih Kecamatan -</option>
    </select>
  </div>
</div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Jenis Admin</label>
                    <select name="role" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="" disabled>Pilih Role</option>
                       <?php

                     foreach($role as $role){
                     echo '<option value="'.$role->id.'">'.$role->role.'</option>';
                     }

                      ?>

                    </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nomor Gudep</label>
                    <input type="number" name="no_gudep" class="form-control" placeholder="No Gudep ... " >
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" name="instansi" class="form-control" placeholder="Instansi ... " required>
                  </div>
                </div>


                <!-- <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Pilih Profil</label>
                    <select name="profil" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="" disabled>Pilih Profil</option>
                      <option value="" <?php

                     foreach($profiles as $profil){
                     echo '<option value="'.$profil->id_profile.'">'.$profil->fullname.'</option>';
                     }

                      ?>>
                    </option>
                    </select>
                  </div>
                </div> -->


                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('Dashboard/admin/data/user/list'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
                  <!-- <input type="reset" name="reset" value="Cancel" class="btn btn-success"> -->
                </div>
              </form>
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
  $("#provinsi").change(function (){
      var url = "UsersController/add_ajax_kab/"+$(this).val();
      $('#kota').load(url);
      return false;
  })

$("#kota").change(function (){
        var url = "<?php echo site_url('UsersController/add_ajax_kec');?>/"+$(this).val();
        $('#kecamatan').load(url);
        return false;
    })

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
