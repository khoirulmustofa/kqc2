<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Menu_groups_model extends CI_Model {
	public $table = 'menu_groups';
	public $id = 'id';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_menu_groups() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get menu all level
	function get_all_menu_groups_level($group_id) {
		$this->db->select ( '*' );
		$this->db->from ( 'menu_groups' );
		$this->db->join ( 'menus', 'menus.id_menus = menu_groups.menu_id' );
		$this->db->where ( 'group_id', $group_id );
		$this->db->where ( 'is_main_menu', 0 );
		$query = $this->db->get ();
		//$query = $this->db->last_query();
		return $query;
	}
	
	// get_menus_groups id
	function get_menus_groups($group_id) {
		$this->db->where('group_id', $group_id);
		$query = $this->db->get ($this->table);
		
		return $query->result ();
	}
	
	// get menu by level
	function get_child_menu_groups_level($group_id, $parent) {
		$this->db->select ( '*' );
		$this->db->from ( 'menu_groups' );
		$this->db->join ( 'menus', 'menus.id_menus = menu_groups.menu_id' );
		$this->db->where ( 'group_id', $group_id );
		$this->db->where ( 'is_main_menu', $parent );
		$query = $this->db->get ();
		return $query;
	}
	
	// get data by id
	function get_by_id_menu_groups($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_menu_groups($q = NULL) {
		$this->db->like ( 'id', $q );
		$this->db->or_like ( 'group_id', $q );
		$this->db->or_like ( 'menu_id', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_menu_groups($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id', $q );
		$this->db->or_like ( 'group_id', $q );
		$this->db->or_like ( 'menu_id', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_menu_groups($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_menu_groups($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_menu_groups($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
