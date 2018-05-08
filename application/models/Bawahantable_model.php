<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bawahantable_model extends CI_Model
{

	var $table = 'bawahan';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


public function get_all_bawahan()
{
$this->db->from('bawahan');
$query=$this->db->get();
return $query->result();
}


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_bawahan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function bawahantable_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function bawahantable_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_bawahan', $id);
		$this->db->delete($this->table);
	}


}
