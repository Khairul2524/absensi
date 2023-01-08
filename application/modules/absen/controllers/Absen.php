<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Absen_model', 'absen');
		// $this->load->model('All_model', 'all');
	}

	public function index()
	{
		$data = array(
			'judul' => 'Absen',
			'data' => $this->absen->get(),
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
	public function absen_masuk()
	{
		$hari_ini = time();
		$hari = date('D', $hari_ini);
		$tgl = date('Y-m-d');

		$cek_hari_libur = $this->db->get_where('hari_libur', ['tgl' => $tgl])->row();

		if (!$cek_hari_libur) {
			if ($hari != 'Sun' && $hari != 'Sat') {
				$cek_absen = $this->db->get_where('absen', ['id_user' => $this->session->userdata('id_user'), 'tgl' => $tgl])->row();

				if (!$cek_absen) {
					// ambil titik opd 	
					$get_titik_opd = $this->db->get_where('opd', ['id_opd' => 1])->row();
					// echo json_encode($get_titik_opd);
					// die;
					// titik koordinat tempat absen
					$latitude = $get_titik_opd->lat;
					$longtitude = $get_titik_opd->long;
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
								'id_user' => $this->session->userdata('id_user'),
								'tgl'	=> $tgl,
								'jam_masuk' => $jam_masuk,
								'jam_pulang' => '00:00',
								'lat' => $latitude_sekarang,
								'long' => $longitude_sekarang,
								'status_masuk' => 1,
								'foto' => '',
								'keterangan'  => '-'
							);
							$this->absen->insert($datak);
							$data = array(
								'status' => 1,
								'keterangan' => 'Anda Masuk Jam ' . $jam_masuk
							);
							echo json_encode($data);
						} else {
							$data = array(
								'status' => 0,
								'keterangan' => 'Jarak Anda Lebih dari 10 Meter'
							);
							echo json_encode($data);
						}
					} else {
						$data = array(
							'status' => 0,
							'keterangan' => 'Lokasi Anda Tidak Terdeteksi'
						);
						echo json_encode($data);
					}
				} else {
					$data = array(
						'status' => 0,
						'keterangan' => 'Anda Sudah Absen'
					);
					echo json_encode($data);
				}
			} else {
				$data = array(
					'status' => 0,
					'keterangan' => 'Hari Ini Libur'
				);
				echo json_encode($data);
			}
		} else {
			$data = array(
				'status' => 0,
				'keterangan' => 'Hari Ini Libur'
			);
			echo json_encode($data);
		}
	}
	public function absen_pulang()
	{
		$tgl = date('Y-m-d');
		$cek_absen = $this->db->get_where('absen', ['id_user' => $this->session->userdata('id_user'), 'tgl' => $tgl])->row();
		// echo json_encode($cek_absen);
		// die();
		if ($cek_absen) {
			if ($cek_absen->jam_pulang == '00:00') {
				// ambil titik opd

				$get_titik_opd = $this->db->get_where('opd', ['id_opd' => 1])->row();

				// titik koordinat tempat absen
				$latitude = $get_titik_opd->lat;
				$longtitude = $get_titik_opd->long;
				// echo json_encode($get_titik_opd->lat);

				// ambil titik koordinat
				$latitude_sekarang = $this->input->post('lat');
				$longitude_sekarang = $this->input->post('long');
				// echo json_encode($longitude_sekarang);
				// die;
				if ($latitude_sekarang && $longitude_sekarang) {

					$theta = $longtitude - $longitude_sekarang;
					$miles = (sin(deg2rad($latitude)) * sin(deg2rad($latitude_sekarang))) + (cos(deg2rad($latitude)) * cos(deg2rad(
						$latitude_sekarang
					)) * cos(deg2rad($theta)));
					$miles = acos($miles);
					$miles = rad2deg($miles);
					$meter = $miles * 1609.34;
					$jam_pulang = date('H:i', time());
					// echo json_encode($cek_absen->id_absen);
					// die;
					if ($meter <= 10) {

						$dataks = array(
							'id_absen' => $cek_absen->id_absen,
							'id_user' => $this->session->userdata('id_user'),
							'jam_pulang' => $jam_pulang,
						);
						// echo json_encode($dataks);
						$this->absen->update($cek_absen->id_absen, $dataks);
						$data = array(
							'status' => 1,
							'keterangan' => 'Anda Pulang Jam ' . $jam_pulang
						);
						echo json_encode($data);
					} else {
						$data = array(
							'status' => 0,
							'keterangan' => 'Jarak Anda Lebih dari 10 Meter'
						);
						echo json_encode($data);
					}
				} else {
					$data = array(
						'status' => 0,
						'keterangan' => 'Lokasi Anda Tidak Terdeteksi'
					);
					echo json_encode($data);
				}
			} else {
				$data = array(
					'status' => 0,
					'keterangan' => 'Anda Sudah Absen Pulang'
				);
				echo json_encode($data);
			}
		} else {
			$data = array(
				'status' => 0,
				'keterangan' => 'Anda Belum Absen Masuk'
			);
			echo json_encode($data);
		}
	}
	public function absen_izin()
	{
		$hari_ini = time();
		$hari = date('D', $hari_ini);
		$tgl = date('Y-m-d');

		$cek_hari_libur = $this->db->get_where('hari_libur', ['tgl' => $tgl])->row();
		if (!$cek_hari_libur) {
			if ($hari != 'Sun' && $hari != 'Sat') {
				$cek_absen = $this->db->get_where('absen', ['id_user' => $this->session->userdata('id_user'), 'tgl' => $tgl])->row();
				if (!$cek_absen) {
					// upload foto surat izin

					$latitude_sekarang = $this->input->post('lat');
					$longitude_sekarang = $this->input->post('long');

					if ($latitude_sekarang && $longitude_sekarang) {
						$jam_izin = date('H:i', time());
						$datak = array(
							'id_user' => $this->session->userdata('id_user'),
							'tgl'	=> $tgl,
							'jam_masuk' => $jam_izin,
							'jam_pulang' => $jam_izin,
							'lat' => $latitude_sekarang,
							'long' => $longitude_sekarang,
							'foto' => $this->_uploadsfoto(),
							'status_masuk' => 2,
							'keterangan' => htmlspecialchars($this->input->post('ket'))
						);
						$this->absen->insert($datak);
						$this->session->set_flashdata('berhasil', 'Anda Berhasil Absen Izin');
						redirect('absen');
					} else {
						$this->session->set_flashdata('gagal', 'Lokasi Anda Tidak Terdeteksi');
						redirect('absen');
					}
				} else {
					$this->session->set_flashdata('gagal', 'Anda Sudah Absen');
					redirect('absen');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Hari Ini Libur');
				redirect('absen');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Hari Ini Libur');
			redirect('absen');
		}
	}
	public function tugas_dinas()
	{
		$hari_ini = time();
		$hari = date('D', $hari_ini);
		$tgl = date('Y-m-d');

		$cek_hari_libur = $this->db->get_where('hari_libur', ['tgl' => $tgl])->row();
		if (!$cek_hari_libur) {
			if ($hari != 'Sun' && $hari != 'Sat') {
				$cek_absen = $this->db->get_where('absen', ['id_user' => $this->session->userdata('id_user'), 'tgl' => $tgl])->row();
				if (!$cek_absen) {
					// upload foto surat izin

					$latitude_sekarang = $this->input->post('lati');
					$longitude_sekarang = $this->input->post('longi');

					if ($latitude_sekarang && $longitude_sekarang) {
						$jam_izin = date('H:i', time());
						$datak = array(
							'id_user' => $this->session->userdata('id_user'),
							'tgl'	=> $tgl,
							'jam_masuk' => $jam_izin,
							'jam_pulang' => $jam_izin,
							'lat' => $latitude_sekarang,
							'long' => $longitude_sekarang,
							'foto' => $this->_uploadsfoto(),
							'status_masuk' => 3,
							'keterangan' => htmlspecialchars($this->input->post('ket'))
						);
						$this->absen->insert($datak);
						$this->session->set_flashdata('berhasil', 'Anda Berhasil Absen Izin');
						redirect('absen');
					} else {
						$this->session->set_flashdata('gagal', 'Lokasi Anda Tidak Terdeteksi');
						redirect('absen');
					}
				} else {
					$this->session->set_flashdata('gagal', 'Anda Sudah Absen');
					redirect('absen');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Hari Ini Libur');
				redirect('absen');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Hari Ini Libur');
			redirect('absen');
		}
	}
	private function _uploadsfoto()
	{
		$foto = $_FILES['foto'];
		if ($foto) {
			$config['upload_path']      = './assets/backend/img/izin/';
			$config['allowed_types']    = 'jpg|png|jpeg|gif';
			$config['overwrite']        = 'true';
			// $config['file_name']        = 'file_name';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('gagal', 'Foto Gagal Diupload');
				redirect('absen');
			} else {
				$foto = $this->upload->data('file_name');

				// library yang disediakan codeigniter
				$config['image_library']  = 'gd2';
				// gambar yang akan dibuat thumbnail
				$config['source_image']   = './assets/backend/img/izin/' . $foto . '';

				// rasio resolusi
				$config['maintain_ratio'] = FALSE;
				// lebar
				$config['width']          = 500;
				// tinggi
				$config['height']         = 500;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}
		}
		return $foto;
	}
}
