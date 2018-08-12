<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Visi_misi_model extends CI_Model {
	public $table = 'visi_misi';
	public $id = 'id_visi_misi';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	
	// get all
	function get_all_visi_misi() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_visi_misi($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_visi_misi($q = NULL) {
		$this->db->like ( 'id_visi_misi', $q );
		$this->db->or_like ( 'nama_visi_misi', $q );
		$this->db->or_like ( 'isi_visi_misi', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_visi_misi($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_visi_misi', $q );
		$this->db->or_like ( 'nama_visi_misi', $q );
		$this->db->or_like ( 'isi_visi_misi', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_visi_misi($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_visi_misi($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_visi_misi($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}
