<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    private $_table = "t_admin"; //nama table

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_admin;
    public $nama_admin;
    public $email_admin;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'nama_admin',
            'label' => 'nama_admin',
            'rules' => 'trims|required|is_unique[t_admin.nama_admin]'],

            ['field' => 'email_admin',
            'label' => 'email_admin',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required']
        ];

        
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_admin" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_admin = $post["nama_admin"];
        $this->email_admin = $post["email_admin"];
        $this->password = $post[md5("password")];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_admin = $post["id_admin"];
        $this->nama_admin = $post["nama_admin"];
        $this->email_admin = $post["email_admin"];
        $this->password = $post["password"];
        $this->db->update($this->_table, $this, array('id_admin' => $post['id_admin']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_admin" => $id));
    }

    public function cek_login($table,$where)
    {
        
        return $this->db->get_where($table,$where);


    }
}