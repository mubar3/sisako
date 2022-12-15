<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
	 		parent::__construct();
			$this->load->model('user');
	 		$this->load->model('m_anggota');
			$this->load->helper(array('form', 'url'));
	}
	public function daftar()
	{
		//$this->load->view('welcome_message');
		$this->load->view('home/index.php');
	}
	public function daftar_anggota()
	{	
		$data['jk'] = $this->db->get('tb_jk')->result();
		$data['province'] = $this->db->get('province')->result();
		$data['regencies'] = $this->db->get('regencies')->result();
		$data['districts'] = $this->db->get('districts')->result();
		$data['villages'] = $this->db->get('villages')->result();

		$this->load->view('layout/header_just.php',$data);
		$this->load->view('anggota/create_beranda.php',$data);
		$this->load->view('layout/footer.php',$data);
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('home/index2.php');
	}
	public function index2()
	{
		//$this->load->view('welcome_message');
		$this->load->view('home/index2.php');
	}
	public function admin()
	{
		//$this->load->view('welcome_message');
		$this->load->view('login/login3.php');
	}

		public function detail_qr($id)
	 {
			 $where = array('nik' => $id);
		 //$edit = $this->m_anggota->edit_data($where,'tb_anggota')->result();

			 //$edit_prop = $this->m_anggota->edit_data(array('no_anggota' => $no_anggota),'tb_anggota_properti')->result_array();
		 $edit = $this->m_anggota->read_qr($where)->result();
		 if(empty($edit)){
		 	$where = array('nia' => $id);
		 	$edit = $this->m_anggota->read_qr($where)->result();
		 }
		//  print_r($edit); die();

			 $status = $this->db->get('tb_status')->result();
			 $banom = $this->db->get('tb_banom')->result();
			 $pekerjaan = $this->db->get('tb_pekerjaan')->result();
			 $jamkes = $this->db->get('tb_jamkes')->result();
			 $pendidikan = $this->db->get('tb_pendidikan')->result();
			 $pendapatan = $this->db->get('tb_pendapatan')->result();
			 $rumah = $this->db->get('tb_rumah')->result();
			 $penyakit = $this->db->get('tb_penyakit')->result();
			 $disabilitas = $this->db->get('tb_disabilitas')->result();
			 $provinsi = $this->db->get('nu_pw')->result();
			 $kabupaten = $this->db->get('nu_pc')->result();
			 $kecamatan = $this->db->get('nu_mwc')->result();
			 $desa = $this->db->get('nu_pr')->result();
			 $data=array('title'=>'Tambah Anggota',
					 'page'  =>'home/detail',
					 'status' => $status,
					 'banom' => $banom,
					 'pekerjaan' => $pekerjaan,
					 'jamkes' => $jamkes,
					 'pendidikan' => $pendidikan,
					 'pendapatan' => $pendapatan,
					 'rumah' => $rumah,
					 'penyakit' => $penyakit,
					 'provinsi' => $provinsi,
					 'kabupaten' => $kabupaten,
					 'kecamatan' => $kecamatan,
					 'desa' => $desa,
					 'disabilitas' => $disabilitas,
					 'edit_anggota' => $edit,


						 );
			 $this->load->view('home/detail', $data);
	 }

	public function do_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password),
			'aktif'	=>1
			);
		$cek = $this->user->cek_login("users",$where)->num_rows();
		if($cek > 0)
		{
			$dataku = $this->user->cek_login("users",$where);
			foreach ($dataku->result() as $dat)
			{
					$ful = 	$dat->instansi;
					$tgl =  $dat->created_at;
					$user =  $dat->username;
					$img =  $dat->image;
					$idku =  $dat->id_user;
					$role = $dat->role;
					$email = $dat->email;
					$address = $dat->address;
					$provinsi = $dat->provinsi;
					$kabupaten = $dat->kabupaten;
					$sekolah = $dat->no_gudep;
					$keterangan = $dat->keterangan;

			}
			$date = new DateTime("now");
			$timestamp = $date->format('Y-m-d');

			if ($role==1) {
				$where = array(
						// 'admin' => $idku,
						// 'visible' => 1,
					);
				// $where = array(
				// 	'provinsi' => $provinsi,
				// 	// 'visible' => 1,
				// );
				$limit = array(
					'provinsi' => $address,
					// 'visible' => 1,
					'aktif' => 1,
				);
				$bin = array(
					'provinsi' => $address,
					'visible' => 0,
				);
				$temp = array(
					'provinsi' => $address,
					// 'visible' => 1,
					'aktif' => 0,
				);
				$today = array(
					'provinsi' => $address,
					'DATE(waktu)' => $timestamp,
					'aktif' => 1,
				);
				$emoney = array(
					'provinsi' => $address,
					'tb_anggota.emoney' => 1,
					'visible' => 1,
				);
			}elseif ($role==2) {
				$where = array(
						'admin' => $idku,
						// 'visible' => 1,
					);
				// $where = array(
				// 	'provinsi' => $provinsi,
				// 	// 'visible' => 1,
				// );
				$limit = array(
					'provinsi' => $address,
					// 'visible' => 1,
					'aktif' => 1,
				);
				$bin = array(
					'provinsi' => $address,
					'visible' => 0,
				);
				$temp = array(
					'provinsi' => $address,
					// 'visible' => 1,
					'aktif' => 0,
				);
				$today = array(
					'provinsi' => $address,
					'DATE(waktu)' => $timestamp,
					'aktif' => 1,
				);
				$emoney = array(
					'provinsi' => $address,
					'tb_pramuka.emoney' => 1,
					'visible' => 1,
				);

			}
			elseif ($role==3) {
			$where = array(
					'admin' => $idku,
					// 'visible' => 1,
				);
			// $where = array(
			// 	'kabupaten' => $kabupaten,
			// 	// 'visible' => 1,
			// );
			$limit = array(
				'kabupaten' => $address,
				// 'visible' => 1,
				'aktif' => 1,
			);
			$bin = array(
				'kabupaten' => $address,
				'visible' => 0,
			);
			$temp = array(
				'kabupaten' => $address,
				// 'visible' => 1,
				'aktif' => 0,
			);
			$today = array(
				'kabupaten' => $address,
				'DATE(waktu)' => $timestamp,
				'aktif' => 1,
			);
			$emoney = array(
				'kabupaten' => $address,
				'tb_pramuka.emoney' => 1,
				'visible' => 1,
			);
		}
			 elseif ($role==4) {
				$where = array(
						'admin' => $idku,
						// 'visible' => 1,
					);
				// $where = array(
				// 	'kecamatan' => $address,
				// 	// 'visible' => 1,
				// );
				$limit = array(
					'kecamatan' => $address,
					// 'visible' => 1,
					'aktif' => 1,
				);
				$bin = array(
					'kecamatan' => $address,
					'visible' => 0,
				);
				$temp = array(
					'kecamatan' => $address,
					// 'visible' => 1,
					'aktif' => 0,
				);
				$today = array(
					'kecamatan' => $address,
					'DATE(waktu)' => $timestamp,
					'aktif' => 1,
				);
				$emoney = array(
					'kecamatan' => $address,
					'tb_pramuka.emoney' => 1,
					'visible' => 1,
				);
			} elseif ($role==5) {
					$where = array(
							'admin' => $idku,
							// 'visible' => 1,
						);
					// $where = array(
					// 	'no_gudep' => $sekolah,
					// 	// 'visible' => 1,
					// );
					$limit = array(
						'no_gudep' => $address,
						'aktif' => 1,
					);
					$bin = array(
						'no_gudep' => $address,
						'visible' => 0,
					);
					$temp = array(
						'no_gudep' => $address,
						'aktif' => 0,
					);
					$today = array(
						'no_gudep' => $address,
						'DATE(waktu)' => $timestamp,
						'aktif' => 1,
					);
					$emoney = array(
						'no_gudep' => $address,
						'tb_pramuka.emoney' => 1,
					);
			}elseif ($role==6) {
				$where = array(
						// 'admin' => $idku,
						// 'visible' => 1,
					);
				// $where = array(
				// 	'provinsi' => $provinsi,
				// 	// 'visible' => 1,
				// );
				$limit = array(
					'provinsi' => $address,
					// 'visible' => 1,
					'aktif' => 1,
				);
				$bin = array(
					'provinsi' => $address,
					'visible' => 0,
				);
				$temp = array(
					'provinsi' => $address,
					// 'visible' => 1,
					'aktif' => 0,
				);
				$today = array(
					'provinsi' => $address,
					'DATE(waktu)' => $timestamp,
					'aktif' => 1,
				);
				$emoney = array(
					'provinsi' => $address,
					'tb_anggota.emoney' => 1,
					'visible' => 1,
				);
			}
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'fullname' => $ful,
				'membersince' => $tgl,
				'gambar' => $img,
				'id_user' => $idku,
				'role' => $role,
				'email' => $email,
				'where' => $where,
				'unlimit' => $unlimit,
				'emoney' => $emoney,
				'bin' => $bin,
				'temp' => $temp,
				'today' => $today,
				'keterangan' => $keterangan
				);

			$this->session->set_userdata($data_session);
			redirect("Dashboard/admin/");

		}else{
			$this->session->set_flashdata("globalmsg", "Username/Password salah !");
			redirect('/admin');
		}
	}
	public function do_logout(){
		$this->session->sess_destroy();
		redirect('/admin');
	}
}
