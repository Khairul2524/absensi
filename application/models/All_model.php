<?php
defined('BASEPATH') or exit('No direct script access allowed');
class All_model extends CI_Model
{
    // Awal Query Absensi
    public function getabsensi()
    {
        return $this->db->get('absensi')->result();
    }
    public function getidabsensi($id)
    {
        return $this->db->get_where('absensi', ['idabsensi' => $id])->result();
    }
    public function insertabsensi($data)
    {
        $this->db->insert('absensi', $data);
        return $this->db->affected_rows();
    }
    public function updateabsensi($data, $id)
    {
        $this->db->update('absensi', $data, ['idabsensi' => $id]);
        return $this->db->affected_rows();
    }
    // Akhir Query Absensi
    // Awal Query OPD
    public function getopd()
    {
        return $this->db->get('opd')->result();
    }
    public function getidopd($id)
    {
        return $this->db->get_where('opd', ['idopd' => $id])->result();
    }
    public function insertopd($data)
    {
        $this->db->insert('opd', $data);
        return $this->db->affected_rows();
    }
    public function updateopd($data, $id)
    {
        $this->db->update('opd', $data, ['idopd' => $id]);
        return $this->db->affected_rows();
    }
    public function deleteopd($id)
    {
        $this->db->delete('opd', ['idopd' => $id]);
        return $this->db->affected_rows();
    }
    // Akhir Query OPD
    // Awal Query Tabel Role
    public function getrole()
    {
        return $this->db->get('role')->result();
    }
    public function getidrole($id)
    {
        return $this->db->get_where('role', ['idrole' => $id])->result();
    }
    public function insertrole($data)
    {
        $this->db->insert('role', $data);
        return $this->db->affected_rows();
    }
    public function updaterole($data, $id)
    {
        $this->db->update('role', $data, ['idrole' => $id]);
        return $this->db->affected_rows();
    }
    public function deleterole($id)
    {
        $this->db->delete('role', ['idrole' => $id]);
        return $this->db->affected_rows();
    }
    // Akhir Query Role
    public function getuser()
    {
        return $this->db->from('user')->join('opd', 'opd.idopd=user.idopd')->get()->result();
    }
    public function getiduser($id)
    {
        return $this->db->from('user')->join('opd', 'opd.idopd=user.idopd')->where(['iduser' => $id])->get()->row();
    }

    public function tepatwaktu()
    {
        $opd = $this->session->userdata('opd');
        $this->db->select('statusmasuk,  idopd, COUNT(statusmasuk) as totalst');
        $this->db->join('user', 'user.iduser=absensi.iduser');
        $this->db->group_by('statusmasuk');
        $this->db->order_by('totalst');
        $this->db->where(['statusmasuk' => 1]);
        $this->db->where(['idopd' => $opd]);
        $hasil = $this->db->get('absensi')->result();
        return $hasil;
    }
    public function tidaktepatwaktu()
    {
        $opd = $this->session->userdata('opd');
        $this->db->select('statusmasuk,  idopd, COUNT(statusmasuk) as totalst');
        $this->db->join('user', 'user.iduser=absensi.iduser');
        $this->db->group_by('statusmasuk');
        $this->db->order_by('totalst');
        $this->db->where(['statusmasuk' => 2]);
        $this->db->where(['idopd' => $opd]);
        $hasil = $this->db->get('absensi')->result();
        return $hasil;
    }
    public function izin()
    {
        $opd = $this->session->userdata('opd');
        $this->db->select('statusmasuk,  idopd, COUNT(statusmasuk) as totalst');
        $this->db->join('user', 'user.iduser=absensi.iduser');
        $this->db->group_by('statusmasuk');
        $this->db->order_by('totalst');
        $this->db->where(['statusmasuk' => 3]);
        $this->db->where(['idopd' => $opd]);
        $hasil = $this->db->get('absensi')->result();
        return $hasil;
    }
}
