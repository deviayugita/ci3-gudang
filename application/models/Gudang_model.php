<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gudang_model extends CI_Model {
	public function __construct()
     {
     	$this->load->database();
          $this->load->helper('url');
     } 


// - - - - - - get - - - - -
	public function get_atasan(){
		$query = $this->db->get('atasan');
		return $query->result();
	}
	public function get_bawahan(){
		$query = $this->db->get('bawahan');
		return $query->result();
	}


// - - - - - - insert - - - - -
	public function insert_atasan($data){
			$this->db->insert('atasan', $data);
		}
	public function insert_bawahan($data){
			$this->db->insert('bawahan', $data);
		}


// - - - - - - update - - - - -

	public function update_atasan($id = 0, $data)
	{
		if($id == 0){
     		$this->db->insert('atasan', $data);
     	}else{
		$this->db->where('id_atasan', $id);
		return $this->db->update('atasan', $data);
		}
	}


	public function update_bawahan($id = 0, $data)
	{
		if($id == 0){
     		$this->db->insert('bawahan', $data);
     	}else{
		$this->db->where('id_bawahan', $id);
		return $this->db->update('bawahan', $data);
		}
	}


// - - - - - - getbyid - - - - -
	public function get_atasan_by_id($id_atasan = 0){
		$query = $this->db->get_where('atasan', array('id_atasan'=>$id_atasan));
		return $query -> row_array();
	}
	public function get_bawahan_by_id($id_bawahan = 0){
		$query = $this->db->get_where('bawahan', array('id_bawahan'=>$id_bawahan));
		return $query -> row_array();
	}




// - - - - - - delete - - - - -
	public function delete_atasan($id){
     }
     public function delete_bawahan($id){
     }
}
?>