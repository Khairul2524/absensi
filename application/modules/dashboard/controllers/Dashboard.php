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
				'role' => 5
			);
			$this->session->set_userdata($data);
			redirect('dashboard/cek');
		}
	}
	public function cek()
	{
		$email = $this->session->userdata('email');
		$cek = $this->db->get_where('user', ['email' => $email])->row();
		// var_dump($cek);
		if (!$cek) {
			$datas = array(
				'role' => 5
			);
			$this->session->set_userdata($datas);
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
			$data = array(
				'email' => $email,
				'nama'	=> $cek->namalengkap,
				'nik'	=> $cek->nik,
				'nip'	=> $cek->nip,
				'no'	=> $cek->no,
				'opd'	=> $cek->idopd,
				'statustenaga'	=> $cek->statustenaga,
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
		$data = array(
			'email' => $this->input->post('email'),
			'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
			'namalengkap' => $this->input->post('nama'),
			'nik'	=> htmlspecialchars($this->input->post('nik')),
			'nip'	=> htmlspecialchars($this->input->post('nip')),
			'no'	=> htmlspecialchars($this->input->post('no')),
			'idopd'	=> htmlspecialchars($this->input->post('opd')),
			'statustenaga'	=> htmlspecialchars($this->input->post('st')),
			'aktif'	=> 1,
			'idrole' => 5,
			'created_at' => time()
		);
		$cek = $this->db->get_where('user', ['email' => $this->input->post('email')])->row();
		if (!$cek) {
			$this->db->insert('user', $data);
			redirect('dashboard/cek');
		}
	}

	public function dash()
	{
		$datas = array(
			'email' => $this->session->userdata('email')
		);
		// var_dump($datas);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('index');
		$this->load->view('template/footer');
	}
}
