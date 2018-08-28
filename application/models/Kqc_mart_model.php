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
		$this->db->or_like ( 'nama_kqc_mart', $q );
		$this->db->or_like ( 'harga_kqc_mart', $q );
		$this->db->or_like ( 'jumlah_kqc_mart', $q );
		$this->db->or_like ( 'gambar_kqc_mart', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_kqc_mart($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_kqc_mart', $q );
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