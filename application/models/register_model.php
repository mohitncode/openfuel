<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_Model extends CI_Model {

	public function register_user($information) {
		$this->db->insert('users', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function register_mentor($information) {
		$this->db->insert('mentors', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function register_org($information) {
		$this->db->insert('organizations', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function get_states($term = NULL) {
		if($term == NULL) {
			return FALSE;
		}
		else {
			$this->db->select('city_state AS text')->distinct()->from('cities')->like('city_state', $term);
			$results = $this->db->get();
			
			return $results->result_array();
			
			if($results->num_rows() > 0) {
				return $results->result_array();
			}
			else {
				return FALSE;
			}
		}
	}
	
	public function get_cities($term = NULL, $state = NULL) {
		if($term == NULL) {
			return FALSE;
		}
		else {
			$this->db->where('city_state', $state);
			$this->db->select('city_id AS id, city_name AS text')->from('cities')->like('city_name', $term);
			$results = $this->db->get();
			
			if($results->num_rows() > 0) {
				return $results->result_array();
			}
			else {
				return FALSE;
			}
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/register.php */