<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('perpustakaan_model'));
    }

    public function index() {
		$this->pie();
	}

	public function pie() {
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_buku = $this->perpustakaan_model->read();

		//mengirim data ke view
		$output = array(
					'theme_page' => 'chart_pie',
					'judul' => 'Pie Chart',
					'data_buku' => $data_buku
				);

		//memanggil file view
		$this->load->view('theme/index', $output);


	}

	public function column() {
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_buku = $this->perpustakaan_model->read();

		//mengirim data ke view
		$output = array(
					'theme_page' => 'chart_column',
					'judul' => 'Column Chart',
					'data_buku' => $data_buku
				);

		//memanggil file view
		$this->load->view('theme/index', $output);


	}

}
