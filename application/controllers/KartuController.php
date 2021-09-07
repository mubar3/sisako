<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KartuController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_kartu');
		$this->load->model('m_anggota');
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
			'aktif' => 1,
		);
		$anggota = $this->m_anggota->read_anggota($address,$where)->result();
		// $kecamatan = $this->db->get('kecamatan')->result();

		$data=array('title'=>'Semua Data',
					'anggota' => $anggota,
					// 'kecamatan' => $kecamatan,
					'page'  =>'kartu/cetak'
						);
    $this->load->view('layout/wrapper', $data);
			// print_r($data);
  }

	public function filter()
  {
		//$where = $this->session->userdata('where');
		$nik = $this->uri->segment(6);
		$p = $this->uri->segment(7);
		if($p==2){
			$where=array(
						'nik' => $nik,
						'aktif' => 1,
						'visible'  => 1
							);
		}else {
			$where=array(
						'nik' => $nik,
						'aktif' => 1,
						'print' => $p,
						'visible'  => 1
							);
		}


		$anggota = $this->m_anggota->read_anggota($where)->result();
		foreach ($anggota as $d) {
			$filter = $d->desa;
		}

		$data=array('title'=> 'Filter',
					'anggota' => $anggota,
					'page'  =>'kartu/cetak'
						);
    $this->load->view('layout/wrapper', $data);
			// print_r($data);
  }

	function search_nik()
	    {
	        $nik    =   $this->input->post('nik');
	        $data['results']    =   $this->m_kartu->search($nik);
	        $this->load->view('layout/wrapper',$data);
	    }


	public function printed()
  {
		// $kab = $this->session->userdata('address');
		$address = $this->session->userdata('where');
		$where= array(
			'visible' => 1,
			'aktif' => 1,
			'print' => 1,
		);
		$anggota = $this->m_anggota->read_anggota($address,$where)->result();
		// $kecamatan = $this->db->get('nu_mwc')->result();

		$data=array('title'=>'Sudah Cetak',
					'anggota' => $anggota,
					// 'kecamatan' => $kecamatan,
					'page'  =>'kartu/cetak'
						);
    $this->load->view('layout/wrapper', $data);
			// print_r($data);
  }

	public function unprint()
  {
		// $kab = $this->session->userdata('address');
		$address = $this->session->userdata('where');
 	 $where= array(
 		 'visible' => 1,
 		 'aktif' => 1,
		 'print' => 0,
 	 );
		$anggota = $this->m_anggota->read_anggota($address,$where)->result();
		// $kecamatan = $this->db->get('nu_mwc')->result();
		//
		$data=array('title'=>'Belum Cetak',
					'anggota' => $anggota,
					// 'kecamatan' => $kecamatan,
					'page'  =>'kartu/cetak'
						);
    $this->load->view('layout/wrapper', $data);
			// print_r($data);
  }

	public function cetak()
  {
		$tes = $this->input->post("tes");
		$kartu = $this->input->post("kartu");

		echo $tes;
		echo $kartu;


		$where = $this->session->userdata('where');
		$anggota = $this->m_anggota->read_anggota($where)->result();

		$data_session = array(


			);
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kartu/kartu'
						);
		$this->session->set_userdata($data_session);
    	$this->load->view('kartu/kartu', $data);
  }
	public function cetak_select()
  {
		$kartu = $this->input->post('kartu');
		if ($kartu!=null) {
			$anggota = $this->m_kartu->read_kartu($kartu)->result();
			// code...
		}else {
			$where = $this->session->userdata('where');
			$anggota = $this->m_kartu->read_all_kartu($where)->result();
			// code...
		}
		//print_r($anggota);
		//print_r($kartu);
		$data=array('title'=>'Manajemen Berita - Java Web Media',
					'anggota' => $anggota,
					'page'  =>'kartu/kartu'
						);
    $this->load->view('kartu/kartu4', $data);
  }

	public function priew()
  {
		$kartu = $this->input->post('kartu');
		$anggota = $this->m_anggota->read_all()->result();
		$data = array('anggota' => $anggota,);
    $this->load->view('kartu/kartu4',$data);
  }

	public function cetak_kartu()
  {
		$address = $this->session->userdata('where');
		$where= array(
			'visible' => 1,
			'aktif' => 1,
		);
		$kartu = $this->input->post('kartu');
		$select = $this->input->post('select');
		if ($kartu!=null) {
			$anggota = $this->m_kartu->read_kartu($address,$kartu)->result();
			$data=array('anggota' => $anggota,
									// 'page'  =>'kartu/kartu'
									);
			if ($this->input->post('select')==1){
				$this->load->view('kartu/kartu4', $data);
			}elseif ($this->input->post('select')==3){
				$this->load->view('kartu/kartu6', $data);
			}else {
				$this->load->view('kartu/kartu7', $data);
			}

			$this->centang($kartu);
		}else {
			echo "Pilih data untuk dicetak";
		}
  }



	function centang($id){
		$status = 1;

		$data = array(
			'print' => $status
		);

		$where = $id;
		$this->m_kartu->centang($where,$data);

		// echo 'succeed';
		// redirect($_SERVER['HTTP_REFERER']);
	}

	public function priview()
	{
		$kartu = $this->input->post('kartu');
		if ($kartu!=null) {
			$anggota = $this->m_kartu->read_kartu($kartu)->result();
			// print_r($anggota);
			$data=array('anggota' => $anggota,
									// 'page'  =>'kartu/kartu'
									);

			// print_r($anggota);
			// print_r($kartu);
			// echo $this->input->post('kartu');

			$this->centang($kartu);
			if ($this->input->post('kartu')==1){
				$this->load->view('kartu/kartu4', $data);
			}else {
				$this->load->view('kartu/kartu7', $data);
			}
		}
	}

}
