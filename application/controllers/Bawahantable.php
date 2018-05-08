<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bawahantable extends CI_Controller {

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
	 		$this->load->model('bawahantable_model');
	 	}


	public function index()
	{

		$data['bawahan']=$this->bawahantable_model->get_all_bawahan();
		$this->load->view('bawahantable_view',$data);
	}
	public function bawahantable_add()
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
			$insert = $this->bawahantable_model->bawahantable_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id)
		{
			$data = $this->bawahantable_model->get_by_id($id);



			echo json_encode($data);
		}

		public function bawahantable_update()
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
		$this->bawahantable_model->bawahantable_update(array('id_bawahan' => $this->input->post('id_bawahan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function bawahantable_delete($id)
	{
		$this->bawahantable_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



}
