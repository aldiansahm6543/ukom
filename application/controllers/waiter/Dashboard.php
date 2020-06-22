<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level != 'waiter')
		{
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] = 'waiter/index';
		$this->load->view('templates/content', $data);		
	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/waiter/Dashboard.php */