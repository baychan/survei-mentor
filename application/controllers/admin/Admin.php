<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->library('form_validation');
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
            'password' => md5($password)
        );

        $cek = $this->admin_model->cek_login("admin",$where);
        if($cek > 0){
            $data_session = array(
                'email_admin' => $email,
                'status' => "login"
                
            );

            $this->session->set_userdata($data_session);

            redirect(base_url("admin"));
        }

        else{
            echo "Username dan passwrd salah !";
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function add()
    {
        $admin = $this->Admin_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($admin->rules()); // terapkan rules

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