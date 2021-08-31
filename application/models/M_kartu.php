<?php

class m_kartu extends CI_Model
{
	function read_kartu($address,$where)
	{
		$this->db->select('tb_pramuka.id AS id,no_gudep,nama_depan,nama_tengah,nama_belakang,tb_agama.agama AS agama,golongan_darah, tempat_lahir,tanggal_lahir,usia,no_hp,alamat,tb_jk.jk AS jk,villages.nama AS desa,districts.nama AS kecamatan,regencies.nama AS kabupaten,province.nama AS provinsi,waktu ,nama_organisasi1,jabatan1,tahun1,nama_organisasi2,jabatan2,tahun2,nama_organisasi3,jabatan3,tahun3,aktif,tb_golongan.golongan AS golongan,aktifitas_organisasi,image,qr_code,nia,nisn,nik,pangkalan,rt,rw,print,visible')
		->from('tb_pramuka')
		->where(array(
			'visible' => 1,
			'aktif' => 1,
		))
		->where($address)
		->where_in('tb_pramuka.id', $where)
		->order_by('waktu', 'DESC')
		->join('tb_jk','tb_pramuka.jk = tb_jk.id','left')
		->join('tb_agama','tb_pramuka.agama = tb_agama.id','left')
		->join('tb_golongan','tb_pramuka.golongan = tb_golongan.id','left')
		->join('villages','tb_pramuka.desa = villages.id','left')
		->join('districts','tb_pramuka.kecamatan= districts.id','left')
		->join('regencies','tb_pramuka.kabupaten = regencies.id','left')
		->join('province','tb_pramuka.provinsi = province.id','left');
		$query = $this->db->get();
			return $query;
	}
	function read_preview($where)
	{
		$this->db->select('tb_pramuka.id AS id,no_gudep,nama_depan,nama_tengah,nama_belakang,tb_agama.agama AS agama,golongan_darah, tempat_lahir,tanggal_lahir,usia,no_hp,alamat,tb_jk.jk AS jk,villages.nama AS desa,districts.nama AS kecamatan,regencies.nama AS kabupaten,province.nama AS provinsi,waktu ,nama_organisasi1,jabatan1,tahun1,nama_organisasi2,jabatan2,tahun2,nama_organisasi3,jabatan3,tahun3,aktif,tb_golongan.golongan AS golongan,aktifitas_organisasi,image,qr_code,nia,nisn,nik,pangkalan,rt,rw,print,visible')
		->from('tb_pramuka')
		->where($where)
		->order_by('waktu', 'DESC')
		->join('tb_jk','tb_pramuka.jk = tb_jk.id','left')
		->join('tb_agama','tb_pramuka.agama = tb_agama.id','left')
		->join('tb_golongan','tb_pramuka.golongan = tb_golongan.id','left')
		->join('villages','tb_pramuka.desa = villages.id','left')
		->join('districts','tb_pramuka.kecamatan= districts.id','left')
		->join('regencies','tb_pramuka.kabupaten = regencies.id','left')
		->join('province','tb_pramuka.provinsi = province.id','left');
		$query = $this->db->get();
			return $query;
	}
	function read_all_kartu()
	{
		$this->db->select('tb_pramuka.id AS id,no_gudep,nama_depan,nama_tengah,nama_belakang,tb_agama.agama AS agama,golongan_darah, tempat_lahir,tanggal_lahir,usia,no_hp,alamat,tb_jk.jk AS jk,villages.nama AS desa,districts.nama AS kecamatan,regencies.nama AS kabupaten,province.nama AS provinsi,waktu ,nama_organisasi1,jabatan1,tahun1,nama_organisasi2,jabatan2,tahun2,nama_organisasi3,jabatan3,tahun3,aktif,tb_golongan.golongan as golongan,aktifitas_organisasi,image,qr_code,nia,nisn,nik,pangkalan,rt,rw,print,visible')
		->from('tb_pramuka')
		// ->from('tb_anggota')
		// ->where($where)
		->order_by('waktu', 'DESC')
		->join('tb_jk','tb_pramuka.jk = tb_jk.id','left')
		->join('tb_agama','tb_pramuka.agama = tb_agama.id','left')
		->join('tb_golongan','tb_pramuka.golongan = tb_golongan.id','left')
		->join('villages','tb_pramuka.desa = villages.id','left')
		->join('districts','tb_pramuka.kecamatan= districts.id','left')
		->join('regencies','tb_pramuka.kabupaten = regencies.id','left')
		->join('province','tb_pramuka.provinsi = province.id','left');

		$query = $this->db->get();
			return $query;
	}

	function centang($where,$data){
		$this->db->where_in('tb_pramuka.id', $where);
		$this->db->update('tb_pramuka',$data);
	}

	// function search_nik($nik)
  //   {
  //       $this->db->like('nik',$nik);
  //       $query  =   $this->db->get('tb_pramuka');
  //       return $query->result();
  //   }

}
