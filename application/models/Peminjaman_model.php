<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table kota di database
	public function read() {

		//sql read
		$this->db->select('data_peminjam.*');

		$this->db->select('anggota.Nim as Nim_Anggota');
		$this->db->select('anggota.Nama as Nama_Anggota');
		
		$this->db->select('buku.Kd_Buku as Kode_Buku');
		$this->db->select('buku.Judul as Judul_Buku');
		
		$this->db->select('petugas.Id_Petugas');
		$this->db->select('petugas.Nama as Nama_Petugas');

		$this->db->select('Kd_Peminjam');
		$this->db->select('Tgl_Peminjam');
		$this->db->select('Batas_Tgl_Pengembalian');
		$this->db->from('data_peminjam');
		
		$this->db->join('anggota', 'data_peminjam.Id_Anggota = anggota.Id_Anggota');
		$this->db->join('buku', 'data_peminjam.Kd_Buku = buku.Kd_Buku');
		$this->db->join('petugas', 'data_peminjam.Id_Petugas = petugas.Id_Petugas');
		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table provinsi di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('data_peminjam');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('Kd_Peminjam', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	public function insert($input) {
		//$data = data yang dikirim dari controller
		return $this->db->insert('data_peminjam', $input);
	}

	//function delete berfungsi menghapus data dari table provinsi di database
	public function delete($id){
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('Kd_Peminjam', $id);

		return $this->db->delete('data_peminjam');
	}

}
