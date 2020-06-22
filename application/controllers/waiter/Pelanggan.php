<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

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
		$this->load->model('Pelanggan_model', 'pelanggan');
	}

	public function index($id='')
	{
		$this->form_validation->set_rules('namapelanggan', 'Nama Pelanggan', 'trim|required');
		$this->form_validation->set_rules('jeniskelamin', 'jeniskelamin', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nohp', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'namapelanggan' => $this->input->post('namapelanggan'),
				'jeniskelamin' => $this->input->post('jeniskelamin'),
				'nohp' => $this->input->post('nohp'),
				'alamat' => $this->input->post('alamat')

			];
			if ($id) {
				$this->pelanggan->update($data, $id);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil diedit
				</div>');
				redirect('waiter/pelanggan');
			} else {
				$this->pelanggan->insert($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data berhasil ditambahkan
				</div>');
				redirect('waiter/pelanggan');	
			}
		} else {
			if ($id) {
				$data['jeniskelamin'] = ['Laki-laki' , 'Perempuan'];
				$data['pelangganId'] = $this->pelanggan->getId($id);
			}
			$data['title'] = 'Entri pelanggan';
			$data['page'] = 'waiter/pelanggan';
			$data['pelanggan'] = $this->pelanggan->get();
			$this->load->view('templates/content', $data);	
		}	
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/waiter/Pelanggan.php */