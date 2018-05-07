<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atasantable extends CI_Controller {

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
	 		$this->load->model('atasantable_model');
	 	}


	public function index()
	{

		$data['atasan']=$this->atasantable_model->get_all_atasan();
		$this->load->view('atasantable_view',$data);
	}
	public function atasantable_add()
		{
			$data = array(
					'Nama' => $this->input->post('Nama'),
					'Jenis' => $this->input->post('Jenis'),
					'Merk' => $this->input->post('Merk'),
					'Ukuran' => $this->input->post('Ukuran'),
					'Tgl_masuk' => $this->input->post('Tgl_masuk'),
					'Harga' => $this->input->post('Harga'),
					'Jumlah' => $this->input->post('Jumlah'),
					'Gambar' => $this->input->post('Gambar'),
					// 'book_category' => $this->input->post('book_category'),
				);
			$insert = $this->atasantable_model->atasantable_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id)
		{
			$data = $this->atasantable_model->get_by_id($id);



			echo json_encode($data);
		}

		public function atasantable_update()
	{
		$data = array(
			'Nama' => $this->input->post('Nama'),
					'Jenis' => $this->input->post('Jenis'),
					'Merk' => $this->input->post('Merk'),
					'Ukuran' => $this->input->post('Ukuran'),
					'Tgl_masuk' => $this->input->post('Tgl_masuk'),
					'Harga' => $this->input->post('Harga'),
					'Jumlah' => $this->input->post('Jumlah'),
					'Gambar' => $this->input->post('Gambar'),
				// 'book_category' => $this->input->post('book_category'),
			);
		$this->atasantable_model->atasantable_update(array('id_atasan' => $this->input->post('id_atasan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function atasantable_delete($id)
	{
		$this->atasantable_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



}
