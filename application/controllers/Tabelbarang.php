<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabelbarang extends CI_Controller {




	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		//Membuat kelas parent agar bisa digunakan di semua fungsi
		parent::__construct();
		//Load model dan helper
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        
		$this->load->model('Gudang_model');
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->model('Admin_model');
		$this->load->helper(array('url_helper','date','file'));
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{

		$data['barang']=$this->Barang_model->get_all_barang();
		$this->load->view('admin/tabelbarang',$data);
	}


	public function tabel()
	{

		$data['barang']=$this->Barang_model->get_all_barang();
		$this->load->view('user/barang',$data);
	}


	public function tabelbarang_add()
		{
			$data = array(
					'id_barang' => $this->input->post('id_barang'),
					'nama' => $this->input->post('nama'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'jumlah' => $this->input->post('jumlah'),
					'id_admin' => $this->input->post('id_admin'),
					'ukuran' => $this->input->post('ukuran'),
					'tgl_masuk' => $this->input->post('tgl_masuk'),
					'Gambar' => $this->input->post('Gambar'),
				);
			$insert = $this->Barang_model->tabelbarang_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id_barang)
		{
			$data = $this->Barang_model->get_by_id($id_barang);



			echo json_encode($data);
		}

		public function tabelbarang_update()
	{
		$data = array(
					'id_barang' => $this->input->post('id_barang'),
					'nama' => $this->input->post('nama'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'jumlah' => $this->input->post('jumlah'),
					'id_admin' => $this->input->post('id_admin'),
					'ukuran' => $this->input->post('ukuran'),
					'tgl_masuk' => $this->input->post('tgl_masuk'),
					'Gambar' => $this->input->post('Gambar'),
				);
		$this->Barang_model->tabelbarang_update(array('id_barang' => $this->input->post('id_barang')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function tabelbarang_delete($id_barang)
	{
		$this->Barang_model->delete_by_id($id_barang);
		echo json_encode(array("status" => TRUE));
	}


// new
// =========================transaksi====================================
    public function transaksi(){
        $id_barang = $this->uri->segment(3);
        $data['Barang_list']=$this->Gudang_model->get_qty($id_barang);
        if(empty($data['Barang_list'])){
            show_404();
        }
        $this->load->view('admin/transaksi',$data);
    }

    public function tambah_jumlah($id = NULL){
    	$jumlah_brg = $this->input->post('jumlah_brg') + $this->input->post('jumlah');
    	$this->Gudang_model->add_barang($jumlah_brg);


    	redirect('Tabelbarang/index', $data);

        // $post_data = array(
        //         'jumlah' => $this->input->post('jumlah'),
        //     );

        //         if($this->Barang_model->tambah_qty($post_data, $id)){
        //         redirect('Tabelbaran', $data);
        //        } 
    }
// wes

}
