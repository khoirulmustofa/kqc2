<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Login extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->lang->load ( 'auth' );
	}
	
	// Render View
	public function _render_page($view, $data = NULL, $returnhtml = FALSE) {
		$this->viewdata = (empty ( $data )) ? $this->data : $data;
		
		$view_html = $this->load->view ( $view, $this->viewdata, $returnhtml );
		
		// This will return html on 3rd argument being true
		if ($returnhtml) {
			return $view_html;
		}
	}
	// End Render View
	
	// Index
	public function index() {
		if (! $this->ion_auth->logged_in ()) {
			redirect ( site_url ( 'login/login' ) );
		} else {
			redirect ( site_url ( 'home' ) );
		}
	}
	// End Index
	
	// Login
	public function login() {
		
		// validate form input
		$this->users_rules ();
		
		if ($this->form_validation->run () === TRUE) {
			// check to see if the user is logging in
			// check for "remember me"
			$remember = ( bool ) $this->input->post ( 'remember' );
			
			if ($this->ion_auth->login ( $this->input->post('username',TRUE), $this->input->post('password',TRUE), $remember )) {
				
				// if the login is successful
				// redirect them back to the home page
				$this->session->set_flashdata ( 'message', $this->ion_auth->messages () );
				redirect ( site_url ( 'home' ) );
			} else {
				
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata ( 'message', $this->ion_auth->errors () );
				redirect ( site_url ( 'login/login' ) ); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		} else {
			$data = array (
					'button' => 'Login',
					'action' => site_url ( 'login/login' ),
					'username' => set_value ( 'username' ),
					'password' => set_value ( 'password' ),
					'title' => 'Login',
					'page' => 'login' 
			);
			
			$this->template->load ( template () . '/template', template () . '/view_login', $data );
		}
	}
	// End Login
	public function logout() {
		$this->data ['title'] = "Logout";
		
		// log the user out
		$logout = $this->ion_auth->logout ();
		
		// redirect them to the login page
		$this->session->set_flashdata ( 'message', "Anda Berhasil Keluar dari Sistem !" );
		redirect ( 'home/index', 'refresh' );
	}
	public function users_rules() {
		$this->form_validation->set_rules ( 'username', 'username', 'trim|required' );
		$this->form_validation->set_rules ( 'password', 'password', 'trim|required' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
}
