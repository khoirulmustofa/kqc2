<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Test extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		
		$data = array (
				
				'title' => 'Beranda',
				'page' => 'home' 
		);
		
		$this->load->view ( 'admin/template', $data );
	}
}
