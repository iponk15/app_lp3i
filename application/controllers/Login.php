<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
    	parent::__construct();
    	// $this->load->model('m_login');
    }
	 
	public function index(){
		$data = '';
		$this->load->view('login',$data);
	}
	
	function action_login(){
		$this->load->model('m_login');
		$post = $this->input->post();
		$cek  = $this->m_login->func_cek($post);
		
		if(!empty($cek)){
			$this->session->set_userdata('app_session', $cek[0]);
			redirect(base_url('home'));
		}else{
			redirect(base_url('login'));
		}
	}
	
	function out(){
		
		$this->session->sess_destroy();

		redirect(base_url('login'));
	}
	
	
	
	
	
	
}
