<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_Model extends CI_Model {

	public function get_profile_details($user_id, $table_name) {
		$this->db->where('id', $user_id);
		$results = $this->db->get($table_name);
		return $results->result_array();
	}
	
	public function get_participant_info($user_id) {
		$this->db->select('first_name, last_name, profile_image')->from('users')->where('id', $user_id);
		$results = $this->db->get();
		
		foreach($results->result_array() as $participant) {
			return $participant;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/register.php */