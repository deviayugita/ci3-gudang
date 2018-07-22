<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function register($enc_password){
        // Array data user 
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_tlp' => $this->input->post('no_tlp'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'fk_id_level' => $this->input->post('membership')
        );

        // Insert user
        return $this->db->insert('user', $data);
    }

    // Proses login user
    public function login($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');

        if($result->num_rows() == 1){
            return $result->row(0)->id_user;
        } else {
            return false;
        }
    }

        public function loginAdmin($username, $password){
        // Validasi
        $this->db->where('usr', $username);
        $this->db->where('psw', $password);

        $result = $this->db->get('admin');


        if($result->num_rows() == 1){
            return $result->row(0)->id_admin;
        } else {
            return false;
        }
    }


    // Mendapatkan level user
    function get_user_level($id)
    {
        // Dapatkan data user berdasar $user_id
        $this->db->select('fk_id_level');
        $this->db->where('id_user', $id);

        $result = $this->db->get('user');

        if($result->num_rows() == 1){
            return $result->row(0)->fk_id_level;
        } else {
            return false;
        }
    }

        // Mendapatkan level user
    function get_user_level_admin($id)
    {
        // Dapatkan data user berdasar $user_id
        $this->db->select('fk_id_level');
        $this->db->where('id_admin', $id);

        $result = $this->db->get('admin');

        if($result->num_rows() == 1){
            return $result->row(0)->fk_id_level;
        } else {
            return false;
        }
    }


    function get_user_details($id_user)
    {
        $this->db->join('level', 'level.id_level = user.fk_id_level', 'left');
        $this->db->where('id_user', $id_user);

        $result = $this->db->get('user');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }

    function get_admin_details($id_admin)
    {
        $this->db->join('level', 'level.id_level = admin.fk_id_level', 'left');
        $this->db->where('id_admin', $id_admin);

        $result = $this->db->get('admin');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }

}
