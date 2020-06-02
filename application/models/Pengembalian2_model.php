<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian2_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table kota di database
	public function read() {

		//sql read
        $this->db->select('transaksi_pengembalian.*');

        $this->db->select('data_peminjam.Kd_Peminjam');
        $this->db->select('anggota.Id_Anggota, anggota.Nama as nama_anggota');
        $this->db->select('petugas.Id_Petugas, petugas.Nama as nama_petugas');
        $this->db->select('data_peminjam.Kd_Buku');

        $this->db->from('transaksi_pengembalian'); 

        $this->db->join('data_peminjam', 'data_peminjam.Kd_Peminjam = transaksi_pengembalian.Kd_Peminjam');
        $this->db->join('Anggota', 'data_peminjam.Id_anggota = anggota.id_anggota');
        $this->db->join('Petugas', 'data_peminjam.Id_petugas = Petugas.id_petugas');

        $query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table provinsi di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('transaksi_pengembalian');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('Kd_Transaksi_Pengembalian', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	public function insert($input) {
		//$data = data yang dikirim dari controller
		return $this->db->insert('transaksi_pengembalian', $input);
	}

	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('Kd_Transaksi_Pengembalian', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('transaksi_pengembalian', $input);
	}

	//function delete berfungsi menghapus data dari table provinsi di database
	public function delete($id){
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('Kd_Transaksi_Pengembalian', $id);

		return $this->db->delete('transaksi_pengembalian');
	}

}