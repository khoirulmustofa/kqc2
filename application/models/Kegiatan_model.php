<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Kegiatan_model extends CI_Model {
	public $table = 'kegiatan';
	public $id = 'id_kegiatan';
	public $order = 'DESC';
	function __construct() {
		parent::__construct ();
	}
	// untuk cek tanggal kegiatan sudah lewat atau belum
	function cek_tanggal_acara() {
		$this->db->where ( 'waktu_kegiatan > NOW()' );
		$result = $this->db->get ( $this->table );
		//$result = $this->db->last_query ();
		return $result;
	}
	// get_one_data_kegiatan
	function get_one_data_kegiatan($limit, $start) {
		$this->db->order_by ( 'id_kegiatan', 'DESC' );
		$this->db->limit ( $limit, $start );
		$this->db->get ( $this->table );
		$result = $this->db->get ( $this->table );
		//$result = $this->db->last_query ();
		return $result;
	}
	// get all
	function get_all_kegiatan() {
		$this->db->order_by ( $this->id, $this->order );
		return $this->db->get ( $this->table )->result ();
	}
	
	// get data by id
	function get_by_id_kegiatan($id) {
		$this->db->where ( $this->id, $id );
		return $this->db->get ( $this->table )->row ();
	}
	
	// get total rows
	function total_rows_kegiatan($q = NULL) {
		$this->db->like ( 'id_kegiatan', $q );
		$this->db->or_like ( 'name_kegiatan', $q );
		$this->db->or_like ( 'tempat_kegiatan', $q );
		$this->db->or_like ( 'waktu_kegiatan', $q );
		$this->db->from ( $this->table );
		return $this->db->count_all_results ();
	}
	
	// get data with limit and search
	function get_limit_data_kegiatan($limit, $start = 0, $q = NULL) {
		$this->db->order_by ( $this->id, $this->order );
		$this->db->like ( 'id_kegiatan', $q );
		$this->db->or_like ( 'name_kegiatan', $q );
		$this->db->or_like ( 'tempat_kegiatan', $q );
		$this->db->or_like ( 'waktu_kegiatan', $q );
		$this->db->limit ( $limit, $start );
		return $this->db->get ( $this->table )->result ();
	}
	
	// insert data
	function insert_kegiatan($data) {
		$this->db->insert ( $this->table, $data );
	}
	
	// update data
	function update_kegiatan($id, $data) {
		$this->db->where ( $this->id, $id );
		$this->db->update ( $this->table, $data );
	}
	
	// delete data
	function delete_kegiatan($id) {
		$this->db->where ( $this->id, $id );
		$this->db->delete ( $this->table );
	}
}