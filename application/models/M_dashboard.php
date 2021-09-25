<?php

class M_Dashboard extends CI_Model
{

	function char(){
		$this->db->select('DATE(waktu) as waktu, count(*) as total');
 		$this->db->from('tb_pramuka');
 		// $this->db->join('districts','tb_anggota.kecamatan = districts.id', 'left');
 		$this->db->group_by('DATE(waktu)');
 		$query = $this->db->get();
		return $query->result();
	}

	// function get_total($address,$where){
	// 	$this->db->select('DATE(waktu) as waktu, count(*) as total');
	// 	$this->db->where($address);
 // 		$this->db->where($where);
 // 		$this->db->from('tb_pramuka');
 // 		// $this->db->join('districts','tb_anggota.kecamatan = districts.id', 'left');
 // 		$this->db->group_by('DATE(waktu)');
 // 		$query = $this->db->get();
	// 		return $query;
	// }

	function get_total(){
		$address = $this->session->userdata('where');
			$where= array(
				// 'aktif' => 1,
				'visible' => 1,
			);
		$this->db->select('DATE(waktu) as waktu, count(*) as total');
		$this->db->where($address);
 		$this->db->where($where);
 		$this->db->from('tb_pramuka');
 		// $this->db->join('districts','tb_anggota.kecamatan = districts.id', 'left');
 		$this->db->group_by('DATE(waktu)');
 		$query = $this->db->get();
			return $query->result();
	}

	// function get_golongan($address,$where){
	// 	$this->db->select('tb_golongan.golongan, count(*) as total');
	// 	$this->db->where($address);
 // 		$this->db->where($where);
 // 		$this->db->from('tb_pramuka');
 // 		$this->db->join('tb_golongan','tb_pramuka.golongan = tb_golongan.id', 'left');
 // 		$this->db->group_by('golongan');
 // 		$query = $this->db->get();
	// 		return $query;
	// }

	function get_golongan(){
		$address = $this->session->userdata('where');
			$where= array(
				'aktif' => 1,
				'visible' => 1,
			);
		$this->db->select('tb_golongan.golongan, count(*) as total');
		$this->db->where($address);
 		$this->db->where($where);
 		$this->db->from('tb_pramuka');
 		$this->db->join('tb_golongan','tb_pramuka.golongan = tb_golongan.id', 'left');
 		$this->db->group_by('golongan');
 		$query = $this->db->get();
			return $query->result();
	}

	// function get_jk($address,$where){
	// 	$this->db->select('tb_jk.jk, count(*) as total');
	// 	$this->db->where($address);
 // 		$this->db->where($where);
 // 		$this->db->from('tb_pramuka');
 // 		$this->db->join('tb_jk','tb_pramuka.jk = tb_jk.id', 'left');
 // 		$this->db->group_by('jk');
 // 		$query = $this->db->get();
	// 		return $query;
	// }

	function get_jk(){
		$address = $this->session->userdata('where');
			$where= array(
				'aktif' => 1,
				'visible' => 1,
			);
		$this->db->select('tb_jk.jk, count(*) as total');
		$this->db->where($address);
 		$this->db->where($where);
 		$this->db->from('tb_pramuka');
 		$this->db->join('tb_jk','tb_pramuka.jk = tb_jk.id', 'left');
 		$this->db->group_by('jk');
 		$query = $this->db->get();
			return $query->result();
	}

	function get_total_des($where){
		$this->db->select('villages.name, count(*) as total');
 		$this->db->where($where);
 		$this->db->from('tb_anggota');
 		$this->db->join('villages','tb_anggota.desa = villages.id', 'right');
 		$this->db->group_by('name');
 		$query = $this->db->get();
			return $query;
	}

	// function get_emoney($address,$where){
	// 	$this->db->select('tb_emoney.emoney, count(*) as total');
	// 	$this->db->where($address);
 // 		$this->db->where($where);
 // 		$this->db->from('tb_pramuka');
 // 		$this->db->join('tb_emoney','tb_pramuka.emoney = tb_emoney.id', 'left');
 // 		$this->db->group_by('emoney');
 // 		$query = $this->db->get();
	// 		return $query;
	// }

	function get_emoney(){
		$address = $this->session->userdata('where');
			$where= array(
				'aktif' => 1,
				'visible' => 1,
			);
		$this->db->select('tb_emoney.emoney, count(*) as total');
		$this->db->where($address);
 		$this->db->where($where);
 		$this->db->from('tb_pramuka');
 		$this->db->join('tb_emoney','tb_pramuka.emoney = tb_emoney.id', 'left');
 		$this->db->group_by('emoney');
 		$query = $this->db->get();
			return $query->result();
	}

	function get_banom($where){
		$this->db->select('tb_banom.banom, count(*) as total');
		$this->db->where($where);
		$this->db->from('tb_anggota');
		$this->db->join('tb_banom','tb_anggota.banom = tb_banom.id', 'left');
		$this->db->group_by('banom');
		$query = $this->db->get();
			return $query;
	}

	function get_ranting($where){
		$this->db->select('nu_pr.nama, count(*) as total');
 		$this->db->where($where);
 		$this->db->from('tb_anggota');
 		$this->db->join('nu_pr','tb_anggota.desa = nu_pr.id', 'left');
 		$this->db->group_by('desa');
 		$query = $this->db->get();
			return $query;
	}

	function get_cabang($where){
		$this->db->select('nu_mwc.nama, count(*) as total');
 		$this->db->where($where);
 		$this->db->from('tb_anggota');
 		$this->db->join('nu_mwc','tb_anggota.kecamatan = nu_mwc.id', 'left');
 		$this->db->group_by('kecamatan');
 		$query = $this->db->get();
			return $query;
	}



	function get_agama($where){
		$this->db->select('tb_agama.agama, count(*) as total');
 		$this->db->where($where);
 		$this->db->from('tb_pramuka');
 		$this->db->join('tb_agama','tb_pramuka.agama = tb_agama.id', 'left');
 		$this->db->group_by('agama');
 		$query = $this->db->get();
			return $query;
	}

	function get_provinsi(){
		$this->db->select('province.nama, count(*) as total');
 		// $this->db->where($where);
 		$this->db->from('tb_pramuka');
 		$this->db->join('province','tb_pramuka.provinsi = province.id', 'left');
 		$this->db->group_by('provinsi');
 		$query = $this->db->get();
			return $query;
	}


	function get_status($where){
		$this->db->select('tb_status.status, count(*) as total');
 		$this->db->where($where);
 		$this->db->from('tb_anggota');
 		$this->db->join('tb_status','tb_anggota.status = tb_status.id', 'left');
 		$this->db->group_by('status');
 		$query = $this->db->get();
			return $query;
	}

	function get_disabilitas($where){
		$this->db->select('tb_disabilitas.disabilitas, count(*) as total');
 		$this->db->where($where);
 		$this->db->from('tb_anggota');
 		$this->db->join('tb_disabilitas','tb_anggota.disabilitas = tb_disabilitas.id', 'left');
 		$this->db->group_by('disabilitas');
 		$query = $this->db->get();
			return $query;
	}

	function get_jamkes($where){
		$this->db->select('tb_jamkes.jamkes, count(*) as total');
		$this->db->where($where);
		$this->db->from('tb_anggota');
		$this->db->join('tb_jamkes','tb_anggota.jamkes = tb_jamkes.id', 'left');
		$this->db->group_by('jamkes');
		$query = $this->db->get();
			return $query;
	}

	function get_pekerjaan($where){
		$this->db->select('tb_pekerjaan.pekerjaan, count(*) as total');
		$this->db->where($where);
		$this->db->from('tb_anggota');
		$this->db->join('tb_pekerjaan','tb_anggota.pekerjaan = tb_pekerjaan.id', 'left');
		$this->db->group_by('pekerjaan');
		$query = $this->db->get();
			return $query;
	}

	function get_pendapatan($where){
		$this->db->select('tb_pendapatan.pendapatan, count(*) as total');
		$this->db->where($where);
		$this->db->from('tb_anggota');
		$this->db->join('tb_pendapatan','tb_anggota.pendapatan = tb_pendapatan.id', 'left');
		$this->db->group_by('pendapatan');
		$query = $this->db->get();
			return $query;
	}

	function get_pendidikan($where){
		$this->db->select('tb_pendidikan.pendidikan, count(*) as total');
		$this->db->where($where);
		$this->db->from('tb_anggota');
		$this->db->join('tb_pendidikan','tb_anggota.pendidikan = tb_pendidikan.id', 'left');
		$this->db->group_by('pendidikan');
		$query = $this->db->get();
			return $query;
	}

	function get_penyakit($where){
		$this->db->select('tb_penyakit.penyakit, count(*) as total');
		$this->db->where($where);
		$this->db->from('tb_anggota');
		$this->db->join('tb_penyakit','tb_anggota.penyakit = tb_penyakit.id', 'left');
		$this->db->group_by('penyakit');
		$query = $this->db->get();
			return $query;
	}

	function get_rumah($where){
		$this->db->select('tb_rumah.rumah, count(*) as total');
		$this->db->where($where);
		$this->db->from('tb_anggota');
		$this->db->join('tb_rumah','tb_anggota.rumah = tb_rumah.id', 'left');
		$this->db->group_by('rumah');
		$query = $this->db->get();
			return $query;
	}

	// function get_rumah(){
	// 	$sql = "
	// 	SELECT  COUNT(*) AS total, tb_rumah.rumah
	// 	FROM tb_anggota
  //       LEFT JOIN tb_rumah
  //       ON tb_anggota.rumah = tb_rumah.id
	// 	GROUP BY rumah";
 	// 	$query = $this->db->query($sql);
	//     return $query;
	// }
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

	function edit_data($where,$table){
	return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
