<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bidang extends MX_Controller
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
		$this->load->model('Bidang_model', 'bidang');
		$this->load->model('All_model', 'all');
	}

	public function index()
	{

		$data = array(
			'judul' => 'Bidang',
			'data' => $this->bidang->get(),
			'opd' => $this->all->getopd()
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
			'id_opd' => htmlspecialchars($this->input->post('opd')),
			'nama_bidang' => htmlspecialchars($this->input->post('nama')),
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('bidang', ['nama_bidang' => htmlspecialchars($this->input->post('nama'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->bidang->insert($data);
			$this->session->set_flashdata('berhasil', 'Bidang Berhasil Ditambah!');
			redirect('bidang');
		} else {
			$this->session->set_flashdata('gagal', 'Bidang Gagal Ditambah!');
			redirect('bidang');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->bidang->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'id_bidang' => htmlspecialchars($this->input->post('id')),
			'id_opd' => htmlspecialchars($this->input->post('opd')),
			'nama_bidang' => htmlspecialchars($this->input->post('nama')),
		);
		// print_r($data);
		// die;
		$this->bidang->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'Bidang Berhasil Diubah!');
		redirect('bidang');
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->bidang->delete($id);
		$this->session->set_flashdata('berhasil', 'Bidang Berhasil Dihapus!');
		redirect('bidang');
	}
}
