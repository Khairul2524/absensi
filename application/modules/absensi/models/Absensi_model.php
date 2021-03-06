<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Absensi_model extends CI_Model
{
    public $tabel = 'absensi';
    public $id  = 'id_absensi';
    public function get()
    {
        return  $this->db->from($this->tabel)->order_by($this->id, 'DESC')->get()->result();
    }
    public function getall()
    {
        return  $this->db->from($this->tabel)->join('user', 'user.iduser=absensi.id_user')->order_by($this->id, 'DESC')->get()->result();
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
