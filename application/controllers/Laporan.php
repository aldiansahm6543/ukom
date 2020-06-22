<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level == 'administrator')
		{
			redirect('auth');
		}
		$this->load->model('Transaksi_model', 'transaksi');
	}

	public function index()
	{
		$data['title'] = 'Data Laporan';
		$data['page'] = 'laporan/index';
		$data['laporan'] = $this->transaksi->getLaporan();
		$data['total'] = $this->transaksi->getTotal();
		$this->load->view('templates/content', $data);
	}

	public function cetakLaporan()
	{
		$data['title'] = 'Data Laporan';
		$data['page'] = 'laporan/cetak_laporan';
		$data['laporan'] = $this->transaksi->getLaporan();
		$data['total'] = $this->transaksi->getTotal();
		$this->load->view('laporan/cetak_laporan',$data);
	}

	public function cetakStruk($id)
	{
		$data['title'] = 'Data Laporan';
		$data['laporan'] = $this->transaksi->getLaporanId($id);
		$this->load->view('laporan/cetak_struk',$data);
	}

	public function cetakTanggal()
	{
		$tanggal = $this->input->post('tanggal');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['title'] = 'Data Laporan';
		$data['laporan'] = $this->transaksi->getTanggal($tanggal);
		$data['total'] = $this->transaksi->getTotalTanggal($tanggal);
		$this->load->view('laporan/cetak_tanggal',$data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */