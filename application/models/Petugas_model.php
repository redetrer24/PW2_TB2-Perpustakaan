<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table kota di database
	public function read() {

		//sql read
		$this->db->select('*');
		$this->db->from('petugas'); 
		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table provinsi di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('petugas');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('Id_Petugas', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	public function insert($input) {
		//$data = data yang dikirim dari controller
		return $this->db->insert('petugas', $input);
	}

	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('Id_Petugas', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('petugas', $input);
	}

	//function delete berfungsi menghapus data dari table provinsi di database
	public function delete($id){
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('Id_Petugas', $id);

		return $this->db->delete('petugas');
	}

}
