<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('peminjaman_model', 'anggota_model', 'perpustakaan_model', 'petugas_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		$data_peminjaman = $this->peminjaman_model->read();

		$output = array(
						'theme_page' => 'peminjaman_read',
						'judul' => 'Daftar Peminjaman',
						'data_peminjaman' => $data_peminjaman
					);

		$this->load->view('theme/index', $output);
	}

	public function insert_peminjaman() {
		$data_peminjaman = $this->peminjaman_model->read();
		$data_anggota = $this->anggota_model->read();
		$data_buku = $this->perpustakaan_model->read();
		$data_petugas = $this->petugas_model->read();

		$output = array(
						'theme_page' => 'peminjaman_insert',
                        'judul' => 'Tambah Peminjaman',
                        'data_peminjaman' => $data_peminjaman,
						'data_anggota' => $data_anggota,
						'data_petugas' => $data_petugas,
						'data_buku' => $data_buku
                    );

        $this->load->view('theme/index', $output);
	}

	public function submit() {
		
		$Anggota					= $this->input->post('Anggota');
        $Buku 						= $this->input->post('Buku');
        $Petugas 					= $this->input->post('Petugas');
        $Tgl_Peminjam 				= $this->input->post('Tgl_Peminjam');
		$Batas_Tgl_Pengembalian 	= $this->input->post('Batas_Tgl_Pengembalian');
		
			//mengirim data ke model
			$input = array(
							'Id_Anggota' 				=> $Anggota,
							'Kd_Buku'					=> $Buku,
							'Id_Petugas'				=> $Petugas,
							'Tgl_Peminjam' 				=> $Tgl_Peminjam,
							'Batas_Tgl_Pengembalian' 	=> $Batas_Tgl_Pengembalian
						);
			
			//memanggil function insert pada peminjaman model
			//function insert berfungsi menyimpan/create data ke table peminjaman di database
			$data_peminjaman = $this->peminjaman_model->insert($input);
		
			//mengembalikan halaman ke function read
			redirect('peminjaman/read');
	}

	public function update(){
		$id = $this->uri->segment(3);

		$read_peminjaman_single = $this->peminjaman_model->read_single($id);
		
		$output = array (
						'theme_page' => 'peminjaman_update',
						'judul'=> 'Ubah data Peminjaman',
						'read_peminjaman_single'=> $read_peminjaman_single,
					);
		
		$this->load->view('theme/index', $output);
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$read_peminjaman_single = $this->peminjaman_model->delete($id);

		redirect('peminjaman/read');
	}

	public function export() {
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_peminjaman = $this->peminjaman_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'Kd_Peminjam');
		$excel->getActiveSheet()->setCellValue( 'B1', 'Nim_Anggota');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Nama_Anggota');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Kode_Buku');
		$excel->getActiveSheet()->setCellValue( 'E1', 'Judul_Buku');
		$excel->getActiveSheet()->setCellValue( 'F1', 'Tgl_Peminjam');
		$excel->getActiveSheet()->setCellValue( 'G1', 'Batas_Tgl_Pengembalian');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data peminjaman (mengisi data ke excel)
		foreach($data_peminjaman as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['Kd_Peminjam']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['Nim_Anggota']);
			$excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['Nama_Anggota']);
			$excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['Kode_Buku']);
			$excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['Judul_Buku']);
			$excel->getActiveSheet()->setCellValue( 'F'.$baris, $data['Tgl_Peminjam']);
			$excel->getActiveSheet()->setCellValue( 'G'.$baris, $data['Batas_Tgl_Pengembalian']);


			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_peminjaman.xls';

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
		$data_peminjaman = $this->peminjaman_model->read();

		$output = array(
						'theme_page' => 'peminjaman_read',
						'judul' => 'Daftar Peminjaman',
						'data_peminjaman' => $data_peminjaman
					);

		$this->load->view('peminjaman_export', $output);
	}
}
