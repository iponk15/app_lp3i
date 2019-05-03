<?php 

	function pre( $var, $exit = null ){
		$CI = &get_instance();
		echo '<pre>';
		if ( $var == 'lastdb' ){
			print_r($CI->db->last_query());
		} else if ( $var == 'post' ){
			print_r($CI->input->post());
		} else if ( $var == 'get' ){
			print_r($CI->input->get());
		} else {
			print_r( $var );
		}
		echo '</pre>';

		if ( $exit )
		{
			exit();
		}
	}
	
	function getCtrl(){
		$CI =& get_instance();
		return $CI->router->fetch_class(); 
	}
	
	function getSession(){
		$CI =& get_instance();
		
		return $CI->session->userdata('app_session');
	}
	
	
	
	
	
	
	
	
	