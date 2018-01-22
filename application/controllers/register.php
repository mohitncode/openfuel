<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index() {
		$this->user_registration();
	}

	public function user_registration() {
		if($this->session->userdata('is_logged_in')) {
			redirect('/events');
		}

		$this->form_validation->set_error_delimiters('<li class="error">', '</li>');
		$this->form_validation->set_rules('email_id', 'Email ID', 'trim|required|min_length[3]|max_length[100]|valid_email|is_unique[users.email_id]|is_unique[mentors.email_id]|is_unique[organizations.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]|matches[conf_password]|md5');
		$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[50]|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[50]|alpha');
		$this->form_validation->set_rules('about_user', 'About You', 'trim|required|min_length[3]|max_length[500]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('register/user_registration_view');
		}
		else {
			$imgconfig['upload_path'] = './uploads/profile_images/';
			$imgconfig['allowed_types'] = 'gif|png|jpg|jpeg';
			$imgconfig['max_size'] = '2048';
			$imgconfig['overwrite'] = TRUE;
			$imgconfig['remove_spaces'] = TRUE;

			$this->load->library('upload');
			$this->upload->initialize($imgconfig);

			$profile_img = NULL;

			if($this->upload->do_upload('profile_image')) {
				$profile_img = $this->upload->data();
			}
			else {
				echo $this->upload->display_errors();
			}

			$information['email_id'] = $this->input->post('email_id');
			$information['password'] = $this->input->post('password');
			$information['first_name'] = $this->input->post('first_name');
			$information['last_name'] = $this->input->post('last_name');
			$information['state'] = $this->input->post('state');
			$information['city'] = $this->input->post('city');
			$information['about'] = $this->input->post('about_user');
			$information['profile_image'] = $profile_img['file_name'];

			$this->load->helper('string');
			$information['reset_token'] = random_string('unique');

			$this->load->model('register_model');
			if($this->register_model->register_user($information)) {
				$wrapper['title'] = "User Registration Successful";
				$here = '<a href="http://localhost/openfuel/login">here</a>';
				$wrapper['message'] = "User registered successfully. Please click " .$here ." to log in.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
			else {
				$wrapper['title'] = "User Registration Unsuccessful";
				$wrapper['message'] = "An error occurred during registration. Please make sure the email ID isn't already registered.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
		}
	}

	public function mentor_registration() {
		if($this->session->userdata('is_logged_in')) {
			redirect('/events');
		}

		$this->form_validation->set_error_delimiters('<li class="error">', '</li>');
		$this->form_validation->set_rules('email_id', 'Email ID', 'trim|required|min_length[3]|max_length[100]|valid_email|is_unique[users.email_id]|is_unique[mentors.email_id]|is_unique[organizations.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]|matches[conf_password]|md5');
		$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[50]|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[50]|alpha');
		$this->form_validation->set_rules('organization', 'Organization', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|required|min_length[3]|max_length[100]');
	//	$this->form_validation->set_rules('about_mentor', 'About You', 'trim|required|min_length[3]|max_length[500]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('register/mentor_registration_view');
		}
		else {
			$imgconfig['upload_path'] = './uploads/profile_images/';
			$imgconfig['allowed_types'] = 'gif|png|jpg|jpeg';
			$imgconfig['max_size'] = '2048';
			$imgconfig['overwrite'] = TRUE;
			$imgconfig['remove_spaces'] = TRUE;

			$this->load->library('upload');
			$this->upload->initialize($imgconfig);

			$profile_img = NULL;

			if($this->upload->do_upload('profile_image')) {
				$profile_img = $this->upload->data();
			}
			else {
				echo $this->upload->display_errors();
			}

			$information['email_id'] = $this->input->post('email_id');
			$information['password'] = $this->input->post('password');
			$information['first_name'] = $this->input->post('first_name');
			$information['last_name'] = $this->input->post('last_name');
			$information['organization'] = $this->input->post('organization');
			$information['designation'] = $this->input->post('designation');
			$information['profile_image'] = $profile_img['file_name'];
			$information['about'] = $this->input->post('about_mentor');
			$information['validated'] = 0;

			$this->load->helper('string');

			$information['reset_token'] = random_string('unique');

			$this->load->model('register_model');
			if($this->register_model->register_mentor($information)) {
				$wrapper['title'] = "Mentor Registration Successful";
				$here = '<a href="http://localhost/openfuel/login">here</a>';
				$wrapper['message'] = "Mentor registered successfully. Your account will be approved shortly. Please click " .$here ." to log in.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
			else {
				$wrapper['title'] = "Mentor Registration Unsuccessful";
				$wrapper['message'] = "An error occurred during registration. Please make sure the email ID isn't already registered.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
		}
	}

	public function org_registration() {
		if($this->session->userdata('is_logged_in')) {
			redirect('/events');
		}

		$this->form_validation->set_error_delimiters('<li class="error">', '</li>');
		$this->form_validation->set_rules('email_id', 'Email ID', 'trim|required|min_length[3]|max_length[100]|valid_email|is_unique[users.email_id]|is_unique[mentors.email_id]|is_unique[organizations.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]|matches[conf_password]|md5');
		$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('org_name', 'Organization Name', 'trim|required|min_length[3]|max_length[50]|alpha');
		$this->form_validation->set_rules('org_address', 'Organization Address', 'trim|required|min_length[3]|max_length[500]');
		$this->form_validation->set_rules('about_org', 'About Your Organization', 'trim|required|min_length[3]|max_length[500]');
		$this->form_validation->set_rules('org_type', 'Organization Type', 'trim|required|min_length[3]|max_length[100]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('register/org_registration_view');
		}
		else {
			$imgconfig['upload_path'] = './uploads/profile_images/';
			$imgconfig['allowed_types'] = 'gif|png|jpg|jpeg';
			$imgconfig['max_size'] = '2048';
			$imgconfig['overwrite'] = TRUE;
			$imgconfig['remove_spaces'] = TRUE;

			$this->load->library('upload');
			$this->upload->initialize($imgconfig);

			$profile_img = NULL;

			if($this->upload->do_upload('profile_image')) {
				$profile_img = $this->upload->data();
			}
			else {
				echo $this->upload->display_errors();
			}

			$information['email_id'] = $this->input->post('email_id');
			$information['password'] = $this->input->post('password');
			$information['org_name'] = $this->input->post('org_name');
			$information['org_address'] = $this->input->post('org_address');
			$information['org_type'] = $this->input->post('org_type');
			$information['profile_image'] = $profile_img['file_name'];
			$information['about'] = $this->input->post('about_org');
			$information['validated'] = 0;

			$this->load->helper('string');
			$information['reset_token'] = random_string('unique');

			$this->load->model('register_model');
			if($this->register_model->register_org($information)) {
				$wrapper['title'] = "Organization Registration Successful";
				$here = '<a href="http://localhost/openfuel/login">here</a>';
				$wrapper['message'] = "Organization registered successfully. Please click" .$here ."to log in.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
			else {
				$wrapper['title'] = "Organization Registration Unsuccessful";
				$wrapper['message'] = "Organization registration unsuccessful. Please make sure that the ID isn't already taken.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
		}
	}

	public function get_states() {
		$term = $this->input->get('searchq');
		$this->load->model('register_model');
		if($states = $this->register_model->get_states($term)) {
			for($i=0; $i<count($states); $i++) {
				$state = $states[$i];
				$temp = array_shift($state);
				$state['id'] = $i + 1;
				$state['text'] = $temp;
				$states[$i] = $state;

				echo json_encode($states);
			}
		}
		else {
			$states = array('id' => 0, 'text' => 'No matching states found');
			echo json_encode($states);
		}
	}

	public function get_cities() {
		$term = $this->input->get('searchq');
		$state = $this->input->post('state');

		$this->load->model('register_model');
		if($cities = $this->register_model->get_cities($term, $state)) {
			echo json_encode($cities);
		}
		else {
			$cities = array('id' => 0, 'text' => 'No matching cities found');
			echo json_encode($cities);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/register.php */