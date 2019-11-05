<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Angkatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("angkatan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["angkatan"] = $this->angkatan_model->getAll();
        $this->load->view("admin/angkatan/list_angkatan", $data);
    }

    public function add()
    {
        $angkatan = $this->angkatan_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($angkatan->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $angkatan->save();  //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
        }

        $this->load->view("admin/angkatan/new_angkatan"); //tampilkan form add
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/angkatan');
       
        $angkatan = $this->angkatan_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($angkatan->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $angkatan->update(); //update data di database
            $this->session->set_flashdata('success', 'Berhasil diupdate'); //tampilkan pesan berhasil
        }

        $data["angkatan"] = $angkatan->getById($id); //mengambil data untuk di tampilkan pada form
        if (!$data["angkatan"]) show_404(); // jika tidak ada,tampilkan eror 404
        
        $this->load->view("admin/angkatan/edit_angkatan", $data); //menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->angkatan_model->delete($id)) {
            redirect(site_url('admin/angkatan'));
        }
    }
}