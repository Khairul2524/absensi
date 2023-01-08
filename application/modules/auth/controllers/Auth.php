<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function register()
	{
		$this->load->view('register');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cekuser = $this->db->join('opd', 'opd.id_opd=user.id_opd')->join('bidang', 'bidang.id_bidang=user.id_bidang')->join('role', 'role.id_role=user.id_role')->get_where('user', ['email' => $email])->row_array();
		// var_dump($cekuser);
		// die;
		if ($cekuser) {
			if ($cekuser['aktif'] == 1) {
				if (password_verify($password, $cekuser['password'])) {

					$data = array(
						'id_user' 	=> $cekuser['id_user'],
						'namalengkap' => $cekuser['nama_lengkap'],
						'email' 	=> $cekuser['email'],
						'id_role'	=> $cekuser['id_role'],
						'nama_role'	=> $cekuser['role'],
						'id_opd'	=> $cekuser['id_opd'],
						'nama_opd'	=> $cekuser['nama_opd'],
						'id_bidang' => $cekuser['id_bidang'],
						'nama_bidang' => $cekuser['nama_bidang'],
						'foto' 		=> $cekuser['foto']
					);
					// var_dump($data);
					// die;
					$this->session->set_userdata($data);
					redirect('admin');
				} else {
					$this->session->set_flashdata('gagal', 'Password Anda Salah!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Email Anda Belum Di Aktivasi!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Email Anda Belum Terdaftar!');
			redirect('auth');
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('namalengkap');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('opd');
		$this->session->unset_userdata('iduser');
		$this->session->unset_userdata('idbagian');
		$this->session->unset_userdata('foto');

		redirect('auth');
	}
}
