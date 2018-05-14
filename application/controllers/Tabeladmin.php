<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabeladmin extends CI_Controller {

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
	 		$this->load->model('Admin_model');
	 	}


	public function index()
	{

		$data['admin']=$this->Admin_model->get_all_admin();
		$this->load->view('admin/tabeladmin',$data);
	}
	public function tabeladmin_add()
		{
			$data = array(
					'id_admin' => $this->input->post('id_admin'),
					'nama_admin' => $this->input->post('nama_admin'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('no_telp'),
				);
			$insert = $this->Admin_model->tabeladmin_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id_admin)
		{
			$data = $this->Admin_model->get_by_id($id_admin);



			echo json_encode($data);
		}

		public function tabeladmin_update()
	{
		$data = array(
			'id_admin' => $this->input->post('id_admin'),
					'nama_admin' => $this->input->post('nama_admin'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('no_telp'),
			);
		$this->Admin_model->tabeladmin_update(array('id_admin' => $this->input->post('id_admin')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function tabeladmin_delete($id_admin)
	{
		$this->Admin_model->delete_by_id($id_admin);
		echo json_encode(array("status" => TRUE));
	}



}
