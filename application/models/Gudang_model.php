<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gudang_model extends CI_Model {
	public function __construct()
     {
     	$this->load->database();
          $this->load->helper('url');
     } 




// ======================================barang============================
	public function get_barang(){
		$query = $this->db->get('barang');
		return $query->result();
	}

	public function insert_barang($data){
			$this->db->insert('barang', $data);
		}

	public function update_barang($id_barang = 0, $data)
	{
		if($id == 0){
     		$this->db->insert('barang', $data);
     	}else{
			$this->db->where('id_barang', $id_barang);
			return $this->db->update('barang', $data);
		}
	}

		public function get_barang_by_id($id_barang = 0){
		$query = $this->db->get_where('barang', array('id_barang'=>$id_barang));
		return $query -> row_array();
	}

    	public function hapus_barang($id_barang){
     	$this->db->where('id_barang', $id_barang);
     	return $this->db->delete('barang');
     }





// ==================================kategori=========================
	public function get_kategori(){
		$query = $this->db->get('kategori');
		return $query->result();
	}
	public function insert_kategori($data){
			$this->db->insert('kategori', $data);
		}
	public function hapus_kategori($id_kategori){
     	$this->db->where('id_kategori', $id_kategori);
     	return $this->db->delete('kategori');
     }
     public function get_kategori_by_id($id_kategori = 0){
		$query = $this->db->get_where('kategori', array('id_kategori'=>$id_kategori));
		return $query -> row_array();
	}



// =================================admin====================================
		public function get_admin(){
		$query = $this->db->get('admin');
		return $query->result();
	}
	public function hapus_admin($id_admin){
     	$this->db->where('id_admin', $id_admin);
     	return $this->db->delete('admin');
     }
     public function get_admin_by_id($id_admin = 0){
		$query = $this->db->get_where('admin', array('id_admin'=>$id_admin));
		return $query -> row_array();
	}

	




	




// - - - - - - get - - - - -
	// public function get_atasan(){
	// 	$query = $this->db->get('atasan');
	// 	return $query->result();
	// }
	// public function get_bawahan(){
	// 	$query = $this->db->get('bawahan');
	// 	return $query->result();
	// }
// -------------------- - - - - - insert - - - - ----------------------------
	// public function insert_atasan($data){
	// 		$this->db->insert('atasan', $data);
	// 	}
	// public function insert_bawahan($data){
	// 		$this->db->insert('bawahan', $data);
	// 	}

// ----------------- - - - - - update - - - - ---------------------------
	// public function update_atasan($id = 0, $data)
	// {
	// 	if($id == 0){
 //     		$this->db->insert('atasan', $data);
 //     	}else{
	// 	$this->db->where('id_atasan', $id);
	// 	return $this->db->update('atasan', $data);
	// 	}
	// }
	// public function update_bawahan($id = 0, $data)
	// {
	// 	if($id == 0){
 //     		$this->db->insert('bawahan', $data);
 //     	}else{
	// 	$this->db->where('id_bawahan', $id);
	// 	return $this->db->update('bawahan', $data);
	// 	}
	// }

// -------------------- - - - - - getbyid - - - - -------------------------
	// public function get_atasan_by_id($id_atasan = 0){
	// 	$query = $this->db->get_where('atasan', array('id_atasan'=>$id_atasan));
	// 	return $query -> row_array();
	// }
	// public function get_bawahan_by_id($id_bawahan = 0){
	// 	$query = $this->db->get_where('bawahan', array('id_bawahan'=>$id_bawahan));
	// 	return $query -> row_array();
	// }

     // --------------------- - - - - - delete - - - - ----------------------------

	// public function hapus_atasan($id_atasan){
	// 	$this->db->where('id_atasan', $id_atasan);
 //     	return $this->db->delete('atasan');
 //     }
 //     public function hapus_bawahan($id_bawahan){
 //     	$this->db->where('id_bawahan', $id_bawahan);
 //     	return $this->db->delete('bawahan');
 //     }
}
?>