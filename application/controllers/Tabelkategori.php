<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabelkategori extends CI_Controller {

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
	 		$this->load->model('Kategori_model');
	 	}


	public function index()
	{

		$data['kategori']=$this->Kategori_model->get_all_kategori();
		$this->load->view('admin/tabelkategori',$data);
	}
	public function tabelkategori_add()
		{
			$data = array(
					'id_kategori' => $this->input->post('id_kategori'),
					'nama' => $this->input->post('nama'),
				);
			$insert = $this->Kategori_model->tabelkategori_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id_kategori)
		{
			$data = $this->Kategori_model->get_by_id($id_kategori);



			echo json_encode($data);
		}

		public function tabelkategori_update()
	{
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
					'nama' => $this->input->post('nama'),
			);
		$this->Kategori_model->tabelkategori_update(array('id_kategori' => $this->input->post('id_kategori')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function tabelkategori_delete($id_kategori)
	{
		$this->Kategori_model->delete_by_id($id_kategori);
		echo json_encode(array("status" => TRUE));
	}



}
