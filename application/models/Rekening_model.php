<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Rekening_model extends CI_Model {
	public $table = 'rekening';
	public $id = 'id_rekening';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_rekening() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_rekening($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_rekening($q = NULL) {
		$this->db->like ( 'id_rekening', $q );
		$this->db->or_like ( 'nama_bank', $q );
		$this->db->or_like ( 'no_rekening', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_rekening($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_rekening', $q );
		$this->db->or_like ( 'nama_bank', $q );
		$this->db->or_like ( 'no_rekening', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_rekening($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_rekening($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_rekening($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
