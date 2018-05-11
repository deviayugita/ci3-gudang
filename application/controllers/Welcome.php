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



	





// ================================================admin=========================================
    public function index()
    {
        $this->load->view('Admin/index');
    }
// =============================read============================
    public function barang(){
        $data['Barang'] = $this->Gudang_model->get_barang();//ambil data dari Model
        
        $this->load->view('admin/barang', $data);
    }
    public function viewadmin(){
        $data['Admin'] = $this->Gudang_model->get_admin();//ambil data dari Model
        
        $this->load->view('admin/admin', $data);
    }
    public function kategori(){
        $data['Kategori'] = $this->Gudang_model->get_kategori();//ambil data dari Model
        
        $this->load->view('admin/kategori', $data);
    }
// =============================detail===========================
    public function detailbarang(){
        $id_barang = $this->uri->segment(3);
        $data['Barang_list']=$this->Gudang_model->get_barang_by_id($id_barang);
        if(empty($data['Barang_list'])){
            show_404();
        }
        $this->load->view('admin/detailbarang', $data);
    }
    public function detailadmin(){
        $id_admin = $this->uri->segment(3);
        $data['Admin_list']=$this->Gudang_model->get_admin_by_id($id_admin);
        if(empty($data['Admin_list'])){
            show_404();
        }
        $this->load->view('admin/detailadmin', $data);
    }
    public function detailkategori(){
        $id_kategori = $this->uri->segment(3);
        $data['Kategori_list']=$this->Gudang_model->get_kategori_by_id($id_kategori);
        if(empty($data['Kategori_list'])){
            show_404();
        }
        $this->load->view('admin/detailkategori', $data);
    }
// =================================insert============================
     public function insert(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');

        $data['kategori']=$this->Gudang_model->get_kategori();
        $data['admin']=$this->Gudang_model->get_admin();

        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('harga','harga','required');
        $this->form_validation->set_rules('jumlah','jumlah','required');
        $this->form_validation->set_rules('ukuran','ukuran','required');
        $this->form_validation->set_rules('tgl_masuk','tgl_masuk','required');
        $this->form_validation->set_rules('nama','nama','required|is_unique[barang.nama]',
            array(
                'required'      => 'di isi yaa',
                'is_unique'     =>  'nama'.$this->input->post('nama').'sudah di isi'));

        $this->load->model('Gudang_model');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/insert_barang',$data);
        }
        else{
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                }
                else
                {
                        $data = array(
                            'nama'=>$this->input->post('nama'),
                            'id_kategori'=>$this->input->post('id_kategori'),
                            'harga'=> $this->input->post('harga'),
                            'jumlah'=>$this->input->post('jumlah'),
                            'id_admin'=>$this->input->post('id_admin'),
                            'ukuran'=>$this->input->post('ukuran'),
                            'tgl_masuk'=>$this->input->post('tgl_masuk'),
                            'Gambar'=>$this->upload->data('file_name')
                        );
                        $this->Gudang_model->insert_barang($data);
                        redirect('Welcome/admin');
                }
        }
    }

 public function insert_kategori(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');


        // $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('nama','nama','required|is_unique[barang.nama]',
            array(
                'required'      => 'di isi yaa',
                'is_unique'     =>  'nama'.$this->input->post('nama').'sudah di isi'));

        $this->load->model('Gudang_model');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/insert_kategori',$data);
        }
        else{
                
                        $data = array(
                            'nama'=>$this->input->post('nama')
                        );
                        $this->Gudang_model->insert_kategori($data);
                        redirect('Welcome/admin');
                
        }
    }

        public function insert_admin(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('no_telp','no_telp','required');

        $this->form_validation->set_rules('nama','nama','required|is_unique[kategori.nama]',
            array(
                'required'      => 'di isi yaa',
                'is_unique'     =>  'nama'.$this->input->post('nama').'sudah ada'));
        
        
        $this->load->model('Gudang_model');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/insert_admin');
        }
        else{
            
                        $data = array(
                            'nama'=>$this->input->post('nama'),
                            'alamat'=>$this->input->post('alamat'),
                            'no_telp'=>$this->input->post('no_telp')
                        );
                        $this->Gudang_model->insert_admin($data);
                        redirect('Welcome/admin');
            
        }
    }
    // ======================================edit====================================
     public function edit_barang()
    {       
        $this->load->helper('form');
        $this->load->library('form_validation');

         $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('harga','harga','required');
        $this->form_validation->set_rules('jumlah','jumlah','required');
        $this->form_validation->set_rules('ukuran','ukuran','required');
        $this->form_validation->set_rules('tgl_masuk','tgl_masuk','required');

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



    // ================================================delete=========================================
    public function delete_barang(){
            $id_barang = $this->uri->segment(3);
            $this->Gudang_model->hapus_barang($id_barang);
            redirect('Welcome/barang','refresh');
        }
    public function delete_admin(){
            $id_admin = $this->uri->segment(3);
            $this->Gudang_model->hapus_admin($id_admin);
            redirect('Welcome/viewadmin','refresh');
        }
     public function delete_kategori(){
            $id_kategori = $this->uri->segment(3);
            $this->Gudang_model->hapus_kategori($id_kategori);
            redirect('Welcome/kategori','refresh');
        }






















// =======================================================================================

// =================================user=========================================
    public function home()
    {
        $this->load->view('user/index');
    }
    public function about()
    {
        $this->load->view('user/about');
    }
    public function contact()
    {
        $this->load->view('user/contact');
    }
// =============================read============================
    public function readbarang(){
        $data['Barang'] = $this->Gudang_model->get_barang();//ambil data dari Model
        
        $this->load->view('user/view', $data);
    }

// =============================detail===========================
    public function detail_barang(){
        $id_barang = $this->uri->segment(3);
        $data['Barang_list']=$this->Gudang_model->get_barang_by_id($id_barang);
        if(empty($data['Barang_list'])){
            show_404();
        }
        $this->load->view('user/detail', $data);
    }




// ==============================create======================
	// public function create_atasan(){
 //            $this->load->helper('form');
 //            $this->load->library('form_validation');

 //            $this->form_validation->set_rules('Nama', 'Nama Atasan', 'required');
 //            $this->form_validation->set_rules('Jenis', 'Jenis Atasan', 'required');
 //            $this->form_validation->set_rules('Merk', 'Merk', 'required');
 //            $this->form_validation->set_rules('Ukuran', 'Ukuran', 'required');
 //            $this->form_validation->set_rules('Tgl_masuk', 'Tgl Masuk', 'required');
 //            $this->form_validation->set_rules('Harga', 'Harga', 'required');
 //            $this->form_validation->set_rules('Jumlah', 'Jumlah', 'required');

 //               if ($this->form_validation->run() == FALSE) {
 //                   $this->load->view('input');
 //               } else {
 //                    $config['upload_path'] = 'assets/images/';
 //                    $config['allowed_types'] = 'jpg|png|jpeg';
                    
 //                    $this->load->library('upload', $config);
                    
 //                    if ( ! $this->upload->do_upload('Gambar')){
 //                        $error = array('error' => $this->upload->display_errors());
 //                        print_r($error);
 //                    }
 //                    else{
 //                        $data = array('upload_data' => $this->upload->data());
                        
 //                        $data['input'] = array(
 //                            'Nama' => $this->input->post('Nama'),
 //                            'Jenis' => $this->input->post('Jenis'),
 //                            'Merk' => $this->input->post('Merk'),
 //                            'Ukuran' => $this->input->post('Ukuran'),
 //                            'Tgl_masuk' => $this->input->post('Tgl_masuk'),
 //                            'Harga' => $this->input->post('Harga'),
 //                            'Jumlah' => $this->input->post('Jumlah'),
 //                            'Gambar' => $this->upload->data('file_name')
 //                        );
                        
 //                        $this->Gudang_model->insert_atasan($data['input']);
                        
 //                        redirect('Welcome/home');
 //                    }
 //               }
 //        }

   

       



// ================================update================
	// public function edit_atasan()
	// {		
	// 	$this->load->helper('form');
 //        $this->load->library('form_validation');

 //        $this->form_validation->set_rules('Nama', 'Nama Atasan', 'required');
 //        $this->form_validation->set_rules('Jenis', 'Jenis Atasan', 'required');
 //        $this->form_validation->set_rules('Merk', 'Merk', 'required');
 //        $this->form_validation->set_rules('Ukuran', 'Ukuran', 'required');
 //        $this->form_validation->set_rules('Tgl_masuk', 'Tgl Masuk', 'required');
 //        $this->form_validation->set_rules('Harga', 'Harga', 'required');
 //        $this->form_validation->set_rules('Jumlah', 'Jumlah', 'required');

 //        $id = $this->uri->segment(3);
 //        $data['atasan'] = $this->Gudang_model->get_atasan_by_id($id);
 //        if ($this->form_validation->run() == FALSE) {
 //            $this->load->view('update',$data);
 //        } else {
 //            $config['upload_path'] = 'assets/images/';
 //            $config['allowed_types'] = 'jpg|png|jpeg';
                
 //            $this->load->library('upload', $config);
                
 //            if ( ! $this->upload->do_upload('Gambar')){
 //                $error = array('error' => $this->upload->display_errors());
 //                print_r($error);
 //                }
 //            else {
 //            	if(file_exists('./assets/images/'.$data['atasan']['Gambar'])){
	// 				unlink('./assets/images/'.$data['atasan']['Gambar']);
	// 			}else{
	// 				redirect('Welcome/read','refresh');
	// 			}
 //                $data = array('upload_data' => $this->upload->data());
                    
 //                $data['input'] = array(
 //                    'Nama' => $this->input->post('Nama'),
 //                    'Jenis' => $this->input->post('Jenis'),
 //                    'Merk' => $this->input->post('Merk'),
 //                    'Ukuran' => $this->input->post('Ukuran'),
 //                    'Tgl_masuk' => date("Y/m/d"),
 //                    'Harga' => $this->input->post('Harga'),
 //                    'Jumlah' => $this->input->post('Jumlah'),
 //                    'Gambar' => $this->upload->data('file_name')
 //                );
 //                $this->Gudang_model->update_atasan($id, $data['input']);
                    
 //                redirect('Welcome/read');
 //                }
 //            }   
	// }
   


//========================view data table========================

	public function table(){
		$this->load->view('table');
	}

// public function delete_atasan(){
//             $id_atasan = $this->uri->segment(3);
//             $this->Gudang_model->hapus_atasan($id_atasan);
//             redirect('welcome/read','refresh');
//         }

// public function delete_bawahan(){
//             $id_bawahan = $this->uri->segment(3);
//             $this->Gudang_model->hapus_bawahan($id_bawahan);
//             redirect('welcome/read','refresh');
//         }
	
}
