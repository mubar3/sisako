<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_users');
		$this->load->helper(array('form', 'url'));

		if($this->session->userdata('status') != "login"){
			redirect("/");
		}
	}

	public function index()
  {
		$address = $this->session->userdata('where');
 	 	$where= array(
 		 	'visible' => 1,
 		 	'aktif' => 0,
 	 	);
		$user = $this->m_users->tampil_data($address)->result();
		$cek = $this->m_users->cek_jumlah("users")->num_rows();
		$ceksampah = $this->m_users->cek_jumlah_sampah()->num_rows();
		$data = array(
			'page' => 'user/read',
			'user' => $user,
			'user_jumlah' => $cek,
			'jumlah_sampah_user' => $ceksampah
			);
		// $this->session->set_userdata($data_session);
    	$this->load->view('layout/wrapper', $data);
  }

  public function viewbin()
  {
		$data['userss_bin'] = $this->m_users->tampil_data_bin()->result();
		$cek = $this->m_users->cek_jumlah("users")->num_rows();
		$ceksampah = $this->m_users->cek_jumlah_sampah()->num_rows();
		$data_session = array(
			'user_jumlah' => $cek,
			'jumlah_sampah_user' => $ceksampah
			);
		$this->session->set_userdata($data_session);
   	 	$this->load->view('viewdatauserTrash', $data);
  }

  public function tambah_user()
  {
		$role = $this->db->get('tb_role')->result();
		$province = $this->db->get('province')->result();
		$regencies = $this->db->get('regencies')->result();
		$data = array(
			'page' => 'user/create',
			'province' => $province,
			'regencies' => $regencies,
			'role' =>$role
		 );
    $this->load->view('layout/wrapper', $data);
  }

	public function tambah_aksi()
	{
		$config['upload_path'] = './assets/dashboard/dist/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb

		$this->upload->initialize($config);

		// $fulname = $this->input->post('fulname');
		$username = $this->input->post('username');

		$role = $this->input->post('role');

		// $type = $this->input->post('type');
		$no_gudep = $this->input->post('no_gudep');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$instansi = $this->input->post('instansi');
		$provinsi = $this->input->post('provinsi');
		$kabupaten = $this->input->post('kabupaten');
		$email = $this->input->post('email');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');

		if ( !$this->upload->do_upload('image'))
		{
			$data_user = array(
				// 'fullname'		=> $fulname,
				'username' 		=> $username,

				'role'  		=> $role,
				// 'status'		=> 1,
				// 'type'  	=> $type,
				'no_gudep'  		=> $no_gudep,
				'alamat'  		=> $alamat,
				'nama' 		=> $nama,
				'hp' 		=> $hp,
				'instansi'			=> $instansi,
				'provinsi'  						=> $provinsi,
				'kabupaten'  						=> $kabupaten,
				'email'  		=> $email,
				// 'created_at'  => $date,
				// 'updated_at'  => $date,
				// 'deleted_at'  => $date,
				'image'  	  => 'nopp.jpg'
				);
			$this->m_users->input_data($data_user,'users');
			redirect('Dashboard/admin/data/user/list');
		}else{
				$data_user = array(
					'username' 		=> $username,
					'role'  		=> $role,
					// 'status'		=> 1,
					// 'type'  	=> $type,
					'no_gudep'  		=> $no_gudep,
					'alamat'  		=> $alamat,
					'nama' 		=> $nama,
					'hp' 		=> $hp,
					'instansi'			=> $instansi,
					'provinsi'  						=> $provinsi,
					'kabupaten'  						=> $kabupaten,
					'email'  		=> $email,
					// 'email'  		=> $email,
					// 'created_at'  => $date,
					// 'updated_at'  => $date,
					// 'deleted_at'  => $date,
					// 'image'  	  => 'nopp.jpg'
					'image'  	  => $this->upload->data('file_name')
					);
				$this->m_users->input_data($data_user,'users');
				redirect('Dashboard/admin/data/user/list');
		}
	}

	function hapus(){
		$id = $_GET['id'];
		$where = array('id_user' => $id);
		$this->m_users->hapus_data($where,'users');
		echo 'succeed';
	}

	function softdelete(){
		$id = $_GET['id'];
		$status = 0;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_user' => $id
		);
		$this->m_users->hapus_data_soft($where,$data,'users');

		echo 'succeed';
	}

	function restoredelete(){
		$id = $_GET['id'];
		$status = 1;

		$data = array(
			'status' 	=> $status
		);

		$where = array(
			'id_user' => $id
		);
		$this->m_users->hapus_data_soft($where,$data,'users');

		echo 'succeed';
	}

	function edit_user($id){
		$role = $this->db->get('tb_role')->result();
		$where = array('id_user' => $id);
		$edit_user = $this->m_users->edit_data($where,'users')->result();
		$province = $this->db->get('province')->result();
		$regencies = $this->db->get('regencies')->result();
		// $kabupaten = $this->m_anggota->read_all()->result();

		$data = array(
			'page' => 'user/edit',
			'edit_user' => $edit_user,
			'role' => $role,
			'province' => $province,
			'regencies' => $regencies,
			// 'kabupaten' => $kabupaten,

		);

			$this->load->view('layout/wrapper', $data);

	}

	function verif_anggota(){
		$id_user = $_GET['id_user'];
		$status = 1;

		$data = array(
			'aktif' 	=> $status,
			'password' 	=> md5('password')
		);

		$where = array(
			'id_user' => $id_user
		);
		$this->m_users->verif_data($where,$data,'users');

		echo 'succeed';
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

	function update(){
		$config['upload_path'] = './assets/dashboard/dist/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000'; //in kb

		$this->upload->initialize($config);

		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$hp = $this->input->post('hp');
		$instansi = $this->input->post('instansi');
		$provinsi = $this->input->post('provinsi');
		$kabupaten = $this->input->post('kabupaten');
		$username = $this->input->post('username');
		$pass = md5($this->input->post('pass'));
		// $pass = md5($this->input->post('pass'));
		$role = $this->input->post('role');
		$no_gudep = $this->input->post('no_gudep');
		$alamat = $this->input->post('alamat');
		$instansi = $this->input->post('instansi');
		// $telp = $this->input->post('telp');
		// $email = $this->input->post('email');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d H:i:s');
		$this->upload->do_upload('image');
		$imagepp = $this->upload->data('file_name');

		if($imagepp == "")
		{
			$data = array(
				// 'fullname'		=> $fulname,
				'username' 		=> $username,
				'password'		=> $pass,
				// 'password'		=> $pass,
				'role'  		=> $role,
				// 'keterangan'  	=> $keterangan,
				'no_gudep'  		=> $no_gudep,
				'alamat'  		=> $alamat,
				'nama' 		=> $nama,
				'hp' 		=> $hp,
				'instansi'			=> $instansi,
				'provinsi'  						=> $provinsi,
				'kabupaten'  						=> $kabupaten,
				'instansi'			=> $instansi,
				// 'email'  		=> $email,
				// 'updated_at'    => $date
			);
			$where = array(
				'id_user' => $id_user
			);
			$this->m_users->update_data($where,$data,'users');
			redirect('Dashboard/admin/data/user/list');
		}else{
			$data = array(
				'username' 		=> $username,
				'password'		=> $pass,
				// 'password'		=> $pass,
				'role'  		=> $role,
				// 'keterangan'  	=> $keterangan,
				'no_gudep'  		=> $no_gudep,
				'alamat'  		=> $alamat,
				'nama' 		=> $nama,
				'hp' 		=> $hp,
				'instansi'			=> $instansi,
				'provinsi'  						=> $provinsi,
				'kabupaten'  						=> $kabupaten,
				'instansi'			=> $instansi,
				// 'email'  		=> $email,
				// 'updated_at'    => $date
			);
			$where = array(
				'id_user' => $id_user
			);
			$this->m_users->update_data($where,$data,'users');
			redirect('Dashboard/admin/data/user/list');
		}
	}
}
