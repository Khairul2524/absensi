<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bagian extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('email')) {
		// 	redirect('auth');
		// }
		if ($this->session->userdata('role') != 1) {
			redirect('auth');
		}
		$this->load->model('bagian_model', 'bagian');
		$this->load->model('All_model', 'all');
	}

	public function index()
	{

		$data = array(
			'judul' => 'Bagian Organisasi Perangkat Daerah',
			'data' => $this->bagian->get(),
			'opd' => $this->all->getopd()
		);
		// var_dump($data['data']);
		// die();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data = array(
			'id_opd' => $this->input->post('opd'),
			'nama_bagian' => $this->input->post('bagian')
		);
		$cek = $this->db->get_where('bagian', ['nama_bagian' => $this->input->post('bagian')])->row();
		if (!$cek) {
			$this->bagian->insert($data);
			$this->session->set_flashdata('berhasil', 'Bagian OPD Berhasil Ditambah!');
			redirect('bagian');
		} else {
			$this->session->set_flashdata('gagal', 'Bagian OPD Gagal Ditambah!');
			redirect('bagian');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->bagian->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'id_bagian' => $this->input->post('id'),
			'id_opd' => $this->input->post('opd'),
			'nama_bagian' => $this->input->post('bagian')
		);
		// print_r($data);
		// die;
		$this->bagian->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'Bagian OPD Berhasil Diubah!');
		redirect('bagian');
	}
	public function hapus($id)
	{

		$this->bagian->delete($id);
		$this->session->set_flashdata('berhasil', 'Bagian OPD Berhasil Dihapus!');
		redirect('bagian');
	}
}
