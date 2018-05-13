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


    public function get_all_kategori($limit = FALSE, $offset = FALSE)
    {
    if ( $limit ) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('kategori.id_kategori', 'DESC');
        $this->db->from('kategori');
    $query=$this->db->get();
    return $query->result();
    }

    public function get_total() 
    {
        return $this->db->count_all("kategori");
    }

	public function dropdown_kategori(){

		$this->db->select ('
            kategori.id_kategori,
            kategori.nama_kategori
        ');

        $this->db->order_by('nama_kategori');

        $result = $this->db->get('kategori');
        
        $dropdown_kategori[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                
                $dropdown_kategori[$row['id_kategori']] = $row['nama_kategori'];
            }
        }

        return $dropdown_kategori;
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

	public function get_kategori_by_id($id)
    {
        $query = $this->db->get_where('kategori', array('id_kategori' => $id));
        return $query->row();
    }

	public function update_kategori($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'kategori', $data, array('id_kategori'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

	public function generate_cat_dropdown()
    {
        $this->db->select ('
            kategori.id_kategori,
            kategori.nama
        ');

        $this->db->order_by('nama');

        $result = $this->db->get('kategori');
        
        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                
                $dropdown[$row['id_kategori']] = $row['nama'];
            }
        }

        return $dropdown;
    }

	public function delete_by_id($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete($this->table);
	}


}
