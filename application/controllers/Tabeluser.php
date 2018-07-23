<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabeluser extends CI_Controller {

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
	 		$this->load->model('User_model');
	 	}


	public function index()
	{

		$data['user']=$this->User_model->get_all_user();
		$this->load->view('admin/tabeluser',$data);
	}
	public function tabeluser_add()
		{
			$data = array(
					'id_user' => $this->input->post('id_user'),
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'email' => $this->input->post('email'),
					'no_tlp' => $this->input->post('no_tlp'),
				);
			$insert = $this->user_model->tabeluser_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id_user)
		{
			$data = $this->user_model->get_by_id($id_user);



			echo json_encode($data);
		}

		public function tabeluser_update()
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),
					'nama_user' => $this->input->post('nama_user'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('no_telp'),
			);
		$this->user_model->tabeluser_update(array('id_user' => $this->input->post('id_user')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function tabeluser_delete($id_user)
	{
		$this->user_model->delete_by_id($id_user);
		echo json_encode(array("status" => TRUE));
	}



}
