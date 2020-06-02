<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('dashboard_model','perpustakaan_model','peminjaman_model','anggota_model'));
    }

    public function index() {
        $this->read();
    }

    public function read()
    {
        $data_anggota = $this->dashboard_model->anggota();
        $data_judul = $this->dashboard_model->perpusbuku();
        $data_perpustakaan = $this->dashboard_model->perpustakaan();
        $data_peminjaman = $this->dashboard_model->peminjaman();

        $output = array(
            'judul' => 'Dashboard',
            'theme_page' => 'dashboard_read',
            'data_anggota' => $data_anggota,
            'data_judul' => $data_judul,
            'data_perpustakaan' => $data_perpustakaan,
            'data_peminjaman' => $data_peminjaman,
        );

        $this->load->view('theme/index', $output);
    }
}