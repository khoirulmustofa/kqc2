<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Program extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function pendidikan_dakwah() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'program/pendidikan_dakwah/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'program/pendidikan_dakwah/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'program/pendidikan_dakwah/';
			$config ['first_url'] = base_url () . 'program/pendidikan_dakwah/';
		}
		
		$config ['per_page'] = 6;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Pendidikan_dakwah_model->total_rows_pendidikan_dakwah ( NULL );
		$pendidikan_dakwah = $this->Pendidikan_dakwah_model->get_limit_data_pendidikan_dakwah ( $config ['per_page'], $start, NULL );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'q' => $q,
				'pendidikan_dakwah_data' => $pendidikan_dakwah,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'title' => 'Pendidikan Dan Dakwah',
				'page' => 'pendidikan_dakwah' 
		);
		$this->template->load ( template () . '/template', template () . '/view_pendidikan_dakwah', $data );
	}
}
