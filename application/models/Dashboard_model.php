<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model 
{
    // function read berfungsi mengambil/read data dari table denda di database

    public function anggota()
    {
        // sql read
        $this->db->select('COUNT(Id_Anggota) as total');
        $this->db->from('anggota');
        $query = $this->db->get();

        // $query -> result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
    }

    public function perpusbuku()
    {
        // sql read
        $this->db->select('COUNT(Kd_Buku) as total_judul');
        $this->db->from('buku');
        $query = $this->db->get();

        // $query -> result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
    }

    public function perpustakaan()
    {
        // sql read
        $this->db->select('SUM(Stok) as total');
        $this->db->from('buku');
        $query = $this->db->get();

        // $query -> result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
    }

    public function peminjaman()
    {
        // sql read
        $this->db->select('COUNT(Kd_Peminjam) as total');
        $this->db->from('data_peminjam');
        $query = $this->db->get();

        // $query -> result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
    }

}