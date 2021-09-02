<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_users');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->library('Excel');

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



  public function galeri()
  {	
  	$where= array(
 		 	'id_user' => $this->session->userdata('id_user')
 	 	);
  	$data['gambar']=$this->m_users->getData('tb_galeri',$where);
  	$this->load->view('layout/header');
  	$this->load->view('galeri',$data);
  	// $this->load->view('layout/MenuNav');
  	$this->load->view('layout/footer');
  }

  public function upload_galeri()
  {	

  	$acara=$this->input->post('acara');
  	 $fileName = time().$_FILES['file']['name'];
          
        $config['upload_path'] = './assets/galeri'; //path upload
        $config['file_name'] = $fileName;  // nama file
        // $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['allowed_types'] = 'png|jpg'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
 
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
          
        if($this->upload->do_upload('file') ){

            $date = new DateTime("now");
			$timestamp = $date->format('Y-m-d h:m:s');

			$id_user = $this->session->userdata('id_user');

        	$data_user = array(
				'id_user' 		=> $id_user,
				'gambar'  		=> $fileName,
				'waktu_input'  		=> $timestamp,
				'nama_acara'  		=> $acara,
				);
			$this->m_users->input_data($data_user,'tb_galeri');
            $this->session->set_flashdata('sukses','sukses');			
        	redirect('Dashboard/admin/galeri');
        }else{

            $this->session->set_flashdata('gagal','gagal');
        	 redirect('Dashboard/admin/galeri');
        }
  }

  public function import()
  {	

  	$this->load->view('layout/header');
  	$this->load->view('data/import');
  	// $this->load->view('layout/MenuNav');
  	$this->load->view('layout/footer');
  }

public function import_dataa()
  {

		$config = array(
			'upload_path'   => FCPATH.'upload/',
			'allowed_types' => 'xls|csv'
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {

			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$data_excel[$i - 1]['nama']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['jurusan']   = $sheets['cells'][$i][2];
				$data_excel[$i - 1]['angkatan'] = $sheets['cells'][$i][3];
			}

			$this->db->insert_batch('data', $data_excel);
			// @unlink($data['full_path']);
			redirect('excel-import');
		}
  }

  public function import_data()
  {

        $fileName = $_FILES['file']['name'];
          
        $config['upload_path'] = './assets/import_data'; //path upload
        $config['file_name'] = $fileName;  // nama file
        // $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['allowed_types'] = 'xls'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
 
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
          
        if(! $this->upload->do_upload('file') ){
            // echo $this->upload->display_errors();exit();
            $this->session->set_flashdata('gagal','gagal');
            redirect('Dashboard/admin/import');
        }else{

            $this->session->set_flashdata('sukses','sukses');
        }
              
        $inputFileName = './assets/import_data/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
 
                 // Sesuaikan key array dengan nama kolom di database                                                         
                //  $data = array(
                //     "nama"=> $rowData[0][0],
                //     "jurusan"=> $rowData[0][1],
                //     "angkatan"=> $rowData[0][2]
                // );
 
                // $insert = $this->db->insert("data",$data);
                $date = new DateTime("now");
				$timestamp = $date->format('Y-m-d h:m:s');

                    $var  = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][9],'YYYY-MM-DD' );
					// print_r);
					// die();
					// $nia="'".$rowData[0][1];
					// $nik="'".$rowData[0][33];
					$string = "8912371963922";
					$nia = preg_replace("/'/", "", $rowData[0][1]);
					$nik = preg_replace("/'/", "", $rowData[0][33]);

                $data = array(
                    "urut"=> $rowData[0][0],
                    "nia"=> $nia,
                    "no_gudep"=> $rowData[0][2],
                    "nama_depan"=> $rowData[0][3],
                    "nama_tengah"=> $rowData[0][4],
                    "nama_belakang"=> $rowData[0][5],
                    "agama"=> $rowData[0][6],
                    "golongan_darah"=> $rowData[0][7],
                    "tempat_lahir"=> $rowData[0][8],
                    "tanggal_lahir"=> $var,
                    "usia"=> $rowData[0][10],
                    "no_hp"=> $rowData[0][11],
                    "alamat"=> $rowData[0][12],
                    "jk"=> $rowData[0][13],
                    "waktu"=> $timestamp,
                    "nama_organisasi1"=> $rowData[0][14],
                    "jabatan1"=> $rowData[0][15],
                    "tahun1"=> $rowData[0][16],
                    "nama_organisasi2"=> $rowData[0][17],
                    "jabatan2"=> $rowData[0][18],
                    "tahun2"=> $rowData[0][19],
                    "nama_organisasi3"=> $rowData[0][20],
                    "jabatan3"=> $rowData[0][21],
                    "tahun3"=> $rowData[0][22],
                    "aktif"=> 0,
                    "golongan"=> $rowData[0][23],
                    "provinsi"=> $rowData[0][24],
                    "kabupaten"=> $rowData[0][25],
                    "kecamatan"=> $rowData[0][26],
                    "desa"=> $rowData[0][27],
                    "aktifitas_organisasi"=> $rowData[0][28],
                    "image"=> $rowData[0][29],
                    "qr_code"=> $rowData[0][30],
                    "nisn"=> $rowData[0][31],
                    "pangkalan"=> $rowData[0][32],
                    "nik"=> $nik,
                    "print"=> 0,
                    "visible"=> 1,
                    "rt"=> $rowData[0][34],
                    "rw"=> $rowData[0][35],
                    "emoney"=> $rowData[0][36],
                    "status_perkawinan"=> $rowData[0][37],
                );
 
                // $insert = $this->db->insert("tb_pramuka",$data);
                 $insert_query = $this->db->insert_string('tb_pramuka', $data);
			    $insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
			    $this->db->query($insert_query);
			    unlink($inputFileName); 
                      
            }
            redirect('Dashboard/admin/import');
  }

  public function export_data()
  {

  // 		$string = "8912371963922";
		// $result = preg_replace("/'/", "", $string);
  //       	print_r($result);
  //       	die();
  	// create file name
        $listInfo = $this->m_users->getDataall();

        // foreach ($listInfo as $list) {
        	
        // }
        $this->load->library('excel');
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header

         $color = array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'A5A5A5')
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
        
        // $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($color);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Urut');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'NIA');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Nomor Gudep'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Nama Depan');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Nama Tengah');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Nama Belakang'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Agama');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Golongan Darah');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Tempat Lahir');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Tanggal Lahir');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Usia');       
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'No HP'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Alamat');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Jenis Kelamin');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Waktu Input');
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Nama Organisasi 1');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'jabatan');
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Tahun');      
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Nama Organisasi 2');
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Jabatan');
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Tahun');     
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Nama Organisasi 3');
        $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Jabatan');
        $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Tahun');  
        $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Golongan');
        $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Provinsi'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Kabupaten');
        $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'kecamatan');
        $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Desa');
        $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'aktifitas_organisasi');
        $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Image');
        $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Qr COde');
        $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'NISN');        
        $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Pangkalan');
        $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'NIK');  
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'RT');
        $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'RW');
        $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Emoney');
        $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Status Perkawinan');    
        // set Row
        $rowCount = 2;

		
        foreach ($listInfo as $list) {
        	$nia="'".$list->nia;
		$nik="'".$list->nik;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->urut);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $nia);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->no_gudep);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->nama_depan);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->nama_tengah);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->nama_belakang);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->agama);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->golongan_darah);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->tempat_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->tanggal_lahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->usia);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->no_hp);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->alamat);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list->jk);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $list->waktu);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $list->nama_organisasi1);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $list->jabatan1);
            $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $list->tahun1);
            $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $list->nama_organisasi2);
            $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $list->jabatan2);
            $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $list->tahun2);
            $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $list->nama_organisasi3);
            $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $list->jabatan3);
            $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $list->tahun3);
            $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $list->golongan);
            $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $list->provinsi);
            $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $list->kabupaten);
            $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $list->kecamatan);
            $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $list->desa);
            $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $list->aktifitas_organisasi);
            $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $list->image);
            $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $list->qr_code);
            $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $list->nisn);
            $objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $list->pangkalan);
            $objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, $nik);
            $objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, $list->rt);
            $objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $list->rw);
            $objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $list->emoney);
            $objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $list->status_perkawinan);
            $rowCount++;
        }
  		// die();
        $filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');  

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
  }
  public function export()
  {
  	$this->load->view('layout/header');
  	$this->load->view('data/export');
  	$this->load->view('layout/footer');

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
