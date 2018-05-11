<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	var $table = 'admin';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


public function get_all_admin()
{
$this->db->from('admin');
$query=$this->db->get();
return $query->result();
}


	public function get_by_id($id_admin)
	{
		$this->db->from($this->table);
		$this->db->where('id_admin',$id_admin);
		$query = $this->db->get();

		return $query->row();
	}

	public function tabeladmin_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function tabeladmin_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		$this->db->delete($this->table);
	}


}
