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
                <!-- <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="fulname" class="form-control" value="<?php echo $eu->fullname ?>">
                  </div>
                </div> -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nama Admin</label>
                    <input type="hidden" name="id_user" value="<?php echo $eu->id_user ?>">
                    <input type="text" name="nama" class="form-control" value="<?php echo $eu->nama ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $eu->email ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nomor HP</label>
                    <input type="text" name="hp" class="form-control" value="<?php echo $eu->hp ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Alamat Admin</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $eu->alamat ?>">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Provinsi </label>
                <select name="provinsi" class="form-control" id="provinsi" >
			               <option>- Select Provinsi -</option>
			                  <?php foreach($province as $p){ ?>
					                <option value="<?php echo $p->id ?>" <?php if ($eu->provinsi == $p->id){echo "selected";} ?>><?php echo $p->nama ?></option>
				              <?php  } ?>
		          </select>
            </div>
          </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Kabupaten </label>
                <select name="kabupaten" class="form-control" id="kota">
                  <?php foreach ($regencies as $r) { ?>
                    <option value="<?php echo $r->id ?>" <?php if ($eu->kabupaten == $r->id){echo "selected";} ?>><?php echo $r->nama ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

<div class="col-lg-6">
  <div class="form-group">
    <label>Kecamatan </label>
    <select name="kecamatan" class="form-control" id="kecamatan">
			               <option value='' >- Select Kecamatan -</option>
      <?php foreach ($districts as $r) { ?>
        <option value="<?php echo $r->id ?>" <?php if ($eu->kecamatan == $r->id){echo "selected";} ?>><?php echo $r->nama ?></option>
      <?php } ?>
    </select>
  </div>
</div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $eu->username ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Ubah Password</label>
                    <input type="password" name="pass" class="form-control">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Jenis Admin</label>
                    <select name="role" class="form-control" style="width: 100%;" >
                      <?php

                      foreach($role as $r){ ?>
                      <option value="<?php echo $r->id?>" <?php if($eu->role==$r->id){echo "selected";} ?>><?php echo $r->role ?></option>

                    <?php } ?>
                      </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nomor Gudep</label>
                    <input type="text" name="no_gudep" class="form-control" value="<?php echo $eu->no_gudep ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" name="instansi" class="form-control" value="<?php echo $eu->instansi ?>">
                  </div>
                </div>

                <!-- <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Pilih Profil</label>
                    <select name="profil" class="form-control" style="width: 100%;">
                       <?php

                       foreach($profiles as $profil){ ?>
                       <option value="<?php echo $profil->id_profile?>" <?php if($eu->profil==$profil->id_profile){echo "selected";} ?>><?echo $profil->fullname ?></option>

                     <?php }?>

                        ?>>
                      </option>
                      </select>
                  </div>
                </div> -->

                <!-- <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Telphone</label>
                      <input type="text" class="form-control" id='telp' name="telp" value="<?php echo $eu->phone ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Email</label>
                      <input type="email" class="form-control" id='email' name="email" value="<?php echo $eu->email ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"/>
                  </div>
                </div>
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Address</label>
                      <input type="text" class="form-control" name="alamat" value="<?php echo $eu->address ?>">
                  </div>
                </div>
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="<?php echo $eu->keterangan ?>">
                  </div>
                </div> -->

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('Dashboard/admin/data/user/listuser'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
                  <!-- <input type="reset" name="reset" value="Cancel" class="btn btn-success"> -->
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
