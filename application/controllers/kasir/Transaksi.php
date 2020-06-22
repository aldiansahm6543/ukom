<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level != 'kasir')
		{
			redirect('auth');
		}		$this->load->model('Transaksi_model', 'transaksi');
		$this->load->model('Meja_model', 'meja');
		$this->load->model('Pesanan_model', 'pesanan');
	}

	public function index()
	{
		$this->form_validation->set_rules('total', 'Total', 'trim|required');
		if ($this->form_validation->run() == TRUE or FALSE) {
			$idpesanan = $this->input->post('idpesanan');
			$id_meja = $this->input->post('id_meja');
			$data = [
				'total' => $this->input->post('total'),
				'idpesanan' => $idpesanan,
				'status' => 0
			];
			$data1 = ['status' => 1];
			$data2 = ['status' => 0];
			$this->transaksi->insert($data);
			$this->pesanan->update($data1, $idpesanan);
			$this->meja->update($data2, $id_meja);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data transaksi berhasil ditambahkan
				</div>');
			redirect('kasir/transaksi/dataTransaksi');
		} else {
			$data['title'] = 'Entri transaksi';
			$data['page'] = 'kasir/buat_transaksi';
			$data['pesanan'] = $this->transaksi->getPesanan();
			$this->load->view('templates/content', $data);	
		}
	}

	public function dataTransaksi()
	{
		$this->form_validation->set_rules('bayar', 'Bayar', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$bayar = $this->input->post('bayar');
			$total = $this->input->post('total');
			$idtransaksi = $this->input->post('idtransaksi');
 			$data = [
				'bayar' => $bayar,
				'kembali' => $bayar - $total,
				'tanggal' => $this->input->post('tanggal'),
				'status' => 1 
			];
			$this->transaksi->update($data, $idtransaksi);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					transaksi berhasil
				</div>');
			redirect('kasir/transaksi/dataTransaksi');
		} else {
			$data['title'] = 'Data transaksi';
			$data['page'] = 'kasir/data_transaksi';
			$data['transaksi'] = $this->transaksi->get();
			$this->load->view('templates/content', $data);
		}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/kasir/Transaksi.php */