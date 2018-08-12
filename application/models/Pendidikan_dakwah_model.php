<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Pendidikan_dakwah_model extends CI_Model {
	public $table = 'pendidikan_dakwah';
	public $id = 'id_pendidikan_dakwah';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_pendidikan_dakwah() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_pendidikan_dakwah($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_pendidikan_dakwah($q = NULL) {
		$this->db->like ( 'id_pendidikan_dakwah', $q );
		$this->db->or_like ( 'nama_pendidikan_dakwah', $q );
		$this->db->or_like ( 'keterangan_pendidikan_dakwah', $q );
		$this->db->or_like ( 'gambar_pendidikan_dakwah', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_pendidikan_dakwah($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_pendidikan_dakwah', $q );
		$this->db->or_like ( 'nama_pendidikan_dakwah', $q );
		$this->db->or_like ( 'keterangan_pendidikan_dakwah', $q );
		$this->db->or_like ( 'gambar_pendidikan_dakwah', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_pendidikan_dakwah($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_pendidikan_dakwah($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_pendidikan_dakwah($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
