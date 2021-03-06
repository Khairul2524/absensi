<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Opd extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') == 4 || $this->session->userdata('role') == 3 || $this->session->userdata('role') == 2) {
			redirect('auth');
		} else {
			if (!$this->session->userdata('role')) {
				redirect('auth');
			}
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
		// $this->load->view('template/topbar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$opd = htmlspecialchars($this->input->post('opd'));
		// $opdhash = password_hash($opd, PASSWORD_DEFAULT);

		$cek = $this->db->get_where('opd', ['opd' => htmlspecialchars($this->input->post('opd'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$data = array(
				'opd' => $opd,
				'lat' => $this->input->post('lat'),
				'longt' => $this->input->post('long'),
				'qr_code' => $opd . '.png'
			);
			$this->db->insert('opd', $data);
			$id = $this->db->insert_id();
			// var_dump($id);
			// die;
			$this->load->library('ciqrcode');
			$config['cacheable']    = true;
			$config['cachedir']     = './assets/';
			$config['errorlog']     = './assets/';
			$config['imagedir']     = './assets/backand/img/qrcode/';
			$config['quality']      = true;
			$config['size']         = '1024';
			$config['black']        = array(224, 255, 255);
			$config['white']        = array(70, 130, 180);
			$this->ciqrcode->initialize($config);

			$image_name = $opd . '.png';

			$params['data'] = $id;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name;
			$this->ciqrcode->generate($params);
			$this->session->set_flashdata('berhasil', 'OPD Berhasil Ditambah!');
			redirect('opd');
		} else {
			$this->session->set_flashdata('gagal', 'OPD Gagal Ditambah!');
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
		$this->load->library('ciqrcode');
		$config['cacheable']    = true;
		$config['cachedir']     = './assets/';
		$config['errorlog']     = './assets/';
		$config['imagedir']     = './assets/backand/img/qrcode/';
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(224, 255, 255);
		$config['white']        = array(70, 130, 180);
		$this->ciqrcode->initialize($config);

		$image_name = $opd . '.png';

		$params['data'] = htmlspecialchars($this->input->post('id'));
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name;
		$this->ciqrcode->generate($params);
		$data = array(
			'idopd' => htmlspecialchars($this->input->post('id')),
			'opd' => $opd,
			'lat' => $this->input->post('lat'),
			'longt' => $this->input->post('long'),
			'qr_code' => $image_name
		);
		// print_r($data);
		// var_dump($data);
		// die;
		$this->opd->update(htmlspecialchars($this->input->post('id')), $data);
		$this->session->set_flashdata('berhasil', 'OPD Berhasil Diubah!');
		redirect('opd');
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$data = $this->db->get_where('opd', ['idopd' => $id])->row();

		unlink("./assets/backand/img/qrcode/" . $data->qr_code);

		$this->opd->delete($id);
		$this->session->set_flashdata('berhasil', 'OPD Berhasil Dihapus!');
		redirect('opd');
	}
}
