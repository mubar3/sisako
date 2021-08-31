<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_anggota');
		$this->load->model('m_kartu');

		$this->load->helper(array('form', 'url'));


		// if($this->session->userdata('status') != "login"){
		// 	redirect("/");
		// }
	}

  public function index()
  {
		$where = $this->session->userdata('where');
		// $where= array('aktif' => 1, );
		$anggota =$this->m_anggota->read_anggota($where)->result();

		// $get_province = $this->db->select('*')->from('province')->get();
		// $data['province'] = $get_province->result();
		// $this->load->view('create', $data);


		// $anggota = $this->m_anggota->read_all()->result();

		$data=array('title'=>'',
					'anggota' => $anggota,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }



  public function all()
  {
        $where = $this->session->userdata('unlimit');
				// $where =array('aktif' => 1 );
		 	 $anggota = $this->m_anggota->read_anggota($where)->result();
		// $anggota = $this->m_anggota->read_all('tb_pramuka')->result();

		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function today()
  {
		$where = $this->session->userdata('today');
		$anggota = $this->m_anggota->read_anggota($where)->result();

		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function check(){
		$id = $this->input->post('id');
		$where = array('nik' => $id);
	$edit = $this->m_anggota->edit_data($where,'tb_pramuka')->row();
	if ($edit!=null) {
		$this->session->set_flashdata("globalmsg", "Data ditemukan");
		//$this->view($id);
		redirect('public/anggota/view/'.$id);
	}else{
		$this->session->set_flashdata("globalmsg", "Data tidak ditemukan");
		//$this->create();
		redirect('public/anggota/create', $id);

	}
}

public function view($id)
	{
		//$id = $this->input->post('id');
		$where = array('nik' => $id);
	$edit = $this->m_anggota->edit_data($where,'tb_pramuka')->result();
	$query = $this->m_anggota->edit_data($where,'tb_pramuka')->row();
	$no_gudep = $query->no_gudep;

	$province = $this->db->get('province')->result();
	$regencies = $this->db->get('regencies')->result();
	$districts = $this->db->get('districts')->result();
	$villages = $this->db->get('villages')->result();

	$kabupaten = $this->m_anggota->read_all()->result();
	//print_r($edit_prop);
	//print_r($edit);

		$jk = $this->db->get('tb_jk')->result();

		$data=array('title'=>'Tambah Anggota',
				'page'  =>'anggota/edit',
				'jk' => $jk,
				'province' => $province,
				'regencies' => $regencies,
				'districts' => $districts,
				'villages' => $villages,
				'kabupaten' => $kabupaten,

				'edit_anggota' => $edit,
				// 'edit_prop' => $edit_prop,

					);
		$this->load->view('home/layout/wrapper', $data);
	}

	public function emoney()
  {
		$where = $this->session->userdata('emoney');
		$anggota = $this->m_anggota->read_anggota($where)->result();

		$data=array(
					'anggota' => $anggota,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function temp()
 {
	 $where = $this->session->userdata('temp');
	 $anggota = $this->m_anggota->read_anggota($where)->result();
	 $list = $this->session->userdata('where');

	 // $cek = $this->m_anggota->cek_jumlah('tb_pramuka',$list)->num_rows();
	 // $bin = $this->m_anggota->cek_jumlah('tb_pramuka',$where)->num_rows();
	 // $temp = $this->m_anggota->cek_jumlah('tb_pramuka',$where)->num_rows();

	 $data=array('title'=>'Manajemen Berita - Java Web Media',
				 'anggota' => $anggota,
				 // 'anggota_jumlah' => $cek,
				 // 'anggota_bin' => $bin,
				 'page'  =>'anggota/view'
					 );
		 $this->load->view('layout/wrapper', $data);
 }

	public function indexBin()
  {
		$where = $this->session->userdata('bin');
		$list = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();

		$cek = $this->m_anggota->cek_jumlah('tb_anggota',$list)->num_rows();
		$bin = $this->m_anggota->cek_jumlah('tb_anggota',$where)->num_rows();

		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'anggota_jumlah' => $cek,
					'anggota_bin' => $bin,
					'page'  =>'anggota/viewBin'
						);
    	$this->load->view('layout/wrapper', $data);
  }

  public function banom()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/banom'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function agama()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/agama'
						);
    	$this->load->view('layout/wrapper', $data);
  }

public function disabilitas()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/disabilitas'
						);
    	$this->load->view('layout/wrapper', $data);
  }

public function jamkes()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/jamkes'
						);
    	$this->load->view('layout/wrapper', $data);
  }

public function jk()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/jk'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function golongan()
	  {
			$where = $this->session->userdata('where');
			$anggota = $this->m_anggota->read_anggota($where)->result();
			$data=array('title'=>'Manajemen Berita - Java Web Media',
						'anggota' => $anggota,
						'page'  =>'kategori/golongan'
							);
	    	$this->load->view('layout/wrapper', $data);
	  }

  public function pekerjaan()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/pekerjaan'
						);
    	$this->load->view('layout/wrapper', $data);
  }

  public function pendapatan()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/pendapatan'
						);
    	$this->load->view('layout/wrapper', $data);
  }

  public function pendidikan()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/pendidikan'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function emoneys()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/emoney'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function province()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/province'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function regencies()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/regencies'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function districts()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/districts'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function villages()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/villages'
						);
    	$this->load->view('layout/wrapper', $data);
  }

  public function penyakit()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/penyakit'
						);
    	$this->load->view('layout/wrapper', $data);
  }

public function status()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/status'
						);
    	$this->load->view('layout/wrapper', $data);
  }

  public function rumah()
  {
		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kategori/rumah'
						);
    	$this->load->view('layout/wrapper', $data);
  }

  public function tambah_anggota()
  {
  		$jk = $this->db->get('tb_jk')->result();
			$province = $this->db->get('province')->result();
			$regencies = $this->db->get('regencies')->result();
			$districts = $this->db->get('districts')->result();
			$villages = $this->db->get('villages')->result();



  		$data=array('title'=>'Tambah Anggota',
					'page'  =>'home/create',
					'jk' => $jk,
					'province' => $province,
					'regencies' => $regencies,
					'districts' => $districts,
					'villages' => $villages,

						);
    	$this->load->view('home/layout/wrapper',$data);
  }

public function edit_anggota($id)
  {
  		$where = array('id' => $id);
		$edit = $this->m_anggota->edit_data($where,'tb_pramuka')->result();
		$query = $this->m_anggota->edit_data($where,'tb_pramuka')->row();
		$no_gudep = $query->no_gudep;

		$province = $this->db->get('province')->result();
		$regencies = $this->db->get('regencies')->result();
		$districts = $this->db->get('districts')->result();
		$villages = $this->db->get('villages')->result();

		$kabupaten = $this->m_anggota->read_all()->result();
		//print_r($edit_prop);
		//print_r($edit);

  		$jk = $this->db->get('tb_jk')->result();

  		$data=array('title'=>'Tambah Anggota',
					'page'  =>'anggota/edit',
					'jk' => $jk,
					'province' => $province,
					'regencies' => $regencies,
					'districts' => $districts,
					'villages' => $villages,
					'kabupaten' => $kabupaten,

					'edit_anggota' => $edit,
					// 'edit_prop' => $edit_prop,

						);
    	$this->load->view('layout/wrapper', $data);
  }

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
		$im = $this->input->post('image');

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

		$image = $no_gudep.'.jpg';

		$img_arr_a = explode(";", $im);
				$img_arr_b = explode(",", $img_arr_a[1]);

				$data = base64_decode($img_arr_b[1]);
				// $img_name = time();

				file_put_contents($image, $data);
				$img_file = addslashes(file_get_contents($image));
				$img = imagecreatefromstring($data);
				imagejpeg($img, './assets/img/foto/'.$image);
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
				'nik'							=> $nik,
				'emoney'							=> $emoney,

				);


				$query = $this->m_anggota->input_data($data_user,'tb_pramuka');
				$this->qrcode($nik);
				// echo "succeed";
				$this->priview($nik);
	}

	public function priview($nik)
  {
		// $kartu = $this->input->post('kartu');
		// if ($id!=null) {
		$where = array('nik' => $nik,);

		$anggota = $this->m_kartu->read_preview($where)->result();
		// }
			// code...
		// }else {
		// 	$nik = $this->input->post('nik');
		// 	$where=array('nik'=> $nik,
		// 							'visible'  => 1,
		// 							'aktif'  => 1,
		// 					);
		// 	$anggota = $this->m_kartu->read_all_kartu($where)->result();
		// 	// code...
		// }
		// print_r($anggota);
		// print_r($kartu);

		$data=array('anggota' => $anggota,
								'page'  =>'kartu/kartu'
								);
		// $this->centang($kartu);
    $this->load->view('kartu/kartu_priview', $data);
  }


	public function qrcode($nik){
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$where = array('nik' => $nik);
		$query = $this->m_anggota->read_anggota($where)->row();

		$result = $query->nik;
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

		$image_name=$nik.'.png'; //buat name dari qr code sesuai dengan nim

	 $params['data'] = $data ; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		//$this->m_anggota->input_data($data_user,$image_name,'tb_anggota');//simpan ke database
		//redirect('Dashboard/admin/data/anggota/list');
	}




	public function detail_anggota($id)
  {
  		$where = array('tb_pramuka.id' => $id);
		//$edit = $this->m_anggota->edit_data($where,'tb_anggota')->result();

  		//$edit_prop = $this->m_anggota->edit_data(array('no_anggota' => $no_anggota),'tb_anggota_properti')->result_array();
		$edit = $this->m_anggota->read_anggota($where)->result();

  		$jk = $this->db->get('tb_jk')->result();
			$golongan = $this->db->get('tb_golongan')->result();


  		$data=array('title'=>'Tambah Anggota',
					'page'  =>'anggota/detail',
					// 'negosiasi' => 'Rp. '.number_format($total->NEGOSIASI_Rp,0,',','.')
					'jk' => $jk,
					'golongan' => $golongan,

					'edit_anggota' => $edit,


						);
    	$this->load->view('layout/wrapper', $data);
  }

	function hapus(){
		$id = $_GET['id'];
		$where = array('id' => $id);
		$this->m_anggota->hapus_data($where,'tb_pramuka');
		echo 'succeed';
	}



	function delete_anggota(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'visible' 	=> $status
		);

		$where = array(
			'id' => $id
		);
		$this->m_anggota->hapus_data_soft($data,'tb_pramuka');

		echo 'succeed';
	}

	function verif_anggota(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'aktif' 	=> $status
		);

		$where = array(
			'id' => $id
		);
		$this->m_anggota->verif_data($where,$data,'tb_pramuka');

		echo 'succeed';
	}

	function restore_anggota(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'visible' 	=> $status
		);

		$where = array(
			'id' => $id
		);
		$this->m_anggota->hapus_data_soft($where,$data,'tb_anggota');

		echo 'succeed';
	}

	function edit_user($id){
		$where = array('id_user' => $id);
		$data['edit_user'] = $this->m_users->edit_data($where,'users')->result();
		$this->load->view('editdatauser',$data);
	}

	function update(){

		$id = $this->input->post('id');
		$no_gudep = $this->input->post('no_gudep');
		$nama_depan = $this->input->post('nama_depan');
		// $nama_tengah = $this->input->post('nama_tengah');
		// $nama_belakang = $this->input->post('nama_belakang');
		$agama = $this->input->post('agama');
		$golongan_darah = $this->input->post('golongan_darah');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$usia = $this->input->post('usia');
		$golongan = $this->input->post('golongan');
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
		$old_image = $this->input->post('old_image');

		$imgname = str_replace('.', '-', $no_gudep);
		$im = $_FILES['image']['name'];

		if ($im !== ""){
			$config['file_name']=$image;
			$config['upload_path'] = './assets/img/foto/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['max_size'] = '100000'; // 0 = no file size limit
			$config['overwrite'] = true;
			$this->upload->initialize($config);
			//$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image')){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}else {
				$upload_data = $this->upload->data();
				$image = $upload_data['file_name'];
			}
		}else {
			$image = $old_image;
		}


			$data = array(
				'no_gudep'				=> $no_gudep,
				'nama_depan'			=> $nama_depan,
				// 'nama_tengah'			=> $nama_tengah,
				// 'nama_belakang'		=> $nama_belakang,
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
				'aktifitas_organisasi'  			=> $aktifitas_organisasi,
				'nama_organisasi1' => $nama_organisasi1,
				'jabatan1'  			=> $jabatan1,
				'tahun1'  			=> $tahun1,
				'nama_organisasi2' => $nama_organisasi2,
				'jabatan2'  			=> $jabatan2,
				'tahun2'  			=> $tahun2,
				'nama_organisasi3' => $nama_organisasi3,
				'jabatan3'  			=> $jabatan3,
				'tahun3'  			=> $tahun3,
				'provinsi'  						=> $provinsi,
				'kecamatan'  						=> $kecamatan,
				'kabupaten'  						=> $kabupaten,
				'desa'  								=> $desa,
				'nisn'  								=> $nisn,
				'pangkalan'  								=> $pangkalan,
				'nik'  								=> $nik,
				'emoney'  								=> $emoney,
				'image'	=> $image,
				);

			$where = array('id' => $id, );
			$this->m_anggota->update_data($where,$data,'tb_pramuka');
			redirect('home/index.php');

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
