<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participation_Model extends CI_Model {

	public function insert_participation($information) {
		$this->db->insert('participations', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function get_participations_count($user_id) {
		$this->db->where('applicant_id', $user_id);
		$count = $this->db->count_all_results('participations');
		return $count;
	}
	
	public function get_all_participations_by($user_id) {
		$this->db->where('applicant_id', $user_id);
		$results = $this->db->get('participations');
		return $results->result_array();
	}
	
	public function already_participated($user_id, $event_id) {
		$this->db->where('event_id', $event_id);
		$this->db->where('applicant_id', $user_id);
		$count = $this->db->count_all_results('participations');
		if($count > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/register.php */