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
		$this->load->helper(array('url_helper','date','file'));
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
		
		$this->load->view('view', $data);
	}
	public function readbawahan(){
		$data['Bawahan'] = $this->Gudang_model->get_bawahan();//ambil data dari Model
		
		$this->load->view('view_bawahan', $data);
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
	public function create_atasan(){
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('Nama', 'Nama Atasan', 'required');
            $this->form_validation->set_rules('Jenis', 'Jenis Atasan', 'required');
            $this->form_validation->set_rules('Merk', 'Merk', 'required');
            $this->form_validation->set_rules('Ukuran', 'Ukuran', 'required');
            $this->form_validation->set_rules('Tgl_masuk', 'Tgl Masuk', 'required');
            $this->form_validation->set_rules('Harga', 'Harga', 'required');
            $this->form_validation->set_rules('Jumlah', 'Jumlah', 'required');

               if ($this->form_validation->run() == FALSE) {
                   $this->load->view('input');
               } else {
                    $config['upload_path'] = 'assets/images/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    
                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('Gambar')){
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                    else{
                        $data = array('upload_data' => $this->upload->data());
                        
                        $data['input'] = array(
                            'Nama' => $this->input->post('Nama'),
                            'Jenis' => $this->input->post('Jenis'),
                            'Merk' => $this->input->post('Merk'),
                            'Ukuran' => $this->input->post('Ukuran'),
                            'Tgl_masuk' => $this->input->post('Tgl_masuk'),
                            'Harga' => $this->input->post('Harga'),
                            'Jumlah' => $this->input->post('Jumlah'),
                            'Gambar' => $this->upload->data('file_name')
                        );
                        
                        $this->Gudang_model->insert_atasan($data['input']);
                        
                        redirect('Welcome/home');
                    }
               }
        }

        public function create_bawahan(){
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('Nama', 'Nama Bawahan', 'required');
            $this->form_validation->set_rules('Jenis', 'Jenis Bawahan', 'required');
            $this->form_validation->set_rules('Merk', 'Merk', 'required');
            $this->form_validation->set_rules('Ukuran', 'Ukuran', 'required');
            $this->form_validation->set_rules('Tgl_masuk', 'Tgl Masuk', 'required');
            $this->form_validation->set_rules('Harga', 'Harga', 'required');
            $this->form_validation->set_rules('Jumlah', 'Jumlah', 'required');

               if ($this->form_validation->run() == FALSE) {
                   $this->load->view('input_bawahan');
               } else {
                    $config['upload_path'] = 'assets/images/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    
                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('Gambar')){
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                    else{
                        $data = array('upload_data' => $this->upload->data());
                        
                        $data['input'] = array(
                            'Nama' => $this->input->post('Nama'),
                            'Jenis' => $this->input->post('Jenis'),
                            'Merk' => $this->input->post('Merk'),
                            'Ukuran' => $this->input->post('Ukuran'),
                            'Tgl_masuk' => $this->input->post('Tgl_masuk'),
                            'Harga' => $this->input->post('Harga'),
                            'Jumlah' => $this->input->post('Jumlah'),
                            'Gambar' => $this->upload->data('file_name')
                        );
                        
                        $this->Gudang_model->insert_bawahan($data['input']);
                        
                        redirect('Welcome/home');
                    }
               }
        }


// ================================update================
	public function edit_atasan()
	{		
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('Nama', 'Nama Atasan', 'required');
        $this->form_validation->set_rules('Jenis', 'Jenis Atasan', 'required');
        $this->form_validation->set_rules('Merk', 'Merk', 'required');
        $this->form_validation->set_rules('Ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('Tgl_masuk', 'Tgl Masuk', 'required');
        $this->form_validation->set_rules('Harga', 'Harga', 'required');
        $this->form_validation->set_rules('Jumlah', 'Jumlah', 'required');

        $id = $this->uri->segment(3);
        $data['atasan'] = $this->Gudang_model->get_atasan_by_id($id);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('update',$data);
        } else {
            $config['upload_path'] = 'assets/images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
                
            $this->load->library('upload', $config);
                
            if ( ! $this->upload->do_upload('Gambar')){
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                }
            else {
            	if(file_exists('./assets/images/'.$data['atasan']['Gambar'])){
					unlink('./assets/images/'.$data['atasan']['Gambar']);
				}else{
					redirect('Welcome/read','refresh');
				}
                $data = array('upload_data' => $this->upload->data());
                    
                $data['input'] = array(
                    'Nama' => $this->input->post('Nama'),
                    'Jenis' => $this->input->post('Jenis'),
                    'Merk' => $this->input->post('Merk'),
                    'Ukuran' => $this->input->post('Ukuran'),
                    'Tgl_masuk' => date("Y/m/d"),
                    'Harga' => $this->input->post('Harga'),
                    'Jumlah' => $this->input->post('Jumlah'),
                    'Gambar' => $this->upload->data('file_name')
                );
                $this->Gudang_model->update_atasan($id, $data['input']);
                    
                redirect('Welcome/read');
                }
            }   
	}

	public function edit_bawahan()
	{		
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('Nama', 'Nama Bawahan', 'required');
        $this->form_validation->set_rules('Jenis', 'Jenis Bawahan', 'required');
        $this->form_validation->set_rules('Merk', 'Merk', 'required');
        $this->form_validation->set_rules('Ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('Tgl_masuk', 'Tgl Masuk', 'required');
        $this->form_validation->set_rules('Harga', 'Harga', 'required');
        $this->form_validation->set_rules('Jumlah', 'Jumlah', 'required');

        $id = $this->uri->segment(3);
        $data['bawahan'] = $this->Gudang_model->get_bawahan_by_id($id);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('update_bawah',$data);
        } else {
            $config['upload_path'] = 'assets/images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
                
            $this->load->library('upload', $config);
                
            if ( ! $this->upload->do_upload('Gambar')){
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                }
            else {
            	if(file_exists('./assets/images/'.$data['bawahan']['Gambar'])){
					unlink('./assets/images/'.$data['bawahan']['Gambar']);
				}else{
					redirect('Welcome/read','refresh');
				}
                $data = array('upload_data' => $this->upload->data());
                    
                $data['input'] = array(
                    'Nama' => $this->input->post('Nama'),
                    'Jenis' => $this->input->post('Jenis'),
                    'Merk' => $this->input->post('Merk'),
                    'Ukuran' => $this->input->post('Ukuran'),
                    'Tgl_masuk' => date("Y/m/d"),
                    'Harga' => $this->input->post('Harga'),
                    'Jumlah' => $this->input->post('Jumlah'),
                    'Gambar' => $this->upload->data('file_name')
                );
                $this->Gudang_model->update_bawahan($id, $data['input']);
                    
                redirect('Welcome/read');
                }
            }   
	}



//========================view data table========================

	public function table(){
		$this->load->view('table');
	}

public function delete_atasan(){
            $id_atasan = $this->uri->segment(3);
            $this->Gudang_model->hapus_atasan($id_atasan);
            redirect('welcome/read','refresh');
        }

public function delete_bawahan(){
            $id_bawahan = $this->uri->segment(3);
            $this->Gudang_model->hapus_bawahan($id_bawahan);
            redirect('welcome/read','refresh');
        }
	
}
