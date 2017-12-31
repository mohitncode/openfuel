<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == "admin") {
			$this->events();
		}
		else {
			$this->load->view('access_denied_view');
		}
		
	}
	
	public function events() {
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == "admin") {
			$this->load->model('admin_model');
			$events = $this->admin_model->get_events_pending_validation();
			$wrapper['events'] = $events;
			$this->load->view('admin_panel/admin_panel_events_view', $wrapper);
		}
		else {
			$this->load->view('access_denied_view');
		}
		
	}
	
	public function mentors() {
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == "admin") {
			$this->load->model('admin_model');
			$mentors = $this->admin_model->get_mentors_pending_validation();
			$wrapper['mentors'] = $mentors;
			$this->load->view('admin_panel/admin_panel_mentors_view', $wrapper);
		}
		else {
			$this->load->view('access_denied_view');
		}

	}
	
	public function organizations() {
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == "admin") {
			$this->load->model('admin_model');
			$organizations = $this->admin_model->get_orgs_pending_validation();
			$wrapper['organizations'] = $organizations;
			$this->load->view('admin_panel/admin_panel_orgs_view', $wrapper);
		}
		else {
			$this->load->view('access_denied_view');
		}
		
	}
	
	public function approve_event($event_id = NULL) {
		if($event_id != NULL) {
			$this->load->model('admin_model');
			$response = $this->admin_model->approve_event($event_id);
			if($response == TRUE) {
				return "Event validated successfully.";
			}	
		}
	}
	
	public function approve_mentor($mentor_id = NULL) {
		if($mentor_id != NULL) {
			$this->load->model('admin_model');
			$response = $this->admin_model->approve_mentor($mentor_id);
			if($response == TRUE) {
				return "Mentor validated successfully.";
			}	
		}
	}
	
	public function approve_organization($org_id = NULL) {
		if($org_id != NULL) {
			$this->load->model('admin_model');
			$response = $this->admin_model->approve_organization($org_id);
			if($response == TRUE) {
				return "Organization validated successfully.";
			}	
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/register.php */