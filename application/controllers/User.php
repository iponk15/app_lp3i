<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
    	parent::__construct();
    	$this->load->model('m_user');
		$this->load->model('m_role');
		$this->load->library('pagination');
		$this->load->library('form_validation'); 
		$this->load->library('upload');
		$this->load->library('libexcel');
    }
	 
	public function index(){
		$data['pagetitle'] = 'Halaman User';
		$data['subtitle']  = 'Daftar User';
		$data['icon']      = 'user';
		$data['header']    = 'Table User';
		
		// get data
		$table             = 'app_user';
		$join 			   = [ 
			['app_role', 'user_roleid = role_id','left']
		];
		$where             = null;
		$select            = '*';
		
		$data['records']   = $this->m_global->get($table,$join,$where,$select);
		
		$this->templates->display('user/user',$data);
	}
	
	function tampil_tambah(){
		$data['pagetitle'] = 'Halaman User';
		$data['subtitle']  = 'Tambah data user';
		$data['icon']      = 'user';
		$data['header']    = 'Form User';
		$data['role']      = $this->m_role->getRole();
		
		$this->templates->display('user/user_tambah',$data);
	}
	
	function act_tambahuser(){
		$exp = explode('.', $_FILES['form_gambar']['name']);
		
		if( ($exp[1] == 'PNG' OR $exp[1] == 'png' ) OR ($exp[1] == 'JPG' OR $exp[1] == 'jpg') ){
			$path = 'Gambar';
		}else if(($exp[1] == 'PDF' OR $exp[1] == 'pdf' )){
			$path = 'PDF';
		}else if(($exp[1] == 'XLS' OR $exp[1] == 'xls' ) OR ($exp[1] == 'XLSX' OR $exp[1] == 'xlsx')){
			$path = 'Excel';
		}else if($exp[1] == 'DOCX' OR $exp[1] == 'docx'){
			$path = 'DOC';
		}else{
			$path = null;
		}
		
		if($path != null){
			
			$dir = FCPATH.'assets/media/'.$path;
			
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
				
			$config['upload_path']   = './assets/media/'.$path;
			$config['allowed_types'] = 'png|jpg|xls|xslsx|docx';
			$config['max_size']      = 10024; //10mb

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('form_gambar')){
				$error = array('error' => $this->upload->display_errors());
				pre($error); 
			}else{
				$resupl = array('upload_data' => $this->upload->data());
				$post   = $this->input->post();
			
				$data['user_username'] = $post['username'];
				$data['user_nama']     = $post['nama'];
				$data['user_password'] = $post['password'];
				$data['user_email']    = $post['email'];
				$data['user_roleid']   = $post['role'];
				$data['user_file']     = 'assets/media/'.$path.'/'.$resupl['upload_data']['file_name']; 
				
				'assets/media/Gambar/image.jpg';
				
				$input = $this->m_global->insert($data); 
				
				if($input){
					redirect('user');
				}else{
					pre('data gagal disimpan');
				}
			}
		}else{
			pre('File gagal di simpan');
		}
			
	}
	
	function tampil_ubah($user_id){
		$data['pagetitle'] = 'Halaman User';
		$data['subtitle']  = 'Edit data user';
		$data['icon']      = 'user';
		$data['header']    = 'Form User';
		$data['user']      = $this->m_global->get('app_user',null,['user_id' => $user_id]);
		$data['role']      = $this->m_global->get('app_role');
		
		$this->templates->display('user/user_ubah',$data);
	}
	
	function act_ubahuser($user_id){
		$post = $this->input->post();
		
		if(!empty($_FILES['form_gambar']['name'])){
			$exp = explode('.', $_FILES['form_gambar']['name']);
		
			if( ($exp[1] == 'PNG' OR $exp[1] == 'png' ) OR ($exp[1] == 'JPG' OR $exp[1] == 'jpg') ){
				$path = 'Gambar';
			}else if(($exp[1] == 'PDF' OR $exp[1] == 'pdf' )){
				$path = 'PDF';
			}else if(($exp[1] == 'XLS' OR $exp[1] == 'xls' ) OR ($exp[1] == 'XLSX' OR $exp[1] == 'xlsx')){
				$path = 'Excel';
			}else if($exp[1] == 'DOC' OR $exp[1] == 'doc'){
				$path = 'DOC';
			}else{
				$path = null;
			}
			
			if($path != null){
				
				$dir = FCPATH.'assets/media/'.$path;
				
				if (!is_dir($dir)) {
					mkdir($dir, 0777, true);
				}
				
				$config['upload_path']   = './assets/media/'.$path;
				$config['allowed_types'] = '*';
				$config['max_size']      = 10024;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('form_gambar')){
					$error = array('error' => $this->upload->display_errors());
					pre($error);
				}else{
					$resupl            = array('upload_data' => $this->upload->data());
					$data['user_file'] = 'assets/media/'.$path.'/'.$resupl['upload_data']['file_name'];
				}
			}
		}
		
		$data['user_username'] = $post['username'];
		$data['user_nama']     = $post['nama'];
		$data['user_email']    = $post['email'];
		$data['user_roleid']   = $post['role'];
		
		if(!empty($post['password'])){
			$data['user_password'] = $post['password'];
		}
		
		$update = $this->m_global->update('app_user',$data,['user_id' => $user_id]);
		
		if($update == TRUE){
			if(!empty($_FILES['form_gambar']['name'])){
				unlink($post['dump_file']);
			}
			
			redirect('user');
		}else{
			pre('data gagal disimpan');
		}
	}
	
	function hapus_data($user_id){
		$delete = $this->m_global->delete('app_user',['user_id' => $user_id]);
		
		if($delete == TRUE){
			redirect('user');
		}else{
			pre('data gagal disimpan');
		}
	}
	
	
	// ====================================================
	
	
	function datauser(){
		
		if(!empty($this->input->post())){
			$post = $this->input->post();
			
			foreach($post as $rows => $value){
				if(!empty($value)){
					if($rows == 'username' || $rows == 'email' ){
						echo $where_e = '(username like "%'.$value.'%" OR bo_code like "%'.$value.'%")';
					}else{
						$where_e      = null;
						$where[$rows] = $value;
					}
				}else{
					$where_e = null;
					$where   = null;
				}
			}
		}else{
			$where_e = null;
			$where   = null;
		}
		
		pre($where_e);
		pre($where);
		
		$config['base_url']    = base_url('user/datauser');
		$config['total_rows']  = $this->m_user->countUser();
		$config['per_page']    = 5;
		$config['uri_segment'] = 3;
		$config['num_links']   = 3;
		
		// Style Pagination
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
		$config['full_tag_open']   = '<ul class="pagination">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li class="page-item">';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '<span aria-hidden="true">></span><span class="sr-only">Next</span>'; 
        $config['next_tag_open']   = '<li class="page-item">';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '<span aria-hidden="true"><</span><span class="sr-only">Previous</span>'; 
        $config['prev_tag_open']   = '<li class="page-item">';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="page-item active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li class="page-item">';
        $config['num_tag_close']   = '</li>';
        // End style pagination
		
		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
		
		
		// set table
		$table          = 'siswa';
		pre($table);
		$select         = '*';
		$data['record'] = $this->m_global->get($table,$select);
		pre($data['record'],1);
		// $data['record']     = $this->m_user->getUser($config['per_page'],$page,$where);
		
		$this->load->view('user_index',$data);
	}
	
	function formadd_user(){
		$data['role'] = $this->m_role->getRole();
		$this->load->view('user_formadd', $data);
	}
	
	function saveform_user(){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('username','Username','required',array('required' => 'Form username harus diisi'));
		$this->form_validation->set_rules('nama','Nama','required',array('required' => 'Form nama harus diinput'));
		$this->form_validation->set_rules('email','Email','required|valid_email',array('required' => 'Form email harus diisi','valid_email' => 'Inputan harus berupa email'));
		
		if($this->form_validation->run() !== false){
			$data['user_username'] = $post['username'];
			$data['user_nama']     = $post['nama'];
			$data['user_email']    = $post['email'];
			$data['user_roleid']   = $post['role'];
			$data['user_password'] = $post['password'];
			
			$save = $this->m_user->save($data);
			
			if($save == TRUE){
				$this->load->view('user_index');
			}else{
				echo "data gagal disimpan";
			}
		}else{
			// echo form_error('username');exit;
			$this->load->view('user_formadd');
		}
	}
	
	function formedit_user($user_id){
		$data['getData'] = $this->m_user->getDataEdit($user_id);
		$data['role']    = $this->m_role->getRole();
		$this->load->view('user_formedit',$data);
	}
	
	function editform_user($user_id){
		$post = $this->input->post();
		
		$row['user_username'] = $post['username'];
		$row['user_nama']     = $post['nama'];
		$row['user_email']    = $post['email'];
		$row['user_roleid']   = $post['role'];
		
		if(!empty($post['password'])){
			$row['user_password'] = $post['password'];
		}
		
		$update = $this->m_user->updateUser($user_id,$row);
		
		if($update == TRUE){
			redirect('user/datauser');
		}else{
			echo 'data gagal di update';
		}
	}
	
	function hapus_user($user_id){
		$delete = $this->m_user->delete($user_id);
		
		if($delete == TRUE){
			redirect('user/datauser');
		}else{
			pre('data gagal disimpan');
		}
	}
	
	function export_excel(){
		$name     = 'Export Data User';
		$records  = $this->m_global->get('app_user');
		$countRc  = count($records) + 1;
		$phpExcel = new PHPExcel();
        $alpha    = range('A','Z');
		$header   = ['Username','Nama','Email'];
		
		foreach ($header as $key => $header) {
            $phpExcel->getActiveSheet()->setCellValue($alpha[$key].'1', $header);
            $phpExcel->getActiveSheet()->getStyle($alpha[$key].'1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'BFBFBF')
                    )
                )
            );
        }
		
		foreach ($records as $key => $value) {
			$phpExcel->getActiveSheet()->setCellValue('A'.($key+2), $value->user_username);
			$phpExcel->getActiveSheet()->setCellValue('B'.($key+2), $value->user_nama);
			$phpExcel->getActiveSheet()->setCellValue('C'.($key+2), $value->user_email);
        }
		
		$styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );

        $headCol = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
		
		$phpExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($headCol);
        $phpExcel->getActiveSheet()->getStyle('A1:A'.$countRc)->applyFromArray($headCol);
        $phpExcel->getActiveSheet()->getStyle('A1:C'.$countRc)->applyFromArray($styleArray);
        $phpExcel->getActiveSheet()->setTitle('Data User');

        foreach(range('A1','C1') as $columnID) {
            $phpExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }


        $phpExcel->createSheet();
        $phpExcel->setActiveSheetIndex(0);
        // exit;
        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel,'Excel2007');
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter->save('php://output');
	}
}












