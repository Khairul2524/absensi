<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends RestController
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
    public function index_post()
    {
        $iduser = htmlspecialchars($this->post('iduser'));
        //$jam = htmlspecialchars($this->post('jam'));
        // echo $iduser;
        // echo $jam;
        $jammasuk = time();
        $jamjadwalmasuk = strtotime("07:30:00");
        $keterangan = htmlspecialchars($this->post('ket'));
        $statusmasuk = 3;
        if ($keterangan == null) {
            if ($jammasuk > $jamjadwalmasuk) {
                $selisih = $jammasuk - $jamjadwalmasuk;
                $jam = floor($selisih / (60 * 60));
                $menit    = $selisih - $jam * (60 * 60);
                $selisihmenit = floor($menit / 60);
                $keterangan = "Anda Telat Masuk Kerja " . $jam . " Jam " . $selisihmenit . " Menit";
                $statusmasuk = 2; //telat
            } elseif ($jammasuk < $jamjadwalmasuk) {
                $selisih = $jamjadwalmasuk - $jammasuk;
                $jam = floor($selisih / (60 * 60));
                $menit    = $selisih - $jam * (60 * 60);
                $selisihmenit = floor($menit / 60);
                $keterangan = "Anda Tepat Waktu Masuk Kerja " . $jam . " Jam " . $selisihmenit . " Menit";
                $statusmasuk = 1; //tepat
            }
        }
        $data = [
            'iduser'        => $iduser,
            'jammasuk'      => $jammasuk,
            'keterangan'    => $keterangan,
            'statusmasuk'   => $statusmasuk,
            'jamkeluar'     => 1,
            'statuskeluar'  => 1,
            'lat'           => htmlspecialchars($this->post('lat')),
            'long'          => htmlspecialchars($this->post('long')),
        ];
        if ($this->all->insertabsensi($data)) {
            $this->response([
                'status' => true,
                'pesan' => 'Absensi Berhasil Di Tambah'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Absensi Gagal Di Tambah'
            ], 404);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');
        // var_dump($id);
        // die;
        $data = [
            'keterangan' => htmlspecialchars($this->put('ket'))
        ];
        if ($this->all->updateabsensi($data, $id)) {
            $this->response([
                'status' => true,
                'pesan' => 'Absensi Berhasil Di Ubah'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Absensi Gagal Di Ubah'
            ], 404);
        }
    }
}
