<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function get()
	{
		return $this->db->get('pelanggan')->result();
	}	
	public function insert($data)
	{
		$this->db->insert('pelanggan', $data);
	}	

	public function update($data, $id)
	{
		$this->db->where('idpelanggan', $id);
		$this->db->update('pelanggan', $data);
	}	

	public function hapus($id)
	{
		$this->db->delete('pelanggan', ['idpelanggan' => $id]);
	}

	public function getId($id)
	{
		return $this->db->get_where('pelanggan', ['idpelanggan' => $id])->row();
	}

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */