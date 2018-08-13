<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Groups_model extends CI_Model {
	public $table = 'groups';
	public $id = 'id';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_groups() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get_groups_by $id return tanpa proses
	function get_groups_by($id) {
		$this->db->where ( 'id', $id );
		return $this->db->get ( 'groups' );
	}
	
	// get data by id
	function get_by_id_groups($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get data by id
	function get_result_groups_by_id($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get total rows
	function total_rows_groups($q = NULL) {
		$this->db->like ( 'id', $q );
		$this->db->or_like ( 'name', $q );
		$this->db->or_like ( 'description', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_groups($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id', $q );
		$this->db->or_like ( 'name', $q );
		$this->db->or_like ( 'description', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_groups($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_groups($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_groups($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
