<?php defined('BASEPATH') or exit('No direct script access allowed');

class Burung_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('burung')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('burung', ['id_burung' => $id])->result();
    }

    public function getDataLimit($number, $offset)
    {
        return $this->db->limit($number, $offset)->get('burung')->result();
    }

    public function addData($data)
    {
        return $this->db->insert('burung', $data);
    }

    public function deleteData($data)
    {
        $this->db->where($data);
        $this->db->delete('burung');
    }

    public function updateData($data, $condition)
    {
        $this->db->where('id_burung', $condition);
        $this->db->update('burung', $data);
    }

    public function jumlah_data()
    {
        return $this->db->get('burung')->num_rows();
    }
}
