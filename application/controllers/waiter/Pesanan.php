<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

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
		$this->load->model('Menu_model', 'menu');
		$this->load->model('Pelanggan_model', 'pelanggan');
		$this->load->model('Meja_model', 'meja');
		$this->load->model('Pesanan_model', 'pesanan');
	}

	public function index()
	{
		$data['title'] = 'Entri pesanan';
		$data['page'] = 'waiter/pesanan';
		$data['menu'] = $this->menu->get();
		$this->load->view('templates/content', $data);		
	}

	public function buatpesanan($id)
	{
		$this->form_validation->set_rules('id_meja', 'Kode meja', 'trim|required');
		$this->form_validation->set_rules('idpelanggan', 'Pelanggan', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
		if ($this->form_validation->run() == TRUE ) {
			$id_meja = $this->input->post('id_meja');
			$data = [
				'idmenu' => $id,
				'id_meja' => $id_meja,
				'idpelanggan' => $this->input->post('idpelanggan'),
				'jumlah' => $this->input->post('jumlah'),
				'iduser' => $this->session->userdata('id'),
				'status' => 0
			];
			$data1 = ['status' => 1];
			$this->pesanan->tambah($data);
			$this->meja->update($data1,$id_meja);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data pesanan berhasil ditambahkan
				</div>');
			redirect('waiter/pesanan/datapesanan');
		} else {
			$data['title'] = 'Buat pesanan';
			$data['page'] = 'waiter/buat_pesanan';
			$data['pelanggan'] = $this->pelanggan->get();
			$data['meja'] = $this->meja->get();
			$data['menu'] = $this->menu->getId($id);
			$this->load->view('templates/content', $data);		
		}
	}

	public function datapesanan($id='')
	{
		if ($id) {
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$idpesanan = $this->input->post('idpesanan');
				$data = [
					'idmenu' => $this->input->post('idmenu'),
					'jumlah' => $this->input->post('jumlah')
				];
				$this->pesanan->update($data,$idpesanan);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data pesanan berhasil diupdate
				</div>');
				redirect('waiter/pesanan/datapesanan');
			} else {
				$data['menu'] = $this->menu->get();
				$data['pesanId'] = $this->pesanan->getpesanId($id);	
			}
		}
		$data['title'] = 'Data pesanan';
		$data['page'] = 'waiter/data_pesanan';
		$data['pesanan'] = $this->pesanan->get();
		$this->load->view('templates/content', $data);	
	}

	public function hapus($id)
	{
		$p = $this->pesanan->getId($id);
		$id_meja = $p->id_meja; 
		$data = ['status' => 0];
		$this->meja->update($data,$id_meja);
		$this->pesanan->hapus($p->idpesanan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Data pesanan berhasil dihapus
				</div>');
		redirect('waiter/pesanan/datapesanan');
	}

}

/* End of file Pesanan.php */
/* Location: ./application/controllers/waiter/Pesanan.php */