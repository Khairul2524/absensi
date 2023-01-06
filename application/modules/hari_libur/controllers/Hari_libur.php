<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hari_libur extends MX_Controller
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
		$this->load->model('Hari_libur_model', 'hari_libur');
		// $this->load->model('All_model', 'all');
	}

	public function index()
	{

		$data = array(
			'judul' => 'Hari Libur',
			'data' => $this->hari_libur->get(),
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
			'tgl' => htmlspecialchars($this->input->post('tgl')),
			'keterangan' => htmlspecialchars($this->input->post('ket')),
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('hari_libur', ['tgl' => htmlspecialchars($this->input->post('tgl'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->hari_libur->insert($data);
			$this->session->set_flashdata('berhasil', 'Hari Libur Berhasil Ditambah!');
			redirect('hari_libur');
		} else {
			$this->session->set_flashdata('gagal', 'Hari Libur Gagal Ditambah!');
			redirect('hari_libur');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->hari_libur->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'id_hari_libur' => htmlspecialchars($this->input->post('id')),
			'tgl' => htmlspecialchars($this->input->post('tgl')),
			'keterangan' => htmlspecialchars($this->input->post('ket'))
		);
		// print_r($data);
		// die;
		$this->hari_libur->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'Hari Libur Berhasil Diubah!');
		redirect('hari_libur');
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->hari_libur->delete($id);
		$this->session->set_flashdata('berhasil', 'Hari Libur Berhasil Dihapus!');
		redirect('hari_libur');
	}
}
