<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

	var $table = 'kategori';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


public function get_all_kategori()
{
$this->db->from('kategori');
$query=$this->db->get();
return $query->result();
}


	public function get_by_id($id_kategori)
	{
		$this->db->from($this->table);
		$this->db->where('id_kategori',$id_kategori);
		$query = $this->db->get();

		return $query->row();
	}

	public function tabelkategori_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function tabelkategori_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete($this->table);
	}


}
