<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function index() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->view('projects/projects_info_view');
		}
		else {
			$this->load->view('access_denied_view');
		}
	}

	public function show_project_details($project_id) {
		if($project_id != NULL && $this->session->userdata('is_logged_in')) {
			$wrapper = array();
			$this->load->model('projects_model');
			$project_details = $this->projects_model->get_project_details($project_id);
			
			foreach($project_details as $project) {
				$wrapper['project_details'] = $project;
			}
			
			$this->load->view('projects/show_project_details_view', $wrapper);
		}
		else {
			$this->load->view('access_denied_view');
		}
	}

	public function my_projects() {
		$this->load->model('projects_model');
		$creator_id = $this->session->userdata('user_id');
		
		if($projects = $this->projects_model->get_projects_created_by($creator_id)) {
			$wrapper['projects'] = $projects;
			$this->load->view('projects/my_projects_view', $wrapper);
		}
	}
	
	public function create_project() {
		if($this->session->userdata('user_type') == 'user') {
			$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required|min_length[5]|max_length[200]');
			$this->form_validation->set_rules('project_description', 'Project Description', 'trim|required|min_length[20]|max_length[10000]');
		
			if($this->form_validation->run() == FALSE) {
				$this->load->view('projects/create_project_view');
			}
			else {
				$imgconfig['upload_path'] = './uploads/project_cover_images/';
				$imgconfig['allowed_types'] = 'gif|png|jpg|jpeg';
				$imgconfig['max_size'] = '2048';
				$imgconfig['overwrite'] = TRUE;
				$imgconfig['remove_spaces'] = TRUE;
				
				$this->load->library('upload');
				$this->upload->initialize($imgconfig);
				
				$cover_img = NULL;
		
				if($this->upload->do_upload('project_cover_image')) {
					$cover_img = $this->upload->data();
				}
				else {
					echo $this->upload->display_errors();
				}
				
				$docconfig['upload_path'] = './uploads/project_docs/';
				$docconfig['allowed_types'] = 'gif|png|jpg|doc|docx|pdf|xls|xlsx|ppt|pptx|jpeg|ppsx';
				$docconfig['max_size'] = '8192';
				$docconfig['overwrite'] = TRUE;
				$docconfig['remove_spaces'] = TRUE;
				
				$this->upload->initialize($docconfig);
				
				$project_docs = NULL;
				
				if($this->upload->do_multi_upload('project_docs')) {
					$project_docs = json_encode($this->upload->get_multi_upload_data());
				}
				else {
					echo $this->upload->display_errors();
				}
				
				$information['project_name'] = $this->input->post('project_name');
				$information['project_description'] = $this->input->post('project_description');
				$information['created_by'] = $this->session->userdata('user_id');
				$information['created_on'] = date('d-m-Y');
				$information['project_cover_image'] = base_url() ."uploads/project_cover_images/" .$cover_img['file_name'];;
				$information['project_docs'] = $project_docs;
				
				$this->load->model('projects_model');
				if($event_id = $this->projects_model->create_project($information)) {
					$wrapper['title'] = "Project Successfully Created";
					$wrapper['message'] = "Project successfully created. Your project will be shortly listed on our site after our moderators review it.";
					$this->load->view('skeleton_echo_view', $wrapper);
				}
				else {
					$wrapper['title'] = "Project Creation Unsuccessful";
					$wrapper['message'] = "An error occurred during project creation. Please try again. Contact the site administrator if the error persists";
					$this->load->view('skeleton_echo_view', $wrapper);
				}
			}
		}
		else {
			$this->load->view('access_denied_view');
		}
	}
	
	public function all_projects() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->model('projects_model');
			$projects = $this->projects_model->get_all_projects();
			$wrapper['projects'] = $projects;
			$this->load->view('projects/all_projects_view', $wrapper);
		}
		else {
			$this->load->view('access_denied_view');
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */