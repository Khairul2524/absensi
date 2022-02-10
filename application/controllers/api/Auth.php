<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('All_model', 'all');
    }
    public function index_get()
    {
        $email = $this->get('email');
        $pass = $this->get('password');
        $user = $this->all->getemailuser($email);
        // var_dump($user);
        // die;
        if ($email === null) {
            $this->response([
                'status' => false,
                'pesan' => 'Email Anda Kosong'
            ], 404);
        } else {
            if ($pass === null) {
                $this->response([
                    'status' => false,
                    'pesan' => 'Password Anda Kosong'
                ], 404);
            } else {
                if ($user) {
                    if (password_verify($pass, $user->password)) {
                        $data = array(
                            'namalengkap' => $user->namalengkap,
                            'email'       => $user->email,
                            'role'        => $user->idrole,
                            'opd'         => $user->idopd
                        );
                        // var_dump($data);
                        // die;
                        $this->session->set_userdata($data);
                        // redirect('dashboard/dash');  
                        // echo "login berhasil";
                    } else {
                        $this->response([
                            'status' => false,
                            'pesan' => 'Password Anda Salah'
                        ], 404);
                    }
                } else {
                    $this->response([
                        'status' => false,
                        'pesan' => 'Email Tidak Terdaftar'
                    ], 404);
                }
            }
        }
    }
}
