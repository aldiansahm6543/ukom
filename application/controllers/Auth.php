<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/index');
		} else {
			$this->_login();
		}
	}

	public function _login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$level = $this->input->post('level');

		$user = $this->db->get_where('user', ['email' => $email])->row();
		if ($user) {
			if ($password == $user->password) {
				if ($level == $user->level) {
					$data = [
						'logged_in' => TRUE,
						'email' => $user->email,
						'namauser' => $user->namauser,
						'level' => $user->level,
						'id' => $user->iduser
					];
					
					$this->session->set_userdata($data);
					if ($user->level == 'administrator') {
						redirect('administrator');
					} elseif ($user->level == 'waiter') {
						redirect('waiter/dashboard');
					} elseif ($user->level == 'kasir') {
						redirect('kasir/dashboard');
					} elseif ($user->level == 'owner') {
						redirect('owner/dashboard');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Level tidak sesuai!
							</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Password salah!
						</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Email tidak terdaftar!
					</div>');
			redirect('auth');
		}
 	}

 	public function logout()
 	{
 		session_destroy();
 		redirect('auth');
 	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */