<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Api_user extends RestController
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
            $user = $this->all->getuser();
        } else {
            $user = $this->all->getiduser($id);
        }
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
    public function index_post()
    {
        $data = [
            'role' => htmlspecialchars($this->post('role'))
        ];
        if ($this->all->insertrole($data)) {
            $this->response([
                'status' => true,
                'pesan' => 'Role Berhasil Di Tambah'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Role Gagal Di Tambah'
            ], 404);
        }
    }
}
