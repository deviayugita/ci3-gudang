<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{

	var $table = 'barang';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_all_barang($limit = FALSE, $offset = FALSE)
	{
		if ( $limit ) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('barang.tgl_masuk', 'DESC');

        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $this->db->join('admin', 'admin.id_admin = barang.id_admin');
        $this->db->join('ukuran', 'ukuran.id_ukuran = barang.id_ukuran');
		
		$this->db->from('barang');
		$query=$this->db->get();
		return $query->result();
	}


	public function get_total() 
    {
        return $this->db->count_all("barang");
    }


	public function get_by_id($id_barang)
	{
		$this->db->from($this->table);
		$this->db->where('id_barang',$id_barang);
		$query = $this->db->get();

		return $query->row();
	}

	public function tabelbarang_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function tabelbarang_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_barang)
	{
		$this->db->where('id_barang', $id_barang);
		$this->db->delete($this->table);
	}


	// public function tambah_qty($data, $id) 
 //    {
 //        if ( !empty($data) && !empty($id) ){
 //            $update = $this->db->update( 'barang', $data, array('id_barang'=>$id) );
 //            return $update ? true : false;
 //        } else {
 //            return false;
 //        }
 //    }

}

