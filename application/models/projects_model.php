<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects_Model extends CI_Model {

	public function create_project($information) {
		$this->db->insert('projects', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function get_projects_created_by($creator_id) {
		$this->db->select('project_id, project_name, project_description, project_cover_image');
		$this->db->where('created_by', $creator_id);
		$projects = $this->db->get('projects');
		return $projects->result_array();
	}
	
	public function get_projects_count($user_id) {
		$this->db->where('created_by', $user_id);
		$projects_count = $this->db->count_all_results('projects');
		return $projects_count;
	}
	
	public function get_project_details($project_id) {
		$this->db->where('project_id', $project_id);
		$projects = $this->db->get('projects');
		return $projects->result_array();
	}
	
	public function get_all_projects() {
		$projects = $this->db->get('projects');
		return $projects->result_array();
	}
	
	public function get_projects_by_user($user_id) {
		$this->db->select('project_id AS id, project_name AS text')->from('projects')->where('created_by', $user_id);
		$results = $this->db->get();
			
		return $results->result_array();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/register.php */