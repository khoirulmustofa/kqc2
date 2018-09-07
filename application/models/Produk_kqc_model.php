<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Produk_kqc_model extends CI_Model {
	public $table = 'produk_kqc';
	public $id = 'id_produk_kqc';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	// generate_kode_produk_kqc
	function generate_kode_produk_kqc() {
		$this->db->select('MAX(RIGHT(produk_kqc.kode_produk_kqc,4)) as max_kode', FALSE);
		$query = $this->db->get ( 'produk_kqc' );
	
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
	// get all
	function get_all_produk_kqc() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_produk_kqc($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_produk_kqc($q = NULL) {
		$this->db->like ( 'id_produk_kqc', $q );
		$this->db->or_like ( 'kode_produk_kqc', $q );
		$this->db->or_like ( 'nama_produk_kqc', $q );
		$this->db->or_like ( 'deskripsi_produk_kqc', $q );
		$this->db->or_like ( 'harga_produk_kqc', $q );
		$this->db->or_like ( 'gambar_produk_kqc', $q );
		$this->db->or_like ( 'nama_kategori_produk', $q );
		$this->db->from ( 'produk_kqc' );
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk_kqc.id_kategori_produk');
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_produk_kqc($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_produk_kqc', $q );
		$this->db->or_like ( 'kode_produk_kqc', $q );
		$this->db->or_like ( 'nama_produk_kqc', $q );
		$this->db->or_like ( 'deskripsi_produk_kqc', $q );
		$this->db->or_like ( 'harga_produk_kqc', $q );
		$this->db->or_like ( 'gambar_produk_kqc', $q );
		$this->db->or_like ( 'nama_kategori_produk', $q );
		$this->db->limit ( $limit, $start );
		$this->db->from ( 'produk_kqc' );
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk_kqc.id_kategori_produk');
		return $this->db->get()->result ();
	}
	
	// insert data
	function insert_produk_kqc($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_produk_kqc($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_produk_kqc($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
