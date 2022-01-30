<?php
defined('BASEPATH') or exit('No direct script access allowed');
class All_model extends CI_Model
{

    public function getopd()
    {
        return $this->db->get('opd')->result();
    }
    public function getrole()
    {
        return $this->db->get('role')->result();
    }
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
