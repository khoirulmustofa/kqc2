<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Menus_model extends CI_Model {
	public $table = 'menus';
	public $id = 'id_menus';
	public $order = 'ASC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_menus() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	/**
	 * menampilkan semua tanpa proses dulu
	 */
	function get_menus() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( 'menus' );
	}
	
	// get data by id
	function get_by_id_menus($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_menus($q = NULL) {
		$this->db->like ( 'id_menus', $q );
		$this->db->or_like ( 'judul_menus', $q );
		$this->db->or_like ( 'link_menus', $q );
		$this->db->or_like ( 'icon_menus', $q );
		$this->db->or_like ( 'is_main_menu', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_menus($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_menus', $q );
		$this->db->or_like ( 'judul_menus', $q );
		$this->db->or_like ( 'link_menus', $q );
		$this->db->or_like ( 'icon_menus', $q );
		$this->db->or_like ( 'is_main_menu', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_menus($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_menus($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_menus($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
