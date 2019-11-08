<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model
{
    private $_table = "t_pertanyaan"; //nama table

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_pertanyaan;
    public $id_kategori;
    public $id_survey;
    public $pertanyaan;
    public $tanggal;

    public function rules()
    {
        return [
            ['field' => 'id_kategori',
            'label' => 'Id_kategori',
            'rules' => 'required'],

            ['field' => 'id_survey',
            'label' => 'Id_survey',
            'rules' => 'required'],

            ['field' => 'pertanyaan',
            'label' => 'Pertanyaan',
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
        return $this->db->get_where($this->_table, ["id_pertanyaan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kategori = $post["id_kategori"];
        $this->id_survey = $post["id_survey"];
        $this->pertanyaan = $post["pertanyaan"];
        $this->tanggal = $post["tanggal"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pertanyaan = $post["id_pertanyaan"];
        $this->id_kategori = $post["id_kategori"];
        $this->id_survey = $post["id_survey"];
        $this->pertanyaan = $post["pertanyaan"];
        $this->tanggal = $post["tanggal"];
        $this->db->update($this->_table, $this, array('id_pertanyaan' => $post['id_pertanyaan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pertanyaan" => $id));
    }
    
    /////////////////////////////////////////////////////////////////////////////

    public function get_id_kategori()
    {
        $hasil = $this->db->get('t_kategori')->result();
        return $hasil;
    }

    public function get_id_survey()
    {
        $hasil = $this->db->get('t_survey')->result();
        return $hasil;
    }
}