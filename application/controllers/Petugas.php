<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('petugas_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		$data_petugas = $this->petugas_model->read();

		$output = array(
						'theme_page' => 'petugas_read',
						'judul' => 'Daftar Petugas',
						'data_petugas' => $data_petugas
					);

		$this->load->view('theme/index', $output);
	}

	public function petugas_insert() {
		$output = array(
						'theme_page' => 'petugas_insert',
                        'judul' => 'Tambah Petugas'
                    );

        $this->load->view('theme/index', $output);
	}

	public function submit() {

			$Nama		= $this->input->post('Nama');
	        $Jkel 		= $this->input->post('Jkel');
	        $Alamat 	= $this->input->post('Alamat');
			$Notelp 	= $this->input->post('Notelp');

			//mengirim data ke model
			$input = array(
							'Nama' 			=> $Nama,
							'Jenis_Kelamin'	=> $Jkel,
							'Alamat' 		=> $Alamat,
							'No_Telp' 		=> $Notelp
						);
			
			//memanggil function insert pada petugas model
			//function insert berfungsi menyimpan/create data ke table petugas di database
			$data_petugas = $this->petugas_model->insert($input);
		
			//mengembalikan halaman ke function read
			redirect('petugas/read');
	}

	public function update(){
		$id = $this->uri->segment(3);

		$read_petugas_single = $this->petugas_model->read_single($id);
		
		$output = array (
						'theme_page' => 'petugas_update',
						'judul'=> 'Ubah data petugas',
						'read_petugas_single'=> $read_petugas_single,
					);
		
		$this->load->view('theme/index', $output);
	}

	public function update_submit(){
		$id = $this->uri->segment(3);

		// menangkap data input dari view
			$Nama		= $this->input->post('Nama');
	        $Jkel 		= $this->input->post('Jkel');
	        $Alamat 	= $this->input->post('Alamat');
			$Notelp 	= $this->input->post('Notelp');
	
			$input = array(
							'Nama' 			=> $Nama,
							'Jenis_Kelamin'	=> $Jkel,
							'Alamat' 		=> $Alamat,
							'No_Telp' 		=> $Notelp
						);
			//memanggil function insert pada petugas model
			//function insert berfungsi menyimpan/create data ke table petugas di database
			$data_petugas = $this->petugas_model->update($input, $id);

			//mengembalikan halaman ke function read
			redirect('petugas/read');			
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$read_buku_single = $this->petugas_model->delete($id);

		redirect('petugas/read');
	}

	public function export() {
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_petugas = $this->petugas_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'Id_Petugas');
		$excel->getActiveSheet()->setCellValue( 'B1', 'Nama');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Jenis_Kelamin');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Alamat');
		$excel->getActiveSheet()->setCellValue( 'E1', 'No_Telp');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data petugas (mengisi data ke excel)
		foreach($data_petugas as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['Id_Petugas']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['Nama']);
			$excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['Jenis_Kelamin']);
			$excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['Alamat']);
			$excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['No_Telp']);


			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_petugas.xls';

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
		$data_petugas = $this->petugas_model->read();

		$output = array(
						'theme_page' => 'petugas_read',
						'judul' => 'Daftar Petugas',
						'data_petugas' => $data_petugas
					);

		$this->load->view('petugas_export', $output);
	}
}
