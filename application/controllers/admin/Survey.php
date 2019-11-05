<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("survey_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["survey"] = $this->angkatan_model->getAll();
        $this->load->view("admin/survey/list_survey", $data);
    }

    public function add()
    {
        $survey = $this->survey_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($survey->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $survey->save();  //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
        }

        $this->load->view("admin/survey/new_survey"); //tampilkan form add
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/survey');
       
        $survey = $this->survey_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($survey->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $survey->update(); //update data di database
            $this->session->set_flashdata('success', 'Berhasil diupdate'); //tampilkan pesan berhasil
        }

        $data["survey"] = $survey->getById($id); //mengambil data untuk di tampilkan pada form
        if (!$data["survey"]) show_404(); // jika tidak ada,tampilkan eror 404
        
        $this->load->view("admin/survey/edit_survey", $data); //menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->survey_model->delete($id)) {
            redirect(site_url('admin/survey'));
        }
    }
}