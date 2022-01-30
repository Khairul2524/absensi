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
}
