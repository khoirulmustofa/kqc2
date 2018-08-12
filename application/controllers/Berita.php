<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Berita extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'berita/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'berita/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'berita/';
			$config ['first_url'] = base_url () . 'berita/';
		}
		
		$config ['per_page'] = 10;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Berita_model->total_rows_berita ( $q );
		$berita = $this->Berita_model->get_limit_data_berita ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'berita_data' => $berita,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start 
		);
		$this->load->view ( 'berita/berita_list', $data );
	}
	public function berita_read($judul_seo) {
		$row = $this->Berita_model->get_by_judul_seo_berita ( $judul_seo );
		if ($row) {
			$data = array (
					'id_berita' => $row->id_berita,
					'username' => $row->username,
					'judul_berita' => $row->judul_berita,
					'judul_seo_berita' => $row->judul_seo_berita,
					'isi_berita' => $row->isi_berita,
					'hari' => $row->hari,
					'tanggal' => $row->tanggal,
					'jam' => $row->jam,
					'gambar' => $row->gambar,
					'dibaca' => $row->dibaca,
					'tag' => $row->tag,
					'title' => ucwords($row->judul_berita) ,
					'page' => 'berita' 
			);
			$this->template->load ( template () . '/template', template () . '/view_berita_detail', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'home' ) );
		}
	}
}
