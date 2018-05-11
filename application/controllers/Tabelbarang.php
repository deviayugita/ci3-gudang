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
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('Barang_model');
	 	}


	public function index()
	{

		$data['barang']=$this->Barang_model->get_all_barang();
		$this->load->view('admin/tabelbarang',$data);
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



}
