<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$this->load->model('Absensi_model', 'absensi');
		$this->load->model('All_model', 'all');
	}

	public function index()
	{

		$data = array(
			'judul' => 'Absensi',
			'data' => $this->absensi->get(),
			// 'opd' => $this->all->getopd(),
			'user' => $this->all->getuser(),
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
		$id = htmlspecialchars($this->input->post('pegawai'));
		$jammasuk = time();
		$jamjadwalmasuk = strtotime("07:30:00");
		$keterangan = htmlspecialchars($this->input->post('ket'));
		$statusmasuk = 3;
		if ($keterangan == null) {
			if ($jammasuk > $jamjadwalmasuk) {
				$selisih = $jammasuk - $jamjadwalmasuk;
				$jam = floor($selisih / (60 * 60));
				$menit    = $selisih - $jam * (60 * 60);
				$selisihmenit = floor($menit / 60);
				$keterangan = "Anda Telat Masuk Kerja " . $jam . " Jam " . $selisihmenit . " Menit";
				$statusmasuk = 2; //telat
			} elseif ($jammasuk < $jamjadwalmasuk) {
				$selisih = $jamjadwalmasuk - $jammasuk;
				$jam = floor($selisih / (60 * 60));
				$menit    = $selisih - $jam * (60 * 60);
				$selisihmenit = floor($menit / 60);
				$keterangan = "Anda Tepat Waktu Masuk Kerja " . $jam . " Jam " . $selisihmenit . " Menit";
				$statusmasuk = 1; //tepat
			}
		}

		$data = array(
			'iduser' => $id,
			'jammasuk' => $jammasuk,
			'keterangan' => $keterangan,
			'statusmasuk' => $statusmasuk,
			'jamkeluar'	 => 1,
			'statuskeluar' => 1,
			'lat' => htmlspecialchars($this->input->post('lat')),
			'long' => htmlspecialchars($this->input->post('long')),
		);
		// print_r($data);
		// die;

		$this->absensi->insert($data);
		$this->session->set_flashdata('berhasil', 'Absensi Berhasil Ditambah!');

		redirect('absensi');
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->absensi->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'idabsensi' => htmlspecialchars($this->input->post('id')),
			'keterangan' => htmlspecialchars($this->input->post('ket')),
		);
		// print_r($data);
		// die;
		$this->absensi->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'absensi Berhasil Diubah!');
		redirect('absensi');
	}
	public function laporan()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('laporan',);
		$this->load->view('template/footer');
	}
}
