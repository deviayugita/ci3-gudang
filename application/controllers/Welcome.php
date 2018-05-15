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
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->model('Admin_model');
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

        $limit_per_page = 6;

        // URI segment untuk mendeteksi "halaman ke berapa" dari URL
        $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

        // Dapatkan jumlah data 
        $total_records = $this->Barang_model->get_total();
        
        if ($total_records > 0) {
            // Dapatkan data pada halaman yg dituju
            $data["Barang"] = $this->Barang_model->get_all_barang($limit_per_page, $start_index);
            
            // Konfigurasi pagination
            $config['base_url'] = base_url() . 'Welcome/barang';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
                
            // Buat link pagination
            $data["links"] = $this->pagination->create_links();
        }
        // $data['Barang'] = $this->Gudang_model->get_barang();//ambil data dari Model
        
        $this->load->view('admin/barang', $data);
    }







    public function viewadmin(){
        $limit_per_page = 6;

        // URI segment untuk mendeteksi "halaman ke berapa" dari URL
        $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

        // Dapatkan jumlah data 
        $total_records = $this->Admin_model->get_total();
        
        if ($total_records > 0) {
            // Dapatkan data pada halaman yg dituju
            $data["Admin"] = $this->Admin_model->get_all_admin($limit_per_page, $start_index);
            
            // Konfigurasi pagination
            $config['base_url'] = base_url() . 'welcome/admin';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
                
            // Buat link pagination
            $data["links"] = $this->pagination->create_links();
        }
        // $data['Admin'] = $this->Gudang_model->get_admin();//ambil data dari Model
        
        $this->load->view('admin/admin', $data);
    }
    public function kategori(){
        $limit_per_page = 6;

        // URI segment untuk mendeteksi "halaman ke berapa" dari URL
        $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

        // Dapatkan jumlah data 
        $total_records = $this->Kategori_model->get_total();
        
        if ($total_records > 0) {
            // Dapatkan data pada halaman yg dituju
            $data["Kategori"] = $this->Kategori_model->get_all_kategori($limit_per_page, $start_index);
            
            // Konfigurasi pagination
            $config['base_url'] = base_url() . 'welcome/kategori';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
                
            // Buat link pagination
            $data["links"] = $this->pagination->create_links();
        }
        // $data['Kategori'] = $this->Gudang_model->get_kategori();//ambil data dari Model
        
        $this->load->view('admin/kategori', $data);
    }
// =============================detail===========================
    public function detailbarang(){
        $id_barang = $this->uri->segment(3);
        $data['Barang_list']=$this->Gudang_model->get_barang_by_id($id_barang);
        // $data['Barang_list'] = $this->Gudang_model->get_kat_by_id($id_barang);
        // $data['Barang_list'] = $this->Gudang_model->get_ad_by_id($id_barang);
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
     public function insert($id = NULL){
        $this->load->helper('url','form');
        $this->load->library('form_validation');

        $data['Barang'] = $this->Gudang_model->get_barang_by_id($id);
       
        $data['dropdown_kategori'] = $this->Gudang_model->dropdown_kategori();
        $data['dropdown_admin'] = $this->Gudang_model->dropdown_admin();
        $data['dropdown_ukuran'] = $this->Gudang_model->dropdown_ukuran();

        $this->form_validation->set_rules('nama','nama','required|is_unique[barang.nama]',
            array(
                'required'      => ' %s di isi yaa',
                'is_unique'     =>  'nama'.$this->input->post('nama').'sudah di isi'));

        $this->form_validation->set_rules('kategori','kategori','required',
            array('required'      => ' %s di isi yaa'));
        $this->form_validation->set_rules('harga','harga','required',
            array('required'      => ' %s di isi yaa'));
        $this->form_validation->set_rules('jumlah','jumlah','required',
            array('required'      => '%s di isi yaa'));
        $this->form_validation->set_rules('admin','admin','required',
            array('required'      => '%s di isi yaa'));
        $this->form_validation->set_rules('ukuran','ukuran','required',
            array('required'      => '%s di isi yaa'));
        $this->form_validation->set_rules('tgl_masuk','tgl_masuk','required',
            array('required'      => '%s di isi yaa'));

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('admin/insert_barang', $data);

        } else {

            if ( isset($_FILES['image']) && $_FILES['image']['size'] > 0 )
            {
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;


                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                    $data['upload_error'] = $this->upload->display_errors();

                    print_r($data['upload_error']);

                    // $this->load->view('admin/insert_barang', $data);
                } else {
                    $img_data = $this->upload->data();
                    $image = $img_data['file_name'];
                    
                }
            } else {
                $image = '';
            }
                        $post_data = array(
                            'nama' => $this->input->post('nama'),
                            'id_kategori' => $this->input->post('id_kategori'),
                            'harga' => $this->input->post('harga'),
                            'jumlah' => $this->input->post('jumlah'),
                            'id_ukuran' => $this->input->post('id_ukuran'),
                            'id_admin' => $this->input->post('id_admin'),
                            'tgl_masuk' => $this->input->post('tgl_masuk'),
                            'Gambar'=>$this->upload->data('file_name')
                        );
                        if( empty($data['upload_error']) ) {
                $this->Gudang_model->insert_barang($post_data);
                redirect('Welcome/barang');
            
                }
        }
    }

 public function insert_kategori(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');


        // $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('nama_kategori','nama','required|is_unique[kategori.nama_kategori]',
            array(
                'required'      => '%s di isi yaa',
                'is_unique'     =>  'nama '.$this->input->post('nama_kategori').' sudah di isi'));

        $this->load->model('Gudang_model');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/insert_kategori');
        }
        else{
                
                        $data = array(
                            'nama_kategori'=>$this->input->post('nama_kategori')
                        );
                        $this->Gudang_model->insert_kategori($data);
                        redirect('Welcome/kategori');       
        }
    }

        public function insert_admin(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_admin','nama','required|is_unique[admin.nama_admin]',
            array(
                'required'      => '%s di isi yaa',
                'is_unique'     =>  'nama'.$this->input->post('nama_admin').'sudah ada'));

        $this->form_validation->set_rules('alamat','alamat','required',
            array('required'      => '%s di isi yaa'));

        $this->form_validation->set_rules('no_telp','no telp','required',
            array('required'      => '%s di isi yaa'));
        
        
        $this->load->model('Gudang_model');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/insert_admin');
        }
        else{
            
                        $data = array(
                            'nama_admin'=>$this->input->post('nama_admin'),
                            'alamat'=>$this->input->post('alamat'),
                            'no_telp'=>$this->input->post('no_telp')
                        );
                        $this->Gudang_model->insert_admin($data);
                        redirect('Welcome/viewadmin');
            
        }
    }
    // ======================================edit====================================

    public function edit_barang($id = NULL)
    {
        $data['Barang'] = $this->Gudang_model->get_barang_by_id($id);
        if ( empty($id) || !$data['Barang'] ) redirect('welcome');
       
        $data['dropdown_kategori'] = $this->Gudang_model->dropdown_kategori();
        $data['dropdown_admin'] = $this->Gudang_model->dropdown_admin();
        $data['dropdown_ukuran'] = $this->Gudang_model->dropdown_ukuran();

        // $old_image = $data['Barang']->Gambar;
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('nama', 'Nama', 'required',
            array('required'      => 'Silahkan isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('harga', 'Harga', 'required',
            array('required' => 'Silahkan isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required',
            array('required' => 'Silahkan isi %s terlebih dahulu.'));

        

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('admin/update_barang', $data);

        } else {

            if ( isset($_FILES['Gambar']) && $_FILES['Gambar']['size'] > 0 )
            {
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('Gambar'))
                {
                    $data['upload_error'] = $this->upload->display_errors();

                    $Gambar = '';

                    $this->load->view('admin/update_barang', $data);

                } else {

                    if( !empty($old_image) ) {
                        if ( file_exists( './assets/images/'.$old_image ) ){
                            unlink( './assets/images/'.$old_image );
                        } else {
                            echo 'File tidak ditemukan.';
                        }
                    }

                    $img_data = $this->upload->data();
                    $Gambar = $img_data['file_name'];
                    
                }
            } else {

                $Gambar = ( !empty($old_image) ) ? $old_image : '';

            }

            $post_data = array(
                'nama' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'jumlah' => $this->input->post('jumlah'),
                'id_ukuran' => $this->input->post('id_ukuran'),
                'id_admin' => $this->input->post('id_admin'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'Gambar' => $Gambar,
                
            );

            if( empty($data['upload_error']) ) {

                $this->Gudang_model->update_barang($post_data, $id);
                redirect('Welcome/barang');
            }
        }
    }



    public function edit_kategori($id = NULL)
    {

        $data['Kategori'] = $this->Kategori_model->get_kategori_by_id($id);
    
        if ( empty($id) || !$data['Kategori'] ) redirect('welcome/kategori');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required',
            array('required'      => 'Silahkan isi %s terlebih dahulu.'));

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('admin/update_kategori', $data);
        } else {

            $post_data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
            );

                if($this->Kategori_model->update_kategori($post_data, $id)){
                redirect('welcome/kategori', $data);
            }
            }
        
    }

    public function edit_admin($id = NULL)
    {

        $data['Admin'] = $this->Admin_model->get_admin_by_id($id);
    
        if ( empty($id) || !$data['Admin'] ) redirect('welcome/viewadmin');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required',
            array('required'      => 'Silahkan isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',
            array('required'      => 'Silahkan isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required',
            array('required'      => 'Silahkan isi %s terlebih dahulu.'));

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('admin/update_admin', $data);
        } else {

            $post_data = array(
                'nama_admin' => $this->input->post('nama_admin'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
            );

                if($this->Admin_model->update_admin($post_data, $id)){
                redirect('welcome/viewadmin');
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
        $limit_per_page = 6;

        // URI segment untuk mendeteksi "halaman ke berapa" dari URL
        $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

        // Dapatkan jumlah data 
        $total_records = $this->Gudang_model->get_total();
        
        if ($total_records > 0) {
            // Dapatkan data pada halaman yg dituju
            $data["Barang"] = $this->Gudang_model->get_all_barang($limit_per_page, $start_index);

            
            // Konfigurasi pagination
            $config['base_url'] = base_url() . 'welcome/readbarang';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
                
            // Buat link pagination
            $data["links"] = $this->pagination->create_links();
        }

        // $data['Barang'] = $this->Gudang_model->get_barang();//ambil data dari Model
        
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
