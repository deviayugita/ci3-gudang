<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atasantable_model extends CI_Model
{

	var $table = 'atasan';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


public function get_all_atasan()
{
$this->db->from('atasan');
$query=$this->db->get();
return $query->result();
}


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_atasan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function atasantable_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function atasantable_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_atasan', $id);
		$this->db->delete($this->table);
	}


}
