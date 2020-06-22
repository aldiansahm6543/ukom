<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function get()
	{
		return $this->db->get('menu')->result();
	}

	public function getId($id)
	{
		return $this->db->get_where('menu', ['idmenu' => $id])->row();
	}

	public function insert($data)
	{
		$this->db->insert('menu', $data);
	}	

	public function update($data, $id)
	{
		$this->db->where('idmenu', $id);
		$this->db->update('menu', $data);
	}	

	public function hapus($id)
	{
		$this->db->delete('menu', ['idmenu' => $id]);
	}

}

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */