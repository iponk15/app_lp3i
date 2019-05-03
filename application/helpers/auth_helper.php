<?php
	// Buat file auth_helper.php di dir application/helper/auth_helper.php
	
	
	$CI = &get_instance();
	$CI->load->library( 'session' );

	$ex          = array('login');
	$session     = $CI->session->userdata('app_session');
    
	if ( !empty($session) AND ( ( in_array ( $CI->uri->segment(1), $ex) AND $CI->uri->segment(2) != "out") OR $CI->uri->segment(1) == "" ) ){
		redirect( base_url('home') );
	} else if ( empty($session) AND ! in_array( $CI->uri->segment(1), $ex ) ) {
		redirect(base_url('login'));
	}
	
	// $this->session->userdata('hotel_session')->nama_field
	
	