<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputController extends CI_Controller {

	public function tambah_aksi()
	{
		$nama_depan = $this->input->post('nama_depan');
		$agama = $this->input->post('agama');
		$golongan_darah = $this->input->post('golongan_darah');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$usia = $this->input->post('usia');
		$golongan = $this->input->post('golongan');
		$no_gudep = $this->input->post('no_gudep');
		$no_hp = $this->input->post('no_hp');
		$provinsi = $this->input->post('provinsi');
		$kabupaten = $this->input->post('kabupaten');
		$kecamatan = $this->input->post('kecamatan');
		$desa = $this->input->post('desa');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$jk = $this->input->post('jk');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$aktifitas_organisasi = $this->input->post('aktifitas_organisasi');
		$nama_organisasi1 = $this->input->post('nama_organisasi1');
		$jabatan1 = $this->input->post('jabatan1');
		$tahun1 = $this->input->post('tahun1');
		$nama_organisasi2 = $this->input->post('nama_organisasi2');
		$jabatan2 = $this->input->post('jabatan2');
		$tahun2 = $this->input->post('tahun2');
		$nama_organisasi3 = $this->input->post('nama_organisasi3');
		$jabatan3 = $this->input->post('jabatan3');
		$tahun3 = $this->input->post('tahun3');
		$nisn = $this->input->post('nisn');
		$pangkalan = $this->input->post('pangkalan');
		$nik = $this->input->post('nik');
		$emoney = $this->input->post('emoney');
		// $im = $this->input->post('image');

		$tahun = date('Y',strtotime($tanggal_lahir));
		$bulan = date('m',strtotime($tanggal_lahir));
		$tanggal = date('d',strtotime($tanggal_lahir));
		$no_urut = $this->m_anggota->get_urut($kabupaten)->row();
		$no = $no_urut->no;
		$cabang = substr($kabupaten,2,2);

		//2 digit depan
		$urut = sprintf("%06d", $no+1);
		$nia = $tanggal.$bulan.$tahun.$cabang.$urut;
		//2 digit belakang
		//$urut = sprintf("%04d", $no+1);
		//$nia = $tanggal.$bulan.$tahun.'00'.$cabang.$urut;

		$no_thn = date('Y');
		$imgname = str_replace('.', '-', $no_gudep);

		$filename = $_FILES['upload_foto']['tmp_name'];

		$image = $nia.'.jpg';

						$config['file_name']=$image;
						$config['upload_path'] = './assets/img/foto/';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['max_size'] = '100000'; // 0 = no file size limit
						$config['overwrite'] = true;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if(!$this->upload->do_upload('upload_foto'))
          {
          	// echo "gagal_upload";
          	// die(); 
          }else{
         $data = $this->upload->data(); 
				 $config['image_library'] = 'gd2';  
         $config['source_image'] = './assets/img/foto/'.$image;  
         $config['create_thumb'] = FALSE;  
         $config['maintain_ratio'] = TRUE;  
         $config['quality'] = '60%';
         // $config['rotation_angle'] = '90';  
         // $config['width'] = 400;  
         // $config['height'] = 533;  
         // $config['new_image'] = './assets/img/foto2/'.$image;  
         // $this->load->library('image_lib', $config);  
         // // $this->image_lib->clear(); 
         // $this->image_lib->rotate();
         // $this->image_lib->resize(); 
         $imgdata=exif_read_data($this->upload->upload_path.$this->upload->file_name, 'IFD0');
         list($width, $height) = getimagesize($filename);
           if ($width >= $height){
               $config['width'] = 400;
           }
           else{
               $config['height'] = 533;
           }
           $config['master_dim'] = 'auto'; 
         $config['new_image'] = './assets/img/foto/'.$image;  
         $this->load->library('image_lib', $config);  
         $this->image_lib->resize(); 

         $this->image_lib->clear(); 
				 $config=array();
				 $config['image_library'] = 'gd2';  
         $config['source_image'] = './assets/img/foto/'.$image; 

          switch($imgdata['Orientation']) {
                   case 3:
                       $config['rotation_angle']='180';
                       break;
                   case 6:
                       $config['rotation_angle']='270';
                       break;
                   case 8:
                       $config['rotation_angle']='90';
                       break;
               }
         $this->image_lib->initialize($config);
         $this->image_lib->rotate();

         		// print_r($config);
          	// echo "berhasil_upload";
          	// die();
       		}	

				// $img_arr_a = explode(";", $im);
    //     $img_arr_b = explode(",", $img_arr_a[1]);

    //     $data = base64_decode($img_arr_b[1]);
    //     // $img_name = time();
    //     echo $data;
    //     die();
    //     file_put_contents($image, $data);
    //     $img_file = addslashes(file_get_contents($image));
				// $img = imagecreatefromstring($data);
				// imagejpeg($img, './assets/img/foto/'.$image);
				// imagedestroy($img);
				// echo $im;
			$data_user = array(
				'urut'						=> $no+1,
				'nia'						=> $nia,
				'no_gudep'				=> $no_gudep,
				'nama_depan'			=> $nama_depan,
				'agama'						=> $agama,
				'golongan_darah'	=> $golongan_darah,
				'tempat_lahir' 	=> $tempat_lahir,
				'tanggal_lahir'	=> $tanggal_lahir,
				'usia'  		=> $usia,
				'golongan'  		=> $golongan,
				'alamat'  		=> $alamat,
				'rt'  		=> $rt,
				'rw'  		=> $rw,
				'jk'  			=> $jk,
				'status_perkawinan'  			=> $status_perkawinan,
				'aktifitas_organisasi'	=> $aktifitas_organisasi,
				'nama_organisasi1' 			=> $nama_organisasi1,
				'jabatan1'  						=> $jabatan1,
				'tahun1'  							=> $tahun1,
				'nama_organisasi2' 			=> $nama_organisasi2,
				'jabatan2'  						=> $jabatan2,
				'tahun2'  							=> $tahun2,
				'nama_organisasi3' 			=> $nama_organisasi3,
				'jabatan3'  						=> $jabatan3,
				'tahun3'  							=> $tahun3,
				'provinsi'  						=> $provinsi,
				'kecamatan'  						=> $kecamatan,
				'kabupaten'  						=> $kabupaten,
				'desa'  								=> $desa,
				'image'									=> $image,
				'nisn'									=> $nisn,
				'pangkalan'							=> $pangkalan,
				'nik'									=> $nik,
				'emoney'							=> $emoney,
				'visible'							=> 1,
				'admin'								=> 0

				);

				$query = $this->m_anggota->input_data($data_user,'tb_pramuka');
				$this->qrcode($nia);
				// echo "succeed";
				if($query){$hasil['gagal']="Input";}
				else{$hasil['sukses']="Input";}
				$data['jk'] = $this->db->get('tb_jk')->result();
				$data['province'] = $this->db->get('province')->result();
				$data['regencies'] = $this->db->get('regencies')->result();
				$data['districts'] = $this->db->get('districts')->result();
				$data['villages'] = $this->db->get('villages')->result();

				$this->load->view('layout/header_just.php',$hasil);
				$this->load->view('anggota/create_beranda.php',$hasil);
				$this->load->view('layout/footer.php',$hasil);
	}

	public function qrcode($nia){
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$where = array('nia' => $nia);
		$query = $this->db->get_where('tb_pramuka',$where)->row();

		$result = $query->nia;
		$data = base_url('anggota/detail/').$result;



		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/img/qrcode/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$nia.'.png'; //buat name dari qr code sesuai dengan nim

	 $params['data'] = $data ; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		//$this->m_anggota->input_data($data_user,$image_name,'tb_anggota');//simpan ke database
		//redirect('Dashboard/admin/data/anggota/list');
	}

	function __construct(){
		parent::__construct();

		$this->load->model('m_anggota');
		$this->load->model('m_dashboard');

		// $this->load->helper(array('form', 'url'));

	    $this->load->helper('url', 'form'); 
	    $this->load->library('form_validation');
	}

		function add_ajax_kab($province_id)
		{
	    	$query = $this->db->get_where('regencies',array('province_id'=>$province_id));
	    	$data = "<option value=''>- Pilih Kabupaten -</option>";
	    	foreach ($query->result() as $value) {
	        	$data .= "<option value='".$value->id."'>".$value->nama."</option>";
	    	}
	    	echo $data;
		}

		function add_ajax_kec($regency_id)
		{
	    	$query = $this->db->get_where('districts',array('regency_id'=>$regency_id));
	    	$data = "<option value=''> - Pilih Kecamatan - </option>";
	    	foreach ($query->result() as $value) {
	        	$data .= "<option value='".$value->id."'>".$value->nama."</option>";
	    	}
	    	echo $data;
		}

		function add_ajax_des($district_id)
		{
				$query = $this->db->get_where('villages',array('district_id'=>$district_id));
				$data = "<option value=''> - Pilih Desa - </option>";
				foreach ($query->result() as $value) {
						$data .= "<option value='".$value->id."'>".$value->nama."</option>";
				}
				echo $data;
		}

}