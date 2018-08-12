<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Galeri extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		$data = array (
				
				'title' => 'galeri_foto',
				'page' => 'Galeri Foto' 
		);
		$this->template->load ( template () . '/template', template () . '/view_home', $data );
	}
	// galeri_foto
	public function galeri_foto() {
		$q = urldecode ( null );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'galeri/galeri_foto/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'galeri/galeri_foto/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'galeri/galeri_foto/';
			$config ['first_url'] = base_url () . 'galeri/galeri_foto/';
		}
		
		$config ['per_page'] = 4;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Galeri_foto_model->total_rows_galeri_foto ();
		$galeri_foto = $this->Galeri_foto_model->get_limit_data_galeri_foto ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'galeri_foto_data' => $galeri_foto,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'galeri_foto',
				'title' => 'Galeri Foto' 
		);
		$this->template->load ( template () . '/template', template () . '/view_galeri_foto', $data );
	}
	
	// galeri_video
	public function galeri_video() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'galeri_video/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'galeri_video/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'galeri_video/';
			$config ['first_url'] = base_url () . 'galeri_video/';
		}
		
		$config ['per_page'] = 4;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Galeri_video_model->total_rows_galeri_video ( $q );
		$galeri_video = $this->Galeri_video_model->get_limit_data_galeri_video ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'galeri_video_data' => $galeri_video,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start ,
				'page' => 'galeri_video',
				'title' => 'Galeri Video'
		);
		$this->template->load ( template () . '/template', template () . '/view_galeri_video', $data );
	}
}