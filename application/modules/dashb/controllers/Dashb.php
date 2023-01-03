<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashb extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'judul' => 'Dashboard',

		);
		if ($this->session->userdata('role') == 1) {
			$this->load->view('template/header');
			// $this->load->view('template/navbar', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('dashboard1');
			$this->load->view('template/footer');
		} elseif ($this->session->userdata('role') == 2) {
			$this->load->view('template/header');
			// $this->load->view('template/navbar', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('dashboard2');
			$this->load->view('template/footer');
		} elseif ($this->session->userdata('role') == 3) {
			$this->load->view('template/header');
			// $this->load->view('template/navbar', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('dashboard3');
			$this->load->view('template/footer');
		} else {
			$this->load->view('template/header');
			// $this->load->view('template/navbar', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('dashboard4');
			$this->load->view('template/footer');
		}
	}
	public function start()
	{
		$this->load->view('start');
	}
}
