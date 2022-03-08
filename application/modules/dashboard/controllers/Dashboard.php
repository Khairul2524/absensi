<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model', 'all');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('nama');
		}
		$url = include_once APPPATH . "../assets/google/Google_Client.php";
		$url = include_once APPPATH . "../assets/google/contrib/Google_Oauth2Service.php";
		$google_client = new Google_Client();
		$google_client->setApplicationName('Absensi');
		$google_client->setClientId('745873830579-umd0lhk7tunj969epai3mdkgffoknjkm.apps.googleusercontent.com');
		$google_client->setClientSecret('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');
		$google_client->setRedirectUri('http://localhost/absensi/dashboard');
		$google_oauthv2 = new Google_Oauth2Service($google_client);
		if ($google_client->authenticate($_GET['code'])) {
			$gpuserprofile = $google_oauthv2->userinfo->get();
			$nama = $gpuserprofile['given_name'] . " " . $gpuserprofile['family_name'];
			$email = $gpuserprofile['email'];
			$data = array(
				'namalengkap' => $nama,
				'email' => $email,
				'role' => 4
			);
			$this->session->set_userdata($data);
			redirect('dashboard/cek');
		}
	}
	public function cek()
	{
		$email = $this->session->userdata('email');
		$cek = $this->db->from('user')->join('opd', 'opd.idopd=user.idopd')->join('role', 'role.idrole=user.idrole')->join('bagian', 'bagian.id_bagian=user.id_bagian')->where(['email' => $email])->get()->row();
		// var_dump($cek);
		// die;
		if (!$cek) {

			$data = array(
				'opd' => $this->all->getopd(),
			);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/topbar');
			$this->load->view('form', $data);
			$this->load->view('template/footer');
		} else {
			if (!$this->session->userdata('email')) {
				redirect('auth');
			}
			$datas = array(
				'role' =>  $cek->idrole,
				'opd' => $cek->idopd,
				'foto' => $cek->foto,
			);
			$this->session->set_userdata($datas);
			$data = array(
				'user' => $cek
			);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/topbar');
			$this->load->view('profile', $data);
			$this->load->view('template/footer');
		}
	}
	public function simpan()
	{
		$foto = $_FILES['foto'];
		// var_dump($foto);
		// die;
		if ($foto) {
			$config['upload_path']      = './assets/backand/img/profile/';
			$config['allowed_types']    = 'jpg|png|jpeg|gif';
			$config['overwrite']        = 'true';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('gagal', 'Foto Gagal Diupload');
				redirect('user/tambah');
			} else {
				$foto = $this->upload->data('file_name');
			}
		}
		$data = array(
			'email' => $this->input->post('email'),
			'password' => password_hash(htmlspecialchars('-'), PASSWORD_DEFAULT),
			'namalengkap' => $this->input->post('nama'),
			'nik'	=> htmlspecialchars($this->input->post('nik')),
			'nip'	=> htmlspecialchars($this->input->post('nip')),
			'no'	=> htmlspecialchars($this->input->post('no')),
			'idopd'	=> htmlspecialchars($this->input->post('opd')),
			'statustenaga'	=> htmlspecialchars($this->input->post('st')),
			'id_bagian' => htmlspecialchars($this->input->post('bagian')),
			'foto' =>  $foto,
			'aktif'	=> 1,
			'idrole' => 4,
			'created_at' => time()
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('user', ['email' => $this->input->post('email')])->row();
		if (!$cek) {
			$this->db->insert('user', $data);
			$this->session->set_flashdata('berhasil', 'User Berhasil Ditambah');
			redirect('dashboard/cek');
		}
	}

	public function dash()
	{

		$absen_masuk = $this->all->get_all_absen_masuk();


		// var_dump($absen_masuk);
		// die;
		$time = time();
		$tanggal = date('Y-m-d', $time);
		// echo $tanggal;
		// die;
		$absen = [];
		$tepat = [];
		$telat = [];
		$izin = [];
		foreach ($absen_masuk as $am) {
			if ($tanggal == $am->tanggal) {
				$absen[] = $am->absen_masuk;
				if ($am->status_masuk == 1) {
					$tepat[] = $am->absen_masuk;
				} elseif ($am->status_masuk == 2) {
					$telat[] = $am->absen_masuk;
				} else {
					$izin[] = $am->absen_masuk;
				}
			}
		}

		// var_dump($tepat);
		// var_dump($telat);

		// die;

		$data = array(
			'jumlah_absen' => count($absen),
			'jumlah_tepat' => count($tepat),
			'jumlah_telat' => count($telat),
			'jumlah_izin' => count($izin),
		);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
}
