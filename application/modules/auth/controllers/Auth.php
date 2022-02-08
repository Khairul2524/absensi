<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function akun()
	{
		$url = include_once APPPATH . "../assets/google/Google_Client.php";
		$url = include_once APPPATH . "../assets/google/contrib/Google_Oauth2Service.php";
		$google_client = new Google_Client();
		$google_client->setApplicationName('Absensi');
		$google_client->setClientId('745873830579-umd0lhk7tunj969epai3mdkgffoknjkm.apps.googleusercontent.com');
		$google_client->setClientSecret('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');
		$google_client->setRedirectUri('http://localhost/absensi/dashboard');
		$google_oauthv2 = new Google_Oauth2Service($google_client);


		if (isset($_GET['code'])) {
			$email = $google_client->authenticate($_GET['code']);
			$_SESSION['token'] = $google_client->getAccessToken();
			// header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) {
			$google_client->setAccessToken($_SESSION['token']);
		}
		if ($google_client->getAccessToken()) {
			$gpuserprofile = $google_oauthv2->userinfo->get();
			$nama = $gpuserprofile['given_name'] . " " . $gpuserprofile['family_name'];
			$email = $gpuserprofile['email'];
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'role'		=> 5,
			);
			$this->session->set_userdata($data);
			redirect('dashboard/cek');
		} else {
			$authUrl = $google_client->createAuthUrl();
			header("location: " . $authUrl);
		}
	}
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cekuser = $this->db->get_where('user', ['email' => $email])->row_array();
		// var_dump($cekuser);
		// die();
		if ($cekuser) {
			if (password_verify($password, $cekuser['password'])) {

				$data = array(
					'namalengkap' => $cekuser['namalengkap'],
					'email' => $cekuser['email'],
					'role'		=> $cekuser['idrole'],
					'opd'		=> $cekuser['idopd']
				);
				// var_dump($data);
				// die;
				$this->session->set_userdata($data);
				redirect('dashboard/dash');
			} else {
				$this->session->set_flashdata('gagal', 'Password Anda Salah!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Email Anda Belum Terdaftar!');
			redirect('auth');
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('namalengkap');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('opd');

		redirect('auth');
	}
}
