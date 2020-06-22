<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends CI_Controller {

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
		$this->load->model('Meja_model', 'meja');
	}

	public function index($id = '')
	{
		$this->form_validation->set_rules('kode_meja', 'Kode meja', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'kode_meja' => $this->input->post('kode_meja')
			];
			if ($id) {
				$this->meja->update($data, $id);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil diedit
				</div>');
				redirect('meja');
			} else {
				$this->meja->insert($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil ditambahkan
				</div>');
				redirect('meja');	
			}
		} else {
			if ($id) {
				$data['mejaid'] = $this->meja->getId($id);
			}
			$data['title'] = 'Data meja';
			$data['page'] = 'meja/index';
			$data['meja'] = $this->meja->get();
			$this->load->view('templates/content', $data);
		}
	}

	public function hapus($id)
	{
		$this->meja->hapus($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data berhasil dihapus
		</div>');
		redirect('meja');
	}

}

/* End of file Meja.php */
/* Location: ./application/controllers/Meja.php */