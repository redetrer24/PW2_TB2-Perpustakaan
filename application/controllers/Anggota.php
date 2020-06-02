<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('anggota_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		$data_anggota = $this->anggota_model->read();

		$output = array(
						'theme_page' => 'anggota_read',
						'judul' => 'Daftar Anggota',
						'data_anggota' => $data_anggota
					);

		$this->load->view('theme/index', $output);
	}

	public function anggota_insert() {
		$output = array(
						'theme_page' => 'anggota_insert',
                        'judul' => 'Tambah anggota'
                    );

        $this->load->view('theme/index', $output);
	}

	public function submit() {

			$Nim		= $this->input->post('Nim');
	        $Nama 		= $this->input->post('Nama');
	        $Prodi 		= $this->input->post('Prodi');

			//mengirim data ke model
			$input = array(
							'Nim' 	=> $Nim,
							'Nama'	=> $Nama,
							'Prodi' => $Prodi
						);
			
			//memanggil function insert pada anggota model
			//function insert berfungsi menyimpan/create data ke table anggota di database
			$data_anggota = $this->anggota_model->insert($input);
		
			//mengembalikan halaman ke function read
			redirect('anggota/read');
	}

	public function update(){
		$id = $this->uri->segment(3);

		$read_anggota_single = $this->anggota_model->read_single($id);
		
		$output = array (
						'theme_page' => 'anggota_update',
						'judul'=> 'Ubah data anggota',
						'read_anggota_single'=> $read_anggota_single,
					);
		
		$this->load->view('theme/index', $output);
	}

	public function update_submit(){
		$id = $this->uri->segment(3);

		// menangkap data input dari view
			$Nim		= $this->input->post('Nim');
	        $Nama 		= $this->input->post('Nama');
	        $Prodi 		= $this->input->post('Prodi');
	
			$input = array(
							'Nim' 	=> $Nim,
							'Nama'	=> $Nama,
							'Prodi' => $Prodi
						);
			//memanggil function insert pada anggota model
			//function insert berfungsi menyimpan/create data ke table anggota di database
			$data_anggota = $this->anggota_model->update($input, $id);

			//mengembalikan halaman ke function read
			redirect('anggota/read');			
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$read_buku_single = $this->anggota_model->delete($id);

		redirect('anggota/read');
	}

	public function export() {
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_anggota = $this->anggota_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'Id_Anggota');
		$excel->getActiveSheet()->setCellValue( 'B1', 'Nim');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Nama');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Prodi');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data anggota (mengisi data ke excel)
		foreach($data_anggota as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['Id_Anggota']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['Nim']);
			$excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['Nama']);
			$excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['Prodi']);


			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_anggota.xls';

		//konfigurasi file excel
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}

	public function export2() {
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_anggota = $this->anggota_model->read();

		$output = array(
						'theme_page' => 'anggota_read',
						'judul' => 'Daftar Anggota',
						'data_anggota' => $data_anggota
					);

		$this->load->view('anggota_export', $output);
	}
}
