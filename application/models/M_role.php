<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role extends CI_Model {
	public function __construct(){
    	parent::__construct();
    }
	
	function getRole(){
		$this->db->select('*')->from('app_role');
		
		$query = $this->db->get();
		$hasil = $query->result_array();
		
		return $hasil;
	}
	
	function save($data){
		$save = $this->db->insert('app_role',$data);
		
		if($save == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function getDataEdit($role_id){
		$this->db->select('*')->from('app_role');
		$this->db->where(['role_id' => $role_id]);
		$query  = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	function updateRole($param, $array){
		$update = $this->db->update(
			'app_role',
			$array,
			['role_id' => $param]
		);
		
		if($update == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function delete($role_id){
		$delete = $this->db->delete('app_role',['role_id' => $role_id]);
		
		if($delete == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function ubahStatus($role_id,$data){
		$update = $this->db->update(
			'app_role',
			$data,
			['role_id' => $role_id]
		);
		
		if($update == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}