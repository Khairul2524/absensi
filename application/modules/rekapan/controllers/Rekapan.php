<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekapan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model', 'all');
	}

	public function index()
	{
		$data = array(
			'data' => $this->all->getuser()
		);
		// var_dump($data['data']);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
	public function detail($id)
	{
		$data = array(
			'user' => $this->all->getiduser($id),
			'absen' => $this->all->getabsenuser($id)
		);
		// var_dump($data['data']);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('rekapan', $data);
		$this->load->view('template/footer');
	}
}
