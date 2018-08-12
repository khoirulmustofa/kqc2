<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Galeri_foto_model extends CI_Model {
	public $table = 'galeri_foto';
	public $id = 'id_galeri_foto';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_galeri_foto() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_galeri_foto($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_galeri_foto($q = NULL) {
		$this->db->like ( 'id_galeri_foto', $q );
		$this->db->or_like ( 'nama_galeri_foto', $q );
		$this->db->or_like ( 'keterangan_galeri_foto', $q );
		$this->db->or_like ( 'gambar_galeri_foto', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_galeri_foto($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_galeri_foto', $q );
		$this->db->or_like ( 'nama_galeri_foto', $q );
		$this->db->or_like ( 'keterangan_galeri_foto', $q );
		$this->db->or_like ( 'gambar_galeri_foto', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_galeri_foto($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_galeri_foto($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_galeri_foto($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}