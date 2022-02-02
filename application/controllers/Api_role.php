<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Api_role extends RestController
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
            $role = $this->all->getrole();
        } else {
            $role = $this->all->getidrole($id);
        }
        if ($role) {
            $this->response([
                'status' => true,
                'data' => $role
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Role tidak di temukan'
            ], 404);
        }
    }
}
