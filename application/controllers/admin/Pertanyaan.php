<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pertanyaan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pertanyaan"] = $this->pertanyaan_model->getAll();
        $this->load->view("admin/pertanyaan/list_pertanyaan", $data);

       //$id_kategori["id_kategori"] = $this->pertanyaan_model->get_id_kategori();
       //$this->load->view("admin/pertanyaan/new_pertanyaan", $id_kategori);
       //echo "<pre>";
        //print_r($id_kategori["id_kategori"]);
        //die;

        //$id_survey["id_survey"] = $this->pertanyaan_model->get_id_survey();
        //$this->load->view("admin/pertanyaan/new_pertanyaan", $id_survey);
          
    }

    public function add()
    {
        $pertanyaan = $this->pertanyaan_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($pertanyaan->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $pertanyaan->save();  //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
        }

        $id_sk["id_survey"] = $this->pertanyaan_model->get_id_survey();
        $id_sk["id_kategori"] = $this->pertanyaan_model->get_id_kategori();
       
        $this->load->view("admin/pertanyaan/new_pertanyaan", $id_sk);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pertanyaan');
       
        $pertanyaan = $this->pertanyaan_model; //object model
        $validation = $this->form_validation; // object form validation
        $validation->set_rules($pertanyaan->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $pertanyaan->update(); //update data di database
            $this->session->set_flashdata('success', 'Berhasil diupdate'); //tampilkan pesan berhasil
        }

        $data["pertanyaan"] = $pertanyaan->getById($id); //mengambil data untuk di tampilkan pada form
        if (!$data["pertanyaan"]) show_404(); // jika tidak ada,tampilkan eror 404
        $data["id_survey"] = $this->pertanyaan_model->get_id_survey();
        $data["id_kategori"] = $this->pertanyaan_model->get_id_kategori();
        
        $this->load->view("admin/pertanyaan/edit_pertanyaan", $data); //menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pertanyaan_model->delete($id)) {
            redirect(site_url('admin/pertanyaan'));
        }
    }

    /////////////////////////////////


}