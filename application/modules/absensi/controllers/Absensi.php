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
	}
	public function index()
	{
		$data = array(
			'judul' => 'Absensi',
			'data' => $this->db->get('absensi')->result(),
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
	public function absen_masuk()
	{
		$hari_ini = time();
		$hari = date('D', $hari_ini);
		$tgl = date('Y-m-d');
		$cek_hari_libur = $this->db->get_where('hari_libur', ['tanggal' => $tgl])->row();
		if (!$cek_hari_libur) {
			if ($hari != 'Sun' || $hari != 'Sat') {
				$cek_absen = $this->db->get_where('absensi', ['id_user' => $this->session->userdata('iduser'), 'tgl' => $tgl])->row();
				if (!$cek_absen) {
					// titik koordinat tempat absen
					$latitude = -8.6904758;
					$longtitude = 116.249471;
					// ambil titik koordinat
					$latitude_sekarang = $this->input->post('lat');
					$longitude_sekarang = $this->input->post('long');
					if ($latitude_sekarang && $longitude_sekarang) {
						// echo json_decode($latitude_sekarang);
						$theta = $longtitude - $longitude_sekarang;
						$miles = (sin(deg2rad($latitude)) * sin(deg2rad($latitude_sekarang))) + (cos(deg2rad($latitude)) * cos(deg2rad(
							$latitude_sekarang
						)) * cos(deg2rad($theta)));
						$miles = acos($miles);
						$miles = rad2deg($miles);
						$meter = $miles * 1609.34;
						$jam_masuk = date('H:i', time());
						if ($meter <= 10) {
							$datak = array(
								'id_user' => $this->session->userdata('iduser'),
								'tgl'	=> $tgl,
								'jam_masuk' => $jam_masuk,
								'jam_pulang' => 0,
								'lat_masuk' => $latitude_sekarang,
								'long_masuk' => $longitude_sekarang,
								'lat_pulang' => 0,
								'long_pulang' => 0
							);
							$this->absensi->insert($datak);
							$this->session->set_flashdata('berhasil', 'Absen');
						}
					}
				}
			}
			// die;
		}
		// $harilibur = 'Thu';

		// if ($hari == 'Sun' || $hari == 'Sat' || $hari == $harilibur) {
		// 	echo "Hari Libur";
		// } else {
		// 	echo "Hari Ini Masuk";
		// }
	}
	public function getdata()
	{
		foreach ($this->absensi->get() as $data) {
			$datas[] = $data;
		}
		echo json_encode(array("result" => $datas));
	}
	public function rest()
	{

		$hari_ini = time();
		$hari = date('D', $hari_ini);
		$tgl = date('Y-m-d');
		echo $this->session->userdata('iduser');
		die;
		$cek_absen = $this->db->get_where('absensi', ['id_user' => $this->session->userdata('iduser'), 'tgl' => $tgl])->row();
		var_dump($cek_absen);
		die;
	}
	public function lokasi()
	{
		$this->load->view('lokasi');
	}
}
