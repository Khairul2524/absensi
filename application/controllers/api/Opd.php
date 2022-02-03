<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends RestController
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
    public function index_post()
    {
        $opd = htmlspecialchars($this->post('opd'));
        $this->load->library('ciqrcode');
        $config['cacheable']    = true;
        $config['cachedir']     = './assets/';
        $config['errorlog']     = './assets/';
        $config['imagedir']     = './assets/backand/img/qrcode/';
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(224, 255, 255);
        $config['white']        = array(70, 130, 180);
        $this->ciqrcode->initialize($config);

        $image_name = $opd . '.png';

        $params['data'] = $opd;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
        $this->ciqrcode->generate($params);
        $data = [
            'opd' => $opd,
            'qr_code' => $image_name,
        ];
        // var_dump($data);
        // die;
        if ($this->all->insertopd($data)) {
            $this->response([
                'status' => true,
                'pesan' => 'Opd Berhasil Di Tambah'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Opd Gagal Di Tambah'
            ], 404);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');
        $opd = $this->put('opd');
        // var_dump($opd);
        // die;

        $cek = $this->all->getidopd($id);
        // var_dump($cek);
        // die;
        unlink("./assets/backand/img/qrcode/" . $cek[0]->qr_code);
        if ($cek) {
            $this->load->library('ciqrcode');
            $config['cacheable']    = true;
            $config['cachedir']     = './assets/';
            $config['errorlog']     = './assets/';
            $config['imagedir']     = './assets/backand/img/qrcode/';
            $config['quality']      = true;
            $config['size']         = '1024';
            $config['black']        = array(224, 255, 255);
            $config['white']        = array(70, 130, 180);
            $this->ciqrcode->initialize($config);

            $image_name = $opd . '.png';

            $params['data'] = $opd;
            $params['level'] = 'H';
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
            $data = array(
                'opd' => $opd,
                'qr_code' => $image_name
            );

            if ($this->all->updateopd($data, $id)) {
                $this->response([
                    'status' => true,
                    'pesan' => 'OPD Berhasil Di Ubah'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'pesan' => 'OPD Gagal Di Ubah'
                ], 404);
            }
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
            $data = $this->all->getidopd($id);
            // var_dump($data);
            // die;
            unlink("./assets/backand/img/qrcode/" . $data[0]->qr_code);
            if ($this->all->deleteopd($id)) {

                $this->response([
                    'status' => true,
                    'id' => $id,
                    'pesan' => 'OPD Berhasil Di Hapus'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'pesan' => 'id OPD Tidak di Temukan'
                ], 404);
            }
        }
    }
}
