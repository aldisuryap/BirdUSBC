<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('user')->result();
    }

    public function getByData($role)
    {
        return $this->db->get_where('user', $role);
    }

    public function addData($data)
    {
        return $this->db->insert('user', $data);
    }
}
