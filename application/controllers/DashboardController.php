<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

    $this->load->model('m_dashboard');
		$this->load->model('m_anggota');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login")
		{
			redirect("/");
		}
	}

    public function changedata()
    {
        $where = array(
            'admin' => $this->input->post('users')
        );
        $this->session->set_userdata('where', $where);
        $this->session->set_userdata('users_id', $this->input->post('users'));

        redirect('Dashboard/admin/');
    }

	public function index()
	{
		$date = new DateTime("now");
		$timestamp = $date->format('Y-m-d');

		$address = $this->session->userdata('where');
		$where = array(
			'visible' => 1,
		);
		$anggota = $this->m_anggota->read_anggota($address, $where)->num_rows();
		$where = array(
			'aktif' => 0,
			'visible' => 1,
		);
		$unverif = $this->m_anggota->read_anggota($address, $where)->num_rows();
		$where = array(
			'aktif' => 1,
			'visible' => 1,
		);
		$verif =$this->m_anggota->read_anggota($address,$where)->num_rows();
		$where = array(
			'DATE(waktu)' => $timestamp,
			'aktif' => 1,
			'visible' => 1,
		);
		$today =$this->m_anggota->read_anggota($address,$where)->num_rows();

		// if ($this->session->userdata('role')==0){
		// 	$em = array(
		// 		'kabupaten' => $unlimit,
		// 		'emoney' => 1,
		// 		'visible' => 1,
		// 	);
		// 	$stamp = array(
		// 		'kabupaten' => $unlimit,
		// 		'DATE(waktu)' => $curr_date,
		// 		'visible' => 1,
		// 	);
		// 	$t_ranting = $this->m_dashboard->get_cabang($where)->result();
		// }elseif ($this->session->userdata('role')==1){
		// 	$em = array(
		// 		'kabupaten' => $unlimit,
		// 		'emoney' => 1,
		// 		'visible' => 1,
		// 	);
		// 	$stamp = array(
		// 		'kabupaten' => $unlimit,
		// 		'DATE(waktu)' => $curr_date,
		// 		'visible' => 1,
		// 	);
		// 	$t_ranting = $this->m_dashboard->get_cabang($where)->result();
		// }elseif ($this->session->userdata('role')==2) {
		// 	$em = array(
		// 		'kecamatan' => $unlimit,
		// 		'emoney' => 1,
		// 		'visible' => 1,
		// 	);
		// 	$stamp = array(
		// 		'kecamatan' => $unlimit,
		// 		'DATE(waktu)' => $curr_date,
		// 		'visible' => 1,
		// 	);
		// 	$t_ranting = $this->m_dashboard->get_ranting($where)->result();
		// }elseif ($this->session->userdata('role')==3) {
		// 	$em = array(
		// 		'desa' => $unlimit,
		// 		'emoney' => 1,
		// 		'visible' => 1,
		// 	);
		// 	$stamp = array(
		// 		'desa' => $unlimit,
		// 		'DATE(waktu)' => $curr_date,
		// 		'visible' => 1,
		// 	);
		// 	$t_ranting = $this->m_dashboard->get_ranting($where)->result();
		// }
		//
		// $today = $this->db->get_where('tb_anggota',$stamp)->num_rows();
		// $emoney = $this->db->get_where('tb_anggota',$em)->num_rows();




		$data=array(
			'title' =>'Manajemen Berita - Java Web Media',
			'page' =>'dashboard/homedashboard',
			'anggota' => $anggota,
			'unverif' => $unverif,
			'verif' => $verif,
			'today' => $today,
      // 'emoney' => $emoney,
			// 't_ranting' => $t_ranting,
		);
        $data['input'] = $this->m_dashboard->get_total();
        $data['golongan'] = $this->m_dashboard->get_golongan();
        $data['jk'] = $this->m_dashboard->get_jk();
        $data['emoney'] = $this->m_dashboard->get_emoney();
        $data['users'] = $this->db->get('users')->result();
		$this->load->view('layout/wrapper', $data);
	}

    public function chart()
    {
        $data['graph'] = $this->m_dashboard->char();
        $this->load->view('layout/header', $data);
        $this->load->view('chart', $data);
    }

   //  public function statistik_total()
   //  {
			// $address = $this->session->userdata('where');
			// $where= array(
			// 	'aktif' => 1,
			// 	'visible' => 1,
			// );
			// 	$data = $this->m_dashboard->get_total($address,$where)->result();

   //      $responce->cols[] = array(
   //          "id" => "",
   //          "label" => "Grafik Pendaftaran",
   //          "pattern" => "",
   //          "type" => "string"
   //      );
   //      $responce->cols[] = array(
   //          "id" => "",
   //          "label" => "Total",
   //          "pattern" => "",
   //          "type" => "number"
   //      );
   //      foreach($data as $cd)
   //          {
   //          $responce->rows[]["c"] = array(
   //              array(
   //                  "v" => "$cd->waktu",
   //                  "f" => null
   //              ) ,
   //              array(
   //                  //"v" => (int)$cd->total,
			// 							"v" => (int)$cd->total,
   //                  "f" => null
   //              )
   //          );
   //          }
   //      //echo json_encode($data);
   //      echo json_encode($responce);
   //  }

	public function statistik_jk()
	{
		$address = $this->session->userdata('where');
		$where= array(
			'aktif' => 1,
			'visible' => 1,
		);
		$data = $this->m_dashboard->get_jk($address,$where)->result();
		$responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->jk",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
		echo json_encode($responce);
	}

	public function statistik_emoney()
	{
		$address = $this->session->userdata('where');
		$where= array(
			'aktif' => 1,
			'visible' => 1,
		);
		$data = $this->m_dashboard->get_emoney($address,$where)->result();
		$responce->cols[] = array(
						"id" => "",
						"label" => "Jenis Kartu",
						"pattern" => "",
						"type" => "string"
				);
				$responce->cols[] = array(
						"id" => "",
						"label" => "Total",
						"pattern" => "",
						"type" => "number"
				);
				foreach($data as $cd)
						{
						$responce->rows[]["c"] = array(
								array(
										"v" => "$cd->emoney",
										"f" => null
								) ,
								array(
										"v" => (int)$cd->total,
										"f" => null
								)
						);
						}
		echo json_encode($responce);
	}

	public function statistik_agama()
	{
		$where = $this->session->userdata('where');
		$data = $this->m_dashboard->get_agama($where)->result();
		$responce->cols[] = array(
            "id" => "",
            "label" => "Agama",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->agama",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
		echo json_encode($responce);
	}

	public function statistik_provinsi()
	{
		$where = $this->session->userdata('where');
		$data = $this->m_dashboard->get_provinsi($where)->result();
		$responce->cols[] = array(
            "id" => "",
            "label" => "Provinsi",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->provinsi",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
		echo json_encode($responce);
	}

	public function statistik_golongan()
	{
		$address = $this->session->userdata('where');
		$where= array(
			'aktif' => 1,
			'visible' => 1,
		);
		$data = $this->m_dashboard->get_golongan($address,$where)->result();
		$responce->cols[] = array(
            "id" => "",
            "label" => "Golongan",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->golongan",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
		echo json_encode($responce);
	}

	public function statistik_status()
	{
		$where = $this->session->userdata('where');
		$data = $this->m_dashboard->get_status($where)->result();
		$responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->status",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
		echo json_encode($responce);
	}

    public function statistik_banom()
    {
				$where = $this->session->userdata('where');
        $data = $this->m_dashboard->get_banom($where)->result();
        $responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->banom",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
        echo json_encode($responce);
    }

     public function statistik_disabilitas()
    {
			$where = $this->session->userdata('where');
        $data = $this->m_dashboard->get_disabilitas($where)->result();
        $responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->disabilitas",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
        echo json_encode($responce);
    }

     public function statistik_jamkes()
    {
			$where = $this->session->userdata('where');
        $data = $this->m_dashboard->get_jamkes($where)->result();
        $responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->jamkes",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
        echo json_encode($responce);
    }

    public function statistik_pekerjaan()
    {
			$where = $this->session->userdata('where');
        $data = $this->m_dashboard->get_pekerjaan($where)->result();
        $responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->pekerjaan",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
        echo json_encode($responce);
    }

     public function statistik_pendapatan()
    {
			$where = $this->session->userdata('where');
        $data = $this->m_dashboard->get_pendapatan($where)->result();
        $responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->pendapatan",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
        echo json_encode($responce);
    }

     public function statistik_pendidikan()
    {
			$where = $this->session->userdata('where');
        $data = $this->m_dashboard->get_pendidikan($where)->result();
        $responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->pendidikan",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
        echo json_encode($responce);
    }

     public function statistik_penyakit()
    {
			$where = $this->session->userdata('where');
        $data = $this->m_dashboard->get_penyakit($where)->result();
        $responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->penyakit",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
        echo json_encode($responce);
    }
     public function statistik_rumah()
    {
			$where = $this->session->userdata('where');
        $data = $this->m_dashboard->get_rumah($where)->result();
        $responce->cols[] = array(
            "id" => "",
            "label" => "Jenis Kelamin",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Total",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $cd)
            {
            $responce->rows[]["c"] = array(
                array(
                    "v" => "$cd->rumah",
                    "f" => null
                ) ,
                array(
                    "v" => (int)$cd->total,
                    "f" => null
                )
            );
            }
        echo json_encode($responce);
    }



	public function dashbordv2()
	{
		$query = "";
		$data=array('title' =>'Manajemen Berita - Java Web Media',
					'content' =>$query,
					'page' =>'dashboard/dashboard'
						);
		$this->load->view('layout/wrapper', $data);
	}
}
