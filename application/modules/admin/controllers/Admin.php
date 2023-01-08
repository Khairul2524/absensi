<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('role') != 1) {
		// 	redirect('auth');
		// } else {
		// 	if (!$this->session->userdata('role')) {
		// 		redirect('auth');
		// 	}
		// }
		// $this->load->model('Role_model', 'role');
		// $this->load->model('All_model', 'all');
	}

	public function index()
	{
		$id = $this->session->userdata('idrole');
		$data = array(
			'judul' => 'Dashboard',
			// 'data' => $this->role->get(),
			// 'role' => $this->all->getidrole($id)
		);
		// var_dump($data['data']);
		// die();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('index', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		$data = array(
			'role' => htmlspecialchars($this->input->post('role')),
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('role', ['role' => htmlspecialchars($this->input->post('role'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->role->insert($data);
			$this->session->set_flashdata('berhasil', 'Role Berhasil Ditambah!');
			redirect('role');
		} else {
			$this->session->set_flashdata('gagal', 'Role Gagal Ditambah!');
			redirect('role');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->role->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'idrole' => htmlspecialchars($this->input->post('id')),
			'role' => htmlspecialchars($this->input->post('role')),
		);
		// print_r($data);
		// die;
		$this->role->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'Role Berhasil Diubah!');
		redirect('role');
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->role->delete($id);
		$this->session->set_flashdata('berhasil', 'Role Berhasil Dihapus!');
		redirect('role');
	}
}
