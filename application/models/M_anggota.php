<?php

class M_Anggota extends CI_Model
{
	function read($table){
		$this->db->get($table);
	}

	// function read_anggota($where)
	// {
	// 	$this->db->select('tb_anggota.id AS id,tb_anggota.nama AS nama, tb_anggota.tanggal_lahir AS tanggal_lahir, tb_anggota.tempat_lahir AS tempat_lahir, tb_anggota.alamat, tb_anggota.tempat_lahir, tb_jk.jk AS jk, tb_status.status AS status, regencies.name as kabupaten, districts.name as kecamatan, villages.name as desa, tb_banom.banom, tb_disabilitas.disabilitas, tb_jamkes.jamkes, tb_jk.jk, tb_pekerjaan.pekerjaan, tb_pendapatan.pendapatan, tb_pendidikan.pendidikan, tb_penyakit.penyakit, tb_status.status, tb_rumah.rumah, no_anggota, nik, waktu, image, rt, rw, qr_code, visible,usia, no_hp')
	// 	->from('tb_anggota')
	// 	->where($where)
	// 	->join('tb_jk','tb_anggota.jk = tb_jk.id','left')
	// 	->join('tb_status','tb_anggota.status = tb_status.id')
	// 	->join('tb_banom','tb_anggota.banom = tb_banom.id')
	// 	->join('tb_pekerjaan','tb_anggota.pekerjaan = tb_pekerjaan.id')
	// 	->join('tb_jamkes','tb_anggota.jamkes = tb_jamkes.id')
	// 	->join('tb_pendidikan','tb_anggota.pendidikan = tb_pendidikan.id')
	// 	->join('tb_pendapatan','tb_anggota.pendapatan = tb_pendapatan.id')
	// 	->join('tb_rumah','tb_anggota.rumah = tb_rumah.id')
	// 	->join('tb_penyakit','tb_anggota.penyakit = tb_penyakit.id')
	// 	->join('tb_disabilitas','tb_anggota.disabilitas = tb_disabilitas.id')
	// 	->join('villages','tb_anggota.desa = villages.id')
	// 	->join('districts','tb_anggota.kecamatan = districts.id')
	// 	->join('regencies','tb_anggota.kabupaten = regencies.id');
	//
	// 	$query = $this->db->get();
	// 		return $query;
	// }

// 	SELECT tb_anggota.id AS id,tb_anggota.nama AS nama, tb_anggota.tanggal_lahir AS tanggal_lahir, tb_anggota.tempat_lahir AS tempat_lahir, tb_anggota.alamat, tb_jk.jk AS jenis_kelamin, tb_status.status AS status, nu_pc.nama as kabupaten, nu_mwc.nama as kecamatan, nu_pr.nama as desa, tb_banom.banom, tb_disabilitas.disabilitas, tb_jamkes.jamkes, tb_jk.jk, tb_pekerjaan.pekerjaan, tb_pendapatan.pendapatan, tb_pendidikan.pendidikan, tb_penyakit.penyakit, tb_status.status, tb_rumah.rumah, no_anggota, nik, waktu, image, rt, rw, qr_code, visible,usia, no_hp, active
// FROM `tb_anggota`
// LEFT JOIN tb_jk ON tb_anggota.jk = tb_jk.id
// LEFT JOIN tb_status ON tb_anggota.status = tb_status.id
// LEFT JOIN tb_banom ON tb_anggota.banom = tb_banom.id
// LEFT JOIN tb_pekerjaan ON tb_anggota.pekerjaan = tb_pekerjaan.id
// LEFT JOIN tb_jamkes ON tb_anggota.jamkes = tb_jamkes.id
// LEFT JOIN tb_pendidikan ON tb_anggota.pendidikan = tb_pendidikan.id
// LEFT JOIN tb_pendapatan ON tb_anggota.pendapatan = tb_pendapatan.id
// LEFT JOIN tb_rumah ON tb_anggota.rumah = tb_rumah.id
// LEFT JOIN tb_penyakit ON tb_anggota.penyakit = tb_penyakit.id
// LEFT JOIN tb_disabilitas ON tb_anggota.disabilitas = tb_disabilitas.id
// LEFT JOIN nu_pr ON tb_anggota.desa = nu_pr.id
// LEFT JOIN nu_mwc ON tb_anggota.kecamatan = nu_mwc.id
// LEFT JOIN nu_pc ON tb_anggota.kabupaten = nu_pc.id

	function read_anggota($address,$where,$wherein=''){
    $this->db->select('*,tb_pramuka.id AS id,no_gudep,nama_depan,tb_agama.agama AS agama,golongan_darah, tempat_lahir,tanggal_lahir,usia,no_hp,alamat,tb_jk.jk AS jk,villages.nama AS desa,districts.nama AS kecamatan,regencies.nama AS kabupaten,province.nama AS provinsi,waktu ,nama_organisasi1,status_perkawinan,jabatan1,tahun1,nama_organisasi2,jabatan2,tahun2,nama_organisasi3,jabatan3,tahun3,aktif,tb_golongan.golongan AS golongan,aktifitas_organisasi,image,qr_code,nia,nisn,pangkalan,print,nik,rt,rw,visible,tb_emoney.emoney AS emoney')
		->from('tb_pramuka')
		->where($address)
		->where($where);
	if($wherein !='' ){
		// print_r($wherein);die();
		$this->db->where_in('tb_pramuka.admin',$wherein);} 
	$this->db->order_by('waktu', 'DESC')
	->join('tb_jk','tb_pramuka.jk = tb_jk.id','left')
	->join('tb_agama','tb_pramuka.agama = tb_agama.id','left')
	->join('tb_golongan','tb_pramuka.golongan = tb_golongan.id','left')
	->join('tb_kelas','tb_pramuka.kelas = tb_kelas.id_kelas','left')
	
	
	// ->join('tb_status','tb_anggota.status = tb_status.id','left')
	// ->join('tb_banom','tb_anggota.banom = tb_banom.id','left')
		// ->join('tb_pekerjaan','tb_anggota.pekerjaan = tb_pekerjaan.id','left')
		// ->join('tb_jamkes','tb_anggota.jamkes = tb_jamkes.id','left')
		// ->join('tb_pendidikan','tb_anggota.pendidikan = tb_pendidikan.id','left')
		// ->join('tb_pendapatan','tb_anggota.pendapatan = tb_pendapatan.id','left')
		// ->join('tb_rumah','tb_anggota.rumah = tb_rumah.id','left')
		// ->join('tb_penyakit','tb_anggota.penyakit = tb_penyakit.id','left')
		// ->join('tb_disabilitas','tb_anggota.disabilitas = tb_disabilitas.id','left')
		->join('villages','tb_pramuka.desa = villages.id','left')
		->join('districts','tb_pramuka.kecamatan= districts.id','left')
		->join('regencies','tb_pramuka.kabupaten = regencies.id','left')
		->join('province','tb_pramuka.provinsi = province.id','left')
		->join('tb_emoney','tb_pramuka.emoney = tb_emoney.id','left');
		
		$query = $this->db->get();
		// print_r($this->db->last_query());die();
		return $query;
	}
	
	function read_qr($where){
		$this->db->select('tb_pramuka.id AS id,no_gudep,nama_depan,tb_agama.agama AS agama,golongan_darah, tempat_lahir,tanggal_lahir,usia,no_hp,alamat,tb_jk.jk AS jk,villages.nama AS desa,districts.nama AS kecamatan,regencies.nama AS kabupaten,province.nama AS provinsi,waktu ,nama_organisasi1,status_perkawinan,jabatan1,tahun1,nama_organisasi2,jabatan2,tahun2,nama_organisasi3,jabatan3,tahun3,aktif,tb_golongan.golongan AS golongan,aktifitas_organisasi,image,qr_code,nia,nisn,pangkalan,print,nik,rt,rw,visible,tb_emoney.emoney AS emoney')
		->from('tb_pramuka')
		// 		->where($address)
		->where($where)
		->order_by('waktu', 'DESC')
		->join('tb_jk','tb_pramuka.jk = tb_jk.id','left')
		->join('tb_agama','tb_pramuka.agama = tb_agama.id','left')
		->join('tb_golongan','tb_pramuka.golongan = tb_golongan.id','left')
		
		
		// ->join('tb_status','tb_anggota.status = tb_status.id','left')
		// ->join('tb_banom','tb_anggota.banom = tb_banom.id','left')
		// ->join('tb_pekerjaan','tb_anggota.pekerjaan = tb_pekerjaan.id','left')
		// ->join('tb_jamkes','tb_anggota.jamkes = tb_jamkes.id','left')
		// ->join('tb_pendidikan','tb_anggota.pendidikan = tb_pendidikan.id','left')
		// ->join('tb_pendapatan','tb_anggota.pendapatan = tb_pendapatan.id','left')
		// ->join('tb_rumah','tb_anggota.rumah = tb_rumah.id','left')
		// ->join('tb_penyakit','tb_anggota.penyakit = tb_penyakit.id','left')
		// ->join('tb_disabilitas','tb_anggota.disabilitas = tb_disabilitas.id','left')
    ->join('villages','tb_pramuka.desa = villages.id','left')
    ->join('districts','tb_pramuka.kecamatan= districts.id','left')
    ->join('regencies','tb_pramuka.kabupaten = regencies.id','left')
    ->join('province','tb_pramuka.provinsi = province.id','left')
		->join('tb_emoney','tb_pramuka.emoney = tb_emoney.id','left');

		$query = $this->db->get();
			return $query;
	}

  function read_all()
	{
		$this->db->select('tb_pramuka.id AS id,no_gudep,nama_depan,tb_agama.agama AS agama,golongan_darah, tempat_lahir,tanggal_lahir,usia,no_hp,alamat,tb_jk.jk AS jk,villages.nama AS desa,districts.nama AS kecamatan,regencies.nama AS kabupaten,province.nama AS provinsi,waktu ,nama_organisasi1,jabatan1,tahun1,nama_organisasi2,jabatan2,tahun2,nama_organisasi3,jabatan3,tahun3,aktif,tb_golongan.golongan as golongan,aktifitas_organisasi,image,qr_code,nia,nisn,pangkalan,print,nik,rt,rw,tb_emoney.emoney AS emoney')
		->from('tb_pramuka')
		// ->where($where)
		->order_by('waktu', 'DESC')
		->join('tb_jk','tb_pramuka.jk = tb_jk.id','left')
		->join('tb_agama','tb_pramuka.agama = tb_agama.id','left')
		->join('tb_golongan','tb_pramuka.golongan = tb_golongan.id','left')

		// ->join('tb_status','tb_anggota.status = tb_status.id','left')
		// ->join('tb_banom','tb_anggota.banom = tb_banom.id','left')
		// ->join('tb_pekerjaan','tb_anggota.pekerjaan = tb_pekerjaan.id','left')
		// ->join('tb_jamkes','tb_anggota.jamkes = tb_jamkes.id','left')
		// ->join('tb_pendidikan','tb_anggota.pendidikan = tb_pendidikan.id','left')
		// ->join('tb_pendapatan','tb_anggota.pendapatan = tb_pendapatan.id','left')
		// ->join('tb_rumah','tb_anggota.rumah = tb_rumah.id','left')
		// ->join('tb_penyakit','tb_anggota.penyakit = tb_penyakit.id','left')
		// ->join('tb_disabilitas','tb_anggota.disabilitas = tb_disabilitas.id','left')
		->join('villages','tb_pramuka.desa = villages.id','left')
		->join('districts','tb_pramuka.kecamatan= districts.id','left')
		->join('regencies','tb_pramuka.kabupaten = regencies.id','left')
		->join('province','tb_pramuka.provinsi = province.id','left')
		->join('tb_emoney','tb_pramuka.emoney = tb_emoney.id','left');

		$query = $this->db->get();
			return $query;
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_urut($kabupaten){
		$sql = "SELECT MAX(urut) as no FROM tb_pramuka WHERE kabupaten = '$kabupaten'";
		$query = $this->db->query($sql);
		return $query;
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hapus_data_soft($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function verif_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// function get_kab($id,$kabupaten){
	// 	$sql = "SELECT regencies.name as nama
	// 			FROM tb_anggota
  //       LEFT JOIN regencies
  //       ON tb_anggota.kabupaten = regencies.id
  //       WHERE kabupaten = '$kabupaten' AND tb_anggota.id = '$id' ";
 	// 	$query = $this->db->query($sql);
	//     return $query;
	// }
	// function get_kec($id,$kecamatan){
	// 	$sql = "SELECT districts.name as nama
	// 			FROM tb_anggota
  //       LEFT JOIN districts
  //       ON tb_anggota.kecamatan = districts.id
  //       WHERE kecamatan = '$kecamatan' AND tb_anggota.id = '$id' ";
 	// 	$query = $this->db->query($sql);
	//     return $query;
	// }
	// function get_des($id,$desa){
	// 	$sql = "SELECT villages.name as nama
	// 			FROM tb_anggota
  //       LEFT JOIN villages
  //       ON tb_anggota.desa = villages.id
  //       WHERE desa = '$desa' AND tb_anggota.id = '$id' ";
 	// 	$query = $this->db->query($sql);
	//     return $query;
	// }
	function get_kab($id,$kabupaten){
		$sql = "SELECT regencies.nama as kabupaten
				FROM tb_pramuka
				LEFT JOIN regencies
				ON tb_pramuka.kabupaten = regencies.id
				WHERE kabupaten = '$kabupaten' AND tb_pramuka.id = '$id' ";
		$query = $this->db->query($sql);
			return $query;
	}
	function get_kec($id,$kecamatan){
		$sql = "SELECT districts.nama as kecamatan
				FROM tb_pramuka
				LEFT JOIN districts
				ON tb_pramuka.kecamatan = districts.id
				WHERE kecamatan = '$kecamatan' AND tb_pramuka.id = '$id' ";
		$query = $this->db->query($sql);
			return $query;
	}
	function get_des($id,$desa){
		$sql = "SELECT villages.nama as desa
				FROM tb_pramuka
				LEFT JOIN villages
				ON tb_pramuka.desa = villages.id
				WHERE desa = '$desa' AND tb_pramuka.id = '$id' ";
	}
}
