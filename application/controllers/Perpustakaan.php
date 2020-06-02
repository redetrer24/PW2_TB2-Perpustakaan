<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('perpustakaan_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		$data_buku = $this->perpustakaan_model->read();

		$output = array(
						'theme_page' => 'perpustakaan_read',
						'judul' => 'Daftar Buku',
						'data_buku' => $data_buku
					);

		$this->load->view('theme/index', $output);
	}

	public function insert_buku() {
		$output = array(
						'theme_page' => 'perpustakaan_insert',
                        'judul' => 'Tambah buku'
                    );

        $this->load->view('theme/index', $output);
	}

	public function submit() {
		//setting library upload
		$config['upload_path']          = './upload_folder/';
        $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 20000;
	    $this->load->library('upload', $config);

		$Judul		= $this->input->post('Judul');
		$Cover		= $this->upload->do_upload('Cover');
        $Jenis 		= $this->input->post('Jenis');
        $Pengarang 	= $this->input->post('Pengarang');
		$Penerbit 	= $this->input->post('Penerbit');
		$Tahun 		= $this->input->post('Tahun');
		$Stok 		= $this->input->post('Stok');
		
		//jika gagal upload
		if ( !$Cover){

			//respon alasan kenapa gagal upload
			$response = $this->upload->display_errors();

			$output = array(
								'judul' => 'Tambah buku',
								'response' => $response
							);
			$this->load->view('perpustakaan_insert', $output);
		}
		
		//jika berhasil upload
		else{
			//respon upload berhasil 
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			
			$response = 'file telah berhasil di upload, file name : '.$file_name;

			$output = array(
								'judul' => 'Tambah buku',
								'response' => $response
							);
			$this->load->view('perpustakaan_insert', $output);

			//mengirim data ke model
			$input = array(
							'Judul' 		=> $Judul,
							'Cover' 		=> $file_name,
							'Jenis_Buku'	=> $Jenis,
							'Pengarang' 	=> $Pengarang,
							'Penerbit' 		=> $Penerbit,
							'Tahun_Terbit' 	=> $Tahun,
							'Stok' 		=> $Stok
						);
			
			//memanggil function insert pada perpustakaan model
			//function insert berfungsi menyimpan/create data ke table perpustakaan di database
			$data_buku = $this->perpustakaan_model->insert($input);
		
			//mengembalikan halaman ke function read
			redirect('perpustakaan/read');
		}
	}

	public function update(){
		$id = $this->uri->segment(3);

		$read_buku_single = $this->perpustakaan_model->read_single($id);
		
		$output = array (
						'theme_page' => 'perpustakaan_update',
						'judul'=> 'Ubah data buku',
						'read_buku_single'=> $read_buku_single,
					);
		
		$this->load->view('theme/index', $output);
	}

	public function update_submit(){
		$id = $this->uri->segment(3);

		//setting library upload
		$config['upload_path']          = './upload_folder/';
        $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 20000;
	    $this->load->library('upload', $config);

		// menangkap data input dari view
		$Judul     	= $this->input->post('Judul');
		$Cover		= $this->upload->do_upload('Cover');
		$Jenis 		= $this->input->post('Jenis');
		$Pengarang 	= $this->input->post('Pengarang');
		$Penerbit 	= $this->input->post('Penerbit');
		$Tahun 		= $this->input->post('Tahun');
		$Stok 		= $this->input->post('Stok');
		
		//jika gagal upload
		if ( !$Cover){

			 // function read berfungsi mengambil 1 data dari table buku sesuai id yg dipilih
			$read_buku_single = $this->perpustakaan_model->read_single($id);

			//respon alasan kenapa gagal upload
			$response = $this->upload->display_errors();

			$output = array(
								'read_buku_single' => $read_buku_single,
								'theme_page' => 'perpustakaan_update',
								'judul' => 'Tambah buku',
								'response' => $response
							);
		//memanggil file view
			$this->load->view('theme/index', $output);
		}

		//jika berhasil upload
		else{

			$this->upload->do_upload('Cover');
			//respon upload berhasil 
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			
			$response = 'file telah berhasil di upload, file name : '.$file_name;

			$input = array(
							'Judul' 		=> $Judul,
							'Cover' 		=> $file_name,
							'Jenis_Buku'	=> $Jenis,
							'Pengarang' 	=> $Pengarang,
							'Penerbit' 		=> $Penerbit,
							'Tahun_Terbit' 	=> $Tahun,
							'Stok' 			=> $Stok
						);
			//memanggil function insert pada perpustakaan model
			//function insert berfungsi menyimpan/create data ke table perpustakaan di database
			$data_buku = $this->perpustakaan_model->update($input, $id);

			//mengembalikan halaman ke function read
			redirect('perpustakaan/read');			
		}	
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$read_buku_single = $this->perpustakaan_model->delete($id);

		redirect('perpustakaan/read');
	}

	public function export() {
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_buku = $this->perpustakaan_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'No');
		$excel->getActiveSheet()->setCellValue( 'B1', 'Judul');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Jenis');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Pengarang');
		$excel->getActiveSheet()->setCellValue( 'E1', 'Penerbit');
		$excel->getActiveSheet()->setCellValue( 'F1', 'Tahun');
		$excel->getActiveSheet()->setCellValue( 'G1', 'Stok');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data perpustakaan (mengisi data ke excel)
		foreach($data_buku as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['No']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['Judul']);
			$excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['Jenis']);
			$excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['Pengarang']);
			$excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['Penerbit']);
			$excel->getActiveSheet()->setCellValue( 'F'.$baris, $data['Tahun']);
			$excel->getActiveSheet()->setCellValue( 'G'.$baris, $data['Stok']);


			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_buku.xls';

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
		$data_buku = $this->perpustakaan_model->read();

		$output = array(
						'theme_page' => 'perpustakaan_read',
						'judul' => 'Daftar Buku',
						'data_buku' => $data_buku
					);

		$this->load->view('perpustakaan_export', $output);
	}
}
