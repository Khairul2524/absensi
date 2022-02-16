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
    // Awal Query User
    public function getuser()
    {
        return $this->db->from('user')->join('opd', 'opd.idopd=user.idopd')->get()->result();
    }
    public function getiduser($id)
    {
        return $this->db->from('user')->join('opd', 'opd.idopd=user.idopd')->where(['iduser' => $id])->get()->row();
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
        $this->db->update('user', $data, ['iduser' => $id]);
        return $this->db->affected_rows();
    }
    public function deleteuser($id)
    {
        $this->db->delete('user', ['iduser' => $id]);
        return $this->db->affected_rows();
    }
    // Akhir Query User

    public function get_all_absen_masuk()
    {
        return $this->db->from('absen_masuk')->join('user', 'user.iduser=absen_masuk.iduser')->join('jam_kerja', 'jam_kerja.id_jk=absen_masuk.id_jam_kerja')->get()->result();
    }
    public function get_all_absen()
    {
        return $this->db->from('user')->join('absen_masuk', 'absen_masuk.iduser=user.iduser')->join('absen_pulang', 'absen_pulang.id_user=user.iduser')->group_by('namalengkap')->get()->result();
    }
    // Query Absensi 
    public function get_all_absen_id_user($id)
    {
        return $this->db->from('absen_pulang')->join('user', 'user.iduser=absen_pulang.id_user')->where(['id_user' => $id])->get()->result();
    }
}
