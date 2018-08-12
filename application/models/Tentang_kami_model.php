<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Tentang_kami_model extends CI_Model {
	public $table = 'tentang_kami';
	public $id = 'id_tentang_kami';
	public $order = 'ASC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_tentang_kami() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_tentang_kami($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_tentang_kami($q = NULL) {
		$this->db->like ( 'id_tentang_kami', $q );
		$this->db->or_like ( 'nama_tentang_kami', $q );
		$this->db->or_like ( 'isi_tentang_kami', $q );
		$this->db->or_like ( 'gambar_tentang_kami', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_tentang_kami($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_tentang_kami', $q );
		$this->db->or_like ( 'nama_tentang_kami', $q );
		$this->db->or_like ( 'isi_tentang_kami', $q );
		$this->db->or_like ( 'gambar_tentang_kami', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_tentang_kami($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_tentang_kami($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_tentang_kami($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
