<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index() {
		if($this->session->userdata('is_logged_in')) {
			$user_id = $this->session->userdata('user_id');
			$user_type = $this->session->userdata('user_type');
			$table_name = NULL;
			$this->load->model('profile_model');
			$this->load->model('projects_model');
			$this->load->model('participation_model');

			if($user_type == "user") {
				$table_name = "users";
				$profile_details = $this->profile_model->get_profile_details($user_id, $table_name);
				$projects_count = $this->projects_model->get_projects_count($user_id);
				$participations_count = $this->participation_model->get_participations_count($user_id);

				foreach($profile_details as $user) {
					$wrapper['full_name'] = $user['first_name'] ." " .$user['last_name'];
					$wrapper['email_id'] = $user['email_id'];
					$wrapper['profile_image'] = base_url() ."uploads/profile_images/" .$user['profile_image'];
					$wrapper['about'] = $user['about'];
					$wrapper['created_projects'] = $projects_count;
					$wrapper['participations'] = $participations_count;
					$this->load->view('profile_view', $wrapper);
				}
			}
			elseif($user_type == "mentor") {
				$table_name = "mentors";
				$profile_details = $this->profile_model->get_profile_details($user_id, $table_name);

				foreach($profile_details as $user) {
					$wrapper['full_name'] = $user['first_name'] ." " .$user['last_name'];
					$wrapper['email_id'] = $user['email_id'];
					$wrapper['profile_image'] = base_url() ."uploads/profile_images/" .$user['profile_image'];
					$wrapper['about'] = $user['about'];
					$this->load->view('profile_view', $wrapper);
				}
			}
			else {
				$table_name = "organizations";
				$profile_details = $this->profile_model->get_profile_details($user_id, $table_name);

				foreach($profile_details as $user) {
					$wrapper['full_name'] = $user['org_name'];
					$wrapper['email_id'] = $user['email_id'];
					$wrapper['profile_image'] = base_url() ."uploads/profile_images/" .$user['profile_image'];
					$wrapper['about'] = $user['about'];
					$this->load->view('profile_view', $wrapper);
				}
			}

		}
		else {
			$this->load->view('access_denied_view');
		}
	}

	public function my_participations() {
		$user_id = $this->session->userdata('user_id');
		$this->load->model('participation_model');
		$participations = $this->participation_model->get_all_participations_by($user_id);
		$wrapper['participations'] = $participations;
		$this->load->view('my_participations_view', $wrapper);
	}
}

/**
 *  @file profile.php
 *  @brief Brief
 */