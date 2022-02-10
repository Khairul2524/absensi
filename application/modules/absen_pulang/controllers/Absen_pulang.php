<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Absen_pulang extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$this->load->model('Absen_pulang_model', 'absen_pulang');
		$this->load->model('All_model', 'all');
	}

	public function index()
	{

		$data = array(
			'judul' => 'Absen Pulang',
			'data' => $this->absen_pulang->get(),
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
		$waktu_absen = time();
		$tanggal =  date('Y-m-d', $waktu_absen);
		$jam_absen = date('H:i', $waktu_absen);
		// echo $jam_absen;
		// die;
		$cek_jam_kerja = $this->db->get_where('jam_kerja', ['tanggal' => $tanggal])->row();
		// var_dump($cek_jam_kerja);
		// die;

		if ($cek_jam_kerja) {
			$cek_absen_masuk = $this->db->get_where('absen_masuk', ['id_jam_kerja' => $cek_jam_kerja->id_jk, 'iduser' => $id])->row();
			if ($cek_absen_masuk) {

				$cek_absen = $this->db->get_where('absen_pulang', ['id_jam_kerja' => $cek_jam_kerja->id_jk, 'id_user' => $id])->row();
				// var_dump($cek_absen);
				// die;
				$mulai_pulang = $cek_jam_kerja->mulai_pulang;
				$jam_pulang = $cek_jam_kerja->jam_pulang;
				$batas_pulang = $cek_jam_kerja->batas_pulang;
				$mulai_pulang = $cek_jam_kerja->mulai_pulang;
				$jam_pulang = $cek_jam_kerja->jam_pulang;
				$batas_pulang = $cek_jam_kerja->batas_pulang;
				// var_dump($mulai_pulang);
				// die;
				// echo $jam_absen . '<br>';
				// echo $mulai_pulang . '<br>';
				// echo $batas_pulang . '<br>';
				// // echo $jam_absen . '<br>';
				// die;

				$statuspulang = 3;
				if (!$cek_absen) {

					if ($jam_absen <= $mulai_pulang) {
						// echo "oke";
						$this->session->set_flashdata('gagal', 'Anda Tidak Dapat Absen pulang');
					} elseif ($jam_absen >= $mulai_pulang && $batas_pulang <= $jam_absen) {
						// echo "oke";
						$keterangan = htmlspecialchars($this->input->post('ket'));
						if ($keterangan == null) {
							if ($jam_absen < $jam_pulang) {
								$jam1 = strtotime($jam_absen);
								$jam2 = strtotime($jam_pulang);
								$selisih = $jam2 - $jam1;
								$jam = floor($selisih / (60 * 60));
								$menit    = $selisih - $jam * (60 * 60);
								$selisih_menit = floor($menit / 60);
								$keterangan = "Anda Terlalu Cepat Pulang Kerja " . $jam . " Jam " . $selisih_menit . " Menit";
								$statuspulang = 2; //bolos

								$this->session->set_flashdata('berhasil', $keterangan);
							} elseif ($jam_absen > $jam_pulang) {
								$jam1 = strtotime($jam_absen);
								$jam2 = strtotime($jam_pulang);
								$selisih = $jam1 - $jam2;
								$jam = floor($selisih / (60 * 60));
								$menit    = $selisih - $jam * (60 * 60);
								$selisihmenit = floor($menit / 60);
								$keterangan = "Anda Pulang Kerja Tepat Waktu " . $jam . " Jam " . $selisihmenit . " Menit";
								$statuspulang = 1; //tepat
								$this->session->set_flashdata('info', $keterangan);
							}
							$data = array(
								'id_user' => $id,
								'id_jam_kerja' => $cek_jam_kerja->id_jk,
								'absen_pulang' => $jam_absen,
								'keterangan' => $keterangan,
								'status_pulang' => $statuspulang,
								'lat' => htmlspecialchars($this->input->post('lat')),
								'long' => htmlspecialchars($this->input->post('long')),
							);
							// print_r($data);
							// die;

							$this->absen_pulang->insert($data);
						}
					}
					// die;

				} else {
					$this->session->set_flashdata('info', "Anda Sudah Absen ");
				}
			} else {
				$this->session->set_flashdata('info', "Anda Tidak Masuk Hari ini");
			}
		}
		redirect('absen_pulang');
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->absen_pulang->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'id_absen_pulang' => htmlspecialchars($this->input->post('id')),
			'keterangan' => htmlspecialchars($this->input->post('ket')),
		);
		// print_r($data);
		// die;
		$this->absen_pulang->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'Absen pulang Berhasil Diubah!');
		redirect('absen_pulang');
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
