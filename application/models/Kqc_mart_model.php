<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Kqc_mart_model extends CI_Model {
	public $table = 'kqc_mart';
	public $id = 'id_kqc_mart';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function generate_kode_produk_kqc() {
		$this->db->select('MAX(RIGHT(kqc_mart.kode_kqc_mart,4)) as max_kode', FALSE);
		$query = $this->db->get ( 'kqc_mart' );
		
		if ($query->num_rows () != 0) {
			// jika kode ternyata sudah ada.
			$data = $query->row ();
			$kode = intval ( $data->max_kode ) + 1;
		} else {
			// jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "KQC-".$kodemax;    // hasilnya KQC-0001 dst.
		return $kodejadi;
	}
	
	// get_limit_data_kqc_mart_order_by_jumlah
	function get_limit_data_kqc_mart_Produk_baru($limit) {
		$this->db->order_by ( 'id_kqc_mart', 'DESC' );
		$this->db->limit($limit);
		return $this->db->get ( $this->table )->result ();
	}
	
	// get all
	function get_all_kqc_mart() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_kqc_mart($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_kqc_mart($q = NULL) {
		$this->db->like ( 'id_kqc_mart', $q );
		$this->db->or_like ( 'kode_kqc_mart', $q );
		$this->db->or_like ( 'nama_kqc_mart', $q );
		$this->db->or_like ( 'harga_kqc_mart', $q );
		$this->db->or_like ( 'jumlah_kqc_mart', $q );
		$this->db->or_like ( 'gambar_kqc_mart', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get_limit_data_kqc_mart_order_by_jumlah
	function get_limit_data_kqc_mart_order_by_jumlah($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( 'jumlah_kqc_mart', 'ASC' );
		$this->db->like ( 'id_kqc_mart', $q );
		$this->db->or_like ( 'kode_kqc_mart', $q );
		$this->db->or_like ( 'nama_kqc_mart', $q );
		$this->db->or_like ( 'harga_kqc_mart', $q );
		$this->db->or_like ( 'jumlah_kqc_mart', $q );
		$this->db->or_like ( 'gambar_kqc_mart', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data with limit and search
	function get_limit_data_kqc_mart($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_kqc_mart', $q );
		$this->db->or_like ( 'kode_kqc_mart', $q );
		$this->db->or_like ( 'nama_kqc_mart', $q );
		$this->db->or_like ( 'harga_kqc_mart', $q );
		$this->db->or_like ( 'jumlah_kqc_mart', $q );
		$this->db->or_like ( 'gambar_kqc_mart', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_kqc_mart($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_kqc_mart($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_kqc_mart($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}