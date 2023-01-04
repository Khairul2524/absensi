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
		$cekuser = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($cekuser) {
			if ($cekuser['aktif'] == 1) {
				if (password_verify($password, $cekuser['password'])) {

					$data = array(
						'namalengkap' => $cekuser['namalengkap'],
						'email' => $cekuser['email'],
						'role'	=> $cekuser['idrole'],
						'opd'	=> $cekuser['idopd'],
						'iduser' => $cekuser['iduser'],
						'idbagian' => $cekuser['id_bagian'],
						'foto' => $cekuser['foto']

					);
					// var_dump($data);
					// die;
					$this->session->set_userdata($data);
					redirect('dashb');
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
