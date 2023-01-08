<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Opd extends MX_Controller
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
		$this->load->model('Opd_model', 'opd');
		// $this->load->model('All_model', 'all');
	}

	public function index()
	{

		$data = array(
			'judul' => 'OPD',
			'data' => $this->opd->get(),
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
			'nama_opd' => htmlspecialchars($this->input->post('nama')),
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('opd', ['nama_opd' => htmlspecialchars($this->input->post('nama'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->opd->insert($data);
			$this->session->set_flashdata('berhasil', 'OPD Berhasil Ditambah!');
			redirect('opd');
		} else {
			$this->session->set_flashdata('gagal', 'OPD Gagal Ditambah!');
			redirect('opd');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->opd->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'id_opd' => htmlspecialchars($this->input->post('id')),
			'nama_opd' => htmlspecialchars($this->input->post('nama')),
		);
		// print_r($data);
		// die;
		$this->opd->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'OPD Berhasil Diubah!');
		redirect('opd');
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->opd->delete($id);
		$this->session->set_flashdata('berhasil', 'OPD Berhasil Dihapus!');
		redirect('opd');
	}
}
