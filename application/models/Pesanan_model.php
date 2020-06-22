<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

	public function get()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('menu', 'menu.idmenu = pesanan.idmenu');
		$this->db->join('meja', 'meja.id_meja = pesanan.id_meja');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pesanan.idpelanggan');
		$this->db->join('user', 'user.iduser = pesanan.iduser');
		$this->db->where(['pesanan.iduser' => $this->session->userdata('id'), 'pesanan.status' => 0]);
		return $this->db->get()->result();
	}
	public function getpesanId($id)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('menu', 'menu.idmenu = pesanan.idmenu');
		$this->db->join('meja', 'meja.id_meja = pesanan.id_meja');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pesanan.idpelanggan');
		$this->db->join('user', 'user.iduser = pesanan.iduser');
		$this->db->where(['pesanan.idpesanan' => $id]);
		return $this->db->get()->row();
	}

	public function getId($id)
	{
		return $this->db->get_where('pesanan', ['idpesanan' => $id])->row();
	}

	public function tambah($data)
	{
		$this->db->insert('pesanan', $data);
	}	

	public function hapus($id)
	{
		$this->db->delete('pesanan', ['idpesanan' => $id]);
	}	

	public function update($data, $id)
	{
		$this->db->where('idpesanan', $id);
		$this->db->update('pesanan', $data);
	}

}

/* End of file Pesanan_model.php */
/* Location: ./application/models/Pesanan_model.php */