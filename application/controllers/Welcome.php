<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		//Membuat kelas parent agar bisa digunakan di semua fungsi
		parent::__construct();
		//Load model dan helper
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        
		$this->load->model('Gudang_model');
		$this->load->helper('url_helper','date','file','pagination');
		date_default_timezone_set('Asia/Jakarta');
	}



	public function home()
	{
		$this->load->view('index');
	}
	public function about()
	{
		$this->load->view('about');
	}
	public function contact()
	{
		$this->load->view('contact');
	}



// =============================read============================
	public function read(){
		$data['Atasan'] = $this->Gudang_model->get_atasan();//ambil data dari Model
		$data['Bawahan'] = $this->Gudang_model->get_bawahan();//ambil data dari Model
		
		$this->load->view('view', $data);
	}




// =============================detail===========================
	public function detail(){
		$id_atasan = $this->uri->segment(3);
		$data['Atasan_list']=$this->Gudang_model->get_atasan_by_id($id_atasan);
		if(empty($data['Atasan_list'])){
			show_404();
		}
		$this->load->view('atasan_view', $data);
	}

	public function detail_bawahan(){
		$id_bawahan = $this->uri->segment(3);
		$data['Bawahan_list']=$this->Gudang_model->get_bawahan_by_id($id_bawahan);
		if(empty($data['Bawahan_list'])){
			show_404();
		}
		$this->load->view('bawahan_view', $data);
	}




// ==============================create======================
	public function create(){
		$this->load->view('input');
	}




// ================================update================
	public function update(){
		$this->load->view('update');
	}



//========================view data table========================

	public function table(){
		$this->load->view('table');
	}




	
}
