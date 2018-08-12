<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Users_groups_model extends CI_Model {
	public $table = 'users_groups';
	public $id = 'id';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_users_groups() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_users_groups_byId($id) {
		$this->db->where ( 'user_id', $id );
		$this->db->where ( 'group_id !=', 2 );
		return $this->db->get ( 'users_groups' )->row ();
	}
	
	// get data by id
	function get_by_id_users_groups($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_users_groups($q = NULL) {
		$this->db->like ( 'id', $q );
		$this->db->or_like ( 'user_id', $q );
		$this->db->or_like ( 'group_id', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_users_groups($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id', $q );
		$this->db->or_like ( 'user_id', $q );
		$this->db->or_like ( 'group_id', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_users_groups($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_users_groups($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_users_groups($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
