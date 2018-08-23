<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Kata_mereka_model extends CI_Model {
	public $table = 'kata_mereka';
	public $id = 'id_kata_mereka';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_kata_mereka() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get all
	function get_kata_mereka_inview() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table );
	}
	
	// get data by id
	function get_by_id_kata_mereka($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_kata_mereka($q = NULL) {
		$this->db->like ( 'id_kata_mereka', $q );
		$this->db->or_like ( 'name_kata_mereka', $q );
		$this->db->or_like ( 'photo_kata_mereka', $q );
		$this->db->or_like ( 'quote_kata_mereka', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_kata_mereka($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_kata_mereka', $q );
		$this->db->or_like ( 'name_kata_mereka', $q );
		$this->db->or_like ( 'photo_kata_mereka', $q );
		$this->db->or_like ( 'quote_kata_mereka', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_kata_mereka($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_kata_mereka($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_kata_mereka($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}