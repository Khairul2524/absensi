<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') == 4) {
			redirect('auth');
		}
		$this->load->model('All_model', 'all');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		if ($this->session->userdata('role') == 1) {
			$data = array(
				'judul' => 'User',
				'user' => $this->all->getuser(),
			);
		} elseif ($this->session->userdata('role') == 2) {
			$opd_id = $this->session->userdata('opd');
			$data = array(
				'judul' => 'User',
				'user' => $this->all->getuser($opd_id),
			);
		} elseif ($this->session->userdata('role') == 3) {
			$opd_id = $this->session->userdata('opd');
			$bagian_id = $this->session->userdata('idbagian');
			$data = array(
				'judul' => 'User',
				'user' => $this->all->getuser($opd_id, $bagian_id),
			);
		}
		// var_dump($data['user']);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('index', $data);
		$this->load->view('viho/footer');
	}
	public function tambah()
	{
		$data = array(

			'action' 		=> site_url('user/simpan'),
			'opd' 			=> $this->all->getopd(),
			'role' 			=> $this->all->getrole(),
			'id'			=> set_value('id'),
			'email'         => set_value('email'),
			'nama'          => set_value('nama'),
			'password'      => set_value('password'),
			'nik'           => set_value('nik'),
			'nip'           => set_value('nip'),
			'no'            => set_value('no'),
			'idopd'         => set_value('idopd'),
			'idrole'         => set_value('idrole'),
			'bagian'     => set_value('bagian'),
			'statustenaga'  => set_value('statustenaga'),
			'foto'  => set_value('foto'),
		);
		// var_dump($data['idopd']);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('form_tambah', $data);
		$this->load->view('template/footer');
	}
	public function get_bagian()
	{
		$id = $_POST['opd_id'];
		echo json_encode($this->all->getidbagian($id));
	}
	public function get_id_bagian()
	{
		$id = $_POST['bagian_id'];
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
				$config['source_image']   = './assets/backand/img/profile/' . $foto . '';

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
			'id'			=> set_value('id', $id),
			'opd' 			=> $this->all->getopd(),
			'role' 			=> $this->all->getrole(),
			'action' 		=> site_url('user/ubah'),
			'email'         => set_value('email', $user->email),
			'nama'          => set_value('nama', $user->namalengkap),
			'nik'           => set_value('nik', $user->nik),
			'nip'           => set_value('nip', $user->nip),
			'no'  			=> set_value('no', $user->no),
			'idopd'			=> set_value('idopd', $user->idopd),
			'bagian'		=> set_value('idbagian', $user->id_bagian),
			'idrole'		=> set_value('idrole', $user->idrole),
			'statustenaga'	=> set_value('statustenaga', $user->statustenaga),
			'foto'	=> set_value('foto', $user->foto),
		);
		// var_dump($data['idrole']);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('form', $data);
		$this->load->view('template/footer');
	}
	public function edit_profile()
	{
		$foto = $_FILES['foto'];
		// var_dump($foto);
		// die;
		if ($foto) {
			$config['upload_path']      = './assets/backand/img/profile/';
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
				$config['source_image']   = './assets/backand/img/profile/' . $foto . '';

				// rasio resolusi
				$config['maintain_ratio'] = FALSE;
				// lebar
				$config['width']          = 300;
				// tinggi
				$config['height']         = 300;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}
			$id = $this->input->post('id');
			$foto_lama = $this->input->post('foto_lama');
			unlink("./assets/backand/img/profile/$foto_lama");
			$data = array(
				'iduser' => $id,
				'foto' => $foto,
			);
			// print_r($data);
			// die;
			$this->user->update($id, $data);
			$this->session->set_flashdata('berhasil', 'Foto Berhasil Diubah!');
			redirect('user/edit/' . $id);
		}
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
			'iduser' => intval($id),
			'email' => $this->input->post('email'),
			'namalengkap' => $this->input->post('nama'),
			'nik'	=> htmlspecialchars($this->input->post('nik')),
			'nip'	=> htmlspecialchars($this->input->post('nip')),
			'no'	=> htmlspecialchars($this->input->post('no')),
			'idopd'	=> htmlspecialchars($this->input->post('opd')),
			'statustenaga'	=> htmlspecialchars($this->input->post('st')),
			'aktif'	=> 1,
			'idrole' => htmlspecialchars($this->input->post('role')),
			'created_at' => time()
		);
		// var_dump($data);
		// die;

		$this->user->update($id, $data);
		$this->session->set_flashdata('berhasil', 'Foto Berhasil Diubah!');
		redirect('user/edit/' . $id);
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
		redirect('user/edit/' . $id);
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
