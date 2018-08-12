<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Sedekah extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function rekening() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'sedekah/rekening/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'sedekah/rekening/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'sedekah/rekening/';
			$config ['first_url'] = base_url () . 'sedekah/rekening/';
		}
		
		$config ['per_page'] = 5;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Rekening_model->total_rows_rekening ( $q );
		$rekening = $this->Rekening_model->get_limit_data_rekening ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'rekening_data' => $rekening,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'title' => 'Rekening',
				'page' => 'rekening' 
		);
		$this->template->load ( template () . '/template', template () . '/view_rekening', $data );
	}
}

