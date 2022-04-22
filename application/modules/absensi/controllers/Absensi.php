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
			'data' => $this->db->get('absensi')->result(),
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
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
					// ambil titik opd 	
					$get_titik_opd = $this->db->get_where('opd', ['idopd' => $this->session->userdata('opd')])->row();
					// titik koordinat tempat absen
					$latitude = $get_titik_opd->lat;
					$longtitude = $get_titik_opd->longt;
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
						if ($meter <= 25) {
							$datak = array(
								'id_user' => $this->session->userdata('iduser'),
								'tgl'	=> $tgl,
								'jam_masuk' => $jam_masuk,
								'jam_pulang' => '00:00',
								'lat_masuk' => $latitude_sekarang,
								'long_masuk' => $longitude_sekarang,
								'lat_pulang' => 0,
								'long_pulang' => 0,
								'foto' => 1,
								'ket'  => '-'
							);
							$this->absensi->insert($datak);
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
		$cek_absen = $this->db->get_where('absensi', ['id_user' => $this->session->userdata('iduser'), 'tgl' => $tgl])->row();
		if ($cek_absen) {
			if ($cek_absen->jam_pulang == '00:00') {
				// ambil titik opd 	
				$get_titik_opd = $this->db->get_where('opd', ['idopd' => $this->session->userdata('opd')])->row();
				// titik koordinat tempat absen
				$latitude = $get_titik_opd->lat;
				$longtitude = $get_titik_opd->longt;
				// ambil titik koordinat
				$latitude_sekarang = $this->input->post('lat');
				$longitude_sekarang = $this->input->post('long');
				if ($latitude_sekarang && $longitude_sekarang) {
					// echo json_decode($latitude_sekarang);
					// die;
					$theta = $longtitude - $longitude_sekarang;
					$miles = (sin(deg2rad($latitude)) * sin(deg2rad($latitude_sekarang))) + (cos(deg2rad($latitude)) * cos(deg2rad(
						$latitude_sekarang
					)) * cos(deg2rad($theta)));
					$miles = acos($miles);
					$miles = rad2deg($miles);
					$meter = $miles * 1609.34;
					$jam_pulang = date('H:i', time());
					if ($meter <= 10) {
						$dataks = array(
							'id_absensi' => $cek_absen->id_absensi,
							'id_user' => $this->session->userdata('iduser'),
							'tgl'	=> $tgl,
							'jam_pulang' => $jam_pulang,
							'lat_pulang' => $latitude_sekarang,
							'long_pulang' => $longitude_sekarang
						);
						$this->absensi->update($cek_absen->id_absensi, $dataks);
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
		$foto_izin = $_FILES['foto'];

		$cek_hari_libur = $this->db->get_where('hari_libur', ['tanggal' => $tgl])->row();
		if (!$cek_hari_libur) {
			if ($hari != 'Sun' || $hari != 'Sat') {
				$cek_absen = $this->db->get_where('absensi', ['id_user' => $this->session->userdata('iduser'), 'tgl' => $tgl])->row();
				if (!$cek_absen) {
					// upload foto surat izin
					if ($foto_izin) {
						$config['upload_path']      = './assets/backand/img/izin/';
						$config['allowed_types']    = 'jpg|png|jpeg|gif';
						$config['overwrite']        = 'true';
						// $config['file_name']        = 'file_name';
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('foto')) {
							$this->session->set_flashdata('gagal', 'Foto Gagal Diupload');
							redirect('user/tambah');
						} else {
							$foto = $this->upload->data('file_name');

							// library yang disediakan codeigniter
							$config['image_library']  = 'gd2';
							// gambar yang akan dibuat thumbnail
							$config['source_image']   = './assets/backand/img/izin/' . $foto . '';

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
					$latitude_sekarang = $this->input->post('lat');
					$longitude_sekarang = $this->input->post('long');

					if ($latitude_sekarang && $longitude_sekarang) {
						$jam_izin = date('H:i', time());
						$datak = array(
							'id_user' => $this->session->userdata('iduser'),
							'tgl'	=> $tgl,
							'jam_masuk' => $jam_izin,
							'jam_pulang' => $jam_izin,
							'lat_masuk' => $latitude_sekarang,
							'long_masuk' => $longitude_sekarang,
							'lat_pulang' => $latitude_sekarang,
							'long_pulang' => $longitude_sekarang,
							'foto' => $foto
						);
						$this->absensi->insert($datak);
						$this->session->set_flashdata('berhasil', 'Anda Berhasil Absen Izin');
						redirect('absensi');
					} else {
						$this->session->set_flashdata('gagal', 'Lokasi Anda Tidak Terdeteksi');
						redirect('absensi');
					}
				} else {
					$this->session->set_flashdata('gagal', 'Anda Sudah Absen');
					redirect('absensi');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Hari Ini Libur');
				redirect('absensi');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Hari Ini Libur');
			redirect('absensi');
		}
	}
	public function getdata()
	{
		foreach ($this->absensi->getall() as $data) {
			$datas[] = $data;
		}
		echo json_encode(array("result" => $datas));
	}
	public function detail($id)
	{
		$data = array(
			'user' => $this->all->getiduser($id),
			'absen' => $this->all->getabsenuser($id)
		);
		// var_dump($data['user']);
		// var_dump($data['absen']);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('detail', $data);
		$this->load->view('template/footer');
	}
	public function rest()
	{

		$hari_ini = time();
		$hari = date('D', $hari_ini);
		$tgl = date('Y-m-d');
		echo $this->session->userdata('iduser');
		$cek_absen = $this->db->get_where('absensi', ['id_user' => $this->session->userdata('iduser'), 'tgl' => $tgl])->row();
		var_dump($cek_absen);
	}
	public function lokasi()
	{
		$this->load->view('lokasi');
	}
}
