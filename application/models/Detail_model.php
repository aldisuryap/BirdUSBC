<?php defined('BASEPATH') or exit('No direct script access allowed');

class Detail_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('detail_burung')->result();
    }

    public function addData($data)
    {
        return $this->db->insert('detail_burung', $data);
    }

    public function deleteData($data)
    {
        $this->db->where($data);
        $this->db->delete('detail_burung');
    }

    public function getJoin()
    {
        return $this->db->select('*')
            ->from('detail_burung as db')
            ->join('burung as b', 'db.fk_burung = b.id_burung', 'LEFT')
            ->get()->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('detail_burung', ['fk_burung' => $id])->result();
    }

    public function getByIdUsia($id, $usia)
    {
        return $this->db->get_where('detail_burung', ['fk_burung' => $id, 'usia_burung' => $usia])->result();
    }

    public function getRandByIdLimit($id)
    {
        return $this->db->order_by('usia_burung', 'RANDOM')
            ->limit(1)
            ->get_where('detail_burung', ['fk_burung' => $id])->result();
    }

    public function updateData($data, $condition)
    {
        $this->db->where('id_detail_burung', $condition);
        $this->db->update('detail_burung', $data);
    }

    public function getDataLimit($number, $offset)
    {
        return $this->db->limit($number, $offset)->get('detail_burung')->result();
    }

    public function jumlah_data()
    {
        return $this->db->get('detail_burung')->num_rows();
    }
}
