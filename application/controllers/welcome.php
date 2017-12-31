<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('is_logged_in')) {
			redirect('./events');
		}
		
		$this->load->view('home_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */