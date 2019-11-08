<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mentor_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["mentor"] = $this->mentor_model->getAll();
        $this->load->view("admin/mentor/list_mentor", $data);
    }

    public function add()
    {
        $mentor = $this->mentor_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($mentor->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $mentor->save();  //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
        }

        $this->load->view("admin/mentor/new_mentor"); //tampilkan form add
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/mentor');
       
        $mentor = $this->mentor_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($mentor->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $mentor->update(); //update data di database
            $this->session->set_flashdata('success', 'Berhasil diupdate'); //tampilkan pesan berhasil
        }

        $data["mentor"] = $mentor->getById($id); //mengambil data untuk di tampilkan pada form
        if (!$data["mentor"]) show_404(); // jika tidak ada,tampilkan eror 404
        
        $this->load->view("admin/mentor/edit_mentor", $data); //menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mentor_model->delete($id)) {
            redirect(site_url('admin/mentor'));
        }
    }
}