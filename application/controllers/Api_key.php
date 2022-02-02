<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Api_key extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('All_model', 'all');
    }
    public function index_get()
    {
        $user = $this->all->getuser();

        if ($user) {
            $this->response([
                'status' => true,
                'data' => $user
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'User tidak di temukan'
            ], 404);
        }
    }
}
