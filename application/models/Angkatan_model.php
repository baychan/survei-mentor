<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Angkatan_model extends CI_Model
{
    private $_table = "t_angkatan"; //nama table

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_angkatan;
    public $angkatan;

    public function rules()
    {
        return [
            ['field' => 'angkatan',
            'label' => 'Angkatan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_angkatan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->angkatan = $post["angkatan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_angkatan = $post["id_angkatan"];
        $this->angkatan = $post["angkatan"];
        $this->db->update($this->_table, $this, array('id_angkatan' => $post['id_angkatan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_angkatan" => $id));
    }
}