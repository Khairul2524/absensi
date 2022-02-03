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
    public function index_put()
    {
        $id = $this->put('id');
        // var_dump($id);
        // die;
        $data = [
            'role' => htmlspecialchars($this->put('role'))
        ];
        if ($this->all->updaterole($data, $id)) {
            $this->response([
                'status' => true,
                'pesan' => 'Role Berhasil Di Ubah'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Role Gagal Di Ubah'
            ], 404);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'pesan' => 'Id Role Tidak ada'
            ], 404);
        } else {
            if ($this->all->deleterole($id)) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'pesan' => 'Role Berhasil Di Hapus'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'pesan' => 'id Role Tidak di Temukan'
                ], 404);
            }
        }
    }
}
