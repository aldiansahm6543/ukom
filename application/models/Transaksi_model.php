<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function get() 
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pesanan', 'pesanan.idpesanan = transaksi.idpesanan');
		$this->db->join('menu', 'menu.idmenu = pesanan.idmenu');
		$this->db->join('meja', 'meja.id_meja = pesanan.id_meja');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pesanan.idpelanggan');
		$this->db->join('user', 'user.iduser = pesanan.iduser');
		$this->db->where('transaksi.status', 0);
		return $this->db->get()->result();
	}

	public function getLaporan() 
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pesanan', 'pesanan.idpesanan = transaksi.idpesanan');
		$this->db->join('menu', 'menu.idmenu = pesanan.idmenu');
		$this->db->join('meja', 'meja.id_meja = pesanan.id_meja');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pesanan.idpelanggan');
		$this->db->join('user', 'user.iduser = pesanan.iduser');
		$this->db->order_by('tanggal', 'asc');
		$this->db->where('transaksi.status', 1);
		return $this->db->get()->result();
	}

	public function getLaporanId($id) 
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pesanan', 'pesanan.idpesanan = transaksi.idpesanan');
		$this->db->join('menu', 'menu.idmenu = pesanan.idmenu');
		$this->db->join('meja', 'meja.id_meja = pesanan.id_meja');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pesanan.idpelanggan');
		$this->db->join('user', 'user.iduser = pesanan.iduser');
		$this->db->where(['transaksi.status'=> 1, 'idtransaksi' => $id]);
		return $this->db->get()->row();
	}

	public function getTanggal($tanggal) 
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pesanan', 'pesanan.idpesanan = transaksi.idpesanan');
		$this->db->join('menu', 'menu.idmenu = pesanan.idmenu');
		$this->db->join('meja', 'meja.id_meja = pesanan.id_meja');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pesanan.idpelanggan');
		$this->db->join('user', 'user.iduser = pesanan.iduser');
		$this->db->where(['transaksi.status'=> 1, 'tanggal' => $tanggal]);
		return $this->db->get()->result();
	}

	public function getTotal()
	{
		$this->db->select_sum('total');
		$this->db->where(['transaksi.status'=> 1]);
	   $query = $this->db->get('transaksi');
	   if($query->num_rows()>0)
	   {
	     return $query->row()->total;
	   }
	   else
	   {
	     return 0;
	   }
	}

	public function getTotalTanggal($tanggal)
	{
		$this->db->select_sum('total');
		$this->db->where(['transaksi.status'=> 1, 'tanggal' => $tanggal]);
	   $query = $this->db->get('transaksi');
	   if($query->num_rows()>0)
	   {
	     return $query->row()->total;
	   }
	   else
	   {
	     return 0;
	   }
	}

	public function getPesanan()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('menu', 'menu.idmenu = pesanan.idmenu');
		$this->db->join('meja', 'meja.id_meja = pesanan.id_meja');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pesanan.idpelanggan');
		$this->db->join('user', 'user.iduser = pesanan.iduser');
		$this->db->where('pesanan.status', 0);
		return $this->db->get()->result();
	}

	public function insert($data)
	{
		$this->db->insert('transaksi', $data);
	}

	public function update($data, $idtransaksi)
	{
		$this->db->where('idtransaksi', $idtransaksi);
		$this->db->update('transaksi', $data);
	}	

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */