<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public function validate_user($credentials) {
		$this->db->select('id, first_name, last_name')->from('users')->where($credentials)->limit(1);
		$results = $this->db->get();

		if($results->num_rows() > 0) {
			$session = array();

			foreach($results->result_array() as $user) {
				$session['user_id'] = $user['id'];
				$session['first_name'] = $user['first_name'];
				$session['last_name'] = $user['last_name'];
				$session['user_type'] = 'user';
				$session['is_logged_in'] = TRUE;
			}

			$this->session->set_userdata($session);
			return TRUE;
		}
		else {
			$credentials['validated'] = 1;
			$this->db->select('id, first_name, last_name')->from('mentors')->where($credentials)->limit(1);
			$results = $this->db->get();

			if($results->num_rows() > 0) {
				$session = array();

				foreach($results->result_array() as $user) {
					$session['user_id'] = $user['id'];
					$session['first_name'] = $user['first_name'];
					$session['last_name'] = $user['last_name'];
					$session['user_type'] = 'mentor';
					$session['is_logged_in'] = TRUE;
				}

				$this->session->set_userdata($session);
				return TRUE;
			}
			else {
				$this->db->select('id, org_name, org_type')->from('organizations')->where($credentials)->limit(1);
				$results = $this->db->get();

				if($results->num_rows() > 0) {
					$session = array();

					foreach($results->result_array() as $user) {
						$session['user_id'] = $user['id'];
						$session['org_name'] = $user['org_name'];
						$session['org_type'] = $user['org_type'];
						$session['user_type'] = 'organization';
						$session['is_logged_in'] = TRUE;
					}

					$this->session->set_userdata($session);
					return TRUE;
				}
				else {
					$this->db->select('id')->from('administrators')->where($credentials)->limit(1);
					$results = $this->db->get();

					if($results->num_rows() > 0) {
						$session = array();

						foreach($results->result_array() as $user) {
							$session['user_id'] = $user['id'];
							$session['user_type'] = 'admin';
							$session['is_logged_in'] = TRUE;
						}

						$this->session->set_userdata($session);
						return TRUE;
					}
					else {
						return FALSE;
					}
				}
			}
		}
	}
	
	public function generate_reset_token($email_id = NULL) {
		if($email_id == NULL) {
			return FALSE;
		}
		else {
			$this->db->select('email_id, password')->from('users')->where('email_id', $email_id)->limit(1);
			$results = $this->db->get();
			
			if($results->num_rows() > 0) {
				$this->load->helper('string');
				$data['reset_token'] = random_string('unique');
				
				$this->db->where('email_id', $email_id);
				$this->db->update('users', $data);
				
				return TRUE;
			}
			else {
				$information['email_id'] = $email_id;
				$information['validated'] = 1;
				
				$this->db->select('email_id, password')->from('mentors')->where($information)->limit(1);
				$results = $this->db->get();
				
				if($results->num_rows() > 0) {
					$this->load->helper('string');
					$data['reset_token'] = random_string('unique');
					
					$this->db->where('email_id', $email_id);
					$this->db->update('mentors', $data);
					
					return TRUE;
				}
				else {
					$information['email_id'] = $email_id;
					$information['validated'] = 1;
					
					$this->db->select('email_id, password')->from('organizations')->where($information)->limit(1);
					$results = $this->db->get();
					
					if($results->num_rows() > 0) {
						$this->load->helper('string');
						$data['reset_token'] = random_string('unique');
						
						$this->db->where($information);
						$this->db->update('organizations', $data);
						
						return TRUE;
					}
					else {
						return FALSE;
					}
				}
			}
		}
	}
	
	public function get_reset_token($email_id) {
		if($email_id == NULL) {
			return FALSE;
		}
		else {
			$this->db->select('reset_token')->from('users')->where('email_id', $email_id)->limit(1);
			$results = $this->db->get();
			
			if($results->num_rows() > 0) {
				return $results->result_array();
			}
			else {
				$information['email_id'] = $email_id;
				$information['validated'] = 1;
				
				$this->db->select('reset_token')->from('mentors')->where($information)->limit(1);
				$results = $this->db->get();
				
				if($results->num_rows() > 0) {
					return $results->result_array();
				}
				else {
					$information['email_id'] = $email_id;
					$information['validated'] = 1;
					
					$this->db->select('reset_token')->from('organizations')->where($information)->limit(1);
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
	}
	
	public function check_valid_token($reset_token = NULL) {
		if($reset_token == NULL) {
			return FALSE;
		}
		else {
			$this->db->where('reset_token', $reset_token);
			$results = $this->db->get('users');
			
			if($results->num_rows() > 0) {
				return 'users';
			}
			else {
				$results = $this->db->get('mentors');
				if($results->num_rows() > 0) {
					return 'mentors';
				}
				else {
					$results = $this->db->get('organizations');
					if($results->num_rows() > 0) {
						return 'organizations';
					}
					else {
						return FALSE;
					}
				}
			}
		}
	}
	
	public function reset_password($reset_token = NULL, $password = NULL, $table_name = NULL) {
		if($reset_token != NULL && $password != NULL && $table_name != NULL) {
			$this->db->where('reset_token', $reset_token);
			$user_id = NULL;
			$results = $this->db->get($table_name);
			foreach($results->result_array() as $result) {
				$user_id = $result['id'];
			}
			
			$this->db->update($table_name, $password);
			
			if($this->db->affected_rows() > 0) {
				$this->load->helper('string');
				$data['reset_token'] = random_string('unique');
				$this->db->where('id', $user_id);
				$this->db->update($table_name, $data);
				
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			return FALSE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/register.php */