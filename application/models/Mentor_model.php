<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor_model extends CI_Model
{
    private $_table = "t_mentor"; //nama table

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_mentor;
    public $nama;
    public $nip;
    public $jabatan;
    public $email;
    public $no_hp;
    public $status;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'nip',
            'label' => 'NIP',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'label' => 'No_hp',
            'rules' => 'required'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_mentor" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->nip = $post["nip"];
        $this->jabatan = $post["jabatan"];
        $this->email = $post["email"];
        $this->no_hp = $post["no_hp"];
        $this->status = $post["status"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_mentor = $post["id_mentor"];
        $this->nama = $post["nama"];
        $this->nip = $post["nip"];
        $this->jabatan = $post["jabatan"];
        $this->email = $post["email"];
        $this->no_hp = $post["no_hp"];
        $this->status = $post["status"];
        $this->db->update($this->_table, $this, array('id_mentor' => $post['id_mentor']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_mentor" => $id));
    }
}