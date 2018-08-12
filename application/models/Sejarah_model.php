<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Sejarah_model extends CI_Model {
	public $table = 'sejarah';
	public $id = 'id_sejarah';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_sejarah() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_sejarah($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_sejarah($q = NULL) {
		$this->db->like ( 'id_sejarah', $q );
		$this->db->or_like ( 'nama_sejarah', $q );
		$this->db->or_like ( 'isi_sejarah', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_sejarah($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_sejarah', $q );
		$this->db->or_like ( 'nama_sejarah', $q );
		$this->db->or_like ( 'isi_sejarah', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_sejarah($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_sejarah($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_sejarah($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
