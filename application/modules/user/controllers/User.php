<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') == 4 || $this->session->userdata('role') == 3) {
			redirect('auth');
		}
		$this->load->model('All_model', 'all');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data = array(
			'judul' => 'User',
			'user' => $this->all->getuser(),
		);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
	public function tambah()
	{
		$data = array(
			'kode'			=> 1,
			'action' 		=> site_url('user/simpan'),
			'opd' 			=> $this->all->getopd(),
			'role' 			=> $this->all->getrole(),
			'email'         => set_value('email'),
			'nama'          => set_value('nama'),
			'password'      => set_value('password'),
			'nik'           => set_value('nik'),
			'nip'           => set_value('nip'),
			'no'            => set_value('no'),
			'idopd'         => set_value('idopd'),
			'id_bagian'     => set_value('bagian'),
			'statustenaga'  => set_value('statustenaga'),
			'foto'  => set_value('foto'),
		);
		// var_dump($data['role']);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('form', $data);
		$this->load->view('template/footer');
	}
	public function get_bagian()
	{
		$id = $_POST['opd_id'];
		echo json_encode($this->all->getidbagian($id));
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
			'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
			'namalengkap' => $this->input->post('nama'),
			'nik'	=> htmlspecialchars($this->input->post('nik')),
			'nip'	=> htmlspecialchars($this->input->post('nip')),
			'no'	=> htmlspecialchars($this->input->post('no')),
			'idopd'	=> htmlspecialchars($this->input->post('opd')),
			'id_bagian'	=> htmlspecialchars($this->input->post('bagian')),
			'statustenaga'	=> htmlspecialchars($this->input->post('st')),
			'aktif'	=> 1,
			'idrole' => htmlspecialchars($this->input->post('role')),
			'foto' => $foto,
			'created_at' => time()
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('user', ['email' => $this->input->post('email')])->row();
		if (!$cek) {
			$this->user->insert($data);
			$this->session->set_flashdata('berhasil', 'User Berhasil Ditambah');
			redirect('user');
		}
	}

	public function edit($id)
	{
		$user = $this->all->getiduser($id);
		// var_dump($user);
		// die;
		$data = array(
			'id'			=> $id,
			'kode'			=> 0,
			'opd' 			=> $this->all->getopd(),
			'role' 			=> $this->all->getrole(),
			'action' 		=> site_url('user/ubah'),
			'email'         => set_value('email', $user->email),
			'nama'          => set_value('nama', $user->namalengkap),
			'nik'           => set_value('nik', $user->nik),
			'nip'           => set_value('nip', $user->nip),
			'no'  			=> set_value('no', $user->no),
			'idopd'			=> set_value('idopd', $user->idopd),
			'bagian'		=> set_value('idopd', $user->id_bagian),
			'statustenaga'	=> set_value('statustenaga', $user->statustenaga),
			'foto'	=> set_value('foto', $user->foto),
		);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('form', $data);
		$this->load->view('template/footer');
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->user->getid($id));
	}
	public function ubah()
	{
		$id = $this->input->post('id');
		$data = array(
			'iduser' => $id,
			'email' => $this->input->post('email'),
			'namalengkap' => $this->input->post('nama'),
			'nik'	=> htmlspecialchars($this->input->post('nik')),
			'nip'	=> htmlspecialchars($this->input->post('nip')),
			'no'	=> htmlspecialchars($this->input->post('no')),
			'idopd'	=> htmlspecialchars($this->input->post('opd')),
			'statustenaga'	=> htmlspecialchars($this->input->post('st')),
			'aktif'	=> 1,
			'idrole' => 4,
			'created_at' => time()
		);
		// print_r($data);
		// die;
		$this->user->update($id, $data);
		redirect('user');
	}
	public function ubah_password()
	{
		$id = $this->input->post('id');
		$data = array(
			'iduser' => $id,
			'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
		);
		// print_r($data);
		// die;
		$this->user->update($id, $data);
		$this->session->set_flashdata('berhasil', 'Password Berhasil Diubah!');
		redirect('user');
	}
	public function profile($id)
	{
		$data = array(
			'user' => $this->all->getiduser($id),
		);
		// var_dump($data['user']);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('profile', $data);
		$this->load->view('template/footer');
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
