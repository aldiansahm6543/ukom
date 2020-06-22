<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level != 'administrator')
		{
			redirect('auth');
		}
		$this->load->model('Menu_model', 'menu');
	}

	public function index($id = '')
	{
		$this->form_validation->set_rules('namamenu', 'Nama menu', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'namamenu' => $this->input->post('namamenu'),
				'harga' => $this->input->post('harga')
			];
			if ($id) {
				$this->menu->update($data, $id);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil diedit
				</div>');
				redirect('menu');
			} else {
				$this->menu->insert($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil ditambahkan
				</div>');
				redirect('menu');	
			}
		} else {
			if ($id) {
				$data['menuid'] = $this->menu->getId($id);
			}
			$data['title'] = 'Data menu';
			$data['page'] = 'menu/index';
			$data['menu'] = $this->menu->get();
			$this->load->view('templates/content', $data);
		}
	}

	public function hapus($id)
	{
		$this->menu->hapus($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data berhasil dihapus
		</div>');
		redirect('menu');
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */