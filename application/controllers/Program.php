<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Program extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library('cart');
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
		$config ['full_tag_open'] = '<div><ul class ="paginator">';
		$config ['next_link'] = '<i class="icofont icofont-long-arrow-right"></i>';
		$config ['prev_link'] = '<i class="icofont icofont-long-arrow-left"></i>';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Pendidikan_dakwah_model->total_rows_pendidikan_dakwah ( $q );
		$pendidikan_dakwah = $this->Pendidikan_dakwah_model->get_limit_data_pendidikan_dakwah( $config ['per_page'], $start, $q );
		
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
		$this->template->load ( template () . '/template', template () . '/view_pendidikan_dakwah_list', $data );
	}
	
	public function pendidikan_dakwah_detail($id)
	{
		$row = $this->Pendidikan_dakwah_model->get_by_judul_seo_pendidikan_dakwah($id);
		if ($row) {
			$data = array(
					'id_pendidikan_dakwah' => $row->id_pendidikan_dakwah,
					'nama_pendidikan_dakwah' => $row->nama_pendidikan_dakwah,
					'keterangan_pendidikan_dakwah' => $row->keterangan_pendidikan_dakwah,
					'gambar_pendidikan_dakwah' => $row->gambar_pendidikan_dakwah,
					'title' => 'Pendidikan Dan Dakwah',
					'page' => 'pendidikan_dakwah'
			);
			$this->template->load ( template () . '/template', template () . '/view_pendidikan_dakwah_form', $data );
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pendidikan_dakwah'));
		}
	}
	public function kqc_mart() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'program/kqc_mart/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'program/kqc_mart/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'program/kqc_mart/';
			$config ['first_url'] = base_url () . 'program/kqc_mart/';
		}
		
		$config ['per_page'] = 6;
		$config ['query_string_segment'] = 'start';
		$config ['full_tag_open'] = '<div><ul class ="paginator">';
		$config ['next_link'] = '<i class="icofont icofont-long-arrow-right"></i>';
		$config ['prev_link'] = '<i class="icofont icofont-long-arrow-left"></i>';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Kqc_mart_model->total_rows_kqc_mart ( $q );
		$kqc_mart = $this->Kqc_mart_model->get_limit_data_kqc_mart ( $config ['per_page'], $start, $q );
		$kqc_mart_produk_baru = $this->Kqc_mart_model->get_limit_data_kqc_mart_Produk_baru ( 10 );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'q' => $q,
				'action' => site_url('program/tambah_cart'),
				'kqc_mart_data' => $kqc_mart,
				'kqc_mart_produk_baru_data' =>$kqc_mart_produk_baru,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'title' => 'KQC Mart',
				'page' => 'kqc_mart' 
		);
		$this->template->load ( template () . '/template', template () . '/view_kqc_mart', $data );
	}
	
	public function tambah_cart()
	{
		$data_produk= array('id' => $this->input->post('nama_kqc_mart',TRUE),
				'name' => $this->input->post('nama_kqc_mart',TRUE),
				'price' => $this->input->post('harga_kqc_mart',TRUE),
				'gambar_kqc_mart' => $this->input->post('gambar_kqc_mart',TRUE),
				'qty' =>$this->input->post('jumlah_kqc_mart',TRUE),
		);
		$this->cart->insert($data_produk);
		redirect(site_url('program/kqc_mart'));
	}
}
