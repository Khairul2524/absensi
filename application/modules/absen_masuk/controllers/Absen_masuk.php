<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Absen_masuk extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$this->load->model('Absen_masuk_model', 'absen_masuk');
		$this->load->model('All_model', 'all');
	}

	public function index()
	{

		$data = array(
			'judul' => 'Absen Masuk',
			'data' => $this->absen_masuk->get(),
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
		$jam_absen = time();
		$tanggal =  date('Y-m-d', $jam_absen);
		$jam_kerja = date('H:i', $jam_absen);

		$cek_jam_kerja = $this->db->get_where('jam_kerja', ['tanggal' => $tanggal])->row();


		if ($cek_jam_kerja) {
			$cek_absen = $this->db->get_where('absen_masuk', ['id_jam_kerja' => $cek_jam_kerja->id_jk, 'iduser' => $id])->row();
			// var_dump($cek_absen);
			// die;
			$mulai_masuk = $cek_jam_kerja->mulai_masuk;
			$jam_masuk = $cek_jam_kerja->jam_masuk;
			$batas_masuk = $cek_jam_kerja->batas_masuk;
			// $mulai_pulang = $cek_jam_kerja->mulai_pulang;
			// $jam_pulang = $cek_jam_kerja->jam_pulang;
			// $batas_pulang = $cek_jam_kerja->batas_pulang;
			$keterangan = htmlspecialchars($this->input->post('ket'));
			if (!$cek_absen) {
				if ($keterangan == null) {
					if ($jam_kerja <= $mulai_masuk) {
						$this->session->set_flashdata('gagal', 'Anda Tidak Dapat Absen Masuk');
					} elseif ($jam_kerja >= $mulai_masuk && $batas_masuk >= $jam_kerja) {
						if ($jam_kerja <= $jam_masuk) {
							$jam1 = strtotime($jam_kerja);
							$jam2 = strtotime($jam_masuk);
							$selisih = $jam2 - $jam1;
							$jam = floor($selisih / (60 * 60));
							$menit    = $selisih - $jam * (60 * 60);
							$selisihmenit = floor($menit / 60);
							$keterangan = "Anda Tepat Waktu Masuk Kerja " . $jam . " Jam " . $selisihmenit . " Menit";


							$this->session->set_flashdata('berhasil', $keterangan);
							$data = array(
								'iduser' => $id,
								'id_jam_kerja' => $cek_jam_kerja->id_jk,
								'absen_masuk' => $jam_kerja,
								'keterangan' => $keterangan,
								'status_masuk' => 1, //tepat
								'lat' => htmlspecialchars($this->input->post('lat')),
								'long' => htmlspecialchars($this->input->post('long')),
							);

							$this->absen_masuk->insert($data);
						} elseif ($jam_kerja > $jam_masuk) {
							$jam1 = strtotime($jam_kerja);
							$jam2 = strtotime($jam_masuk);
							$selisih = $jam1 - $jam2;
							$jam = floor($selisih / (60 * 60));
							$menit    = $selisih - $jam * (60 * 60);
							$selisihmenit = floor($menit / 60);
							$keterangan = "Anda Telat Masuk Kerja " . $jam . " Jam " . $selisihmenit . " Menit";

							$data = array(
								'iduser' => $id,
								'id_jam_kerja' => $cek_jam_kerja->id_jk,
								'absen_masuk' => $jam_kerja,
								'keterangan' => $keterangan,
								'status_masuk' => 2, //telat
								'lat' => htmlspecialchars($this->input->post('lat')),
								'long' => htmlspecialchars($this->input->post('long')),
							);

							$this->absen_masuk->insert($data);

							$this->session->set_flashdata('info', $keterangan);
						}
					} else {
						$this->session->set_flashdata('gagal', 'Anda Telat Absen Masuk');
					}
				} else {
					if ($jam_kerja >= $mulai_masuk && $batas_masuk >= $jam_kerja) {
						$jam1 = strtotime($jam_kerja);
						$jam2 = strtotime($jam_masuk);
						$selisih = $jam1 - $jam2;
						$jam = floor($selisih / (60 * 60));
						$menit    = $selisih - $jam * (60 * 60);
						$selisihmenit = floor($menit / 60);
						$data = array(
							'iduser' => $id,
							'id_jam_kerja' => $cek_jam_kerja->id_jk,
							'absen_masuk' => $jam_kerja,
							'keterangan' => $keterangan,
							'status_masuk' => 3, //izin
							'lat' => htmlspecialchars($this->input->post('lat')),
							'long' => htmlspecialchars($this->input->post('long')),
						);
						$this->session->set_flashdata('berhasil', "Anda Izin Tidak Masuk Kerja");
						$this->absen_masuk->insert($data);
					} else {
						$this->session->set_flashdata('gagal', "Anda Tidak dapat Izin Masuk Kerja");
					}
				}
			} else {
				$this->session->set_flashdata('info', "Anda Sudah Absen ");
			}
		}
		redirect('absen_masuk');
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->absen_masuk->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'id_absen_masuk' => htmlspecialchars($this->input->post('id')),
			'keterangan' => htmlspecialchars($this->input->post('ket')),
		);
		// print_r($data);
		// die;
		$this->absen_masuk->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'Absen Masuk Berhasil Diubah!');
		redirect('absen_masuk');
	}
	public function laporan()
	{
		$data = array(
			'data' => $this->all->getuser(),
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('laporan', $data);
		$this->load->view('template/footer');
	}
	public function print()
	{
		$data = array(
			'data' => $this->all->getuser(),
		);
		$this->load->view('print', $data);
	}
}
