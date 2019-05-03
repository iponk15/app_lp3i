<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct(){
    	parent::__construct();
    	$this->load->model('m_role');
    }
	
	// Function buat nampilin data role dihalaman index
	function index(){
		$data['pagetitle'] = 'Halaman Role';
		$data['subtitle']  = 'Daftar Role';
		$data['icon']      = 'user';
		$data['header']    = 'Table Role';
		$data['record']    = $this->m_role->getRole();
		$this->templates->display('role_index',$data);
	}
	
	// function buat nampilih halaman input data role
	function formadd_role(){
		$this->load->view('role_formadd');
	}
	
	// function buat nyimpen data user
	function saveform_role(){
		$post = $this->input->post();
		
		$data['role_kode']     = $post['role_kode'];
		$data['role_nama']     = $post['role_nama'];
		$data['role_desk']     = $post['role_desk'];
		$data['role_status']   = "0";
		
		$save = $this->m_role->save($data);
		
		if($save == TRUE){
			redirect(base_url('role'));
		}else{
			echo "data gagal disimpan";
		}
	}
	
	// function buat nampilih halaman form edit role
	function formedit_role($role_id){
		$data['getData'] = $this->m_role->getDataEdit($role_id);
		$this->load->view('role_formedit',$data);
	}
	
	function editform_role($role_id){
		$post = $this->input->post();
		
		$data['role_kode'] = $post['role_kode'];
		$data['role_nama'] = $post['role_nama'];
		$data['role_desk'] = $post['role_desk'];
		
		$update = $this->m_role->updateRole($role_id,$data);
		
		if($update == TRUE){
			redirect('role');
		}else{
			echo 'data gagal di update';
		}
	}
	
	function hapus_role($role_id){
		$delete = $this->m_role->delete($role_id);
		
		if($delete == TRUE){
			redirect('role');
		}else{
			pre('data gagal disimpan');
		}
	}
	
	function ubahStatus_role($role_id,$status){
		$data['role_status'] = ($status == '0' ? '1' : '0');
		$ubahStatus          = $this->m_role->ubahStatus($role_id,$data);
		
		if($ubahStatus == TRUE){
			redirect('role');
		}else{
			echo 'ubah status gagal';
		}
	}
	
	
}