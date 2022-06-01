<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bagian_model extends CI_Model
{
    public $tabel = 'bagian';
    public $id  = 'id_bagian';
    public function get($opd = null)
    {
        if ($opd) {
            return  $this->db->from($this->tabel)->join('opd', 'opd.idopd=bagian.id_opd')->where('id_opd', $opd)->get()->result();
        } else {
            return  $this->db->from($this->tabel)->join('opd', 'opd.idopd=bagian.id_opd')->get()->result();
        }
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
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->tabel);
    }
}
