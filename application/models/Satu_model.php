<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satu_model extends CI_Model
{

    function getNik()
    {
        // $this->db->select('*');
        // $this->db->from('data_kehadiran');
        // $this->db->join('data_pegawai', 'data_pegawai.id_pegawai = data_kehadiran.id_kehadiran');
        // $query = $this->db->get()->result_array();

        // return $query;
        $query = "SELECT `data_kehadiran`.*,`data_pegawai`.`nik`,`data_pegawai`.`nama_pegawai`,`data_pegawai`.`jenis_kelamin`,`data_pegawai`.`jabatan` FROM `data_kehadiran` JOIN `data_pegawai` ON `data_kehadiran`.`id_pegawai` = `data_pegawai`.`id_pegawai`";

        return $this->db->query($query)->result_array();
    }

    function getNama()
    {
        // return $query;
        $query = "SELECT `data_jabatan`.*,`data_pegawai`.`nama_pegawai`,`data_pegawai`.`jabatan` FROM `data_jabatan` JOIN `data_pegawai` ON `data_jabatan`.`nik` = `data_pegawai`.`nik`";

        return $this->db->query($query)->result_array();
    }

    function getGaji()
    {
        // return $query;
        // $query = "SELECT `data_jabatan`.*,`data_pegawai`.`nik`,`data_pegawai`.`nama_pegawai`,`data_pegawai`.`jenis_kelamin`,`data_pegawai`.`jabatan` FROM `data_jabatan` JOIN `data_pegawai` ON `data_jabatan`.`nik` = `data_pegawai`.`nik`";

        // $query = "SELECT `data_kehadiran`.*,`data_pegawai`.`nik`,`data_pegawai`.`nama_pegawai`,`data_pegawai`.`jenis_kelamin`,`data_pegawai`.`jabatan`,`data_jabatan`,* FROM `data_kehadiran` JOIN `data_pegawai` ON `data_kehadiran`.`id_pegawai` = `data_pegawai`.`id_pegawai` JOIN data_jabatan ON `data_pegawai`.`nik` = `data_jabatan`.`nik`";

        $query = "SELECT `data_jabatan`.*,`data_pegawai`.`nik`,`data_pegawai`.`nama_pegawai`,`data_pegawai`.`jenis_kelamin`,`data_pegawai`.`jabatan`,`data_kehadiran`.* FROM `data_jabatan` JOIN `data_pegawai` ON `data_jabatan`.`nik` = `data_pegawai`.`nik` INNER JOIN `data_kehadiran` ON `data_pegawai`.`id_pegawai` = `data_kehadiran`.`id_pegawai`";

        // $query = "SELECT `data_jabatan`.*,`data_pegawai`.`nik`,`data_pegawai`.`nama_pegawai`,`data_pegawai`.`jenis_kelamin`,`data_pegawai`.`jabatan`,`potongan_gaji`.*,`data_kehadiran`.* FROM `data_jabatan` JOIN `data_pegawai` ON `data_jabatan`.`nik` = `data_jabatan`.`nik` LEFT JOIN `potongan_gaji` ON `data_pegawai`.`nik` = `potongan_gaji`.`id` LEFT JOIN `data_kehadiran` ON `potongan_gaji`.`id_kehadiran` = `data_kehadiran`.`id_kehadiran`";

        return $this->db->query($query)->result_array();
    }

    function hitungJumlahAsset()
    {
        $this->db->select_sum('alpha');
        $query = $this->db->get('data_kehadiran');
        if ($query->num_rows() > 0) {
            return $query->row()->alpha;
        } else {
            return 0;
        }
    }

    function hitungJumlahInventori()
    {
        $this->db->select_sum('jml_potongan');
        $query = $this->db->get('potongan_gaji');
        if ($query->num_rows() > 0) {
            return $query->row()->jml_potongan;
        } else {
            return 0;
        }
    }

    function alpha()
    {
        $query = $this->db->get('data_kehadiran');
        return $query->result_array();
    }

    function potongan()
    {
        $query = $this->db->get('potongan_gaji');
        return $query->result_array();
    }
}
