<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Api_opd extends RestController
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
            $opd = $this->all->getopd();
        } else {
            $opd = $this->all->getidopd($id);
        }
        if ($opd) {
            $this->response([
                'status' => true,
                'data' => $opd
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'OPD tidak di temukan'
            ], 404);
        }
    }
    public function users_get()
    {
    }
}
