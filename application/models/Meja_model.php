<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja_model extends CI_Model {

	public function get()
	{
		return $this->db->get('meja')->result();
	}

	public function getId($id)
	{
		return $this->db->get_where('meja', ['id_meja' => $id])->row();
	}

	public function insert($data)
	{
		$this->db->insert('meja', $data);
	}	

	public function update($data, $id)
	{
		$this->db->where('id_meja', $id);
		$this->db->update('meja', $data);
	}	

	public function hapus($id)
	{
		$this->db->delete('meja', ['id_meja' => $id]);
	}

}

/* End of file Meja_model.php */
/* Location: ./application/models/Meja_model.php */