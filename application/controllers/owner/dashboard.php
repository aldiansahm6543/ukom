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
		if($level != 'owner')
		{
			redirect('auth');
		}
		$this->load->model('owner_model', 'owner');
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] = 'owner/index';
		$data['total_transaksi'] = $this->owner->getTransaksi();
		$data['total_pelanggan'] = $this->owner->getPelanggan();
		$data['total_menu'] = $this->owner->getMenu();
		$data['total_meja'] = $this->owner->getMeja();
		$this->load->view('templates/content', $data);		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/owner/dashboard.php */