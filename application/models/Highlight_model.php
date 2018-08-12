<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Highlight_model extends CI_Model {
	public $table = 'highlight';
	public $id = 'id_highlight';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_highlight() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_highlight($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_highlight($q = NULL) {
		$this->db->like ( 'id_highlight', $q );
		$this->db->or_like ( 'nama_highlight', $q );
		$this->db->or_like ( 'gambar_highlight', $q );
		$this->db->or_like ( 'link_highlight', $q );
		$this->db->or_like ( 'active_carousel', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_highlight($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_highlight', $q );
		$this->db->or_like ( 'nama_highlight', $q );
		$this->db->or_like ( 'gambar_highlight', $q );
		$this->db->or_like ( 'link_highlight', $q );
		$this->db->or_like ( 'active_carousel', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_highlight($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_highlight($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_highlight($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
