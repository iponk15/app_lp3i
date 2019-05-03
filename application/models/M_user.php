<?php

class M_user extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->db->query("SET time_zone='+07:00'");
    }
	
	
	function getUser($number = '',$offset = ''){
		$this->db->select('*')->from('app_user');
		$this->db->join('app_role','user_roleid = role_id','left');
		$this->db->limit($number, $offset);
		
		$query = $this->db->get();
		$hasil = $query->result_array();
		
		return $hasil;
	}
	
	function countUser(){
		$this->db->select('count(*) jumlah')->from('app_user');
		$this->db->join('app_role','user_roleid = role_id','left');
		
		$query = $this->db->get();
		$hasil = $query->row();
		
		return $hasil->jumlah;
	}
	
	function save($data){
		$save = $this->db->insert('app_user',$data);
		
		if($save == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function getUserId($user_id){
		$this->db->select('*')->from('app_user');
		$this->db->where(['user_id' => $user_id]);
		
		$query = $this->db->get();
		$hasil = $query->result();
		
		return $hasil;
	}
	
	function update($data,$user_id){
		$update = $this->db->update('app_user',$data,['user_id' => $user_id]);
		
		if($update == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function delete($user_id){
		$delete = $this->db->delete('app_user',['user_id' => $user_id]);
		
		if($delete == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function getDataEdit($user_id){
		$this->db->select('*')->from('app_user');
		$this->db->where(['user_id' => $user_id]);
		$query  = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	function updateUser($param, $array){
		$update = $this->db->update(
			'app_user',
			$array,
			['user_id'=>$param]
		);
		
		if($update == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}






