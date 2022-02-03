<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class User extends RestController
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
            'email' => htmlspecialchars($this->post('email')),
            'namalengkap' => htmlspecialchars($this->post('nama')),
            'password' => password_hash(htmlspecialchars($this->post('password')), PASSWORD_DEFAULT),
            'nik' => htmlspecialchars($this->post('nik')),
            'nip' => htmlspecialchars($this->post('nip')),
            'no' => htmlspecialchars($this->post('no')),
            'idopd' => htmlspecialchars($this->post('idopd')),
            'statustenaga' => htmlspecialchars($this->post('statustenaga')),
            'aktif' => htmlspecialchars($this->post('aktif')),
            'idrole' => htmlspecialchars($this->post('idrole')),
            'created_at' => time(),
        ];
        // print_r($data);
        // die;
        if ($this->all->insertuser($data)) {
            $this->response([
                'status' => true,
                'pesan' => 'User Berhasil Di Tambah'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'User Gagal Di Tambah'
            ], 404);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');
        // var_dump($id);
        // die;
        $data = [
            'email' => htmlspecialchars($this->put('email')),
            'namalengkap' => htmlspecialchars($this->put('nama')),
            'password' => password_hash(htmlspecialchars($this->put('password')), PASSWORD_DEFAULT),
            'nik' => htmlspecialchars($this->put('nik')),
            'nip' => htmlspecialchars($this->put('nip')),
            'no' => htmlspecialchars($this->put('no')),
            'idopd' => htmlspecialchars($this->put('idopd')),
            'statustenaga' => htmlspecialchars($this->put('statustenaga')),
            'aktif' => htmlspecialchars($this->put('aktif')),
            'idrole' => htmlspecialchars($this->put('idrole')),
            'created_at' => time(),
        ];
        // print_r($data);
        // die;
        if ($this->all->updateuser($data, $id)) {
            $this->response([
                'status' => true,
                'pesan' => 'User Berhasil Di Ubah'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'User Gagal Di Ubah'
            ], 404);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'pesan' => 'Id User Tidak ada'
            ], 404);
        } else {
            if ($this->all->deleteuser($id)) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'pesan' => 'User Berhasil Di Hapus'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'pesan' => 'id User Tidak di Temukan'
                ], 404);
            }
        }
    }
}
