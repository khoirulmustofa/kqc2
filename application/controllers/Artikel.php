<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Artikel extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'artikel/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'artikel/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'artikel/';
			$config ['first_url'] = base_url () . 'artikel/';
		}
		
		$config ['per_page'] = 10;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->artikel_model->total_rows_artikel ( $q );
		$artikel = $this->artikel_model->get_limit_data_artikel ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'artikel_data' => $artikel,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start 
		);
		$this->load->view ( 'artikel/artikel_list', $data );
	}
	public function artikel_read($judul_seo) {
		$row = $this->Artikel_model->get_by_judul_seo_artikel ( $judul_seo );
		if ($row) {
			$data = array (
					'id_artikel' => $row->id_artikel,
					'username' => $row->username,
					'judul_artikel' => $row->judul_artikel,
					'judul_seo_artikel' => $row->judul_seo_artikel,
					'isi_artikel' => $row->isi_artikel,
					'hari' => $row->hari,
					'tanggal' => $row->tanggal,
					'jam' => $row->jam,
					'gambar' => $row->gambar,
					'dibaca' => $row->dibaca,
					'tag' => $row->tag,
					'title' => ucwords($row->judul_artikel) ,
					'page' => 'artikel' 
			);
			$this->template->load ( template () . '/template', template () . '/view_artikel_detail', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'home' ) );
		}
	}
}
