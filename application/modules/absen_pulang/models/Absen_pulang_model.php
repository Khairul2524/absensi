<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Absen_pulang_model extends CI_Model
{
    public $tabel = 'absen_pulang';
    public $id  = 'id_absen_pulang';
    public function get()
    {
        return  $this->db->from($this->tabel)->join('user', 'user.iduser=absen_pulang.id_user')->join('jam_kerja', 'jam_kerja.id_jk=absen_pulang.id_jam_kerja')->order_by($this->id, 'DESC')->get()->result();
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
