<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') == 4) {
			redirect('auth');
		}
		require APPPATH . 'libraries/phpmailer/src/Exception.php';
		require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH . 'libraries/phpmailer/src/SMTP.php';

		$this->load->model('All_model', 'all');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data = array(
			'user' => $this->user->get()
		);
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('index', $data);
		$this->load->view('layout/footer');
	}
	public function tambah()
	{
		$data = array(
			'kode'			=> '',
			'action' 		=> site_url('user/simpan'),
			'opd' 			=> $this->all->getopd(),
			'role' 			=> $this->all->getrole(),
			'bidang' 		=> $this->all->getbidang(),
			'id'			=> set_value('id'),
			'email'         => set_value('email'),
			'nama'          => set_value('nama'),
			'idopd'			=> set_value('opd'),
			'idbidang'		=> set_value('bidang'),
			'idrole'		=> set_value('role'),
			// 'foto'			=> set_value('foto'),
		);
		// var_dump($data['idopd']);
		// die;
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('form', $data);
		$this->load->view('layout/footer');
	}
	public function get_bidang()
	{
		$id = $_POST['opd_id'];
		echo json_encode($this->all->getidbidang($id));
	}
	public function get_id_bagian()
	{
		$id = $_POST['bagian_id'];
		echo json_encode($this->all->getidbagian($id));
	}
	private function _uploadfoto()
	{
		$foto = $_FILES['foto'];
		// var_dump($foto);
		// die;
		if ($foto) {
			$config['upload_path']      = './assets/backend/img/profile/';
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
				$config['source_image']   = './assets/backend/img/profile/' . $foto . '';

				// rasio resolusi
				$config['maintain_ratio'] = FALSE;
				// lebar
				$config['width']          = 200;
				// tinggi
				$config['height']         = 200;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}
		}
		return $foto;
	}
	public function simpan()
	{
		$data = array(
			'id_device' => 1,
			'id_bidang' => htmlspecialchars($this->input->post('bidang')),
			'id_opd'	=> htmlspecialchars($this->input->post('opd')),
			'id_role' 	=> htmlspecialchars($this->input->post('role')),
			'email' => $this->input->post('email'),
			'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
			'nama_lengkap' => $this->input->post('nama'),
			'foto' => $this->_uploadfoto(),
			'aktif'	=> 0,
			'token' => password_hash(time(), PASSWORD_DEFAULT),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		);
		// print_r($data);
		// die;

		$cek = $this->db->get_where('user', ['email' => $this->input->post('email')])->row();
		if (!$cek) {
			$this->user->insert($data);
			$this->_activasi($data['email'], $data['token']);
			$this->session->set_flashdata('berhasil', 'User Berhasil Ditambah');
			redirect('user');
		} else {
			$this->session->set_flashdata('gagal', 'Email Telah Digunakan');
			redirect('user');
		}
	}
	private function _activasi($email, $token)
	{
		// PHPMailer object
		$response = false;
		$mail = new PHPMailer();


		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'diatersenyum.wiki'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = true;
		$mail->Username = 'nsia@diatersenyum.wiki'; // user email
		$mail->Password = 'Khairul25.'; // password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('nsia@diatersenyum.wiki', ''); // user email
		$mail->addReplyTo('nsia@diatersenyum.wiki', ''); //user email

		// Add a recipient
		$mail->addAddress($email); //email tujuan pengiriman email

		// Email subject
		$mail->Subject = 'Pemberitahuan'; //subject email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>Aktivasi pendaftaran Akun</h1>
                        <p>Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini</p>
						<a href=" .  base_url('user/activasi_akun') . "?t=" . $token . ">" . $token . "</a>
						";
		$mail->send();

		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			$this->session->set_flashdata('gagal', 'Notifikasi Gagal Dikirim' . $mail->ErrorInfo);
			redirect('user');
		} else {
			$this->session->set_flashdata('berhasil', 'Notifikasi Berhasil Dikirim');
			redirect('user');
		}
	}
	public function activasi_akun()
	{
		$token = $_GET['t'];
		$cek = $this->db->get_where('user', ['token' => $token, 'aktif' => 0])->row();
		if ($cek) {
			$data = array(
				'aktif' => 1,
			);
			$this->user->update($cek->id_user, $data);
			$this->session->set_flashdata('berhasil', 'Akun Berhasil Diaktivasi!');
			redirect('auth');
		} else {
			$this->session->set_flashdata('gagal', 'Token Invailed!');
			redirect('auth');
		}
	}

	public function edit($id)
	{
		$user = $this->all->getiduser($id);
		// var_dump($user);
		// die;
		$data = array(
			'kode'			=> $id,
			'id'			=> set_value('id', $user->id_user),
			'opd' 			=> $this->all->getopd(),
			'role' 			=> $this->all->getrole(),
			'bidang' 		=> $this->all->getbidang(),
			'action' 		=> site_url('user/ubah'),
			'email'         => set_value('email', $user->email),
			'nama'          => set_value('nama', $user->nama_lengkap),
			'idopd'			=> set_value('opd', $user->id_opd),
			'idbidang'		=> set_value('bidang', $user->id_bidang),
			'idrole'		=> set_value('role', $user->id_role),
			// 'foto'			=> set_value('foto', $user->foto),
		);
		// var_dump($data['idrole']);
		// die;
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('form', $data);
		$this->load->view('layout/footer');
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		if (!empty($password)) {
			$data = array(
				'id_user' => intval($id),
				'id_device' => 1,
				'id_bidang' => htmlspecialchars($this->input->post('bidang')),
				'id_opd'	=> htmlspecialchars($this->input->post('opd')),
				'id_role' 	=> htmlspecialchars($this->input->post('role')),
				'email' 	=> $this->input->post('email'),
				'password' 	=> password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
				'nama_lengkap' => $this->input->post('nama'),
				'updated_at' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(
				'id_user' => intval($id),
				'id_device' => 1,
				'id_bidang' => htmlspecialchars($this->input->post('bidang')),
				'id_opd'	=> htmlspecialchars($this->input->post('opd')),
				'id_role' 	=> htmlspecialchars($this->input->post('role')),
				'email' => $this->input->post('email'),
				'nama_lengkap' => $this->input->post('nama'),
				'updated_at' => date('Y-m-d H:i:s')
			);
		}
		// print_r($data);
		// die();
		$hasil = $this->user->update($id, $data);
		if ($hasil = true) {
			$this->session->set_flashdata('berhasil', 'User Berhasil Diubah!');
			redirect('user');
		} else {
			$this->session->set_flashdata('gagal', 'User Gagal Diubah!');
			redirect('user');
		}
	}

	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->user->delete($id);
		$this->session->set_flashdata('berhasil', 'User Berhasil Dihapus!');
		redirect('user');
	}
}
