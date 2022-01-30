<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Opd extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		$this->load->model('opd_model', 'opd');
		// $this->load->model('All_model', 'all');
	}

	public function index()
	{
		$id = $this->session->userdata('idopd');
		$data = array(
			'judul' => 'Organisasi Perangkat Daerah',
			'data' => $this->opd->get(),
			// 'opd' => $this->all->getidopd($id)
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
		$opd = htmlspecialchars($this->input->post('opd'));

		$cek = $this->db->get_where('opd', ['opd' => htmlspecialchars($this->input->post('opd'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './assets/'; //string, the default is application/cache/
			$config['errorlog']     = './assets/'; //string, the default is application/logs/
			$config['imagedir']     = './assets/backand/img/qrcode/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $opd . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $opd . ' Qithmir25'; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$data = array(
				'opd' => $opd,
				'qr_code' => $image_name
			);
			$this->opd->insert($data);
			$this->session->set_flashdata('berhasil', 'opd Berhasil Ditambah!');
			redirect('opd');
		} else {
			$this->session->set_flashdata('gagal', 'opd Gagal Ditambah!');
			redirect('opd');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->opd->getid($id));
	}
	public function ubah()
	{
		$opd = htmlspecialchars($this->input->post('opd'));

		$cek = $this->db->get_where('opd', ['idopd' =>  htmlspecialchars($this->input->post('id'))])->row();
		// var_dump($cek);
		// die;
		unlink("./assets/backand/img/qrcode/" . $cek->qr_code);
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']     = './assets/'; //string, the default is application/cache/
		$config['errorlog']     = './assets/'; //string, the default is application/logs/
		$config['imagedir']     = './assets/backand/img/qrcode/'; //direktori penyimpanan qr code
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
		$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name = $opd . '.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $opd . 'Qithmir25'; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		$data = array(
			'idopd' => htmlspecialchars($this->input->post('id')),
			'opd' => $opd,
			'qr_code' => $image_name
		);
		$this->opd->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'opd Berhasil Diubah!');
		redirect('opd');
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$data = $this->db->get_where('opd', ['idopd' => $id])->row();

		unlink("./assets/backand/img/qrcode/" . $data->qr_code);

		$this->opd->delete($id);
		$this->session->set_flashdata('berhasil', 'opd Berhasil Dihapus!');
		redirect('opd');
	}
	public function hakakses()
	{
		$id = $this->session->userdata('idodp');
		$data = array(
			'judul' => 'Hak Akses User',
			'data' => $this->odp->get(),
			'odp' => $this->all->getidodp($id)
		);
		$this->load->view('template/header');
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('hakakses', $data);
		$this->load->view('template/footer');
	}
	public function aksesmenu($id)
	{
		$idr = $this->session->userdata('idodp');
		$data = array(
			'judul' => 'Hak Akses User',
			'idodp' => $this->all->getidodp($id),
			'odp' => $this->all->getidodp($idr),
			'menu' => $this->all->getmenu(),
		);
		$this->load->view('template/header');
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('aksesmenu', $data);
		$this->load->view('template/footer');
	}
	public function insertakses()
	{
		$data = array(
			'idmenu' => $this->input->post('menuid'),
			'idodp' => $this->input->post('odpid'),
		);
		$cek = $this->db->get_where('aksesmenu', $data)->row();
		if ($cek) {
			$this->all->deleteakses($cek->id);
		} else {
			$this->all->inserthakakses($data);
		}
	}
}
