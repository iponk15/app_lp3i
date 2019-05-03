<?php 

class Templates
{
	protected $ci;

	public function __construct()
	{
        $this->_ci =& get_instance();
	}
	
	function display( $template, $data = NULL){
		$data['_header']      = $this->_ci->load->view('templates/header', $data, TRUE);
		$data['_theme']      = $this->_ci->load->view('templates/theme', $data, TRUE);
		$data['_sidebar']     = $this->_ci->load->view('templates/sidebar', $data, TRUE);
		$data['_page_header'] = $this->_ci->load->view('templates/page_header', $data, TRUE);
		$data['_content']     = $this->_ci->load->view($template, $data, TRUE);
		$data['_footer']    = $this->_ci->load->view('templates/footer', $data, TRUE);

		$this->_ci->load->view('templates/template.php', $data);
        
    }

}

