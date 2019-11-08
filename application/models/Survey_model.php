<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_model extends CI_Model
{
    private $_table = "t_survey"; //nama table

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_survey;
    public $id_angkatan;
    public $nama_survey;
    public $deskripsi;
    public $tanggal;

    public function rules()
    {
        return [
            ['field' => 'id_angkatan',
            'label' => 'ID_angkatan',
            'rules' => 'required'],

             ['field' => 'nama_survey',
            'label' => 'Nama_survey',
            'rules' => 'required'],

             ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required'],

             ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_survey" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_angkatan = $post["id_angkatan"];
        $this->nama_survey = $post["nama_survey"];
        $this->deskripsi = $post["deskripsi"];
        $this->tanggal = $post["tanggal"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_survey = $post["id_survey"];
        $this->id_angkatan = $post["id_angkatan"];
        $this->nama_survey = $post["nama_survey"];
        $this->deskripsi = $post["deskripsi"];
        $this->tanggal = $post["tanggal"];
        $this->db->update($this->_table, $this, array('id_survey' => $post['id_survey']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_survey" => $id));
    }

    ////////

     public function get_id_angkatan()
    {
        $hasil = $this->db->get('t_angkatan')->result();
        return $hasil;
    }
}