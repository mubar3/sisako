<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_anggota');
		$this->load->model('m_dashboard');

		// $this->load->helper(array('form', 'url'));

    $this->load->helper('url', 'form'); 
    $this->load->library('form_validation');

		if($this->session->userdata('status') != "login"){
			redirect("/");
		}
	}

	public function id_data($id,$level)
	{
		// $this->db->select('*')->from('users');
		if($level == 2){
			$this->db->join('users u2','u2.provinsi=users.provinsi');
		}elseif($level == 3){
			$this->db->join('users u2','u2.kabupaten=users.kabupaten');
		}elseif($level == 4){
			$this->db->join('users u2','u2.kecamatan=users.kecamatan');
		}
		$data=$this->db->where('users.id_user',$id)->get('users')->result();
		$user=array();
		foreach ($data as $value) {
			// print_r($value->id_user);die();
			array_push($user,$value->id_user);
		}
		return $user;
		// die();
	}

  public function index()
  {
		$address = $this->session->userdata('where');
		$where= array(
			'aktif' => 1,
			'visible' => 1,
		);
		$wherein='';
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==4 ){
			$wherein=$this->id_data($this->session->userdata('id_user'),$this->session->userdata('role'));
		}if($this->session->userdata('role')==5 ){
			$where['admin']=$this->session->userdata('id_user');
		}
		$anggota =$this->m_anggota->read_anggota($address,$where,$wherein)->result();
		$total = $this->m_anggota->read_anggota($address,$where,$wherein)->num_rows();
		$data=array(
					'title' => 'Data Anggota Sudah Verifikasi',
					'anggota' => $anggota,
					'total' => $total,
					'page'  =>'anggota/view'
						);
						// print_r($address);
    	$this->load->view('layout/wrapper', $data);
  }



  public function all()
  {
		$address = $this->session->userdata('where');
		// print_r($address);
		// die();
		$where= array(
			'visible' => 1,
		);
		$wherein='';
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==4 ){
			$wherein=$this->id_data($this->session->userdata('id_user'),$this->session->userdata('role'));
		}if($this->session->userdata('role')==5 ){
			$where['admin']=$this->session->userdata('id_user');
		}
		$anggota =$this->m_anggota->read_anggota($address,$where,$wherein)->result();
		$total = $this->m_anggota->read_anggota($address,$where,$wherein)->num_rows();

		$data=array(
					'title'=>'Data Anggota',
					'anggota' => $anggota,
					'total' => $total,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function jenis1()
  {
		$address = $this->session->userdata('where');
		$where= array(
			'visible' => 1,
			'aktif' => 1,
			'tb_pramuka.emoney' => 0,
		);
		$wherein='';
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==4 ){
			$wherein=$this->id_data($this->session->userdata('id_user'),$this->session->userdata('role'));
		}if($this->session->userdata('role')==5 ){
			$where['admin']=$this->session->userdata('id_user');
		}
		$anggota =$this->m_anggota->read_anggota($address,$where,$wherein)->result();
		$total = $this->m_anggota->read_anggota($address,$where,$wherein)->num_rows();

		$data=array(
					'title'=>'Kartu SISAKO',
					'anggota' => $anggota,
					'total' => $total,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function jenis2()
  {
		$address = $this->session->userdata('where');
		$where= array(
			'visible' => 1,
			'aktif' => 1,
			'tb_pramuka.emoney' => 1,
		);
		$wherein='';
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==4 ){
			$wherein=$this->id_data($this->session->userdata('id_user'),$this->session->userdata('role'));
		}if($this->session->userdata('role')==5 ){
			$where['admin']=$this->session->userdata('id_user');
		}
		$anggota =$this->m_anggota->read_anggota($address,$where,$wherein)->result();
		$total = $this->m_anggota->read_anggota($address,$where,$wherein)->num_rows();

		$data=array(
					'title'=>'Kartu SIPA & SISAKO',
					'anggota' => $anggota,
					'total' => $total,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function jenis3()
  {
		$address = $this->session->userdata('where');
		$where= array(
			'visible' => 1,
			'aktif' => 1,
			'tb_pramuka.emoney' => 2,
		);
		$wherein='';
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==4 ){
			$wherein=$this->id_data($this->session->userdata('id_user'),$this->session->userdata('role'));
		}if($this->session->userdata('role')==5 ){
			$where['admin']=$this->session->userdata('id_user');
		}
		$anggota =$this->m_anggota->read_anggota($address,$where,$wherein)->result();
		$total = $this->m_anggota->read_anggota($address,$where,$wherein)->num_rows();

		$data=array(
					'title'=>'Kartu Emoney',
					'anggota' => $anggota,
					'total' => $total,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function trash()
  {
		$address = $this->session->userdata('where');
		$where= array(
			'visible' => 0,
		);
		$wherein='';
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==4 ){
			$wherein=$this->id_data($this->session->userdata('id_user'),$this->session->userdata('role'));
		}if($this->session->userdata('role')==5 ){
			$where['admin']=$this->session->userdata('id_user');
		}
		$anggota =$this->m_anggota->read_anggota($address,$where,$wherein)->result();
		$total = $this->m_anggota->read_anggota($address,$where,$wherein)->num_rows();

		$data=array(
					'title'=>'Data Ditolak',
					'anggota' => $anggota,
					'total' => $total,
					'page'  =>'anggota/trash'
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

	public function emoney()
  {
		$where = $this->session->userdata('emoney');
		$where2= array();
		$wherein='';
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==4 ){
			$wherein=$this->id_data($this->session->userdata('id_user'),$this->session->userdata('role'));
		}if($this->session->userdata('role')==5 ){
			$where2['admin']=$this->session->userdata('id_user');
		}
		$anggota = $this->m_anggota->read_anggota($where,$where2,$wherein)->result();

		$data=array(
			'title'=>'Kartu Emoney',
					'anggota' => $anggota,
					'page'  =>'anggota/view'
						);
    	$this->load->view('layout/wrapper', $data);
  }

	public function crop()
  {
		// $where = $this->session->userdata('emoney');
		// $anggota = $this->m_anggota->read_anggota($where)->result();

		// $data=array(
		// 			'anggota' => $anggota,
		// 			'page'  =>'anggota/view'
		// 				);
    $this->load->view('anggota/crop');
  }

	public function temp()
 {
	 $address = $this->session->userdata('where');
	 $where= array(
		 'visible' => 1,
		 'aktif' => 0,
	 );
	 $anggota =$this->m_anggota->read_anggota($address,$where)->result();
	 $total = $this->m_anggota->read_anggota($address,$where)->num_rows();

	 $data=array(
		 		'title'=>'Data Anggota Belum Verifikasi',
				 'anggota' => $anggota,
				 'total' => $total,
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
			$kelas = $this->db->get('tb_kelas')->result();
			$agama = $this->db->get('tb_agama')->result();
			$golongan = $this->db->get('tb_golongan')->result();
			$status_perkawinan = $this->db->get('tb_status')->result();
			$kelas = $this->db->get('tb_kelas')->result();



  		$data=array('title'=>'Tambah Anggota',
					'page'  =>'anggota/create',
					'jk' => $jk,
					'province' => $province,
					'regencies' => $regencies,
					'districts' => $districts,
					'villages' => $villages,
					'kelas'	=>$kelas,
					'agama'	=>$agama,
					'golongan'	=>$golongan,
					'status_perkawinan'	=>$status_perkawinan

						);
    	$this->load->view('layout/wrapper', $data);
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
		$kelas = $this->db->get('tb_kelas')->result();

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
					'kelas' => $kelas,
					// 'edit_prop' => $edit_prop,

						);
    	$this->load->view('layout/wrapper', $data);
  }

	// public function tambah_aksi()
	// {
	// 	// $config['upload_path'] = './assets/img/foto/';
	// 	// $config['allowed_types'] = 'gif|jpg|png';
	// 	// $config['max_size']	= '10000'; //in kb
	// 	//
	// 	// $this->upload->initialize($config);
	//
	// 	$nama_depan = $this->input->post('nama_depan');
	// 	// $nama_tengah = $this->input->post('nama_tengah');
	// 	// $nama_belakang = $this->input->post('nama_belakang');
	// 	$agama = $this->input->post('agama');
	// 	$golongan_darah = $this->input->post('golongan_darah');
	// 	$tempat_lahir = $this->input->post('tempat_lahir');
	// 	$tanggal_lahir = $this->input->post('tanggal_lahir');
	// 	$usia = $this->input->post('usia');
	// 	$golongan = $this->input->post('golongan');
	// 	$no_gudep = $this->input->post('no_gudep');
	// 	$no_hp = $this->input->post('no_hp');
	// 	$provinsi = $this->input->post('provinsi');
	// 	$kabupaten = $this->input->post('kabupaten');
	// 	$kecamatan = $this->input->post('kecamatan');
	// 	$desa = $this->input->post('desa');
	// 	$alamat = $this->input->post('alamat');
	// 	$rt = $this->input->post('rt');
	// 	$rw = $this->input->post('rw');
	// 	$jk = $this->input->post('jk');
	// 	$aktifitas_organisasi = $this->input->post('aktifitas_organisasi');
	// 	$nama_organisasi1 = $this->input->post('nama_organisasi1');
	// 	$jabatan1 = $this->input->post('jabatan1');
	// 	$tahun1 = $this->input->post('tahun1');
	// 	$nama_organisasi2 = $this->input->post('nama_organisasi2');
	// 	$jabatan2 = $this->input->post('jabatan2');
	// 	$tahun2 = $this->input->post('tahun2');
	// 	$nama_organisasi3 = $this->input->post('nama_organisasi3');
	// 	$jabatan3 = $this->input->post('jabatan3');
	// 	$tahun3 = $this->input->post('tahun3');
	// 	$nisn = $this->input->post('nisn');
	// 	$pangkalan = $this->input->post('pangkalan');
	// 	$nik = $this->input->post('nik');
	// 	$emoney = $this->input->post('emoney');
	//
	//
	//
	//
	//
	// 	//$max_no_gudep = $this->m_anggota->get_max_urut($desa,date('Y',strtotime($tanggal_lahir)))->row();
	// 	// $max_no_gudep = $this->m_anggota->get_max_urut($desa)->row();
	// 	// $no_max = $max_no_gudep->no;
	// 	// $no_gudep = sprintf("%04d", $no_max+1);
	// 	//$no_thn = date('dmy',strtotime($tanggal_lahir));
	// 	$tahun = date('Y',strtotime($tanggal_lahir));
	// 	$bulan = date('m',strtotime($tanggal_lahir));
	// 	$tanggal = date('d',strtotime($tanggal_lahir));
	// 	$no_urut = $this->m_anggota->get_urut()->row();
	// 	$no = $no_urut->no;
	// 	$urut = sprintf("%08d", $no+1);
	// 	$nia = $tanggal.$bulan.$tahun.$urut;
	//
	// 	$no_thn = date('Y');
	// 	$imgname = str_replace('.', '-', $no_gudep);
	// 	$im = $_FILES['image']['name'];
  //   // $kt = $_FILES['ktp']['name'];
	// 	$image = $no_gudep.'.jpg';
	// 	$img = imagecreatefromstring(base64_decode($string));
	// 		if($img != false)
	// 		{
  //  		imagejpeg($img, '/path/to/new/image.jpg');
	// 	}
  //   // $ktp = $no_anggota.'.jpg';
	//
	// 	// $pekerjaan_lain = $this->input->post('pekerjaan_lain');
	// 	// if (isset($pekerjaan_lain)){
	// 	// 	$this->m_anggota->save_pekerjaan('tb_anggota_pekerjaan',$no_anggota,$pekerjaan_lain);
	// 	// }
	//
	// 	// $prop = $this->input->post('properti');
	// 	// $nil = $this->input->post('nilai');
	// 	// $ket = $this->input->post('ket');
	// 	// if (isset($ket[0]) || isset($ket[1])){
	// 	// 		for($i=0,$k=0;$i<count($prop),$k<count($ket);$i++,$k++){
	// 	// 			for($j=0;$j<count($nil);$j++){
	// 	// 				$proper = $prop[$i];
	// 	// 				$nilai = $nil[$i];
	// 	// 				$kete = $ket[$k];
	// 	// 			}
	// 	// 			if ($i < 2){
	// 	// 				$this->m_anggota->save_properti2('tb_anggota_properti',$no_anggota,$proper,$nilai,$kete);
	// 	// 			}else{
	// 	// 				$this->m_anggota->save_properti('tb_anggota_properti',$no_anggota,$proper,$nilai);
	// 	// 			}
	// 	// 		}
	// 	// }else{
	// 	// 		for($i=0;$i<count($prop);$i++){
	// 	// 			for($j=0;$j<count($nil);$j++){
	// 	// 				$proper = $prop[$i];
	// 	// 				$nilai = $nil[$i];
	// 	// 			}
	// 	// 			$this->m_anggota->save_properti('tb_anggota_properti',$no_anggota,$proper,$nilai);
	// 	// 		}
	// 	// }
	//
	// 	if ($im !== ""){
	// 		$config['file_name']=$imgname;
	// 		$config['upload_path'] = './assets/img/foto/';
	// 		$config['allowed_types'] = 'jpg|png|jpeg|gif';
	// 		$config['max_size'] = '100000'; // 0 = no file size limit
	// 		$config['overwrite'] = true;
	// 		$this->upload->initialize($config);
	// 		$this->load->library('upload', $config);
	// 		if(!$this->upload->do_upload('image')){
	// 			$error = array('error' => $this->upload->display_errors());
	// 			print_r($error);
	// 		}else {
	// 			$upload_data = $this->upload->data();
  //       $image = $upload_data['file_name'];
	// 		}
	// 	}
	// 	// if ($kt !== ""){
	// 	// 	$config['file_name']=$imgname;
	// 	// 	$config['upload_path'] = './assets/img/ktp/';
	// 	// 	$config['allowed_types'] = 'jpg|png|jpeg|gif';
	// 	// 	$config['max_size'] = '100000'; // 0 = no file size limit
	// 	// 	$config['overwrite'] = true;
	// 	// 	$this->upload->initialize($config);
	// 	// 	//$this->load->library('upload', $config);
	// 	// 	if(!$this->upload->do_upload('ktp')){
	// 	// 		$error = array('error' => $this->upload->display_errors());
	// 	// 		print_r($error);
	// 	// 	}else {
	// 	// 		$upload_data = $this->upload->data();
  //   //     $ktp_name = $upload_data['file_name'];
	// 	// 	}
	// 	// }
	//
	// 		$data_user = array(
	// 			'nia'						=> $nia,
	// 			'no_gudep'				=> $no_gudep,
	// 			'nama_depan'			=> $nama_depan,
	// 			// 'nama_tengah'			=> $nama_tengah,
	// 			// 'nama_belakang'		=> $nama_belakang,
	// 			'agama'						=> $agama,
	// 			'golongan_darah'	=> $golongan_darah,
	// 			'tempat_lahir' 	=> $tempat_lahir,
	// 			'tanggal_lahir'	=> $tanggal_lahir,
	// 			'usia'  		=> $usia,
	// 			'golongan'  		=> $golongan,
	// 			'alamat'  		=> $alamat,
	// 			'rt'  		=> $rt,
	// 			'rw'  		=> $rw,
	// 			'jk'  			=> $jk,
	// 			'aktifitas_organisasi'	=> $aktifitas_organisasi,
	// 			'nama_organisasi1' 			=> $nama_organisasi1,
	// 			'jabatan1'  						=> $jabatan1,
	// 			'tahun1'  							=> $tahun1,
	// 			'nama_organisasi2' 			=> $nama_organisasi2,
	// 			'jabatan2'  						=> $jabatan2,
	// 			'tahun2'  							=> $tahun2,
	// 			'nama_organisasi3' 			=> $nama_organisasi3,
	// 			'jabatan3'  						=> $jabatan3,
	// 			'tahun3'  							=> $tahun3,
	// 			'provinsi'  						=> $provinsi,
	// 			'kecamatan'  						=> $kecamatan,
	// 			'kabupaten'  						=> $kabupaten,
	// 			'desa'  								=> $desa,
	// 			'image'									=> $image,
	// 			'nisn'									=> $nisn,
	// 			'pangkalan'							=> $pangkalan,
	// 			'nik'							=> $nik,
	// 			'emoney'							=> $emoney,
	//
	// 			);
	//
	// 			$query = $this->m_anggota->input_data($data_user,'tb_pramuka');
	// 			$this->qrcode($nik);
	// 			echo "succeed";
	// 			redirect('Dashboard/admin/data/anggota/all');
	// }
	function cek($kode){
		$no_urut = $this->m_anggota->get_urut($kode)->row();
		$no = $no_urut->no;
		// $cabang = substr($kabupaten,2,2);

		//2 digit depan
		$urut = sprintf("%06d", $no+1);
		echo $urut;
	}

	public function tambah_aksi()
	{
		$nama_depan = $this->input->post('nama_depan');
		// $agama = $this->input->post('agama');
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
		$kta_sipa = $this->input->post('kta_sipa');
		$emoney = $this->input->post('emoney');
		$kelas = $this->input->post('kelas');
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

		$image='';
		if($_FILES['upload_foto']['name'] != ''){
			
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
       		}}	

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
				// 'agama'						=> $agama,
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
				'kta_sipa'									=> $kta_sipa,
				'no_hp'									=> $no_hp,
				'emoney'							=> $emoney,
				'visible'							=> 1,
				'admin'								=> $this->session->userdata('id_user'),
				'kelas'							=> $kelas

				);

				$query = $this->m_anggota->input_data($data_user,'tb_pramuka');
				$this->qrcode($nia);
				// echo "succeed";
				redirect('Dashboard/admin/data/anggota/all');
	}

	// public function qrcode($nik){
	// 	$this->load->library('ciqrcode'); //pemanggilan library QR CODE

	// 	$where = array('nik' => $nik);
	// 	$query = $this->db->get_where('tb_pramuka',$where)->row();

	// 	$result = $query->nik;
	// 	$data = base_url('anggota/detail/').$result;



	// 	$config['cacheable']	= true; //boolean, the default is true
	// 	$config['cachedir']		= './assets/'; //string, the default is application/cache/
	// 	$config['errorlog']		= './assets/'; //string, the default is application/logs/
	// 	$config['imagedir']		= './assets/img/qrcode/'; //direktori penyimpanan qr code
	// 	$config['quality']		= true; //boolean, the default is true
	// 	$config['size']			= '1024'; //interger, the default is 1024
	// 	$config['black']		= array(224,255,255); // array, default is array(255,255,255)
	// 	$config['white']		= array(70,130,180); // array, default is array(0,0,0)
	// 	$this->ciqrcode->initialize($config);

	// 	$image_name=$nik.'.png'; //buat name dari qr code sesuai dengan nim

	//  $params['data'] = $data ; //data yang akan di jadikan QR CODE
	// 	$params['level'] = 'H'; //H=High
	// 	$params['size'] = 10;
	// 	$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	// 	$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

	// 	//$this->m_anggota->input_data($data_user,$image_name,'tb_anggota');//simpan ke database
	// 	//redirect('Dashboard/admin/data/anggota/list');
	// }

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

		public function qrcode_ubah(){
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		// $where = array('nia' => $nia);
		// $query = $this->db->get_where('tb_pramuka',$where)->row();

		// $result = $query->nia;
		// $where = array('id' => 51);
		$rawdata = $this->db->get_where('tb_pramuka')->result_array();
		// print_r($rawdata);
		// die();
		// prepare the data into a multidimensional array
		foreach($rawdata as $row)
		{
		// $row['id'] 
		// print_r($row['golongan']);
		// 		die();


		$data = 'https://sisako.com/anggota/detail/'.$row['nia'];



		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/img/qrcode2/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$row['nia'].'.png'; //buat name dari qr code sesuai dengan nim

	 $params['data'] = $data ; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		//$this->m_anggota->input_data($data_user,$image_name,'tb_anggota');//simpan ke database
		//redirect('Dashboard/admin/data/anggota/list');
		}
		echo "sukses";
	}




	public function detail_anggota($id)
  {
  		$where = array('tb_pramuka.id' => $id);
		//$edit = $this->m_anggota->edit_data($where,'tb_anggota')->result();

  		//$edit_prop = $this->m_anggota->edit_data(array('no_anggota' => $no_anggota),'tb_anggota_properti')->result_array();
		$edit = $this->m_anggota->read_anggota($where,$where)->result();

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
		$this->m_anggota->hapus_data_soft($where,$data,'tb_pramuka');

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
		$this->m_anggota->hapus_data_soft($where,$data,'tb_pramuka');

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
		$kta_sipa = $this->input->post('kta_sipa');
		$kelas = $this->input->post('kelas');
		$emoney = $this->input->post('emoney');
		$old_image = $this->input->post('old_image');

		$imgname = str_replace('.', '-', $no_gudep);
		$im = $_FILES['image']['name'];
		$filename = $_FILES['image']['tmp_name'];

		if ($im !== ""){
			$image=$old_image;
						$config['file_name']=$image;
						$config['upload_path'] = './assets/img/foto/';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['max_size'] = '100000'; // 0 = no file size limit
						$config['overwrite'] = true;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if(!$this->upload->do_upload('image'))
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

         $imgdata=exif_read_data($this->upload->upload_path.$this->upload->file_name, 'IFD0');
         list($width, $height) = getimagesize($filename);
           if ($width >= $height){
               $config['width'] = 400;
           }
           else{
               $config['height'] = 533;
           }
           $config['master_dim'] = 'auto'; 
         // $config['width'] = 400;  
         // $config['height'] = 533;  
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


			// $config['file_name']=$image;
			// $config['upload_path'] = './assets/img/foto/';
			// $config['allowed_types'] = 'jpg|png|jpeg|gif';
			// $config['max_size'] = '100000'; // 0 = no file size limit
			// $config['overwrite'] = true;
			// $this->upload->initialize($config);
			// //$this->load->library('upload', $config);
			// if(!$this->upload->do_upload('image')){
			// 	$error = array('error' => $this->upload->display_errors());
			// 	print_r($error);
			// }else {
			// 	$upload_data = $this->upload->data();
			// 	$image = $upload_data['file_name'];
			// }

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
				'kta_sipa'  								=> $kta_sipa,
				'no_hp'  								=> $no_hp,
				'kelas'  								=> $kelas,
				'emoney'  								=> $emoney,
				'image'	=> $image,
				);

			$where = array('id' => $id, );
			$this->m_anggota->update_data($where,$data,'tb_pramuka');
			redirect('Dashboard/admin/data/anggota/all');

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
