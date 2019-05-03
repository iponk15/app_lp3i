<?php

class M_login extends CI_Model {

    public function __construct(){
        parent::__construct();
        // $this->db->query("SET time_zone='+07:00'");
    }
	
	function func_cek($data){
		$this->db->select( '*' )->from('app_user');
		$this->db->where( ['user_username' => $data['username'], 'user_password' => $data['password']]);
		
		$query  = $this->db->get();
		$result = $query->result_array();
		
		return $result;
	}
	
}