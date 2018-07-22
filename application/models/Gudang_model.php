<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gudang_model extends CI_Model {
	public function __construct()
     {
     	$this->load->database();
          $this->load->helper('url');
     } 




// ======================================barang============================
	public function get_all_barang($limit = FALSE, $offset = FALSE)
	{
		if ( $limit ) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('barang.tgl_masuk', 'DESC');

		// $this->db->from('barang');

		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
		$query=$this->db->get('barang');
		return $query->result();
	}

	public function get_total() 
    {
        return $this->db->count_all("barang");
    }

	public function insert_barang($data)
	{
		$this->db->insert('barang', $data);
	}

	public function update_barang($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'barang', $data, array('id_barang'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
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

    public function dropdown_admin(){

		$this->db->select ('
            admin.id_admin,
            admin.nama_admin
        ');

        $this->db->order_by('nama_admin');

        $result = $this->db->get('admin');
        
        $dropdown_admin[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                
                $dropdown_admin[$row['id_admin']] = $row['nama_admin'];
            }
        }

        return $dropdown_admin;
    }

    public function dropdown_ukuran(){

		$this->db->select ('
            ukuran.id_ukuran,
            ukuran.nama_ukuran
        ');

        $this->db->order_by('nama_ukuran');

        $result = $this->db->get('ukuran');
        
        $dropdown_ukuran[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                
                $dropdown_ukuran[$row['id_ukuran']] = $row['nama_ukuran'];
            }
        }

        return $dropdown_ukuran;
    }


    public function get_barang_by_id($id)
    {
        
		$this->db->select ( '*' );
		$this->db->from('barang');
        $this->db->join('ukuran', 'ukuran.id_ukuran = barang.id_ukuran', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('admin', 'admin.id_admin = barang.id_admin', 'left');

    	$this->db->where('barang.id_barang', $id);
    	$query = $this->db->get();
    	            
		return $query->row_array();
    }

   

    public function hapus_barang($id_barang)
    {
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
	public function insert_admin($data){
			$this->db->insert('admin', $data);
		}
	public function hapus_admin($id_admin){
     	$this->db->where('id_admin', $id_admin);
     	return $this->db->delete('admin');
     }
     public function get_admin_by_id($id_admin = 0){
		$query = $this->db->get_where('admin', array('id_admin'=>$id_admin));
		return $query -> row_array();
	}

	public function get_ukuran_by_id($id_ukuran = 0){
		$query = $this->db->get_where('ukuran', array('id_ukuran'=>$id_ukuran));
		return $query -> row_array();
	}

	



//======================================transaksi barang=================================
	public function get_qty($id){
		$this->db->select ( '*' );
		$this->db->from('barang');
        $this->db->join('ukuran', 'ukuran.id_ukuran = barang.id_ukuran', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('admin', 'admin.id_admin = barang.id_admin', 'left');

    	$this->db->where('barang.id_barang', $id);
    	$query = $this->db->get();
    	            
		return $query->row_array();
	}

    public function add_barang($jumlah){
        $this->db->where('id_barang',$this->input->post('id_barang'));
        $this->db->update('barang',array('jumlah' => $jumlah));

    }


}
?>