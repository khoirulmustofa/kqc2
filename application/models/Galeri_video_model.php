<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Galeri_video_model extends CI_Model {
	public $table = 'galeri_video';
	public $id = 'id_galeri_video';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_galeri_video() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_galeri_video($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_galeri_video($q = NULL) {
		$this->db->like ( 'id_galeri_video', $q );
		$this->db->or_like ( 'nama_galeri_video', $q );
		$this->db->or_like ( 'link_galeri_video', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_galeri_video($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_galeri_video', $q );
		$this->db->or_like ( 'nama_galeri_video', $q );
		$this->db->or_like ( 'link_galeri_video', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_galeri_video($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_galeri_video($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_galeri_video($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}