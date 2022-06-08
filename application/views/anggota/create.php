<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
<script type="text/javascript" src="jquery/jquery.validate.js"></script>
<script type="text/javascript" src="jquery/jquery.min.js"></script>


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
              <h3 class="box-title">Identitas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <h1>yaaaa</h1> -->
              <?php echo form_open_multipart('AnggotaController/tambah_aksi');?>
             
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>NIK &nbsp <a style="font-size:14px; color:lightgreen;"></a></label>
                    <input type="text" name="nik" id="nik" class="form-control " placeholder="NIK"  minlength="16" maxlength="16">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>NISN/NSS/NSM &nbsp <a style="font-size:14px; color:lightgreen;"></a></label>
                    <input type="text" name="nisn" class="form-control" placeholder="NISN/NSS/NSM">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Nama Lengkap &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="nama_depan" class="form-control" placeholder="Nama Lengkap" required>
                  </div>
                </div>

                <!-- <div class="col-lg-4">
                  <div class="form-group">
                    <label>* Nama Tengah *</label>
                    <input type="text" name="nama_tengah" class="form-control" placeholder="Nama Tengah" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>* Nama Belakang *</label>
                    <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
                  </div>
                </div> -->

                <div class="col-lg-6">
                  <div class="form-group">
                    <label> Pangkalan &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="pangkalan" class="form-control" placeholder="pangkalan" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Kelas</label>
                  <select name="kelas" class="form-control">
                    <option >Pilih Kelas</option>
                    <?php
                        foreach($kelas as $kelas){
                        echo '<option value='.$kelas->id_kelas.'>'.$kelas->nama_kelas.'</option>';
                        }
                        ?>
                  </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Golongan Darah</label>
                    <select name="golongan_darah" class="form-control">
                      <option >Pilih Golongan Darah</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="AB">AB</option>
                      <option value="O">O</option>

                    </select>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label> Tempat Lahir &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota Kelahiran" required>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label> Tanggal Lahir &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input  type="date" id="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required />
                  </div>
                </div>



                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Usia</label>
                    <p>
                    <input type="text" id="umur" name="usia" class="form-control" placeholder="Usia" required readonly></p>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                  <label> Golongan &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                  <select name="golongan" class="form-control">
                    <option >Pilih Golongan </option>
                    <?php
                        foreach($golongan as $golongan){
                        echo '<option value='.$golongan->id.'>'.$golongan->golongan.'</option>';
                        }
                        ?>
                  </select>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label> Nomor Gugus Depan &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                    <input  type="text" name="no_gudep" id="no_gudep" class="form-control required" placeholder="Nomor Gugus Depan"   minlength="2" maxlength="30">
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="Nomor Telepon" >
                  </div>
                </div>


                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Provinsi &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <select name="provinsi" class="form-control" id="provinsi">
			               <option>- Pilih Provinsi -</option>
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
                <label>Kabupaten &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <select name="kabupaten" class="form-control" id="kota">
                  <option>- Pilih Kabupaten -</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Kecamatan &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <select name="kecamatan" class="form-control" id="kecamatan">
                  <option>- Pilih Kecamatan -</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Desa &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <select name="desa" class="form-control" id="desa">
                  <option>- Pilih Desa -</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label> Alamat &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <input type="text" name="alamat" class="form-control" placeholder="JL/Dusun" required>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="form-group">
                <label> RT &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <input type="text" name="rt" class="form-control" placeholder="rt" required>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="form-group">
                <label> RW &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                <input type="text" name="rw" class="form-control" placeholder="rw" required>
              </div>
            </div>


                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jk" class="form-control">
                    <option value="1">Laki-laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Status Perkawinan</label>
                  <select name="status_perkawinan" class="form-control">
                    <?php
                        foreach($status_perkawinan as $status){
                        echo '<option value='.$status->id.'>'.$status->status.'</option>';
                        }
                        ?>
                  </select>
                  </div>
                </div>

<!-- 
                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Agama</label>
                  <select name="agama" class="form-control">
                    <option >Pilih Agama</option>
                    <?php
                        foreach($agama as $agama){
                        echo '<option value='.$agama->id.'>'.$agama->agama.'</option>';
                        }
                        ?>
                  </select>
                  </div>
                </div> -->

                <!-- <div class="col-lg-6">
                  <div class="form-group">
                  <label>Kelas</label>
                  <select name="kelas" class="form-control">
                    <option >Pilih Kelas</option>
                    <?php
                        foreach($kelas as $kelas){
                        echo '<option value='.$kelas->id_kelas.'>'.$kelas->nama_kelas.'</option>';
                        }
                        ?>
                  </select>
                  </div>
                </div> -->

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Aktifitas di organisasi saat ini</label>
                    <input type="text" name="aktifitas_organisasi" class="form-control" placeholder="Aktifitas di organisasi saat ini" >
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                  <label> Jenis Kartu &nbsp <a style="font-size:14px; color:lightgreen;">(Wajib di isi)</a></label>
                  <select name="emoney" class="form-control">
                    <option value="0">Kartu SISAKO</option>
                    <option value="1">Kartu SIPA & SISAKO</option>
                    <option value="2">Kartu E-money</option>
                  </select>
                  </div>
                </div>

                <div class="col-lg-6">
                 <div class="form-group">
                   <label>Upload Foto</label>
                   <input required type="file" name="upload_foto" class="form-control" id="image-source" onchange="previewImage();">
                   <!-- <input type="hidden" id="image" name="image"> -->
                   <!-- onchange="previewImage();" -->
                   <!-- <input required type="file" name="image" multiple="false" class="form-control" id="image-src"> -->
                 </div>
                 <!-- <div class="breadcrumb">
                   <img style="height:200px" class="img-responsive" id="image-preview" alt=" No Image"/>
                    <img style="" id="image-preview"/> -->
                   <!-- <input type="checkbox" class="form_submit" required> -->
                 <!-- </div>  -->
                 <div class="breadcrumb">
                   <img style="height:200px" src="assets/img/no-image.jpg" class="img-responsive" id="image-preview" alt=" No Image"/>
                 </div>
               </div>

              </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box box-success">
          <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title">Pengalaman Organisasi</h3>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>1. Nama Organisasi</label>
                    <input type="text" name="nama_organisasi1" class="form-control" placeholder="Nama Organisasi" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan1" class="form-control" placeholder="Jabatan" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun1" class="form-control" placeholder="tahun1" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>2. Nama Organisasi</label>
                    <input type="text" name="nama_organisasi2" class="form-control" placeholder="Nama Organisasi" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan2" class="form-control" placeholder="Jabatan" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun2" class="form-control" placeholder="tahun1" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>3. Nama Organisasi</label>
                    <input type="text" name="nama_organisasi3" class="form-control" placeholder="Nama Organisasi" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan3" class="form-control" placeholder="Jabatan" >
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun3" class="form-control" placeholder="tahun1" >
                  </div>
                </div>

                  <button type="submit" class="btn btn-success form_submit">Simpan</button>
              </div>
            </div>


      </div>



              <!--   <div class="box-body">
                <div class="form-group">
                  <a href="<?php echo base_url('Dashboard/admin/data/anggota/all'); ?>"><input type="button" value="Kembali" class="btn btn-warning"></a>
                  <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                  <input type="submit" name="submit" value="Simpan" class="btn btn-success" >
                </div>
              </div> -->
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
  <!-- /.content-wrapper -->

  <script>



      $(document).ready(function () {
        var $image_crop;

          // $image_crop = $('#image-preview').croppie({
          //     // enableExif: true,
          //     viewport: {
          //         width: 150,
          //         height: 200,
          //         type: 'square' // square
          //     },
          //     boundary: {
          //         // width: 600,
          //         height: 200
          //     }
          // });

          $('#image-source').on('change', function () {
              var reader = new FileReader();
              reader.onload = function (event) {
                  $image_crop.croppie('bind', {
                      url: event.target.result
                  }).then(function () {

                  });
              }
              reader.readAsDataURL(this.files[0]);
              // $('#imageModel').modal('show');
          });

          // $('.form_submit').on('click', function (ev) {
          //   if (this.checked) {
          //   $image_crop.croppie('result', {
          //     type: 'canvas',
          //     size: 'original'
          //   }).then(function (resp) {
          //     $('#image').val(resp);
          //     // $('#form').submit();
          //   });
          //   }
          //   // return false;
          // });

          // $('.form_submit').on('click', function (ev) {
          //   $image_crop.croppie('result', {
          //     type: 'canvas',
          //     size: 'original'
          //   }).then(function (resp) {
          //     $('#image').val(resp);
          //     // $('#form').submit();
          //   });
          //   return false;
          // });
          // $('.crop_my_image').click(function (event) {
          //     $image_crop.croppie('result', {
          //         type: 'canvas',
          //         size: 'viewport'
          //     }).then(function (response) {
          //         $.ajax({
          //             type: 'post',
          //             url: "<?php echo base_url('ImageCrop/store'); ?>",
          //             data: {
          //                 "image": response
          //             },
          //             success: function (data) {
          //                 console.log(data);
          //                 $('#imageModel').modal('hide');
          //             }
          //         })
          //     });
          // });
      });
  </script>

  <script type="text/javascript">
  // function save(e) {
  //   e.preventDefault();
  //     swal({
  //       title: "Menyimpan data",
  //       text: "Apakah anda yakin Menyimpan data ini?",
  //       type: "warning",
  //       showCancelButton: true,
  //       confirmButtonClass: 'btn-success ',
  //       confirmButtonText: 'Simpan',
  //       closeOnConfirm: false,
  //       closeOnCancel: true
  //     },
  //     function() {
  //       //$.get('<?php //echo base_url('AnggotaController/hapus/'); ?>', {id:id}, function(data) {
  //         $.get('<?php echo base_url('AnggotaController/tambah_aksi/'); ?>', function(data) {
  //           if (data == 'succeed') {
  //               // $('#s-' + id).remove();
  //               swal("Disimpan!", "Data berhasil disimpan!", "success");
  //               window.location = "Dashboard/admin/data/anggota/all";
  //
  //           }else {
  //             swal("Gagal!", "Data gagal disimpan!", "error");
  //
  //           }
  //         });
  //     });
  // }

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
            document.querySelectorAll("#ket")[2].style.visibility = 'hidden'
            document.querySelectorAll("#ket")[3].style.visibility = 'hidden'
          })

          $('#pekerjaan').change(function(){
          	kode = $('#pekerjaan option:selected').val()
          	if(kode == 88){
          		$('#pekerjaan_lain').removeClass('hidden')
          		$('#input_pekerjaan_lain').val('')
          		$('#input_pekerjaan_lain').focus()
          	}else{
          		$('#pekerjaan_lain').addClass('hidden')
          		$('#input_pekerjaan_lain').val('')
          	}
          })

          $("#checkbox1").click(function(){
            if ($("#checkbox1").is(':checked')){
              document.querySelectorAll("#nilai")[0].readOnly = false
              document.querySelectorAll("#nilai")[0].value = ''
              document.querySelectorAll("#nilai")[0].classList.remove("disable")
              document.querySelectorAll("#ket")[0].classList.remove("disable")
              document.querySelectorAll("#ket")[0].readOnly = false
              document.querySelectorAll("#ket")[0].value = ''
            }else{
              document.querySelectorAll("#nilai")[0].readOnly = true
              document.querySelectorAll("#nilai")[0].value = '0'
              document.querySelectorAll("#nilai")[0].classList.add("disable")
              document.querySelectorAll("#ket")[0].classList.add("disable")
              document.querySelectorAll("#ket")[0].readOnly = true
              document.querySelectorAll("#ket")[0].value = ' '
            }
          })

          $("#checkbox2").click(function(){
            if ($("#checkbox2").is(':checked')){
              document.querySelectorAll("#nilai")[1].readOnly = false
              document.querySelectorAll("#nilai")[1].value = ''
              document.querySelectorAll("#nilai")[1].classList.remove("disable")
              document.querySelectorAll("#ket")[1].classList.remove("disable")
              document.querySelectorAll("#ket")[1].readOnly = false
              document.querySelectorAll("#ket")[1].value = ''
            }else{
              document.querySelectorAll("#nilai")[1].readOnly = true
              document.querySelectorAll("#nilai")[1].value = '0'
              document.querySelectorAll("#nilai")[1].classList.add("disable")
              document.querySelectorAll("#ket")[1].classList.add("disable")
              document.querySelectorAll("#ket")[1].readOnly = true
              document.querySelectorAll("#ket")[1].value = ' '
            }
          })

          $("#checkbox3").click(function(){
            if ($("#checkbox3").is(':checked')){
              document.querySelectorAll("#nilai")[2].readOnly = false
              document.querySelectorAll("#nilai")[2].value = ''
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
              document.querySelectorAll("#nilai")[3].value = ''
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
