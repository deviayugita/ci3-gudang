<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {


	public function __construct()
	{
		//Membuat kelas parent agar bisa digunakan di semua fungsi
		parent::__construct();
		//Load model dan helper
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->model('Gudang_model');
		$this->load->helper(array('url_helper','date','file'));
		date_default_timezone_set('Asia/Jakarta');
	}



	public function index()
	{
        $data['admin']=$this->Admin_model->get_admin();
		$this->load->view('Admin/index');
	}
	
}
?>