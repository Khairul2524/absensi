<?php
defined('BASEPATH') or exit('No direct script access allowed');
class All_model extends CI_Model
{
    // Awal Query Absensi
    public function getabsensi()
    {
        return $this->db->get('absen')->result();
    }
    public function getidabsensi($id)
    {
        return $this->db->get_where('absen', ['id_absen' => $id])->result();
    }
    public function insertabsensi($data)
    {
        $this->db->insert('absen', $data);
        return $this->db->affected_rows();
    }
    public function updateabsensi($data, $id)
    {
        $this->db->update('absen', $data, ['id_absen' => $id]);
        return $this->db->affected_rows();
    }
    // Akhir Query Absensi
    // Awal Query OPD
    public function getopd($opd = null)
    {
        if ($opd) {
            return $this->db->where('idopd', $opd)->get('opd')->result();
        } else {
            return $this->db->get('opd')->result();
        }
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
        $this->db->update('opd', $data, ['id_opd' => $id]);
        return $this->db->affected_rows();
    }
    public function deleteopd($id)
    {
        $this->db->delete('opd', ['id_opd' => $id]);
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
    // Awal Query User
    public function getuser($opd_id = null, $bagian_id = null)
    {
        if ($opd_id) {
            if ($bagian_id) {
                return $this->db->from('user')->join('opd', 'opd.idopd=user.idopd')->join('bagian', 'bagian.id_bagian=user.id_bagian')->join('role', 'role.idrole=user.idrole')->order_by('role.idrole', 'ASC')->where('user.id_bagian', $bagian_id)->get()->result();
            } else {
                return $this->db->from('user')->join('opd', 'opd.idopd=user.idopd')->join('bagian', 'bagian.id_bagian=user.id_bagian')->join('role', 'role.idrole=user.idrole')->order_by('role.idrole', 'ASC')->where('id_opd', $opd_id)->get()->result();
            }
        } else {
            return $this->db->from('user')->join('opd', 'opd.idopd=user.idopd')->join('bagian', 'bagian.id_bagian=user.id_bagian')->join('role', 'role.idrole=user.idrole')->order_by('role.idrole', 'ASC')->get()->result();
        }
    }
    public function getiduser($id)
    {
        return $this->db->from('user')->join('opd', 'opd.id_opd=user.id_opd')->join('bidang', 'bidang.id_bidang=user.id_bidang')->join('role', 'role.id_role=user.id_role')->where(['id_user' => $id])->get()->row();
    }
    public function getemailuser($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row();
    }
    public function insertuser($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
    public function updateuser($data, $id)
    {
        $this->db->update('user', $data, ['id_user' => $id]);
        return $this->db->affected_rows();
    }
    public function deleteuser($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
        return $this->db->affected_rows();
    }
    // Akhir Query User

    public function get_all_absen_masuk()
    {
        return $this->db->from('absen_masuk')->join('user', 'user.iduser=absen_masuk.iduser')->join('jam_kerja', 'jam_kerja.id_jk=absen_masuk.id_jam_kerja')->get()->result();
    }
    // query Bidang
    public function getbidang()
    {
        return $this->db->get('bidang')->result();
    }
    public function getidbidang($id)
    {
        return $this->db->get_where('bidang', ['id_opd' => $id])->result();
    }
    // query absen
    public function getabsenuser($id)
    {
        return $this->db->get_where('absensi', ['id_user' => $id])->result();
    }
}
