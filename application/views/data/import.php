
   
    <!-- Main content -->
    <section class="content">
               <?php if(!empty($this->session->FlashData('sukses'))){ ?>
          <div class="alert alert-info" role="alert">
            data berhasil disimpan
          </div>
          <?php } 
           if(!empty($this->session->FlashData('gagal'))){ ?>
          <div class="alert alert-danger" role="alert">
            data gagal disimpan
          </div>
          <?php } ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
               <form action="<?= base_url('Dashboard/admin/import_excel'); ?>" method="post" enctype="multipart/form-data">
              <div class='box-body'>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-info-circle"></i> Informasi Penting</h4>
                  Untuk melakukan penggungahan data melalui file excel.xls, harap mengikuti petunjuk berikut:
                  <div class="box-body">
                    <ol>
                      <li>Silahkan download contoh file excel.xls <a href="<?= base_url('assets/import_contoh/download.php?nama_file=example_data.xls'); ?>">disini</a></li>
                      <li>Untuk kode agama, provinsi, kota dll bisa didawnload <a href="<?= base_url('assets/import_contoh/download.php?nama_file=code_data.xls'); ?>">disini</a></li>
                      <li>Silahkan isi data pelajar sesuai dengan kolom header/judul</li>
                      <li>kemudian simpan file excel dengan format file (.xls)</li>
                      <li>silahkan pilih upload file yang telah disimpan</li>
                      <li>Persiapkan file gambar dengan nama gambar sesuai dengan nama pada kolom "Gambar" pada image</li>
                      <li>File gambar dikompres dengan ekstensi .zip</li>
                      <li>silahkan upload file .zip yang telah dikompres</li>
                      <li>kemudian silahkan klik upload/unggah</li>
                    </ol>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Unggah File Excel :</label>
                  <div class='col-sm-8'>
                    <input type='file' class='form-control' name='file' required>
                  </div>
                </div>
              </div>

              <div class='box-body'>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Unggah File Zip Foto :</label>
                  <div class='col-sm-8'>
                    <input type='file' class='form-control' name='zip_file' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'></label>
                  <div class='col-sm-6'>
                    <button style="width: 100px" type="submit" class="btn btn-flat btn-primary" name="submit">UNGGAH</button>
                        <a href="home"><button style="width: 100px" type="button" class="btn btn-flat btn-danger">BATAL</button></a>
                  </div>
                </div>
              </div>

            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>