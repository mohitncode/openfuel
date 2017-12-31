<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	public function get_events_pending_validation() {
		$this->db->where('event_approved', 0);
		$events = $this->db->get('events');
		return $events->result_array();
	}
	
	public function get_mentors_pending_validation() {
		$this->db->where('validated', 0);
		$mentors = $this->db->get('mentors');
		return $mentors->result_array();
	}
	
	public function get_orgs_pending_validation() {
		$this->db->where('validated', 0);
		$organizations = $this->db->get('organizations');
		return $organizations->result_array();
	}
	
	public function approve_event($event_id) {
		$this->db->where('event_id', $event_id);
		$information['event_approved'] = 1;
		$this->db->update('events', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function approve_mentor($mentor_id) {
		$this->db->where('id', $mentor_id);
		$information['validated'] = 1;
		$this->db->update('mentors', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function approve_organization($org_id) {
		$this->db->where('id', $org_id);
		$information['validated'] = 1;
		$this->db->update('organizations', $information);
		if($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/models/events_model.php */