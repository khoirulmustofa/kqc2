<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Tentang_kami extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	// manajemen
	public function manajemen() {
		$data_manajemen = $this->Tentang_kami_model->get_by_id_tentang_kami ( 1 );
		if ($data_manajemen) {
			$data = array (
					'id_tentang_kami' => $data_manajemen->id_tentang_kami,
					'nama_tentang_kami' => $data_manajemen->nama_tentang_kami,
					'isi_tentang_kami' => $data_manajemen->isi_tentang_kami,
					'gambar_tentang_kami' => $data_manajemen->gambar_tentang_kami,
					'title' => 'Manajemen',
					'page' => 'manajemen' 
			);
			
		}
		//var_dump($data);
		$this->template->load ( template () . '/template', template () . '/view_manajemen', $data );
	}
	// sejarah
	public function sejarah() {
		$data_sejarah = $this->Tentang_kami_model->get_by_id_tentang_kami ( '2' );
		if ($data_sejarah) {
			$data = array (
					'id_tentang_kami' => $data_sejarah->id_tentang_kami,
					'nama_tentang_kami' => $data_sejarah->nama_tentang_kami,
					'isi_tentang_kami' => $data_sejarah->isi_tentang_kami,
					'gambar_tentang_kami' => $data_sejarah->gambar_tentang_kami,
					'title' => 'Sejarah',
					'page' => 'sejarah' 
			);
		}
		$this->template->load ( template () . '/template', template () . '/view_sejarah', $data );
	}
	// visi_misi
	public function visi_misi() {
		$data_sejarah = $this->Tentang_kami_model->get_by_id_tentang_kami ( '3' );
		if ($data_sejarah) {
			$data = array (
					'id_tentang_kami' => $data_sejarah->id_tentang_kami,
					'nama_tentang_kami' => $data_sejarah->nama_tentang_kami,
					'isi_tentang_kami' => $data_sejarah->isi_tentang_kami,
					'gambar_tentang_kami' => $data_sejarah->gambar_tentang_kami,
					'title' => 'Visi Misi',
					'page' => 'visi_misi' 
			);
		}
		$this->template->load ( template () . '/template', template () . '/view_visi_misi', $data );
	}
	
	// method
	public function method() {
		$data_sejarah = $this->Tentang_kami_model->get_by_id_tentang_kami ( '4' );
		if ($data_sejarah) {
			$data = array (
					'id_tentang_kami' => $data_sejarah->id_tentang_kami,
					'nama_tentang_kami' => $data_sejarah->nama_tentang_kami,
					'isi_tentang_kami' => $data_sejarah->isi_tentang_kami,
					'gambar_tentang_kami' => $data_sejarah->gambar_tentang_kami,
					'title' => 'Method',
					'page' => 'method' 
			);
		}
		$this->template->load ( template () . '/template', template () . '/view_method', $data );
	}
	// Legal Formal
	public function legal_formal() {
		$data_sejarah = $this->Tentang_kami_model->get_by_id_tentang_kami ( 5 );
		if ($data_sejarah) {
			$data = array (
					'id_tentang_kami' => $data_sejarah->id_tentang_kami,
					'nama_tentang_kami' => $data_sejarah->nama_tentang_kami,
					'isi_tentang_kami' => $data_sejarah->isi_tentang_kami,
					'gambar_tentang_kami' => $data_sejarah->gambar_tentang_kami,
					'title' => 'Legal Formal',
					'page' => 'legal_formal' 
			);
		}
		$this->template->load ( template () . '/template', template () . '/view_legal_formal', $data );
	}
	// salam_pimpinan
	public function salam_pimpinan() {
		$data_sejarah = $this->Tentang_kami_model->get_by_id_tentang_kami ( 6 );
		if ($data_sejarah) {
			$data = array (
					'id_tentang_kami' => $data_sejarah->id_tentang_kami,
					'nama_tentang_kami' => $data_sejarah->nama_tentang_kami,
					'isi_tentang_kami' => $data_sejarah->isi_tentang_kami,
					'gambar_tentang_kami' => $data_sejarah->gambar_tentang_kami,
					'title' => 'Salam Pimpinan',
					'page' => 'salam_pimpinan' 
			);
		}
		$this->template->load ( template () . '/template', template () . '/view_salam_pimpinan', $data );
	}
}