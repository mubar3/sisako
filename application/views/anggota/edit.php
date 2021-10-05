
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
            <div class="box-header with-border">
              <h3 class="box-title">Edit Identitas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach ($edit_anggota as $e) { ?>
              <form id="form" action="<?php echo base_url('Dashboard/admin/data/anggota/list/update'); ?>" method="post" onsubmit="return validasi();" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $e->id ?>">

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>NIK &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="nik" id="nik" class="form-control required" placeholder="NIK" value="<?php echo $e->nik?>" minlength="16" maxlength="16">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>NISN/NSS/NSM &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="nisn" class="form-control" placeholder="NISN" value="<?php echo $e->nisn?>" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Nama Lengkap &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="<?php echo $e->nama_depan?>" required>
                  </div>
                </div>

                <!-- <div class="col-lg-4">
                  <div class="form-group">
                    <label>Nama Tengah</label>
                    <input type="text" name="nama_tengah" class="form-control" placeholder="Nama Tengah" value="<?php echo $e->nama_tengah?>" required>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="<?php echo $e->nama_belakang?>" required>
                  </div>
                </div> -->

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Pangkalan &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="pangkalan" class="form-control" placeholder="pangkalan" value="<?php echo $e->pangkalan?>" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Agama</label>
                  <select name="agama" class="form-control">
                    <option value="1" <?php if ($e->agama==1) {echo "selected";} ?> >Islam</option>
                    <option value="2" <?php if ($e->agama==2) {echo "selected";} ?> >Kristen Protestan</option>
                    <option value="3" <?php if ($e->agama==3) {echo "selected";} ?> >Kristen Katolik</option>
                    <option value="4" <?php if ($e->agama==4) {echo "selected";} ?> >Hindu</option>
                    <option value="5" <?php if ($e->agama==5) {echo "selected";} ?> >Buddha</option>
                    <option value="6" <?php if ($e->agama==6) {echo "selected";} ?> >Khonghucu</option>
                  </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Golongan Darah</label>
                    <select name="golongan_darah" class="form-control">
                      <option value="A" <?php if ($e->golongan_darah=="A") {echo "selected";} ?> >A</option>
                      <option value="B" <?php if ($e->golongan_darah=="B") {echo "selected";} ?> >B</option>
                      <option value="AB" <?php if ($e->golongan_darah=="AB") {echo "selected";} ?> >AB</option>
                      <option value="O" <?php if ($e->golongan_darah=="O") {echo "selected";} ?> >O</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Tempat Lahir &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota Kelahiran" value="<?php echo $e->tempat_lahir?>" required>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Tanggal Lahir &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input id="date" type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $e->tanggal_lahir?>" required>
                  </div>
                </div>



                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Usia</label>
                    <input id="umur" type="number" name="usia" class="form-control" placeholder="Usia" value="<?php echo $e->usia?>" required readonly>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                  <label>Golongan &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                  <select name="golongan" class="form-control">
                    <option value="1" <?php if ($e->golongan==1) {echo "selected";} ?> >Siaga</option>
                    <option value="2" <?php if ($e->golongan==2) {echo "selected";} ?> >Penghalang</option>
                    <option value="3" <?php if ($e->golongan==3) {echo "selected";} ?> >Penegak</option>
                    <option value="4" <?php if ($e->golongan==4) {echo "selected";} ?> >Pandega</option>
                    <option value="5" <?php if ($e->golongan==5) {echo "selected";} ?> >Pembina</option>
                    <option value="6" <?php if ($e->golongan==6) {echo "selected";} ?> >Pelatih</option>
                  </select>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Nomor Gugus Depan &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="no_gudep" id="no_gudep" class="form-control required" placeholder="" value="<?php echo $e->no_gudep?>" minlength="2" maxlength="30" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="" value="<?php echo $e->no_hp?>" >
                  </div>
                </div>


                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Provinsi &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <select name="provinsi" class="form-control" id="provinsi" >
			               <option>- Select Provinsi -</option>
			                  <?php foreach($province as $d){ ?>
					                <option value="<?php echo $d->id ?>" <?php if ($e->provinsi == $d->id){echo "selected";} ?>><?php echo $d->nama ?></option>
				              <?php  }?>
		          </select>
            </div>
          </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Kabupaten &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <select name="kabupaten" class="form-control" id="kota">
                  <?php foreach ($regencies as $d) { ?>
                    <option value="<?php echo $e->kabupaten ?>" <?php if ($e->kabupaten == $d->id){echo "selected";} ?>><?php echo $d->nama ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Kecamatan &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <select name="kecamatan" class="form-control" id="kecamatan" >
                  <?php foreach ($districts as $d) { ?>
                    <option value="<?php echo $e->kecamatan ?>" <?php if ($e->kecamatan == $d->id){echo "selected";} ?>><?php echo $d->nama ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Desa &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <select name="desa" class="form-control" id="desa" >
                  <?php foreach ($villages as $d) { ?>
                    <option value="<?php echo $e->desa ?>" <?php if ($e->desa == $d->id){echo "selected";} ?>><?php echo $d->nama ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Alamat &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <input type="text" name="alamat" class="form-control" placeholder="" value="<?php echo $e->alamat?>" required>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="form-group">
                <label>RT &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <input type="text" name="rt" class="form-control" placeholder="" value="<?php echo $e->rt?>" required>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="form-group">
                <label>RW &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <input type="text" name="rw" class="form-control" placeholder="" value="<?php echo $e->rw?>" required>
              </div>
            </div>


                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jk" class="form-control">
                    <option value="1" <?php if ($e->jk==1) {echo "selected";} ?> >Laki-laki</option>
                    <option value="2" <?php if ($e->jk==2) {echo "selected";} ?> >Perempuan</option>
                  </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Status Perkawinan</label>
                  <select name="status_perkawinan" class="form-control">
                    <option value="Kawin" <?php if ($e->status_perkawinan=="Kawin") {echo "selected";} ?> >Kawin</option>
                    <option value="Belum Kawin" <?php if ($e->status_perkawinan=="Belum Kawin") {echo "selected";} ?> >Belum Kawin</option>
                    <option value="Cerai Hidup" <?php if ($e->status_perkawinan=="Cerai Hidup") {echo "selected";} ?> >Cerai Hidup</option>
                    <option value="Cerai Mati" <?php if ($e->status_perkawinan=="Cerai Mati") {echo "selected";} ?> >Cerai Mati</option>
                  </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Aktifitas di organisasi saat ini</label>
                    <input type="text" name="aktifitas_organisasi" class="form-control" placeholder="" value="<?php echo $e->aktifitas_organisasi?>" >
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Jenis Kartu &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                  <select name="emoney" class="form-control">
                    <option value="0" <?php if ($e->emoney==0) {echo "selected";} ?> >Kartu SISAKO</option>
                    <option value="1" <?php if ($e->emoney==1) {echo "selected";} ?> >Kartu SIPA & SISAKO</option>
                    <option value="2" <?php if ($e->emoney==2) {echo "selected";} ?> >Kartu E-money</option>
                  </select>
                  </div>
                </div>

                <div class="col-lg-6">
                 <div class="form-group">
                   <label>Upload Foto</label>
                   <input type="hidden" name="old_image" value="<?php echo $e->image?>" >
                   <input value="<?php echo $e->image?>" type="file" name="image" multiple="false" class="form-control" id="image-source" onchange="previewImage();">
                 </div>
                 <div class="breadcrumb">
                   <img style="height:200px" src="assets/img/foto/<?php echo $e->image ?>" class="img-responsive" id="image-preview" alt=" No Image"/>
                 </div>
               </div>

</div>
</div>

        <div class="box box-success">
            <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title">Pengalaman Organisasi</h3>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>1. Nama Organisasi</label>
                    <input type="text" name="nama_organisasi1" class="form-control" placeholder="Nama Organiasi" value="<?php echo $e->nama_organisasi1?>" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan1" class="form-control" placeholder="Jabatan" value="<?php echo $e->jabatan1?>" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun1" class="form-control" placeholder="Tahun" value="<?php echo $e->tahun1?>" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>2. Nama Organisasi</label>
                    <input type="text" name="nama_organisasi2" class="form-control" placeholder="Nama Organiasi" value="<?php echo $e->nama_organisasi2?>" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan2" class="form-control" placeholder="Jabatan" value="<?php echo $e->jabatan2?>" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun2" class="form-control" placeholder="Tahun" value="<?php echo $e->tahun2?>" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>3. Nama Organisasi</label>
                    <input type="text" name="nama_organisasi3" class="form-control" placeholder="Nama Organiasi" value="<?php echo $e->nama_organisasi3?>" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan3" class="form-control" placeholder="Jabatan" value="<?php echo $e->jabatan3?>" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun3" class="form-control" placeholder="Tahun" value="<?php echo $e->tahun3?>" >
                  </div>
                </div>



                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>


                <div class="box-body">
                <div class="form-group">
                  <a href="<?php echo base_url('Dashboard/admin/data/anggota/all'); ?>"><input type="button" value="Kembali" class="btn btn-warning"></a>
                <?php } ?>
                  <!-- <input type="reset" name="reset" value="Reset" class="btn btn-danger"> -->
                  <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                </div>
              </div>
            </div>

              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      </form>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
  function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
  function previewKtp() {
    document.getElementById("ktp-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("ktp-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("ktp-preview").src = oFREvent.target.result;
    };
  };
  </script>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#provinsi").change(function (){
        var url = "AnggotaController/add_ajax_kab/"+$(this).val();
        $('#kota').load(url);
        return false;
    })

  $("#kota").change(function (){
          var url = "<?php echo site_url('AnggotaController/add_ajax_kec');?>/"+$(this).val();
          $('#kecamatan').load(url);
          return false;
      })

  $("#kecamatan").change(function (){
          var url = "<?php echo site_url('AnggotaController/add_ajax_des');?>/"+$(this).val();
          $('#desa').load(url);
          return false;
      })


                  $('#date').on('change', function() {
                      var dob = new Date(this.value);
                      var today = new Date();
                      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                      $('#umur').val(age);
                  });
          });

          $(document).ready(function () {
            count = document.querySelectorAll("#nilai").length
            document.querySelectorAll("#ket")[2].style.visibility = 'hidden'
            document.querySelectorAll("#ket")[3].style.visibility = 'hidden'
            for (i=0;i<count;i++) {
              nil = document.querySelectorAll("#nilai")[i].value
              ket = document.querySelectorAll("#ket")[i].value
              if (nil != 0 || (ket != '' && ket != ' ')){
                $(`#checkbox${i+1}`).prop('checked', true)
                document.querySelectorAll("#nilai")[i].readOnly = false
                document.querySelectorAll("#nilai")[i].classList.remove("disable")
              	document.querySelectorAll("#ket")[i].readOnly = false
              	document.querySelectorAll("#ket")[i].classList.remove("disable")
              }else{
                $(`#checkbox${i+1}`).prop('checked', false)
              }
            }
            if ($('#pekerjaan').val() == 88 ){
              $('#pekerjaan_lain').removeClass('hidden')
            }else{
              $('#pekerjaan_lain').addClass('hidden')
              $('#input_pekerjaan_lain').val('')
            }
          });

          $('#pekerjaan').change(function(){
            kode = $('#pekerjaan option:selected').val()
            if(kode == 88){
              $('#pekerjaan_lain').removeClass('hidden')
              $('#input_pekerjaan_lain').val('')
              $('#input_pekerjaan_lain').focus()
            }else{
              $('#pekerjaan_lain').addClass('hidden')
            }
          })

          $("#checkbox1").click(function(){
            if ($("#checkbox1").is(':checked')){
              document.querySelectorAll("#nilai")[0].readOnly = false
              document.querySelectorAll("#nilai")[0].classList.remove("disable")
              document.querySelectorAll("#ket")[0].readOnly = false
              document.querySelectorAll("#ket")[0].classList.remove("disable")
              document.querySelectorAll("#ket")[0].value = ''
            }else{
              document.querySelectorAll("#nilai")[0].readOnly = true
              document.querySelectorAll("#nilai")[0].value = '0'
              document.querySelectorAll("#nilai")[0].classList.add("disable")
              document.querySelectorAll("#ket")[0].readOnly = true
              document.querySelectorAll("#ket")[0].value = ' '
              document.querySelectorAll("#ket")[0].classList.add("disable")
            }
          })

          $("#checkbox2").click(function(){
            if ($("#checkbox2").is(':checked')){
              document.querySelectorAll("#nilai")[1].readOnly = false
              document.querySelectorAll("#nilai")[1].classList.remove("disable")
              document.querySelectorAll("#ket")[1].readOnly = false
              document.querySelectorAll("#ket")[1].classList.remove("disable")
              document.querySelectorAll("#ket")[1].value = ''
            }else{
              document.querySelectorAll("#nilai")[1].readOnly = true
              document.querySelectorAll("#nilai")[1].value = '0'
              document.querySelectorAll("#nilai")[1].classList.add("disable")
              document.querySelectorAll("#ket")[1].readOnly = true
              document.querySelectorAll("#ket")[1].value = ' '
              document.querySelectorAll("#ket")[1].classList.add("disable")
            }
          })

          $("#checkbox3").click(function(){
            if ($("#checkbox3").is(':checked')){
              document.querySelectorAll("#nilai")[2].readOnly = false
              document.querySelectorAll("#nilai")[2].classList.remove("disable")
            }else{
              document.querySelectorAll("#nilai")[2].readOnly = true
              document.querySelectorAll("#nilai")[2].value = '0'
              document.querySelectorAll("#nilai")[2].classList.add("disable")
            }
          })

          $("#checkbox4").click(function(){
            if ($("#checkbox4").is(':checked')){
              document.querySelectorAll("#nilai")[3].readOnly = false
              document.querySelectorAll("#nilai")[3].classList.remove("disable")
            }else{
              document.querySelectorAll("#nilai")[3].readOnly = true
              document.querySelectorAll("#nilai")[3].value = '0'
              document.querySelectorAll("#nilai")[3].classList.add("disable")
            }
          })

          $(document).ready(function() {
          $('#form').validate();({
            rules: {
              nik : {
                digits: true,
                minlength:16,
                maxlength:16
              },
              no_gudep: {
                digits: true,
                minlength:2,
                maxlength:30
              }
            }
          })
        });
      </script>
      <style type="text/css">
        .disable{
          background-color: silver;
        }
      </style>
