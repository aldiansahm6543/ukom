<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_model extends CI_Model {

	public function getTransaksi()
	{
		return $this->db->get_where('transaksi', ['status' => 1])->num_rows();
	}
	public function getPelanggan()
	{
		return $this->db->get('pelanggan')->num_rows();
	}
	public function getMenu()
	{
		return $this->db->get('menu')->num_rows();
	}
	public function getMeja()
	{
		return $this->db->get('meja')->num_rows();
	}
}

/* End of file Owner_model.php */
/* Location: ./application/models/Owner_model.php */