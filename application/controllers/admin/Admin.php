<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    //private $_ci;
    public function __construct()
    {
        parent::__construct();
    //     $this->_ci =& get_instance();
    //     $this->_ci->load->model('Admin_model');
    $this->db = $this->load->database('default', true); 
         $this->load->model("Admin_model");
        $this->load->library('form_validation');

        if(!$this->session->userdata('status')){
			redirect(base_url("admin/admin"));
        }
        else{
            //redirect(base_url("admin/overview"));
        }
    }

    public function index()
    {
        $admin["admin"] = $this->Admin_model->getAll();
        $this->load->view("admin/admin-manage/login", $admin);
    }

    function dologin()
    {
        $email = $this->input->post('email_admin');
        $password = $this->input->post('password');
        $where = array(
            'email_admin' => $email,
            'password' => $password
        );

        $cek = $this->Admin_model->cek_login("t_admin",$where)->num_rows();
        if($cek > 0){
            $data_session = array(
                'email_admin' => $email,
                'status' => "login"
                
            );

            $this->session->set_userdata($data_session);

            redirect(base_url("admin/overview"));
        }

        else{
            echo "Email dan password salah !";
        }
    }

    function logout()
    {
        //$this->session->sess_destroy();
        session_destroy();
        redirect(base_url('admin/admin'));
    }

    public function add()
    {
        $admin = $this->Admin_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($admin->rules()); // terapkan rules

        $validation->set_message('is_unique', 'Data tak boleh redundant');

        if ($validation->run()) { //melakukan validasi
            $admin->save();  //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
        }

        $this->load->view("admin/admin-manage/new_admin"); //tampilkan form add
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/admin-manage');
       
        $admin = $this->Admin_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($admin->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $admin->update(); //update data di database
            $this->session->set_flashdata('success', 'Berhasil diupdate'); //tampilkan pesan berhasil
        }

        $data["admin"] = $admin->getById($id); //mengambil data untuk di tampilkan pada form
        if (!$data["admin"]) show_404(); // jika tidak ada,tampilkan eror 404
        
        $this->load->view("admin/admin-manage/edit_admin", $data); //menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Admin_model->delete($id)) {
            redirect(site_url('admin/admin'));
        }
    }
}