<?php

class m_users extends CI_Model
{
	function tampil_data($address,$wherein='')
	{
	$this->db->select("users.*,tb_role.role,regencies.nama AS kabupaten,province.nama AS provinsi")
    	->from("users")
		->where($address);
		// ->where("users.status","1")
		if($wherein != ''){$this->db->where_in('users.id_user',$wherein);}
	$this->db->join('regencies','users.kabupaten = regencies.id','left')
    	->join('province','users.provinsi = province.id','left')
		->join('tb_role','users.role = tb_role.id','left');
	    $query = $this->db->get();
		// print_r($this->db->last_query());die();
		// print_r($wherein);die();
	    return $query;
	}

	// public function insert($data){
	// 	$insert = $this->db->insert_batch('data', $data);
	// 	if($insert){
	// 		return true;
	// 	}
	// }

	public function getData($table,$where){
		$this->db->select('*');
		return $this->db->get_where($table,$where)->result();
	}

	public function getrowData($table,$where){

		// $sql = "SELECT MAX(urut) as no FROM tb_pramuka WHERE kabupaten = '$kabupaten'";
		// $query = $this->db->query($sql);
		// return $query;

		// $this->db->select('*');
		return $this->db->get_where($table,$where);
	}

	public function getlikeData($table,$where){

		$this->db->like($where);
		return $this->db->get($table);
	}

	public function getDataall(){
		$address = $this->session->userdata('where');
		// print_r($address);
		// die();
		$where= array(
			'visible' => 1,
		);

		$this->db->select('*');
		$this->db->where($address);
		$this->db->where($where);
		return $this->db->get('tb_pramuka')->result();
	}

	
	function tampil_data_bin()
	{
		$this->db->select("*");
    	$this->db->from("users");
		$this->db->where("status","0");
	    $query = $this->db->get();
	    return $query;
	}

  function verif_data($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

	function cek_jumlah($table){
		$this->db->select("*");
    	$this->db->from("users");
	    $query = $this->db->get();
	    return $query;
	}

	function cek_jumlah_sampah(){

		$this->db->select("*");
    	$this->db->from("users");
		$this->db->where("status","0");
	    $query = $this->db->get();
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

	function edit_data($where,$table){
	return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
