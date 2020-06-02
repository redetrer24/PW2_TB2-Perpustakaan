<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian2 extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('pengembalian2_model', 'peminjaman_model', 'petugas_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		$data_pengembalian2 = $this->pengembalian2_model->read();
		$data_peminjaman = $this->peminjaman_model->read();

		$output = array(
						'theme_page' => 'pengembalian2_read',
						'judul' => 'Daftar Pengembalian',
						'data_pengembalian2' => $data_pengembalian2
					);

		$this->load->view('theme/index', $output);
	}

	public function pengembalian2_insert() {
		$data_pengembalian2 = $this->pengembalian2_model->read();
		$data_peminjaman = $this->peminjaman_model->read();
		$data_petugas = $this->petugas_model->read();

		$output = array(
						'theme_page' => 'pengembalian2_insert',
                        'judul' => 'Tambah Pengembalian',
						'data_peminjaman' => $data_peminjaman,
						'data_petugas' => $data_petugas,
						'data_pengembalian2' => $data_pengembalian2
                    );

        $this->load->view('theme/index', $output);
	}

	public function submit() {

			$Kd_Peminjam		= $this->input->post('Kd_Peminjam');
	        $Tgl_Pengembalian 		= $this->input->post('Tgl_Pengembalian');
	        $Kd_Denda 		= $this->input->post('Kd_Denda');
	        $Total_Bayar 		= $this->input->post('Total_Bayar');

			//mengirim data ke model
			$input = array(
							'Kd_Peminjam' 	=> $Kd_Peminjam,
							'Tgl_Pengembalian'	=> $Tgl_Pengembalian,
							'Kd_Denda'	=> $Kd_Denda,
							'Total_Bayar' => $Total_Bayar
						);
			
			//memanggil function insert pada pengembalian2 model
			//function insert berfungsi menyimpan/create data ke table pengembalian2 di database
			$data_pengembalian2 = $this->pengembalian2_model->insert($input);
		
			//mengembalikan halaman ke function read
			redirect('pengembalian2/read');
	}

	public function update(){
		$id = $this->uri->segment(3);

		$data_petugas = $this->petugas_model->read();
		$read_pengembalian2_single = $this->pengembalian2_model->read_single($id);
		
		$output = array (
						'theme_page' => 'pengembalian2_update',
						'judul'=> 'Ubah Data Pengembalian',
						'data_petugas' => $data_petugas,
						'read_pengembalian2_single'=> $read_pengembalian2_single,
					);
		
		$this->load->view('theme/index', $output);
	}

	public function update_submit(){
		$id = $this->uri->segment(3);

		// menangkap data input dari view
			$Kd_Peminjam			= $this->input->post('Kd_Peminjam');
			$Tgl_Pengembalian		= $this->input->post('Tgl_Pengembalian');
			$Kd_Denda				= $this->input->post('Kd_Denda');
			$Total_Bayar			= $this->input->post('Total_Bayar');
			
			$input = array(
							'Kd_Peminjam' 				=> $Kd_Peminjam,
							'Tgl_Pengembalian' 			=> $Tgl_Pengembalian,
							'Kd_Denda' 					=> $Kd_Denda,
							'Total_Bayar' 				=> $Total_Bayar
						);
			//memanggil function insert pada pengembalian2 model
			//function insert berfungsi menyimpan/create data ke table pengembalian2 di database
			$data_pengembalian2 = $this->pengembalian2_model->update($input, $id);

			//mengembalikan halaman ke function read
			redirect('pengembalian2/read');			
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$read_buku_single = $this->pengembalian2_model->delete($id);

		redirect('pengembalian2/read');
	}

	public function export() {
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_pengembalian2 = $this->pengembalian2_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'Kd_Transaksi_Pengembalian');
		$excel->getActiveSheet()->setCellValue( 'B1', 'Id_Anggota');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Id_Petugas');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Kd_Buku');

		$excel->getActiveSheet()->setCellValue( 'E1', 'Tgl_Pengembalian');
		$excel->getActiveSheet()->setCellValue( 'E1', 'Kd_Denda');
		$excel->getActiveSheet()->setCellValue( 'E1', 'Total_Bayar');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data pengembalian2 (mengisi data ke excel)
		foreach($data_pengembalian2 as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['Kd_Transaksi_Pengembalian']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['Id_Anggota']);
			$excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['Id_Petugas']);
			$excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['Kd_Buku']);

			$excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['Tgl_Pengembalian']);
			$excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['Kd_Denda']);
			$excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['Total_Bayar']);


			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_pengembalian.xls';

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
		$data_pengembalian2 = $this->pengembalian2_model->read();

		$output = array(
						'theme_page' => 'pengembalian2_read',
						'judul' => 'Daftar Pengembalian',
						'data_pengembalian2' => $data_pengembalian2
					);

		$this->load->view('pengembalian2_export', $output);
	}
}
