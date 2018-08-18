<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Admin extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'upload' );
		$this->lang->load ( 'auth' );
	}
	public function index() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$data = array (
				
				'tittle' => 'Beranda',
				'page' => 'Beranda' 
		);
		$this->template->load ( 'admin/template', 'admin/view_dasboard' );
	}
	
	// render
	public function _render_page($view, $data = NULL, $returnhtml = FALSE) // I think this makes more sense
{
		$this->viewdata = (empty ( $data )) ? $this->data : $data;
		
		$view_html = $this->load->view ( $view, $this->viewdata, $returnhtml );
		
		// This will return html on 3rd argument being true
		if ($returnhtml) {
			return $view_html;
		}
	}
	// end render
	
	// Login
	public function login() {
		if ($this->ion_auth->logged_in ()) {
			return redirect ( site_url ( 'admin' ) );
		}
		// validate form input
		$this->users_rules_login ();
		
		if ($this->form_validation->run () === TRUE) {
			// check to see if the user is logging in
			// check for "remember me"
			$remember = ( bool ) $this->input->post ( 'remember' );
			
			if ($this->ion_auth->login ( $this->input->post ( 'username', TRUE ), $this->input->post ( 'password', TRUE ), $remember )) {
				// Sukses
				$this->session->set_flashdata ( 'message', $this->ion_auth->messages () );
				redirect ( site_url ( 'admin' ) );
			} else {
				// Gagal
				$this->session->set_flashdata ( 'message', $this->ion_auth->errors () );
				redirect ( site_url ( 'admin/login' ) ); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		} else {
			// Gak lolos validasi CI
			$data = array (
					'title' => 'Login',
					'page' => 'login',
					'button' => 'Login',
					'action' => site_url ( 'admin/login' ),
					'username' => set_value ( 'username' ),
					'password' => set_value ( 'password' ) 
			);
			
			$this->load->view ( 'admin/view_login', $data );
		}
	}
	// End Login
	
	// Login
	public function logout() {
		// log the user out
		$logout = $this->ion_auth->logout ();
		// redirect them to the login page
		$this->session->set_flashdata ( 'message', $this->ion_auth->messages () );
		redirect ( site_url ( 'admin/login' ) );
	}
	// End Login
	
	// users
	public function users() {
		if (! $this->ion_auth->logged_in () && ! $this->ion_auth->is_admin ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		
		$this->data ['users'] = $this->ion_auth->users ()->result ();
		foreach ( $this->data ['users'] as $k => $user ) {
			$this->data ['users'] [$k]->groups = $this->ion_auth->get_users_groups ( $user->id )->result ();
		}
		$this->data ['button'] = 'List';
		$this->data ['page'] = 'users_list';
		$this->data ['title'] = 'Users';
		
		$this->template->load ( 'admin/template', 'admin/view_users_list', $this->data );
	}
	public function users_create() {
		if (! $this->ion_auth->logged_in () && ! $this->ion_auth->is_admin ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		
		$this->data ['button'] = 'Create';
		$this->data ['page'] = 'users_form';
		$this->data ['title'] = 'Users';
		$this->data ['action'] = site_url ( 'admin/users_create_action' );
		
		$this->data ['first_name'] = set_value ( 'first_name' );
		$this->data ['last_name'] = set_value ( 'last_name' );
		$this->data ['email'] = set_value ( 'email' );
		$this->data ['phone'] = set_value ( 'phone' );
		$this->data ['password'] = set_value ( 'password' );
		$this->data ['password_confirm'] = set_value ( 'password_confirm' );
		
		$this->template->load ( 'admin/template', 'admin/view_users_form', $this->data );
	}
	public function users_create_action() {
		if (! $this->ion_auth->logged_in () && ! $this->ion_auth->is_admin ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		
		$this->users_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->users_create ();
		} else {
			
			$email = strtolower ( $this->input->post ( 'email', TRUE ) );
			$username = ucwords ( $this->input->post ( 'first_name', TRUE ) );
			$password = $this->input->post ( 'password', TRUE );
			
			$additional_data = array (
					'first_name' => $this->input->post ( 'first_name', TRUE ),
					'last_name' => $this->input->post ( 'last_name', TRUE ),
					'company' => "Kampung Qur'an Cikarang",
					'phone' => $this->input->post ( 'phone', TRUE ) 
			);
			
			$this->ion_auth->register ( $username, $password, $email, $additional_data );
			
			$this->session->set_flashdata ( 'message', 'Create Record Users Success' );
			redirect ( site_url ( 'admin/users' ) );
		}
	}
	
	// End users
	
	// user edit
	public function users_update($id) {
		if (! $this->ion_auth->logged_in () && ! $this->ion_auth->is_admin ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		
		$user = $this->ion_auth->user ( $id )->row ();
		$groups = $this->ion_auth->groups ()->result_array ();
		$currentGroups = $this->ion_auth->get_users_groups ( $id )->result ();
		
		// display the edit user form
		$this->data ['csrf'] = $this->_get_csrf_nonce ();
		
		// pass the user to the view
		$this->data ['user'] = $user;
		$this->data ['groups'] = $groups;
		$this->data ['currentGroups'] = $currentGroups;
		
		if ($user) {
			$this->data ['button'] = 'Update';
			$this->data ['page'] = 'users_form';
			$this->data ['title'] = 'Users';
			$this->data ['action'] = site_url ( 'admin/users_update_action' );
			$this->data ['first_name'] = set_value ( 'username', $user->first_name );
			$this->data ['last_name'] = set_value ( 'last_name', $user->last_name );
			
			$this->data ['phone'] = set_value ( 'phone', $user->phone );
			$this->data ['password'] = set_value ( 'password' );
			$this->data ['password_confirm'] = set_value ( 'password_confirm' );
			$this->template->load ( 'admin/template', 'admin/view_users_form', $this->data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Users Not Found' );
			redirect ( site_url ( 'admin/users' ) );
		}
	}
	public function users_update_action() {
		if (! $this->ion_auth->logged_in () && ! $this->ion_auth->is_admin ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		
		if (empty ( $this->input->post ( 'password', TRUE ) )) {
			$this->users_rules_update ();
		} else {
			$this->users_rules_update_pass ();
		}
		
		if ($this->form_validation->run () == FALSE) {
			$this->users_update ( $this->input->post ( 'id', TRUE ) );
		} else {
			$id = $this->input->post ( 'id', TRUE );
			$data = array (
					'username' => ucwords ( $this->input->post ( 'first_name', TRUE ) ),
					'first_name' => $this->input->post ( 'first_name', TRUE ),
					'last_name' => $this->input->post ( 'last_name', TRUE ),
					'company' => "Kampung Qur'an Cikarang",
					'phone' => $this->input->post ( 'phone', TRUE ) 
			);
			
			// update the password if it was posted
			if ($this->input->post ( 'password' )) {
				$data ['password'] = $this->input->post ( 'password' );
			}
			
			// Only allow updating groups if user is admin
			if ($this->ion_auth->is_admin ()) {
				// Update the groups user belongs to
				$groupData = $this->input->post ( 'groups' );
				
				if (isset ( $groupData ) && ! empty ( $groupData )) {
					
					$this->ion_auth->remove_from_group ( '', $id );
					
					foreach ( $groupData as $grp ) {
						$this->ion_auth->add_to_group ( $grp, $id );
					}
				}
			}
			
			// check to see if we are updating the user
			if ($this->ion_auth->update ( $id, $data )) {
				// redirect them back to the admin page if admin, or to the base url if non admin
				$this->session->set_flashdata ( 'message', 'Update Record Users Success' );
				redirect ( site_url ( 'admin/users' ) );
			} else {
				// redirect them back to the admin page if admin, or to the base url if non admin
				$this->session->set_flashdata ( 'message', 'Update Record Users Fail' );
				redirect ( site_url ( 'admin/users' ) );
			}
		}
	}
	// end user edit
	
	// Deactivate
	public function deactivate($id = NULL) {
		if (! $this->ion_auth->logged_in () && ! $this->ion_auth->is_admin ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$id = ( int ) $id;
		
		$this->load->library ( 'form_validation' );
		$this->form_validation->set_rules ( 'confirm', $this->lang->line ( 'deactivate_validation_confirm_label' ), 'required' );
		$this->form_validation->set_rules ( 'id', $this->lang->line ( 'deactivate_validation_user_id_label' ), 'required|alpha_numeric' );
		
		if ($this->form_validation->run () === FALSE) {
			// insert csrf check
			$this->data ['csrf'] = $this->_get_csrf_nonce ();
			$this->data ['user'] = $this->ion_auth->user ( $id )->row ();
			$this->data ['button'] = 'Deactivate';
			$this->data ['page'] = 'users_form';
			$this->data ['title'] = 'Users';
			$this->template->load ( 'admin/template', 'admin/view_deactivate_user', $this->data );
		} else {
			// do we really want to deactivate?
			if ($this->input->post ( 'confirm' ) == 'yes') {
				// do we have a valid request?
				if ($this->_valid_csrf_nonce () === FALSE || $id != $this->input->post ( 'id' )) {
					return show_error ( $this->lang->line ( 'error_csrf' ) );
				}
				
				// do we have the right userlevel?
				if ($this->ion_auth->logged_in () && $this->ion_auth->is_admin ()) {
					$this->ion_auth->deactivate ( $id );
					$this->session->set_flashdata ( 'message', 'User is deactivated ' );
				}
			}
			
			// redirect them back to the auth page
			redirect ( site_url ( 'admin/users' ) );
		}
	}
	// Activate
	public function activate($id, $code = FALSE) {
		if ($code !== FALSE) {
			$activation = $this->ion_auth->activate ( $id, $code );
		} else if ($this->ion_auth->is_admin ()) {
			$activation = $this->ion_auth->activate ( $id );
		}
		
		if ($activation) {
			// redirect them to the auth page
			$this->session->set_flashdata ( 'message', $this->ion_auth->messages () );
			redirect ( site_url ( 'admin/users' ) );
		} else {
			// redirect them to the forgot password page
			$this->session->set_flashdata ( 'message', $this->ion_auth->errors () );
			redirect ( site_url ( 'admin/users' ) );
		}
	}
	// Untuk users_rules
	public function users_rules_login() {
		$this->form_validation->set_rules ( 'username', 'username', 'trim|required|valid_email' );
		$this->form_validation->set_rules ( 'password', 'Password', 'required|min_length[' . $this->config->item ( 'min_password_length', 'ion_auth' ) . ']|max_length[' . $this->config->item ( 'max_password_length', 'ion_auth' ) . ']' );
		
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	public function users_rules() {
		$tables = $this->config->item ( 'tables', 'ion_auth' );
		
		$this->form_validation->set_rules ( 'first_name', 'first name', 'trim|required' );
		$this->form_validation->set_rules ( 'last_name', 'last name', 'trim|required' );
		$this->form_validation->set_rules ( 'email', 'email', 'trim|required|valid_email|is_unique[' . $tables ['users'] . '.email]' );
		$this->form_validation->set_rules ( 'phone', 'phone', 'trim|required|numeric' );
		$this->form_validation->set_rules ( 'password', 'Password', 'required|min_length[' . $this->config->item ( 'min_password_length', 'ion_auth' ) . ']|max_length[' . $this->config->item ( 'max_password_length', 'ion_auth' ) . ']|matches[password_confirm]' );
		$this->form_validation->set_rules ( 'password_confirm', 'Password Confirm', 'required' );
		
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	public function users_rules_update() {
		$tables = $this->config->item ( 'tables', 'ion_auth' );
		
		$this->form_validation->set_rules ( 'first_name', 'first name', 'trim|required' );
		$this->form_validation->set_rules ( 'last_name', 'last name', 'trim|required' );
		$this->form_validation->set_rules ( 'phone', 'phone', 'trim|required|numeric' );
		
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	public function users_rules_update_pass() {
		$tables = $this->config->item ( 'tables', 'ion_auth' );
		
		$this->form_validation->set_rules ( 'first_name', 'first name', 'trim|required' );
		$this->form_validation->set_rules ( 'last_name', 'last name', 'trim|required' );
		$this->form_validation->set_rules ( 'phone', 'phone', 'trim|required|numeric' );
		$this->form_validation->set_rules ( 'password', 'Password', 'required|min_length[' . $this->config->item ( 'min_password_length', 'ion_auth' ) . ']|max_length[' . $this->config->item ( 'max_password_length', 'ion_auth' ) . ']|matches[password_confirm]' );
		$this->form_validation->set_rules ( 'password_confirm', 'Password Confirm', 'required' );
		
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// End users_rules
	/**
	 *
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce() {
		$this->load->helper ( 'string' );
		$key = random_string ( 'alnum', 8 );
		$value = random_string ( 'alnum', 20 );
		$this->session->set_flashdata ( 'csrfkey', $key );
		$this->session->set_flashdata ( 'csrfvalue', $value );
		
		return array (
				$key => $value 
		);
	}
	public function _valid_csrf_nonce() {
		$csrfkey = $this->input->post ( $this->session->flashdata ( 'csrfkey' ) );
		if ($csrfkey && $csrfkey === $this->session->flashdata ( 'csrfvalue' )) {
			return TRUE;
		}
		return FALSE;
	}
	// Group
	public function groups() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admin/groups/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admin/groups/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admin/groups/';
			$config ['first_url'] = base_url () . 'admin/groups/';
		}
		
		$config ['per_page'] = 3;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Groups_model->total_rows_groups ( $q );
		$groups = $this->Groups_model->get_limit_data_groups ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'groups_data' => $groups,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'groups_list',
				'title' => 'Groups' 
		);
		
		$this->template->load ( 'admin/template', 'admin/view_groups_list', $data );
	}
	public function groups_create() {
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/groups_create_action' ),
				'id' => set_value ( 'id' ),
				'name' => set_value ( 'name' ),
				'description' => set_value ( 'description' ),
				'page' => 'groups_form',
				'title' => 'Groups' 
		);
		$this->template->load ( 'admin/template', 'admin/view_groups_form', $data );
	}
	public function groups_create_action() {
		$this->groups_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->groups_create ();
		} else {
			$data = array (
					'name' => ucwords ( $this->input->post ( 'name', TRUE ) ),
					'description' => ucwords ( $this->input->post ( 'description', TRUE ) ) 
			);
			
			$this->Groups_model->insert_groups ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Groups Success' );
			redirect ( site_url ( 'admin/groups' ) );
		}
	}
	public function groups_update($id) {
		$row = $this->Groups_model->get_by_id_groups ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/groups_update_action' ),
					'id' => set_value ( 'id', $row->id ),
					'name' => set_value ( 'name', $row->name ),
					'description' => set_value ( 'description', $row->description ),
					'page' => 'groups_form',
					'title' => 'Groups' 
			);
			
			$this->template->load ( 'admin/template', 'admin/view_groups_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'groups' ) );
		}
	}
	public function groups_update_action() {
		$this->groups_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->groups_update ( $this->input->post ( 'id', TRUE ) );
		} else {
			$data = array (
					'name' => ucwords ( $this->input->post ( 'name', TRUE ) ),
					'description' => ucwords ( $this->input->post ( 'description', TRUE ) ) 
			);
			
			$this->Groups_model->update_groups ( $this->input->post ( 'id', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Groups Success' );
			redirect ( site_url ( 'admin/groups' ) );
		}
	}
	public function groups_delete($id) {
		$row = $this->Groups_model->get_by_id_groups ( $id );
		
		if ($row) {
			$this->Groups_model->delete_groups ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Groups Success' );
			redirect ( site_url ( 'admin/groups' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Groups Not Found' );
			redirect ( site_url ( 'admin/groups' ) );
		}
	}
	public function groups_rules() {
		$this->form_validation->set_rules ( 'name', 'name', 'trim|required' );
		$this->form_validation->set_rules ( 'description', 'description', 'trim|required' );
		
		$this->form_validation->set_rules ( 'id', 'id', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// End Group
	
	// authorization_menu
	/**
	 *
	 * @param
	 *        	Id Groups -> $id
	 */
	public function authorization_menu($id) {
		if (! $this->ion_auth->logged_in () && ! $this->ion_auth->is_admin ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$menus = $this->Menus_model->get_menus ()->result_array ();
		$current_menu_groups = $this->Menu_groups_model->get_menus_groups_by ( $id )->result ();
		
		$this->data ['data_menus'] = $menus;
		$this->data ['data_current_menu_groups'] = $current_menu_groups;
		$this->data ['button'] = 'Update';
		$this->data ['action'] = site_url ( 'admin/authorization_menu_action' );
		$this->data ['page'] = 'authorization_form';
		$this->data ['title'] = 'Authorization Form';
		$this->data ['group_id'] = $id;
		
		// echo $current_menu_groups;
		$this->template->load ( 'admin/template', 'admin/view_authorization_form', $this->data );
	}
	// End authorization_menu
	
	// authorization_menu_action
	public function authorization_menu_action() {
		if (! $this->ion_auth->logged_in () && ! $this->ion_auth->is_admin ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$group_id = $this->input->post ( 'group_id', TRUE );
		if ($this->ion_auth->is_admin ()) {
			$menusData = $this->input->post ( 'menus' );
			
			if (isset ( $menusData ) && ! empty ( $menusData )) {
				
				$this->Menu_groups_model->remove_menu_by_groups_id ( $group_id );
				
				foreach ( $menusData as $mData ) {
					$this->Menu_groups_model->add_menu_to_groups ( $mData, $group_id );
				}
			}
		}
		$this->session->set_flashdata ( 'message', 'Update Record Authorization Menu Success' );
		redirect ( site_url ( 'admin/groups' ) );
	}
	// Menus
	public function menus() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admins/menus/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admins/menus/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admins/menus/';
			$config ['first_url'] = base_url () . 'admins/menus/';
		}
		
		$config ['per_page'] = 20;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Menus_model->total_rows_menus ( $q );
		$menus = $this->Menus_model->get_limit_data_menus ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'menus_data' => $menus,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'menus_list',
				'title' => 'Menus' 
		);
		$this->template->load ( 'admin/template', 'admin/view_menus_list', $data );
	}
	public function menus_create() {
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/menus_create_action' ),
				'id_menus' => set_value ( 'id_menus' ),
				'judul_menus' => set_value ( 'judul_menus' ),
				'link_menus' => set_value ( 'link_menus' ),
				'icon_menus' => set_value ( 'icon_menus' ),
				'is_main_menu' => set_value ( 'is_main_menu' ),
				'page' => 'menus_form',
				'title' => 'Menus' 
		);
		$this->template->load ( 'admin/template', 'admin/view_menus_form', $data );
	}
	public function menus_create_action() {
		$this->menus_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->menus_create ();
		} else {
			$data = array (
					'judul_menus' => ucwords ( $this->input->post ( 'judul_menus', TRUE ) ),
					'link_menus' => $this->input->post ( 'link_menus', TRUE ),
					'icon_menus' => $this->input->post ( 'icon_menus', TRUE ),
					'is_main_menu' => $this->input->post ( 'is_main_menu', TRUE ) 
			);
			
			$this->Menus_model->insert_menus ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Menus Success' );
			redirect ( site_url ( 'admin/menus' ) );
		}
	}
	public function menus_update($id) {
		$row = $this->Menus_model->get_by_id_menus ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/menus_update_action' ),
					'id_menus' => set_value ( 'id_menus', $row->id_menus ),
					'judul_menus' => set_value ( 'judul_menus', $row->judul_menus ),
					'link_menus' => set_value ( 'link_menus', $row->link_menus ),
					'icon_menus' => set_value ( 'icon_menus', $row->icon_menus ),
					'is_main_menu' => set_value ( 'is_main_menu', $row->is_main_menu ),
					'page' => 'menus_form',
					'title' => 'Menus' 
			);
			$this->template->load ( 'admin/template', 'admin/view_menus_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Menus Not Found' );
			redirect ( site_url ( 'admin/menus' ) );
		}
	}
	public function menus_update_action() {
		$this->menus_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->menus_update ( $this->input->post ( 'id_menus', TRUE ) );
		} else {
			$data = array (
					'judul_menus' => ucwords ( $this->input->post ( 'judul_menus', TRUE ) ),
					'link_menus' => $this->input->post ( 'link_menus', TRUE ),
					'icon_menus' => $this->input->post ( 'icon_menus', TRUE ),
					'is_main_menu' => $this->input->post ( 'is_main_menu', TRUE ) 
			);
			
			$this->Menus_model->update_menus ( $this->input->post ( 'id_menus', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Menus Success' );
			redirect ( site_url ( 'admin/menus' ) );
		}
	}
	public function menus_delete($id) {
		$row = $this->Menus_model->get_by_id_menus ( $id );
		
		if ($row) {
			$this->Menus_model->delete_menus ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Menus Success' );
			redirect ( site_url ( 'admin/menus' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Menus Not Found' );
			redirect ( site_url ( 'admin/menus' ) );
		}
	}
	public function menus_rules() {
		$this->form_validation->set_rules ( 'judul_menus', 'judul menus', 'trim|required' );
		$this->form_validation->set_rules ( 'link_menus', 'link menus', 'trim|required' );
		$this->form_validation->set_rules ( 'icon_menus', 'icon menus', 'trim|required' );
		$this->form_validation->set_rules ( 'is_main_menu', 'is main menu', 'trim|required|numeric' );
		
		$this->form_validation->set_rules ( 'id_menus', 'id_menus', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// End Menus
	
	// Tentang Kami
	public function tentang_kami() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admin/tentang_kami/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admin/tentang_kami/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admin/tentang_kami/';
			$config ['first_url'] = base_url () . 'admin/tentang_kami/';
		}
		
		$config ['per_page'] = 10;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Tentang_kami_model->total_rows_tentang_kami ( $q );
		$tentang_kami = $this->Tentang_kami_model->get_limit_data_tentang_kami ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'tentang_kami_data' => $tentang_kami,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'tentang_kami_list',
				'title' => 'Tentang Kami' 
		);
		$this->template->load ( 'admin/template', 'admin/view_tentang_kami_list', $data );
	}
	public function tentang_kami_create() {
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/tentang_kami_create_action' ),
				'id_tentang_kami' => set_value ( 'id_tentang_kami' ),
				'nama_tentang_kami' => set_value ( 'nama_tentang_kami' ),
				'isi_tentang_kami' => set_value ( 'isi_tentang_kami' ),
				'gambar_tentang_kami' => set_value ( 'gambar_tentang_kami' ),
				'page' => 'tentang_kami_form',
				'title' => 'Tentang Kami' 
		);
		$this->template->load ( 'admin/template', 'admin/view_tentang_kami_form', $data );
	}
	public function tentang_kami_create_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->tentang_kami_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->tentang_kami_create ();
		} else {
			$config ['upload_path'] = 'public/tentang_kami/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['gambar_tentang_kami'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar_tentang_kami' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/tentang_kami/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/tentang_kami/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'nama_tentang_kami' => ucwords ( $this->input->post ( 'nama_tentang_kami', TRUE ) ),
							'isi_tentang_kami' => $this->input->post ( 'isi_tentang_kami', TRUE ),
							'gambar_tentang_kami' => $gbr ['file_name'] 
					);
				}
			} else {
				$data = array (
						'nama_tentang_kami' => ucwords ( $this->input->post ( 'nama_tentang_kami', TRUE ) ),
						'isi_tentang_kami' => $this->input->post ( 'isi_tentang_kami', TRUE ) 
				);
			}
			
			$this->Tentang_kami_model->insert_tentang_kami ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'admin/tentang_kami' ) );
		}
	}
	public function tentang_kami_update($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Tentang_kami_model->get_by_id_tentang_kami ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/tentang_kami_update_action' ),
					'id_tentang_kami' => set_value ( 'id_tentang_kami', $row->id_tentang_kami ),
					'nama_tentang_kami' => set_value ( 'nama_tentang_kami', $row->nama_tentang_kami ),
					'isi_tentang_kami' => set_value ( 'isi_tentang_kami', $row->isi_tentang_kami ),
					'gambar_tentang_kami1' => set_value ( 'gambar_tentang_kami', $row->gambar_tentang_kami ),
					'page' => 'tentang_kami_form',
					'title' => 'Tentang Kami' 
			);
			$this->template->load ( 'admin/template', 'admin/view_tentang_kami_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/tentang_kami' ) );
		}
	}
	public function tentang_kami_update_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->tentang_kami_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->tentang_kami_update ( $this->input->post ( 'id_tentang_kami', TRUE ) );
		} else {
			
			$config ['upload_path'] = 'public/tentang_kami/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['gambar_tentang_kami'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar_tentang_kami' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/tentang_kami/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/tentang_kami/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'nama_tentang_kami' => ucwords ( $this->input->post ( 'nama_tentang_kami', TRUE ) ),
							'isi_tentang_kami' => $this->input->post ( 'isi_tentang_kami', TRUE ),
							'gambar_tentang_kami' => $gbr ['file_name'] 
					);
					$path_file = 'public/tentang_kami/' . $this->input->post ( 'gambar_tentang_kami1', TRUE );
					if (file_exists ( $path_file )) {
						unlink ( $path_file );
					}
				}
			} else {
				$data = array (
						'nama_tentang_kami' => ucwords ( $this->input->post ( 'nama_tentang_kami', TRUE ) ),
						'isi_tentang_kami' => $this->input->post ( 'isi_tentang_kami', TRUE ) 
				);
			}
			
			$this->Tentang_kami_model->update_tentang_kami ( $this->input->post ( 'id_tentang_kami', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Success' );
			redirect ( site_url ( 'admin/tentang_kami' ) );
		}
	}
	public function tentang_kami_delete($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Tentang_kami_model->get_by_id_tentang_kami ( $id );
		$path_file = 'public/tentang_kami/' . $row->gambar_tentang_kami;
		if (file_exists ( $path_file )) {
			unlink ( $path_file );
		}
		if ($row) {
			$this->Tentang_kami_model->delete_tentang_kami ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'admin/tentang_kami' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/tentang_kami' ) );
		}
	}
	public function tentang_kami_rules() {
		$this->form_validation->set_rules ( 'nama_tentang_kami', 'nama tentang kami', 'trim|required' );
		$this->form_validation->set_rules ( 'isi_tentang_kami', 'isi tentang kami', 'trim|required' );
		$this->form_validation->set_rules ( 'gambar_tentang_kami', 'gambar tentang kami' );
		
		$this->form_validation->set_rules ( 'id_tentang_kami', 'id_tentang_kami', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	
	// End Tentang Kami
	
	// Berita
	public function berita() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admin/berita/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admin/berita/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admin/berita/';
			$config ['first_url'] = base_url () . 'admin/berita/';
		}
		
		$config ['per_page'] = 10;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Berita_model->total_rows_berita ( $q );
		$berita = $this->Berita_model->get_limit_data_berita ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'berita_data' => $berita,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'berita_list',
				'title' => 'Berita' 
		);
		$this->template->load ( 'admin/template', 'admin/view_berita_list', $data );
	}
	public function berita_create() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/berita_create_action' ),
				'id_berita' => set_value ( 'id_berita' ),
				'username' => set_value ( 'username' ),
				'judul_berita' => set_value ( 'judul_berita' ),
				'judul_seo_berita' => set_value ( 'judul_seo_berita' ),
				'isi_berita' => set_value ( 'isi_berita' ),
				'hari' => set_value ( 'hari' ),
				'tanggal' => set_value ( 'tanggal' ),
				'jam' => set_value ( 'jam' ),
				'gambar_1' => set_value ( 'gambar' ),
				'dibaca' => set_value ( 'dibaca' ),
				'tag_data' => $this->Tag_model->get_all_tag (),
				'page' => 'berita_form',
				'title' => 'Berita' 
		);
		$this->template->load ( 'admin/template', 'admin/view_berita_form', $data );
	}
	public function berita_create_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->berita_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->berita_create ();
		} else {
			$config ['upload_path'] = 'public/foto_berita/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if ($this->input->post ( 'tag' ) != '') {
				$tag_seo = $this->input->post ( 'tag' );
				$tag = implode ( ',', $tag_seo );
			} else {
				$tag = '';
			}
			
			if (! empty ( $_FILES ['gambar'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/foto_berita/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 750;
					$config ['height'] = 337;
					$config ['new_image'] = 'public/foto_berita/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'username' => ucwords ( $this->session->userdata ( 'username' ) ),
							'judul_berita' => ucwords ( $this->input->post ( 'judul_berita', TRUE ) ),
							'judul_seo_berita' => seo_title ( $this->input->post ( 'judul_berita', TRUE ) ),
							'isi_berita' => $this->input->post ( 'isi_berita', TRUE ),
							'hari' => hari_ini ( date ( 'w' ) ),
							'tanggal' => date ( 'Y-m-d' ),
							'jam' => date ( 'H:i:s' ),
							'gambar' => $gbr ['file_name'],
							'dibaca' => '0',
							'tag' => $tag 
					);
				}
			} else {
				$data = array (
						'username' => ucwords ( $this->session->userdata ( 'username' ) ),
						'judul_berita' => ucwords ( $this->input->post ( 'judul_berita', TRUE ) ),
						'judul_seo_berita' => seo_title ( $this->input->post ( 'judul_berita', TRUE ) ),
						'isi_berita' => $this->input->post ( 'isi_berita', TRUE ),
						'hari' => hari_ini ( date ( 'w' ) ),
						'tanggal' => date ( 'Y-m-d' ),
						'jam' => date ( 'H:i:s' ),
						'dibaca' => '0',
						'tag' => $tag 
				);
			}
			
			$this->Berita_model->insert_berita ( $data );
			$this->session->set_flashdata ( 'message', 'Create berita Record Success' );
			redirect ( site_url ( 'admin/berita' ) );
		}
	}
	public function berita_update($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Berita_model->get_by_id_berita ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/berita_update_action' ),
					'id_berita' => set_value ( 'id_berita', $row->id_berita ),
					'username' => set_value ( 'username', $row->username ),
					'judul_berita' => set_value ( 'judul_berita', $row->judul_berita ),
					'judul_seo_berita' => set_value ( 'judul_seo_berita', $row->judul_seo_berita ),
					'isi_berita' => set_value ( 'isi_berita', $row->isi_berita ),
					'hari' => set_value ( 'hari', $row->hari ),
					'tanggal' => set_value ( 'tanggal', $row->tanggal ),
					'jam' => set_value ( 'jam', $row->jam ),
					'gambar_1' => set_value ( 'gambar', $row->gambar ),
					'dibaca' => set_value ( 'dibaca', $row->dibaca ),
					'tag' => set_value ( 'tag', $row->tag ),
					'tag_data' => $this->Tag_model->get_all_tag (),
					'page' => 'berita_form',
					'title' => 'Berita' 
			);
			// var_dump($data);
			$this->template->load ( 'admin/template', 'admin/view_berita_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/berita' ) );
		}
	}
	public function berita_update_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		
		$this->berita_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->berita_update ( $this->input->post ( 'id_berita', TRUE ) );
		} else {
			$config ['upload_path'] = 'public/foto_berita/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if ($this->input->post ( 'tag' ) != '') {
				$tag_seo = $this->input->post ( 'tag' );
				$tag = implode ( ',', $tag_seo );
			} else {
				$tag = '';
			}
			
			if (! empty ( $_FILES ['gambar'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/foto_berita/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 750;
					$config ['height'] = 337;
					$config ['new_image'] = 'public/foto_berita/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'username' => ucwords ( $this->session->userdata ( 'username' ) ),
							'judul_berita' => ucwords ( $this->input->post ( 'judul_berita', TRUE ) ),
							'judul_seo_berita' => seo_title ( $this->input->post ( 'judul_berita', TRUE ) ),
							'isi_berita' => $this->input->post ( 'isi_berita', TRUE ),
							'hari' => hari_ini ( date ( 'w' ) ),
							'tanggal' => date ( 'Y-m-d' ),
							'jam' => date ( 'H:i:s' ),
							'gambar' => $gbr ['file_name'],
							'dibaca' => '0',
							'tag' => $tag 
					);
					$path_file = 'public/foto_berita/' . $this->input->post ( 'gambar_1', TRUE );
					if (file_exists ( $path_file )) {
						unlink ( $path_file );
					}
				}
			} else {
				$data = array (
						'username' => ucwords ( $this->session->userdata ( 'username' ) ),
						'judul_berita' => ucwords ( $this->input->post ( 'judul_berita', TRUE ) ),
						'judul_seo_berita' => seo_title ( $this->input->post ( 'judul_berita', TRUE ) ),
						'isi_berita' => $this->input->post ( 'isi_berita', TRUE ),
						'hari' => hari_ini ( date ( 'w' ) ),
						'tanggal' => date ( 'Y-m-d' ),
						'jam' => date ( 'H:i:s' ),
						'dibaca' => '0',
						'tag' => $tag 
				);
			}
			
			$this->Berita_model->update_berita ( $this->input->post ( 'id_berita', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record berita Success' );
			redirect ( site_url ( 'admin/berita' ) );
		}
	}
	public function berita_delete($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Berita_model->get_by_id_berita ( $id );
		
		if ($row) {
			$this->Berita_model->delete_berita ( $id );
			$path_file = 'public/foto_berita/' . $row->gambar;
			if (file_exists ( $path_file )) {
				unlink ( $path_file );
			}
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'admin/berita' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/berita' ) );
		}
	}
	public function berita_rules() {
		$this->form_validation->set_rules ( 'username', 'username' );
		$this->form_validation->set_rules ( 'judul_berita', 'judul berita', 'trim|required' );
		$this->form_validation->set_rules ( 'isi_berita', 'isi berita', 'trim|required' );
		$this->form_validation->set_rules ( 'gambar', 'gambar' );
		$this->form_validation->set_rules ( 'tag', 'tag' );
		
		$this->form_validation->set_rules ( 'id_berita', 'id_berita', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	
	// End Berita
	
	// Artikel
	public function artikel() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admin/artikel/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admin/artikel/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admin/artikel/';
			$config ['first_url'] = base_url () . 'admin/artikel/';
		}
		
		$config ['per_page'] = 10;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Artikel_model->total_rows_artikel ( $q );
		$artikel = $this->Artikel_model->get_limit_data_artikel ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'artikel_data' => $artikel,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'artikel_list',
				'title' => 'artikel' 
		);
		$this->template->load ( 'admin/template', 'admin/view_artikel_list', $data );
	}
	public function artikel_create() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/artikel_create_action' ),
				'id_artikel' => set_value ( 'id_artikel' ),
				'username' => set_value ( 'username' ),
				'judul_artikel' => set_value ( 'judul_artikel' ),
				'judul_seo_artikel' => set_value ( 'judul_seo_artikel' ),
				'isi_artikel' => set_value ( 'isi_artikel' ),
				'hari' => set_value ( 'hari' ),
				'tanggal' => set_value ( 'tanggal' ),
				'jam' => set_value ( 'jam' ),
				'gambar_1' => set_value ( 'gambar' ),
				'dibaca' => set_value ( 'dibaca' ),
				'tag_data' => $this->Tag_model->get_all_tag (),
				'page' => 'artikel_form',
				'title' => 'artikel' 
		);
		$this->template->load ( 'admin/template', 'admin/view_artikel_form', $data );
	}
	public function artikel_create_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->artikel_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->artikel_create ();
		} else {
			$config ['upload_path'] = 'public/foto_artikel/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if ($this->input->post ( 'tag' ) != '') {
				$tag_seo = $this->input->post ( 'tag' );
				$tag = implode ( ',', $tag_seo );
			} else {
				$tag = '';
			}
			
			if (! empty ( $_FILES ['gambar'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/foto_artikel/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 750;
					$config ['height'] = 337;
					$config ['new_image'] = 'public/foto_artikel/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'username' => ucwords ( $this->session->userdata ( 'username' ) ),
							'judul_artikel' => $this->input->post ( 'judul_artikel', TRUE ),
							'judul_seo_artikel' => seo_title ( $this->input->post ( 'judul_artikel', TRUE ) ),
							'isi_artikel' => $this->input->post ( 'isi_artikel', TRUE ),
							'hari' => hari_ini ( date ( 'w' ) ),
							'tanggal' => date ( 'Y-m-d' ),
							'jam' => date ( 'H:i:s' ),
							'gambar' => $gbr ['file_name'],
							'dibaca' => '0',
							'tag' => $tag 
					);
				}
			} else {
				$data = array (
						'username' => ucwords ( $this->session->userdata ( 'username' ) ),
						'judul_artikel' => $this->input->post ( 'judul_artikel', TRUE ),
						'judul_seo_artikel' => seo_title ( $this->input->post ( 'judul_artikel', TRUE ) ),
						'isi_artikel' => $this->input->post ( 'isi_artikel', TRUE ),
						'hari' => hari_ini ( date ( 'w' ) ),
						'tanggal' => date ( 'Y-m-d' ),
						'jam' => date ( 'H:i:s' ),
						'dibaca' => '0',
						'tag' => $tag 
				);
			}
			
			$this->Artikel_model->insert_artikel ( $data );
			$this->session->set_flashdata ( 'message', 'Create artikel Record Success' );
			redirect ( site_url ( 'admin/artikel' ) );
		}
	}
	public function artikel_update($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Artikel_model->get_by_id_artikel ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/artikel_update_action' ),
					'id_artikel' => set_value ( 'id_artikel', $row->id_artikel ),
					'username' => set_value ( 'username', $row->username ),
					'judul_artikel' => set_value ( 'judul_artikel', $row->judul_artikel ),
					'judul_seo_artikel' => set_value ( 'judul_seo_artikel', $row->judul_seo_artikel ),
					'isi_artikel' => set_value ( 'isi_artikel', $row->isi_artikel ),
					'hari' => set_value ( 'hari', $row->hari ),
					'tanggal' => set_value ( 'tanggal', $row->tanggal ),
					'jam' => set_value ( 'jam', $row->jam ),
					'gambar_1' => set_value ( 'gambar', $row->gambar ),
					'dibaca' => set_value ( 'dibaca', $row->dibaca ),
					'tag' => set_value ( 'tag', $row->tag ),
					'tag_data' => $this->Tag_model->get_all_tag (),
					'page' => 'artikel_form',
					'title' => 'artikel' 
			);
			// var_dump($data);
			$this->template->load ( 'admin/template', 'admin/view_artikel_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/artikel' ) );
		}
	}
	public function artikel_update_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		
		$this->artikel_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->artikel_update ( $this->input->post ( 'id_artikel', TRUE ) );
		} else {
			$config ['upload_path'] = 'public/foto_artikel/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if ($this->input->post ( 'tag' ) != '') {
				$tag_seo = $this->input->post ( 'tag' );
				$tag = implode ( ',', $tag_seo );
			} else {
				$tag = '';
			}
			
			if (! empty ( $_FILES ['gambar'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/foto_artikel/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 750;
					$config ['height'] = 337;
					$config ['new_image'] = 'public/foto_artikel/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'username' => ucwords ( $this->session->userdata ( 'username' ) ),
							'judul_artikel' => $this->input->post ( 'judul_artikel', TRUE ),
							'judul_seo_artikel' => seo_title ( $this->input->post ( 'judul_artikel', TRUE ) ),
							'isi_artikel' => $this->input->post ( 'isi_artikel', TRUE ),
							'hari' => hari_ini ( date ( 'w' ) ),
							'tanggal' => date ( 'Y-m-d' ),
							'jam' => date ( 'H:i:s' ),
							'gambar' => $gbr ['file_name'],
							'dibaca' => '0',
							'tag' => $tag 
					);
					$path_file = 'public/foto_artikel/' . $this->input->post ( 'gambar_1', TRUE );
					if (file_exists ( $path_file )) {
						unlink ( $path_file );
					}
				}
			} else {
				$data = array (
						'username' => ucwords ( $this->session->userdata ( 'username' ) ),
						'judul_artikel' => $this->input->post ( 'judul_artikel', TRUE ),
						'judul_seo_artikel' => seo_title ( $this->input->post ( 'judul_artikel', TRUE ) ),
						'isi_artikel' => $this->input->post ( 'isi_artikel', TRUE ),
						'hari' => hari_ini ( date ( 'w' ) ),
						'tanggal' => date ( 'Y-m-d' ),
						'jam' => date ( 'H:i:s' ),
						'dibaca' => '0',
						'tag' => $tag 
				);
			}
			
			$this->Artikel_model->update_artikel ( $this->input->post ( 'id_artikel', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record artikel Success' );
			redirect ( site_url ( 'admin/artikel' ) );
		}
	}
	public function artikel_delete($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Artikel_model->get_by_id_artikel ( $id );
		
		if ($row) {
			$this->Artikel_model->delete_artikel ( $id );
			$path_file = 'public/foto_artikel/' . $row->gambar;
			if (file_exists ( $path_file )) {
				unlink ( $path_file );
			}
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'admin/artikel' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/artikel' ) );
		}
	}
	public function artikel_rules() {
		$this->form_validation->set_rules ( 'username', 'username' );
		$this->form_validation->set_rules ( 'judul_artikel', 'judul artikel', 'trim|required' );
		$this->form_validation->set_rules ( 'isi_artikel', 'isi artikel', 'trim|required' );
		$this->form_validation->set_rules ( 'gambar', 'gambar' );
		$this->form_validation->set_rules ( 'tag', 'tag' );
		
		$this->form_validation->set_rules ( 'id_artikel', 'id_artikel', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// End Artikel
	
	// rekening
	public function rekening() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'rekening/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'rekening/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'rekening/';
			$config ['first_url'] = base_url () . 'rekening/';
		}
		
		$config ['per_page'] = 5;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Rekening_model->total_rows_rekening ( $q );
		$rekening = $this->Rekening_model->get_limit_data_rekening ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'rekening_data' => $rekening,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'rekening',
				'title' => 'Rekening' 
		);
		$this->template->load ( 'admin/template', 'admin/view_rekening_list', $data );
	}
	public function rekening_create() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/rekening_create_action' ),
				'id_rekening' => set_value ( 'id_rekening' ),
				'nama_bank' => set_value ( 'nama_bank' ),
				'no_rekening' => set_value ( 'no_rekening' ),
				'page' => 'rekening',
				'title' => 'Rekening' 
		);
		$this->template->load ( 'admin/template', 'admin/view_rekening_form', $data );
	}
	public function rekening_create_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->rekening_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->rekening_create ();
		} else {
			$data = array (
					'nama_bank' => $this->input->post ( 'nama_bank', TRUE ),
					'no_rekening' => $this->input->post ( 'no_rekening', TRUE ) 
			);
			
			$this->Rekening_model->insert_rekening ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'admin/rekening' ) );
		}
	}
	public function rekening_update($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Rekening_model->get_by_id_rekening ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/rekening_update_action' ),
					'id_rekening' => set_value ( 'id_rekening', $row->id_rekening ),
					'nama_bank' => set_value ( 'nama_bank', $row->nama_bank ),
					'no_rekening' => set_value ( 'no_rekening', $row->no_rekening ),
					'page' => 'rekening',
					'title' => 'Rekening' 
			);
			$this->template->load ( 'admin/template', 'admin/view_rekening_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/rekening' ) );
		}
	}
	public function rekening_update_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->rekening_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->rekening_update ( $this->input->post ( 'id_rekening', TRUE ) );
		} else {
			$data = array (
					'nama_bank' => $this->input->post ( 'nama_bank', TRUE ),
					'no_rekening' => $this->input->post ( 'no_rekening', TRUE ) 
			);
			
			$this->Rekening_model->update_rekening ( $this->input->post ( 'id_rekening', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Success' );
			redirect ( site_url ( 'admin/rekening' ) );
		}
	}
	public function rekening_delete($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Rekening_model->get_by_id_rekening ( $id );
		
		if ($row) {
			$this->Rekening_model->delete_rekening ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'admin/rekening' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/rekening' ) );
		}
	}
	public function rekening_rules() {
		$this->form_validation->set_rules ( 'nama_bank', 'nama bank', 'trim|required' );
		$this->form_validation->set_rules ( 'no_rekening', 'no rekening', 'trim|required' );
		
		$this->form_validation->set_rules ( 'id_rekening', 'id_rekening', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// end rekening
	
	// carousel
	// belum di kerjakan
	public function carousel() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'carousel/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'carousel/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'carousel/';
			$config ['first_url'] = base_url () . 'carousel/';
		}
		
		$config ['per_page'] = 10;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Carousel_model->total_rows_carousel ( $q );
		$carousel = $this->Carousel_model->get_limit_data_carousel ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'carousel_data' => $carousel,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'carousel_list',
				'title' => 'Carousel' 
		);
		$this->template->load ( 'admin/template', 'admin/view_carousel_list', $data );
	}
	public function carousel_create() {
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/carousel_create_action' ),
				'id_carousel' => set_value ( 'id_carousel' ),
				'nama_carousel' => set_value ( 'nama_carousel' ),
				'gambar_carousel' => set_value ( 'gambar_carousel' ),
				'keterangan_carousel' => set_value ( 'keterangan_carousel' ),
				'active_carousel' => set_value ( 'active_carousel' ),
				'gambar_carousel_1' => set_value ( 'gambar_carousel_1' ),
				'page' => 'carousel_form',
				'title' => 'Carousel' 
		);
		$this->template->load ( 'admin/template', 'admin/view_carousel_form', $data );
	}
	public function carousel_create_action() {
		$this->carousel_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->carousel_create ();
		} else {
			
			$config ['upload_path'] = 'public/carousel/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['gambar_carousel'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar_carousel' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/carousel/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/carousel/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'nama_carousel' => ucwords ( $this->input->post ( 'nama_carousel', TRUE ) ),
							'keterangan_carousel' => $this->input->post ( 'keterangan_carousel', TRUE ),
							'active_carousel' => $this->input->post ( 'active_carousel', TRUE ) == 'active' ? 'active' : '',
							'gambar_carousel' => $hasil ['file_name'] 
					);
				}
			} else {
				$data = array (
						'nama_carousel' => ucwords ( $this->input->post ( 'nama_carousel', TRUE ) ),
						'keterangan_carousel' => $this->input->post ( 'keterangan_carousel', TRUE ),
						'active_carousel' => $this->input->post ( 'active_carousel', TRUE ) == 'active' ? 'active' : '' 
				);
			}
			
			$this->Carousel_model->insert_carousel ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'admin/carousel' ) );
		}
	}
	public function carousel_update($id) {
		$row = $this->Carousel_model->get_by_id_carousel ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/carousel_update_action' ),
					'id_carousel' => set_value ( 'id_carousel', $row->id_carousel ),
					'nama_carousel' => set_value ( 'nama_carousel', $row->nama_carousel ),
					'keterangan_carousel' => set_value ( 'keterangan_carousel', $row->keterangan_carousel ),
					'active_carousel' => set_value ( 'active_carousel', $row->active_carousel ),
					'gambar_carousel_1' => set_value ( 'gambar_carousel', $row->gambar_carousel ),
					'page' => 'carousel_form',
					'title' => 'Carousel' 
			);
			$this->template->load ( 'admin/template', 'admin/view_carousel_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/carousel' ) );
		}
	}
	public function carousel_update_action() {
		$this->carousel_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->carousel_update ( $this->input->post ( 'id_carousel', TRUE ) );
		} else {
			$config ['upload_path'] = 'public/carousel/';
			$config ['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config ['max_size'] = '3000'; // kb
			$this->load->library ( 'upload', $config );
			$this->upload->do_upload ( 'gambar_carousel' );
			$hasil = $this->upload->data ();
			
			if ($hasil ['file_name'] == '') {
				$data = array (
						'nama_carousel' => $this->input->post ( 'nama_carousel', TRUE ),
						'keterangan_carousel' => $this->input->post ( 'keterangan_carousel', TRUE ),
						'active_carousel' => $this->input->post ( 'active_carousel', TRUE ) == 'active' ? 'active' : '' 
				);
			} else {
				$data = array (
						'nama_carousel' => $this->input->post ( 'nama_carousel', TRUE ),
						'keterangan_carousel' => $this->input->post ( 'keterangan_carousel', TRUE ),
						'active_carousel' => $this->input->post ( 'active_carousel', TRUE ) == 'active' ? 'active' : '',
						'gambar_carousel' => $hasil ['file_name'] 
				);
				$path_file = 'public/carousel/' . $this->input->post ( 'gambar_carousel_1', TRUE );
				if (file_exists ( $path_file )) {
					unlink ( $path_file );
				}
			}
			
			$this->Carousel_model->update_carousel ( $this->input->post ( 'id_carousel', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Success' );
			redirect ( site_url ( 'admin/carousel' ) );
		}
	}
	public function carousel_delete($id) {
		$row = $this->Carousel_model->get_by_id_carousel ( $id );
		
		if ($row) {
			$this->Carousel_model->delete_carousel ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'admin/carousel' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/carousel' ) );
		}
	}
	public function carousel_rules() {
		$this->form_validation->set_rules ( 'nama_carousel', 'nama carousel', 'trim|required' );
		$this->form_validation->set_rules ( 'gambar_carousel', 'gambar carousel' );
		
		$this->form_validation->set_rules ( 'id_carousel', 'id_carousel', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// end carousel
	
	// pendidikan_dakwah
	public function pendidikan_dakwah() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admin/pendidikan_dakwah/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admin/pendidikan_dakwah/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admin/pendidikan_dakwah/';
			$config ['first_url'] = base_url () . 'admin/pendidikan_dakwah/';
		}
		
		$config ['per_page'] = 5;
		$config ['query_string_segment'] = 'start';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Pendidikan_dakwah_model->total_rows_pendidikan_dakwah ( $q );
		$pendidikan_dakwah = $this->Pendidikan_dakwah_model->get_limit_data_pendidikan_dakwah ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'pendidikan_dakwah_data' => $pendidikan_dakwah,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'pendidikan_dakwah_list',
				'title' => 'Pendidikan Dan Dakwah' 
		);
		$this->template->load ( 'admin/template', 'admin/view_pendidikan_dakwah_list', $data );
	}
	public function pendidikan_dakwah_create() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/pendidikan_dakwah_create_action' ),
				'id_pendidikan_dakwah' => set_value ( 'id_pendidikan_dakwah' ),
				'nama_pendidikan_dakwah' => set_value ( 'nama_pendidikan_dakwah' ),
				'keterangan_pendidikan_dakwah' => set_value ( 'keterangan_pendidikan_dakwah' ),
				'gambar_pendidikan_dakwah_1' => set_value ( 'gambar_pendidikan_dakwah_1' ),
				'page' => 'pendidikan_dakwah_form',
				'title' => 'Pendidikan Dan Dakwah' 
		);
		$this->template->load ( 'admin/template', 'admin/view_pendidikan_dakwah_form', $data );
	}
	public function pendidikan_dakwah_create_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->pendidikan_dakwah_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->Pendidikan_dakwah_model ( $this->input->post ( 'id_pendidikan_dakwah', TRUE ) );
		} else {
			$config ['upload_path'] = 'public/pendidikan_dakwah/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['gambar_pendidikan_dakwah'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar_pendidikan_dakwah' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/pendidikan_dakwah/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/pendidikan_dakwah/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'nama_pendidikan_dakwah' => ucwords ( $this->input->post ( 'nama_pendidikan_dakwah', TRUE ) ),
							'keterangan_pendidikan_dakwah' => $this->input->post ( 'keterangan_pendidikan_dakwah', TRUE ),
							'gambar_pendidikan_dakwah' => $gbr ['file_name'] 
					);
				}
			} else {
				$data = array (
						'nama_pendidikan_dakwah' => ucwords ( $this->input->post ( 'nama_pendidikan_dakwah', TRUE ) ),
						'keterangan_pendidikan_dakwah' => $this->input->post ( 'keterangan_pendidikan_dakwah', TRUE ) 
				);
			}
			
			$this->Pendidikan_dakwah_model->insert_pendidikan_dakwah ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'admin/pendidikan_dakwah' ) );
		}
	}
	public function pendidikan_dakwah_update($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Pendidikan_dakwah_model->get_by_id_pendidikan_dakwah ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/pendidikan_dakwah_update_action' ),
					'id_pendidikan_dakwah' => set_value ( 'id_pendidikan_dakwah', $row->id_pendidikan_dakwah ),
					'nama_pendidikan_dakwah' => set_value ( 'nama_pendidikan_dakwah', $row->nama_pendidikan_dakwah ),
					'keterangan_pendidikan_dakwah' => set_value ( 'keterangan_pendidikan_dakwah', $row->keterangan_pendidikan_dakwah ),
					'gambar_pendidikan_dakwah_1' => set_value ( 'gambar_pendidikan_dakwah', $row->gambar_pendidikan_dakwah ),
					'page' => 'pendidikan_dakwah_form',
					'title' => 'Pendidikan Dan Dakwah' 
			);
			$this->template->load ( 'admin/template', 'admin/view_pendidikan_dakwah_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/pendidikan_dakwah' ) );
		}
	}
	public function pendidikan_dakwah_update_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->pendidikan_dakwah_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->Pendidikan_dakwah_model ( $this->input->post ( 'id_pendidikan_dakwah', TRUE ) );
		} else {
			$config ['upload_path'] = 'public/pendidikan_dakwah/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['gambar_pendidikan_dakwah'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar_pendidikan_dakwah' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/pendidikan_dakwah/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/pendidikan_dakwah/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'nama_pendidikan_dakwah' => ucwords ( $this->input->post ( 'nama_pendidikan_dakwah', TRUE ) ),
							'keterangan_pendidikan_dakwah' => $this->input->post ( 'keterangan_pendidikan_dakwah', TRUE ),
							'gambar_pendidikan_dakwah' => $gbr ['file_name'] 
					);
					$path_file = 'public/pendidikan_dakwah/' . $this->input->post ( 'gambar_pendidikan_dakwah_1', TRUE );
					if (file_exists ( $path_file )) {
						unlink ( $path_file );
					}
				}
			} else {
				$data = array (
						'nama_pendidikan_dakwah' => ucwords ( $this->input->post ( 'nama_pendidikan_dakwah', TRUE ) ),
						'keterangan_pendidikan_dakwah' => $this->input->post ( 'keterangan_pendidikan_dakwah', TRUE ) 
				);
			}
			
			$this->Pendidikan_dakwah_model->update_pendidikan_dakwah ( $this->input->post ( 'id_pendidikan_dakwah', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'admin/pendidikan_dakwah' ) );
		}
	}
	public function pendidikan_dakwah_delete($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Pendidikan_dakwah_model->get_by_id_pendidikan_dakwah ( $id );
		
		if ($row) {
			$this->Pendidikan_dakwah_model->delete_pendidikan_dakwah ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			$path_file = 'public/pendidikan_dakwah/' . $row->gambar_pendidikan_dakwah;
			if (file_exists ( $path_file )) {
				unlink ( $path_file );
			}
			redirect ( site_url ( 'admin/pendidikan_dakwah' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/pendidikan_dakwah' ) );
		}
	}
	public function pendidikan_dakwah_rules() {
		$this->form_validation->set_rules ( 'nama_pendidikan_dakwah', 'nama pendidikan dakwah', 'trim|required' );
		$this->form_validation->set_rules ( 'keterangan_pendidikan_dakwah', 'keterangan pendidikan dakwah', 'trim|required' );
		$this->form_validation->set_rules ( 'gambar_pendidikan_dakwah', 'gambar pendidikan dakwah' );
		
		$this->form_validation->set_rules ( 'id_pendidikan_dakwah', 'id_pendidikan_dakwah', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// end pendidikan_dakwah
	
	// Galeri Poto
	public function galeri_foto() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'galeri_foto/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'galeri_foto/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'galeri_foto/';
			$config ['first_url'] = base_url () . 'galeri_foto/';
		}
		
		$config ['per_page'] = 10;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Galeri_foto_model->total_rows_galeri_foto ( $q );
		$galeri_foto = $this->Galeri_foto_model->get_limit_data_galeri_foto ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'galeri_foto_data' => $galeri_foto,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'galeri_foto_list',
				'title' => 'Galeri Foto' 
		);
		$this->template->load ( 'admin/template', 'admin/view_galeri_foto_list', $data );
	}
	public function galeri_foto_create() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/galeri_foto_create_action' ),
				'id_galeri_foto' => set_value ( 'id_galeri_foto' ),
				'nama_galeri_foto' => set_value ( 'nama_galeri_foto' ),
				'keterangan_galeri_foto' => set_value ( 'keterangan_galeri_foto' ),
				'gambar_galeri_foto_1' => set_value ( 'gambar_galeri_foto' ),
				'page' => 'galeri_foto_form',
				'title' => 'Galeri Foto' 
		);
		$this->template->load ( 'admin/template', 'admin/view_galeri_foto_form', $data );
	}
	public function galeri_foto_create_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->galeri_foto_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->galeri_foto_create ();
		} else {
			$config ['upload_path'] = 'public/galeri_foto/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['gambar_galeri_foto'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar_galeri_foto' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/galeri_foto/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/galeri_foto/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'nama_galeri_foto' => ucwords ( $this->input->post ( 'nama_galeri_foto', TRUE ) ),
							'keterangan_galeri_foto' => $this->input->post ( 'keterangan_galeri_foto', TRUE ),
							'gambar_galeri_foto' => $gbr ['file_name'] 
					);
				}
			} else {
				$data = array (
						'nama_galeri_foto' => ucwords ( $this->input->post ( 'nama_galeri_foto', TRUE ) ),
						'keterangan_galeri_foto' => $this->input->post ( 'keterangan_galeri_foto', TRUE ) 
				);
			}
			
			$this->Galeri_foto_model->insert_galeri_foto ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Galeri Foto Success' );
			redirect ( site_url ( 'admin/galeri_foto' ) );
		}
	}
	public function galeri_foto_update($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Galeri_foto_model->get_by_id_galeri_foto ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/galeri_foto_update_action' ),
					'id_galeri_foto' => set_value ( 'id_galeri_foto', $row->id_galeri_foto ),
					'nama_galeri_foto' => set_value ( 'nama_galeri_foto', $row->nama_galeri_foto ),
					'keterangan_galeri_foto' => set_value ( 'keterangan_galeri_foto', $row->keterangan_galeri_foto ),
					'gambar_galeri_foto_1' => set_value ( 'gambar_galeri_foto', $row->gambar_galeri_foto ),
					'page' => 'galeri_foto_form',
					'title' => 'Galeri Foto' 
			);
			// var_dump($data);
			$this->template->load ( 'admin/template', 'admin/view_galeri_foto_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/galeri_foto' ) );
		}
	}
	public function galeri_foto_update_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->galeri_foto_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->galeri_foto_update ( $this->input->post ( 'id_galeri_foto', TRUE ) );
		} else {
			$config ['upload_path'] = 'public/galeri_foto/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['gambar_galeri_foto'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar_galeri_foto' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/galeri_foto/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/galeri_foto/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'nama_galeri_foto' => ucwords ( $this->input->post ( 'nama_galeri_foto', TRUE ) ),
							'keterangan_galeri_foto' => $this->input->post ( 'keterangan_galeri_foto', TRUE ),
							'gambar_galeri_foto' => $gbr ['file_name'] 
					);
					$path_file = 'public/galeri_foto/' . $this->input->post ( 'gambar_galeri_foto_1', TRUE );
					if (file_exists ( $path_file )) {
						unlink ( $path_file );
					}
				}
			} else {
				$data = array (
						'nama_galeri_foto' => ucwords ( $this->input->post ( 'nama_galeri_foto', TRUE ) ),
						'keterangan_galeri_foto' => $this->input->post ( 'keterangan_galeri_foto', TRUE ) 
				);
			}
			
			$this->Galeri_foto_model->update_galeri_foto ( $this->input->post ( 'id_galeri_foto', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Galeri Foto Success' );
			redirect ( site_url ( 'admin/galeri_foto' ) );
		}
	}
	public function galeri_foto_delete($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Galeri_foto_model->get_by_id_galeri_foto ( $id );
		
		if ($row) {
			$this->Galeri_foto_model->delete_galeri_foto ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Galeri Foto Success' );
			$path_file = 'public/galeri_foto/' . $row->gambar_galeri_foto;
			if (file_exists ( $path_file )) {
				unlink ( $path_file );
			}
			redirect ( site_url ( 'admin/galeri_foto' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Galeri Foto Not Found' );
			redirect ( site_url ( 'admin/galeri_foto' ) );
		}
	}
	public function galeri_foto_rules() {
		$this->form_validation->set_rules ( 'nama_galeri_foto', 'nama galeri foto', 'trim|required' );
		$this->form_validation->set_rules ( 'keterangan_galeri_foto', 'keterangan galeri foto', 'trim|required' );
		$this->form_validation->set_rules ( 'gambar_galeri_foto', 'gambar galeri foto' );
		
		$this->form_validation->set_rules ( 'id_galeri_foto', 'id_galeri_foto', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// End Galeri Poto
	
	// Galeri Video
	public function galeri_video() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admin/galeri_video/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admin/galeri_video/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admin/galeri_video/';
			$config ['first_url'] = base_url () . 'admin/galeri_video/';
		}
		
		$config ['per_page'] = 10;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Galeri_video_model->total_rows_galeri_video ( $q );
		$galeri_video = $this->Galeri_video_model->get_limit_data_galeri_video ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'galeri_video_data' => $galeri_video,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'galeri_video',
				'title' => 'Galeri Video' 
		);
		$this->template->load ( 'admin/template', 'admin/view_galeri_video_list', $data );
	}
	public function galeri_video_create() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/galeri_video_create_action' ),
				'id_galeri_video' => set_value ( 'id_galeri_video' ),
				'nama_galeri_video' => set_value ( 'nama_galeri_video' ),
				'link_galeri_video' => set_value ( 'link_galeri_video' ),
				'page' => 'galeri_video',
				'title' => 'Galeri Video' 
		);
		$this->template->load ( 'admin/template', 'admin/view_galeri_video_form', $data );
	}
	public function galeri_video_create_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->galeri_video_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->galeri_video_create ();
		} else {
			$data = array (
					'nama_galeri_video' => ucwords ( $this->input->post ( 'nama_galeri_video', TRUE ) ),
					'link_galeri_video' => $this->input->post ( 'link_galeri_video', TRUE ) 
			);
			
			$this->Galeri_video_model->insert_galeri_video ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Galeri Video Success' );
			redirect ( site_url ( 'admin/galeri_video' ) );
		}
	}
	public function galeri_video_update($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Galeri_video_model->get_by_id_galeri_video ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/galeri_video_update_action' ),
					'id_galeri_video' => set_value ( 'id_galeri_video', $row->id_galeri_video ),
					'nama_galeri_video' => set_value ( 'nama_galeri_video', $row->nama_galeri_video ),
					'link_galeri_video' => set_value ( 'link_galeri_video', $row->link_galeri_video ),
					'page' => 'galeri_video',
					'title' => 'Galeri Video' 
			);
			$this->template->load ( 'admin/template', 'admin/view_galeri_video_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Galeri Video Not Found' );
			redirect ( site_url ( 'admin/galeri_video' ) );
		}
	}
	public function galeri_video_update_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->galeri_video_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->galeri_video_update ( $this->input->post ( 'id_galeri_video', TRUE ) );
		} else {
			$data = array (
					'nama_galeri_video' => ucwords ( $this->input->post ( 'nama_galeri_video', TRUE ) ),
					'link_galeri_video' => $this->input->post ( 'link_galeri_video', TRUE ) 
			);
			
			$this->Galeri_video_model->update_galeri_video ( $this->input->post ( 'id_galeri_video', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Galeri Video Success' );
			redirect ( site_url ( 'admin/galeri_video' ) );
		}
	}
	public function galeri_video_delete($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Galeri_video_model->get_by_id_galeri_video ( $id );
		
		if ($row) {
			$this->Galeri_video_model->delete_galeri_video ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Galeri Video Success' );
			redirect ( site_url ( 'admin/galeri_video' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Galeri Video Not Found' );
			redirect ( site_url ( 'admin/galeri_video' ) );
		}
	}
	public function galeri_video_rules() {
		$this->form_validation->set_rules ( 'nama_galeri_video', 'nama galeri video', 'trim|required' );
		$this->form_validation->set_rules ( 'link_galeri_video', 'link galeri video', 'trim|required' );
		
		$this->form_validation->set_rules ( 'id_galeri_video', 'id_galeri_video', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// End Galeri Video
	
	// highlight
	public function highlight() {
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admin/highlight/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admin/highlight/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admin/highlight/';
			$config ['first_url'] = base_url () . 'admin/highlight/';
		}
		
		$config ['per_page'] = 10;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Highlight_model->total_rows_highlight ( $q );
		$highlight = $this->Highlight_model->get_limit_data_highlight ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'highlight_data' => $highlight,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'highlight',
				'title' => 'Highlight' 
		);
		$this->template->load ( 'admin/template', 'admin/view_highlight_list', $data );
	}
	public function highlight_create() {
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/highlight_create_action' ),
				'id_highlight' => set_value ( 'id_highlight' ),
				'nama_highlight' => set_value ( 'nama_highlight' ),
				'gambar_highlight_1' => set_value ( 'gambar_highlight' ),
				'link_highlight' => set_value ( 'link_highlight' ),
				'active_carousel' => set_value ( 'active_carousel' ),
				'page' => 'highlight',
				'title' => 'Highlight' 
		);
		$this->template->load ( 'admin/template', 'admin/view_highlight_form', $data );
	}
	public function highlight_create_action() {
		$this->highlight_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->highlight_create ();
		} else {
			$data = array (
					'nama_highlight' => $this->input->post ( 'nama_highlight', TRUE ),
					'gambar_highlight' => $this->input->post ( 'gambar_highlight', TRUE ),
					'link_highlight' => $this->input->post ( 'link_highlight', TRUE ),
					'active_carousel' => $this->input->post ( 'active_carousel', TRUE ) 
			);
			
			$this->Highlight_model->insert_highlight ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'highlight' ) );
			
			$config ['upload_path'] = 'public/foto_artikel/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if ($this->input->post ( 'tag' ) != '') {
				$tag_seo = $this->input->post ( 'tag' );
				$tag = implode ( ',', $tag_seo );
			} else {
				$tag = '';
			}
			
			if (! empty ( $_FILES ['gambar'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'gambar' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/foto_artikel/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/foto_artikel/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'username' => $this->input->post ( 'username', TRUE ),
							'judul_artikel' => $this->input->post ( 'judul_artikel', TRUE ),
							'judul_seo_artikel' => seo_title ( $this->input->post ( 'judul_artikel', TRUE ) ),
							'isi_artikel' => $this->input->post ( 'isi_artikel', TRUE ),
							'hari' => hari_ini ( date ( 'w' ) ),
							'tanggal' => date ( 'Y-m-d' ),
							'jam' => date ( 'H:i:s' ),
							'gambar' => $gbr ['file_name'],
							'dibaca' => '0',
							'tag' => $tag 
					);
				}
			} else {
				$data = array (
						'username' => $this->input->post ( 'username', TRUE ),
						'judul_artikel' => $this->input->post ( 'judul_artikel', TRUE ),
						'judul_seo_artikel' => seo_title ( $this->input->post ( 'judul_berita', TRUE ) ),
						'isi_artikel' => $this->input->post ( 'isi_artikel', TRUE ),
						'hari' => hari_ini ( date ( 'w' ) ),
						'tanggal' => date ( 'Y-m-d' ),
						'jam' => date ( 'H:i:s' ),
						'dibaca' => '0',
						'tag' => $tag 
				);
			}
			
			$this->Highlight_model->insert_highlight ( $data );
			$this->session->set_flashdata ( 'message', 'Create Highlight Record Success' );
			redirect ( site_url ( 'admin/highlight' ) );
		}
	}
	public function highlight_update($id) {
		$row = $this->Highlight_model->get_by_id_highlight ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'highlight/highlight_update_action' ),
					'id_highlight' => set_value ( 'id_highlight', $row->id_highlight ),
					'nama_highlight' => set_value ( 'nama_highlight', $row->nama_highlight ),
					'gambar_highlight' => set_value ( 'gambar_highlight', $row->gambar_highlight ),
					'link_highlight' => set_value ( 'link_highlight', $row->link_highlight ),
					'active_carousel' => set_value ( 'active_carousel', $row->active_carousel ) 
			);
			$this->load->view ( 'highlight/highlight_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'highlight' ) );
		}
	}
	public function highlight_update_action() {
		$this->highlight_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->highlight_update ( $this->input->post ( 'id_highlight', TRUE ) );
		} else {
			$data = array (
					'nama_highlight' => $this->input->post ( 'nama_highlight', TRUE ),
					'gambar_highlight' => $this->input->post ( 'gambar_highlight', TRUE ),
					'link_highlight' => $this->input->post ( 'link_highlight', TRUE ),
					'active_carousel' => $this->input->post ( 'active_carousel', TRUE ) 
			);
			
			$this->Highlight_model->update_highlight ( $this->input->post ( 'id_highlight', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Success' );
			redirect ( site_url ( 'highlight' ) );
		}
	}
	public function highlight_delete($id) {
		$row = $this->Highlight_model->get_by_id_highlight ( $id );
		
		if ($row) {
			$this->Highlight_model->delete_highlight ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'highlight' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'highlight' ) );
		}
	}
	public function highlight_rules() {
		$this->form_validation->set_rules ( 'nama_highlight', 'nama highlight', 'trim|required' );
		$this->form_validation->set_rules ( 'gambar_highlight', 'gambar highlight', 'trim|required' );
		$this->form_validation->set_rules ( 'link_highlight', 'link highlight', 'trim|required' );
		$this->form_validation->set_rules ( 'active_carousel', 'active carousel', 'trim|required' );
		
		$this->form_validation->set_rules ( 'id_highlight', 'id_highlight', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	
	// Kata Mereka
	public function kata_mereka() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$q = urldecode ( $this->input->get ( 'q', TRUE ) );
		$start = intval ( $this->input->get ( 'start' ) );
		
		if ($q != '') {
			$config ['base_url'] = base_url () . 'admin/kata_mereka/?q=' . urlencode ( $q );
			$config ['first_url'] = base_url () . 'admin/kata_mereka/?q=' . urlencode ( $q );
		} else {
			$config ['base_url'] = base_url () . 'admin/kata_mereka/';
			$config ['first_url'] = base_url () . 'admin/kata_mereka/';
		}
		
		$config ['per_page'] = 3;
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Kata_mereka_model->total_rows_kata_mereka ( $q );
		$kata_mereka = $this->Kata_mereka_model->get_limit_data_kata_mereka ( $config ['per_page'], $start, $q );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$data = array (
				'button' => 'List',
				'kata_mereka_data' => $kata_mereka,
				'q' => $q,
				'pagination' => $this->pagination->create_links (),
				'total_rows' => $config ['total_rows'],
				'start' => $start,
				'page' => 'kata_mereka_list',
				'title' => 'Kata Mereka' 
		);
		$this->template->load ( 'admin/template', 'admin/view_kata_mereka_list', $data );
	}
	public function kata_mereka_create() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'admin/kata_mereka_create_action' ),
				'id_kata_mereka' => set_value ( 'id_kata_mereka' ),
				'name_kata_mereka' => set_value ( 'name_kata_mereka' ),
				'photo_kata_mereka_1' => set_value ( 'photo_kata_mereka' ),
				'quote_kata_mereka' => set_value ( 'quote_kata_mereka' ),
				'page' => 'kata_mereka_form',
				'title' => 'Galeri Foto' 
		);
		$this->template->load ( 'admin/template', 'admin/view_kata_mereka_form', $data );
	}
	public function kata_mereka_create_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->kata_mereka_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->kata_mereka_create ();
		} else {
			
			$config ['upload_path'] = 'public/kata_mereka/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['photo_kata_mereka'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'photo_kata_mereka' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/kata_mereka/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 600;
					$config ['height'] = 400;
					$config ['new_image'] = 'public/kata_mereka/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'name_kata_mereka' => ucwords ( $this->input->post ( 'name_kata_mereka', TRUE ) ),
							'photo_kata_mereka' => $gbr ['file_name'],
							'quote_kata_mereka' => $this->input->post ( 'quote_kata_mereka', TRUE ) 
					);
				}
			} else {
				$data = array (
						'name_kata_mereka' => $this->input->post ( 'name_kata_mereka', TRUE ),
						'quote_kata_mereka' => $this->input->post ( 'quote_kata_mereka', TRUE ) 
				);
			}
			$this->Kata_mereka_model->insert_kata_mereka ( $data );
			$this->session->set_flashdata ( 'message', 'Create Kata Mereka Record Success' );
			redirect ( site_url ( 'admin/kata_mereka' ) );
		}
	}
	public function kata_mereka_update($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Kata_mereka_model->get_by_id_kata_mereka ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'admin/kata_mereka_update_action' ),
					'id_kata_mereka' => set_value ( 'id_kata_mereka', $row->id_kata_mereka ),
					'name_kata_mereka' => set_value ( 'name_kata_mereka', $row->name_kata_mereka ),
					'photo_kata_mereka_1' => set_value ( 'photo_kata_mereka', $row->photo_kata_mereka ),
					'quote_kata_mereka' => set_value ( 'quote_kata_mereka', $row->quote_kata_mereka ),
					'page' => 'kata_mereka_form',
					'title' => 'Galeri Foto' 
			);
			$this->template->load ( 'admin/template', 'admin/view_kata_mereka_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/kata_mereka' ) );
		}
	}
	public function kata_mereka_update_action() {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$this->kata_mereka_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->kata_mereka_update ( $this->input->post ( 'id_kata_mereka', TRUE ) );
		} else {
			
			$config ['upload_path'] = 'public/kata_mereka/'; // path folder
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; // type yang dapat diakses bisa anda sesuaikan
			$config ['encrypt_name'] = TRUE; // Enkripsi nama yang terupload
			$this->upload->initialize ( $config );
			
			if (! empty ( $_FILES ['photo_kata_mereka'] ['name'] )) {
				
				if ($this->upload->do_upload ( 'photo_kata_mereka' )) {
					$gbr = $this->upload->data ();
					// Compress Image
					$config ['image_library'] = 'gd2';
					$config ['source_image'] = 'public/kata_mereka/' . $gbr ['file_name'];
					$config ['create_thumb'] = FALSE;
					$config ['maintain_ratio'] = FALSE;
					$config ['quality'] = '50%';
					$config ['width'] = 100;
					$config ['height'] = 100;
					$config ['new_image'] = 'public/kata_mereka/' . $gbr ['file_name'];
					$this->load->library ( 'image_lib', $config );
					$this->image_lib->resize ();
					
					$data = array (
							'name_kata_mereka' => ucwords ( $this->input->post ( 'name_kata_mereka', TRUE ) ),
							'photo_kata_mereka' => $gbr ['file_name'],
							'quote_kata_mereka' => $this->input->post ( 'quote_kata_mereka', TRUE ) 
					);
					$path_file = 'public/kata_mereka/' . $this->input->post ( 'photo_kata_mereka_1', TRUE );
					if (file_exists ( $path_file )) {
						unlink ( $path_file );
					}
				}
			} else {
				$data = array (
						'name_kata_mereka' => ucwords ( $this->input->post ( 'name_kata_mereka', TRUE ) ),
						'quote_kata_mereka' => $this->input->post ( 'quote_kata_mereka', TRUE ) 
				);
			}
			
			$this->Kata_mereka_model->update_kata_mereka ( $this->input->post ( 'id_kata_mereka', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Kata Mereka Success' );
			redirect ( site_url ( 'admin/kata_mereka' ) );
		}
	}
	public function kata_mereka_delete($id) {
		if (! $this->ion_auth->logged_in ()) {
			// redirect them to the login page
			return redirect ( site_url ( 'admin/login' ) );
		}
		$row = $this->Kata_mereka_model->get_by_id_kata_mereka ( $id );
		
		if ($row) {
			$this->Kata_mereka_model->delete_kata_mereka ( $id );
			$this->session->set_flashdata ( 'message', 'Delete kata Mereka Record Success' );
			$path_file = 'public/kata_mereka/' . $row->photo_kata_mereka;
			if (file_exists ( $path_file )) {
				unlink ( $path_file );
			}
			redirect ( site_url ( 'admin/kata_mereka' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'admin/kata_mereka' ) );
		}
	}
	public function kata_mereka_rules() {
		$this->form_validation->set_rules ( 'name_kata_mereka', 'name kata mereka', 'trim|required' );
		$this->form_validation->set_rules ( 'photo_kata_mereka', 'photo kata mereka' );
		$this->form_validation->set_rules ( 'quote_kata_mereka', 'quote kata mereka', 'trim|required' );
		
		$this->form_validation->set_rules ( 'id_kata_mereka', 'id_kata_mereka', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
	}
	// End Kata Mereka
}
