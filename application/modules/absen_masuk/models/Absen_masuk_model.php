<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Absen_masuk_model extends CI_Model
{
    public $tabel = 'absen_masuk';
    public $id  = 'id_absen_masuk';
    public function get()
    {
        return  $this->db->from($this->tabel)->join('user', 'user.iduser=absen_masuk.iduser')->join('jam_kerja', 'jam_kerja.id_jk=absen_masuk.id_jam_kerja')->order_by($this->id, 'DESC')->get()->result();
    }
    public function insert($data)
    {
        $this->db->insert($this->tabel, $data);
    }
    public function getid($id)
    {
        return $this->db->get_where($this->tabel, [$this->id => $id])->row();
    }
    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->tabel, $data);
    }
}
