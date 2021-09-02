
   
    <!-- Main content -->
    <style>
      .wrap {
      overflow: hidden;
      margin: 10px;
    }
    .box {
      float: left;
      position: relative;
      width: 20%;
      padding-bottom: 20%;
    }
    .boxInner {
      position: absolute;
      left: 10px;
      right: 10px;
      top: 10px;
      bottom: 10px;
      overflow: hidden;
    }
    .boxInner img {
      width: 100%;
    }
    .boxInner .titleBox {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      margin-bottom: -50px;
      background: #fff;
      background: rgba(0, 0, 0, 0.5);
      color: #FFF;
      padding: 10px;
      text-align: center;
      -webkit-transition: all 0.3s ease-out;
      -moz-transition: all 0.3s ease-out;
      -o-transition: all 0.3s ease-out;
      transition: all 0.3s ease-out;
    }
    section.no-touch .boxInner:hover .titleBox, section.touch .boxInner.touchFocus .titleBox {
      margin-bottom: 0;
    }
    @media only screen and (max-width : 480px) {
      /* Smartphone view: 1 tile */
      .box {
        width: 100%;
        padding-bottom: 100%;
      }
    }
    @media only screen and (max-width : 650px) and (min-width : 481px) {
      /* Tablet view: 2 tiles */
      .box {
        width: 50%;
        padding-bottom: 50%;
      }
    }
    @media only screen and (max-width : 1050px) and (min-width : 651px) {
      /* Small desktop / ipad view: 3 tiles */
      .box {
        width: 33.3%;
        padding-bottom: 33.3%;
      }
    }
    @media only screen and (max-width : 1290px) and (min-width : 1051px) {
      /* Medium desktop: 4 tiles */
      .box {
        width: 25%;
        padding-bottom: 25%;
      }
    }

    </style>
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

    <form action="<?= base_url('Dashboard/admin/upload_galeri'); ?>" method="post" enctype="multipart/form-data">
              <div class='box-body'>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Unggah Gambar :</label>
                  <div class='col-sm-8'>
                    <input type='file' class='form-control' name='file' required>
                  </div>
                  <label class='col-sm-3 control-label'>Nama Kegiatan :</label>
                  <div class='col-sm-8'>
                    <input type='text' class='form-control' name='acara' required>
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


      <section class="no-touch">
  <div class="wrap">
    
<?php foreach ($gambar as $data) { ?>
    <!-- <div class="box">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/1.jpg" />
        <div class="titleBox">An old greenhouse</div>
      </div>
    </div> -->

    <div class="box">
      <div class="boxInner">
        <img src="<?php echo base_url('/assets/galeri/').$data->gambar ?>" />
        <div class="titleBox"><?php echo $data->nama_acara ?></div>
      </div>
    </div>
  <?php } ?>
      
  </div>
</section>



</div>