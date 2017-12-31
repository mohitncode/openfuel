<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_Model extends CI_Model {

	public function create_event($information) {
		$this->db->insert('events', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function get_event_basic_info($event_id) {
		$this->db->where('event_id', $event_id);
		$results = $this->db->get('events');
		foreach($results->result_array() as $event) {
			return $event;
		}
	}
	
	public function get_event_details($event_id) {
		$param['event_id'] = $event_id;
		$param['event_approved'] = 1;
		
		$this->db->where($param);
		$results = $this->db->get('events');
		return $results->result_array();
	}
	
	public function get_featured_events() {
		$this->db->where('event_approved', 1);
		$this->db->limit(5);
		$this->db->order_by("title", "random");
		$results = $this->db->get('events');
		return $results->result_array();
	}
	
	public function get_mentor_list($term = NULL) {
		if($term == NULL) {
			return FALSE;
		}
		else {
			$this->db->select('id, first_name, last_name, profile_image');
			$this->db->like('first_name', $term);
			$this->db->or_like('last_name', $term);
			// Uncomment below line if you want only validated mentors to appear
			$this->db->where('validated', 1);	
			$results = $this->db->get('mentors');
			
			return $results->result_array();
			
			if($results->num_rows() > 0) {
				return $results->result_array();
			}
			else {
				return FALSE;
			}
		}
	}
	
	public function event_exists($event_id) {
		$this->db->where('event_id', $event_id);
		$projects_count = $this->db->count_all_results('events');
		if($projects_count > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function get_mentor_info($mentor_id = NULL) {
		if($mentor_id == NULL) {
			return FALSE;
		}
		else {
			$this->db->where('id', $mentor_id);
			$results = $this->db->get('mentors');
			$mentor = NULL;
			
			foreach($results->result_array() as $mentor_info) {
				$mentor = $mentor_info;
			}
			
			return $mentor;
		}
	}
	
	public function get_all_events() {
		$this->db->where('event_approved', 1);
		$events = $this->db->get('events');
		return $events->result_array();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/models/events_model.php */