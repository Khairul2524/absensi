<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jam_kerja extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$this->load->model('Jam_kerja_model', 'jk');
		// $this->load->model('All_model', 'all');
	}

	public function index()
	{

		$data = array(
			'judul' => 'Jam Kerja',
			'data' => $this->jk->get(),
			// 'role' => $this->all->getidrole($id)
		);
		// var_dump($data['data']);
		// die();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data = array(
			'tanggal' => htmlspecialchars($this->input->post('tgl')),
			'mulai_masuk' => htmlspecialchars($this->input->post('mulai_masuk')),
			'jam_masuk' => htmlspecialchars($this->input->post('jam_masuk')),
			'batas_masuk' => htmlspecialchars($this->input->post('batas_masuk')),
			'mulai_pulang' => htmlspecialchars($this->input->post('mulai_pulang')),
			'jam_pulang' => htmlspecialchars($this->input->post('jam_pulang')),
			'batas_pulang' => htmlspecialchars($this->input->post('batas_pulang')),
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('jam_kerja', ['tanggal' => htmlspecialchars($this->input->post('tgl'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->jk->insert($data);
			$this->session->set_flashdata('berhasil', 'Jam Kerja Berhasil Ditambah!');
			redirect('jam_kerja');
		} else {
			$this->session->set_flashdata('gagal', 'Jam Kerja Gagal Ditambah!');
			redirect('jam_kerja');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->jk->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'id_jk' => htmlspecialchars($this->input->post('id')),
			'tanggal' => htmlspecialchars($this->input->post('tgl')),
			'mulai_masuk' => htmlspecialchars($this->input->post('mulai_masuk')),
			'jam_masuk' => htmlspecialchars($this->input->post('jam_masuk')),
			'batas_masuk' => htmlspecialchars($this->input->post('batas_masuk')),
			'mulai_pulang' => htmlspecialchars($this->input->post('mulai_pulang')),
			'jam_pulang' => htmlspecialchars($this->input->post('jam_pulang')),
			'batas_pulang' => htmlspecialchars($this->input->post('batas_pulang')),
		);
		// print_r($data);
		// die;
		$this->jk->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'Jam Kerja Berhasil Diubah!');
		redirect('jam_kerja');
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->jk->delete($id);
		$this->session->set_flashdata('berhasil', 'Jam Kerja Berhasil Dihapus!');
		redirect('jam_kerja');
	}
}
