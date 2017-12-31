<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		if($this->session->userdata('is_logged_in')) {
			redirect('/events');
		}
		
		$this->form_validation->set_error_delimiters('<li class="error">', '</li>');
		$this->form_validation->set_rules('email_id', 'Email ID', 'trim|required|min_length[3]|max_length[100]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]|md5');
		
		if($this->form_validation->run() == FALSE) {
			$this->load->view('login_view');
		}
		else {
			$credentials['email_id'] = $this->input->post('email_id');
			$credentials['password'] = $this->input->post('password');
			
			$this->load->model('login_model');
			if($this->login_model->validate_user($credentials)) {
				redirect('/events');
			}
			else {
				$wrapper['title'] = "User Not Found";
				$wrapper['message'] = "User not found. Please check the credentials. If you are a mentor or an organization, you might still be pending approval from the administrator.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
		}
	}
	
	public function logout() {
		if($this->session->userdata('is_logged_in')) {
			$this->session->sess_destroy();
			$wrapper['title'] = "Logged out";
			$wrapper['message'] = "You have been successfully logged out";
			$this->load->view('skeleton_echo_view', $wrapper);
		}
		else {
			$wrapper['title'] = "Invalid Action!";
			$wrapper['message'] = "Invalid action. You must be logged in before you can log out.";
			$this->load->view('skeleton_echo_view', $wrapper);
		}
	}
	
	public function forgot_password() {
		// $error = "You cannot use this link while you are logged in. Please go to the Change Password link to change your password.";
		if($this->session->userdata('is_logged_in')) {
			$this->load->view('access_denied_view');
		}
		
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$this->form_validation->set_rules('email_id', 'Email ID', 'trim|required|min_length[3]|max_length[100]|valid_email|matches[conf_email_id]');
		$this->form_validation->set_rules('conf_email_id', 'Confirm Email ID', 'trim|required|min_length[3]|max_length[100]|valid_email');
		
		if($this->form_validation->run() == FALSE) {
			$this->load->view('forgot_password_view');
		}
		else {
			$email_id = $this->input->post('email_id');
			$this->load->model('login_model');
			if($this->login_model->generate_reset_token($email_id)) {
				$wrapper['message'] = "The instructions for your password reset have been mailed to you. Please check your email for further details.";
				$this->load->view('forgot_password_view', $wrapper);
			}
			else {
				$wrapper['message'] = "No such account found. Please ensure that you have entered the correct email ID. If you are an organization or a mentor, your account might still be pending validation from the administrator.";
				$this->load->view('forgot_password_view', $wrapper);
			}
		}
	}
	
	public function display_password_token() {
		// $error = "You cannot use this link while you are logged in. Please go to the Change Password link to change your password.";
		if($this->session->userdata('is_logged_in')) {
			$this->load->view('access_denied_view');
		}
		else {
			$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
			$this->form_validation->set_rules('email_id', 'Email ID', 'trim|required|min_length[3]|max_length[100]|valid_email|matches[conf_email_id]');
			$this->form_validation->set_rules('conf_email_id', 'Confirm Email ID', 'trim|required|min_length[3]|max_length[100]|valid_email');
			
			if($this->form_validation->run() == FALSE) {
				$this->load->view('display_password_token_view');
			}
			else {
				$email_id = $this->input->post('email_id');
				$this->load->model('login_model');
				if($token = $this->login_model->get_reset_token($email_id)) {
					foreach($token as $tok) {
						$wrapper['token'] = $tok['reset_token'];
					}
					$this->load->view('display_password_token_view', $wrapper);
				}
				else {
					$wrapper['message'] = "No such account found. Please ensure that you have entered the correct email ID. If you are an organization or a mentor, your account might still be pending validation from the administrator.";
					$this->load->view('display_password_token_view', $wrapper);
				}
			}
		}		
	}
	
	public function reset_password($reset_token = NULL) {
		if($reset_token == NULL) {
			// $message = "You are trying to access an URL that is invalid or doesn't exist.";
			$this->load->view('access_denied_view');
		}
		else {
			$this->load->model('login_model');
			if($table_name = $this->login_model->check_valid_token($reset_token)) {
				$this->session->set_userdata('reset_token', $reset_token);
				$this->session->set_userdata('reset_token_valid', TRUE);
				$this->session->set_userdata('table_name', $table_name);
				redirect('/login/change_password');
			}
			else {
				// $message = "You are trying to access an URL that is invalid or doesn't exist.";
				$this->load->view('access_denied_view');
			}
		}
	}
	
	public function change_password() {
		if($this->session->userdata('reset_token_valid')) {
			$this->form_validation->set_error_delimiters('<p class="error"', '</p>');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]|matches[conf_password]|md5');
			$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|min_length[5]|max_length[25]');
			
			if($this->form_validation->run() == FALSE) {
				$this->load->view('change_password_view');
			}
			else {
				$information['password'] = $this->input->post('password');
				$reset_token = $this->session->userdata('reset_token');
				$table_name = $this->session->userdata('table_name');
				
				$this->load->model('login_model');
				if($this->login_model->reset_password($reset_token, $information, $table_name)) {
					$wrapper['message'] = "Password changed successfully. Please login using the new password.";
					$this->session->unset_userdata('reset_token');
					$this->session->unset_userdata('reset_token_valid');
					$this->session->unset_userdata('table_name');
					
					$this->load->view('change_password_view', $wrapper);
				}
				else {
					$wrapper['message'] = "An error occured while changing the password. Please try again sometime later.";
					$this->load->view('change_password_view', $wrapper);
				}
			}
		}
		else {
			// $message = "You are trying to access an URL that is invalid or doesn't exist.";
			$this->load->view('access_denied_view');
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */