<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Hubungi_kami extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		$data = array (
				'action' => site_url ( 'hubungi_kami/send_email' ),
				'title' => 'Hubungi Kami',
				'page' => 'hubungi_kami' 
		);
		$this->template->load ( template () . '/template', template () . '/view_hubungi_kami', $data );
	}
	public function send_email() {
		$this->hubungi_kami_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->index ();
		} else {
			$data = array (
					'nama_pengirim' => $this->input->post ( 'nama_pengirim', TRUE ),
					'email_pengirim' => $this->input->post ( 'email_pengirim', TRUE ),
					'tlp_pengirim' => $this->input->post ( 'tlp_pengirim', TRUE ),
					'subjek_pengirim' => $this->input->post ( 'subjek_pengirim', TRUE ),
					'isi_pesan' => $this->input->post ( 'isi_pesan', TRUE ) 
			);
			
			// $this->session->set_flashdata ( 'message', 'Pesan Anda Telah Terkirim .' );
			
			$this->load->library ( 'email' );
			
			// SMTP & mail configuration
			$config = array (
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'khoirul.dev123@gmail.com',
					'smtp_pass' => 'GmailDev@123',
					'mailtype' => 'html',
					'charset' => 'utf-8' 
			);
			$this->email->initialize ( $config );
			$this->email->set_mailtype ( "html" );
			$this->email->set_newline ( "\r\n" );
			
			// Email content
			$htmlContent = 'Perihal 		: User Pesan<br>';
			$htmlContent .= '<br>';
			$htmlContent .= 'Kepada Yth,<br>';
			$htmlContent .= 'Kampung Qur&#39;am Cikarang<br>';
			$htmlContent .= 'Di Tempat<br>';
			$htmlContent .= '<br>';
			$htmlContent .= 'Berkenaan dengan Surat Pemberitahuan ini, dengan ini kami memberi informasi :</p>';
			
			$htmlContent .= '<p>Nama	: ' . ucwords ( $this->input->post ( 'nama_pengirim', TRUE ) ) . '</p>';
			
			$htmlContent .= '<p>No HP	: ' . $this->input->post ( 'tlp_pengirim', TRUE ) . '</p>';
			
			$htmlContent .= '<p>E-mail	: ' . $this->input->post ( 'email_pengirim', TRUE ) . '</p>';
			
			$htmlContent .= '<p>Perihal	: ' . ucwords ( $this->input->post ( 'subjek_pengirim', TRUE ) ) . '</p>';
			
			$htmlContent .= '<p>Pesan	: ' . $this->input->post ( 'isi_pesan', TRUE ) . '</p>';
			
			$htmlContent .= '<p><br>';
			$htmlContent .= 'Atas perhatian serta kerjasama Saudara/I, kami ucapkan terima kasih.<br>';
			$htmlContent .= '<br>';
			$htmlContent .= 'Bekasi, ' . tgl_indo ( date ( 'Y-m-d' ) );
			$htmlContent .= '<br>';
			$htmlContent .= 'Hormat kami,<br>';
			$htmlContent .= '<br>';
			$htmlContent .= '<br>';
			$htmlContent .= 'System Application</p>';
			
			$this->email->to ( $this->input->post ( 'email_pengirim', TRUE ) );
			$this->email->from ( 'khoirul.dev123@gmail.com', 'Khoirul Dev' );
			$this->email->subject ( ucwords ( $this->input->post ( 'subjek_pengirim', TRUE ) ) );
			$this->email->message ( $htmlContent );
			
			// Send email
			
			if (! $this->email->send ()) {
				// Raise error message
				// show_error ();
				$pesan = $this->email->print_debugger ();
			} else {
				// Show success notification or other things here
				$pesan = 'Pesan Anda Telah Terkirim';
			}
			
			$result = $this->email->send ();
			$this->session->set_flashdata ( 'message', $pesan );
			redirect ( site_url ( 'hubungi_kami' ) );
		}
		
		/*
		 * $data = array (
		 *
		 * 'title' => 'Hubungi Kami',
		 * 'page' => 'hubungi_kami'
		 * );
		 * $this->template->load ( template () . '/template', template () . '/view_hubungi_kami', $data );
		 */
	}
	public function hubungi_kami_rules() {
		$this->form_validation->set_rules ( 'nama_pengirim', 'nama pengirim', 'trim|required' );
		$this->form_validation->set_rules ( 'email_pengirim', 'email pengirim', 'trim|required' );
		$this->form_validation->set_rules ( 'tlp_pengirim', 'tlp pengirim', 'trim|required' );
		$this->form_validation->set_rules ( 'subjek_pengirim', 'subjek pengirim', 'trim|required' );
		$this->form_validation->set_rules ( 'isi_pesan', 'Isi Pesan', 'trim|required' );
		
		$this->form_validation->set_rules ( 'id', 'id', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
}
