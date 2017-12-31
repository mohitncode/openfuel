<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	public function index() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->model('events_model');
			$wrapper = array();
			
			$wrapper['featured_events'] = $this->events_model->get_featured_events();
			
			$this->load->view('events_view', $wrapper);
		}
		else {
			$this->load->view('access_denied_view');
		}
	}
	
	public function create_event() {
		if($this->session->userdata('user_type') == 'organization') {
			$this->form_validation->set_rules('event_name', 'Event Name', 'trim|required|min_length[5]|max_length[200]');
			$this->form_validation->set_rules('event_tagline', 'Event Tagline', 'trim');
			$this->form_validation->set_rules('event_description', 'Event Description', 'trim|required|min_length[20]|max_length[10000]');
			$this->form_validation->set_rules('event_venue', 'Event Venue', 'trim|required|min_length[5]|max_length[300]');
			$this->form_validation->set_rules('event_start_date', 'Event Start Date', 'trim|required|min_length[3]|max_length[100]');
			$this->form_validation->set_rules('event_end_date', 'Event End Date', 'trim|min_length[3]|max_length[100]');
		
			if($this->form_validation->run() == FALSE) {
				$this->load->view('events/create_event_view');
			}
			else {
				$imgconfig['upload_path'] = './uploads/event_images/';
				$imgconfig['allowed_types'] = 'gif|png|jpg';
				$imgconfig['max_size'] = '2048';
				$imgconfig['overwrite'] = TRUE;
				$imgconfig['remove_spaces'] = TRUE;
				
				$this->load->library('upload');
				$this->upload->initialize($imgconfig);
				
				$event_imgs = NULL;
				
				if($this->upload->do_multi_upload('event_images')) {
					$event_imgs = json_encode($this->upload->get_multi_upload_data());
				}
				else {
					echo $this->upload->display_errors();
				}
				
			
				$information['event_name'] = $this->input->post('event_name');
				$information['event_tagline'] = $this->input->post('event_tagline');
				$information['event_description'] = $this->input->post('event_description');
				$information['event_venue'] = $this->input->post('event_venue');
				$information['event_start_date'] = $this->input->post('event_start_date');
				$information['event_end_date'] = $this->input->post('event_end_date');
				$information['event_imgs'] = $event_imgs;
				$information['associated_mentors'] = json_encode(explode(",", $this->input->post('add_mentor')));
				$information['event_approved'] = 0;
				
				
				$this->load->model('events_model');
				if($event_id = $this->events_model->create_event($information)) {
					$wrapper['title'] = "Event Successfully Created";
					$wrapper['message'] = "Event successfully created. Your event will be shortly listed on our site after our moderators review it.";
					$this->load->view('skeleton_echo_view', $wrapper);
				}
				else {
					$wrapper['title'] = "Event Creation Unsuccessful";
					$wrapper['message'] = "An error occurred during event creation. Please try again. Contact the site administrator if the error persists";
					$this->load->view('skeleton_echo_view', $wrapper);
				}
			}
		}
		else {
			$this->load->view('access_denied_view');
		}
	}
	
	public function show_event_details($event_id = NULL) {
		if($event_id != NULL && $this->session->userdata('is_logged_in')) {
			$wrapper = array();
			$this->load->model('events_model');
			$event_details = $this->events_model->get_event_details($event_id);
			$mentor_ids = NULL;
			$mentors = array();
			
			$user_id = $this->session->userdata('user_id');
			$this->load->model('participation_model');
			
			if($this->participation_model->already_participated($user_id, $event_id)) {
				$wrapper['participated'] = TRUE;
			}
			else {
				$wrapper['participated'] = FALSE;
			}
			
			foreach($event_details as $event) {
				$wrapper['event_details'] = $event;
				$mentor_ids = json_decode($event['associated_mentors'], TRUE);
			}
			
			if($mentor_ids != NULL && !empty($mentor_ids)) {
				foreach($mentor_ids as $mentor_id) {
					$mentor_info = $this->events_model->get_mentor_info($mentor_id);
					array_push($mentors, $mentor_info);
				}
			}
			
			$wrapper['mentors'] = $mentors;
			
			$this->load->view('events/show_event_details_view', $wrapper);
		}
		else {
			$this->load->view('access_denied_view');
		}
	}
	
	public function get_mentor_list() {
		$term = $this->input->get('searchq');
		$this->load->model('events_model');
		if($mentors = $this->events_model->get_mentor_list($term)) {
			for($i=0; $i<count($mentors); $i++) {
				$mentor = $mentors[$i];
				$full_name = $mentor['first_name'] ." " .$mentor['last_name'];
				$mentor['text'] = $full_name;
				$mentors[$i] = $mentor;
			}
			echo json_encode($mentors);
		}
		else {
			$mentors = array('id' => 0, 'text' => 'No matching mentors found');
			echo json_encode($mentors);
		}
	}
	
	public function all_events() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->model('events_model');
			$events = $this->events_model->get_all_events();
			$wrapper['events'] = $events;
			$this->load->view('events/all_events_view', $wrapper);
		}
		else {
			$this->load->view('access_denied_view');
		}
	}
	
	public function about() {
		$this->load->view('about_view');
	}
	
	public function contact_us() {
		$this->load->view('contact_us_view');
	}	
	
	public function get_projects_by_user() {
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == 'user') {
			$user_id = $this->session->userdata('user_id');
			$this->load->model('projects_model');
			$projects = $this->projects_model->get_projects_by_user($user_id);
			echo json_encode($projects);
		}
		else {
			$projects = array('id' => 0, 'text' => 'No matching projects found');
			echo json_encode($projects);
		}
	}
	
	public function apply_project_to_event($event_id = NULL) {
		if($event_id == NULL) {
			$this->load->view('access_denied_view');
		}
		else {
			$this->load->model('events_model');
			if($this->events_model->event_exists($event_id)) {
				$project_name = $this->input->post('applied_project');
				$applied_by = $this->session->userdata('user_id');
				$event = $this->events_model->get_event_basic_info($event_id);
				
				$this->load->model('profile_model');
				$participant = $this->profile_model->get_participant_info($applied_by);
				
				$information['event_id'] = $event_id;
				$information['event_name'] = $event['event_name'];
				$information['event_description'] = $event['event_description'];
				$information['project_name'] = $project_name;
				$information['applicant_id'] = $applied_by;
				$information['applicant_name'] = $participant['first_name'] ." " .$participant['last_name'];
				$information['applicant_image'] = $participant['profile_image'];
				
				$this->load->model('participation_model');
				if($this->participation_model->insert_participation($information))
				{
					$wrapper['title'] = "Project Application Successful";
					$wrapper['message'] = "Your project was successfully applied to the event";
					$this->load->view('skeleton_echo_view', $wrapper);
				}
				else
				{
					$wrapper['title'] = "Project Application Unsuccessful";
					$wrapper['message'] = "Your project could not be applied to the event. Please try again later.";
					$this->load->view('skeleton_echo_view', $wrapper);
				}
			}
			else {
				$wrapper['title'] = "Project Application Unsuccessful";
				$wrapper['message'] = "You have tried to apply to an event that doesn't exist or was removed.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
		}
	}
}

/**
 *  @file events.php
 *  @brief Brief
 */