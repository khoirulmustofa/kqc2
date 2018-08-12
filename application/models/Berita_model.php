<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Berita_model extends CI_Model {
	public $table = 'berita';
	public $id = 'id_berita';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	// total_rows_berita_front
	function total_rows_berita_front() {
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get_limit_data_berita_front
	function get_limit_data_berita_front($limit, $start = 0) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	//get_by_judul_seo_berita
function get_by_judul_seo_berita($judul_seo) {
		$this->db->where ( 'judul_seo_berita', $judul_seo );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get all
	function get_all_berita() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_berita($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_berita($q = NULL) {
		$this->db->like ( 'id_berita', $q );
		$this->db->or_like ( 'username', $q );
		$this->db->or_like ( 'judul_berita', $q );
		$this->db->or_like ( 'judul_seo_berita', $q );
		$this->db->or_like ( 'isi_berita', $q );
		$this->db->or_like ( 'hari', $q );
		$this->db->or_like ( 'tanggal', $q );
		$this->db->or_like ( 'jam', $q );
		$this->db->or_like ( 'gambar', $q );
		$this->db->or_like ( 'dibaca', $q );
		$this->db->or_like ( 'tag', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_berita($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_berita', $q );
		$this->db->or_like ( 'username', $q );
		$this->db->or_like ( 'judul_berita', $q );
		$this->db->or_like ( 'judul_seo_berita', $q );
		$this->db->or_like ( 'isi_berita', $q );
		$this->db->or_like ( 'hari', $q );
		$this->db->or_like ( 'tanggal', $q );
		$this->db->or_like ( 'jam', $q );
		$this->db->or_like ( 'gambar', $q );
		$this->db->or_like ( 'dibaca', $q );
		$this->db->or_like ( 'tag', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_berita($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_berita($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_berita($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}

