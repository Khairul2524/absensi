<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Api_absensi extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('All_model', 'all');
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $absen = $this->all->getabsensi();
        } else {
            $absen = $this->all->getidabsensi($id);
        }
        if ($absen) {
            $this->response([
                'status' => true,
                'data' => $absen
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Data tidak di temukan'
            ], 404);
        }
    }
}
