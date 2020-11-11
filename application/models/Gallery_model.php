<?php defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('gallery_burung')->result();
	}

	public function getById($id)
	{
		return $this->db->get_where('gallery_burung', ['fk_detail_burung' => $id])->result();
	}

	public function getJoin()
	{
		return $this->db->select('*')
			->from('gallery_burung as gb')
			->join('detail_burung as db', 'gb.fk_detail_burung = db.id_detail_burung', 'LEFT')
			->join('burung as b', 'b.id_burung = db.fk_burung', 'LEFT')
			->get()->result_array();
	}

	public function getJoinById($id)
	{
		return $this->db->select('*')
			->from('gallery_burung as gb')
			->join('detail_burung as db', 'gb.fk_detail_burung = db.id_detail_burung', 'LEFT')
			->join('burung as b', 'b.id_burung = db.fk_burung', 'LEFT')
			->where('gb.fk_detail_burung', $id)
			->get()->result_array();
	}

	public function getRandByLimit()
	{
		return $this->db->order_by('fk_detail_burung', 'RANDOM')
			->limit(4)
			->get('gallery_burung')->result();
	}

	public function addData($data)
	{
		return $this->db->insert('gallery_burung', $data);
	}

	public function deleteData($data)
	{
		$this->db->where($data);
		$this->db->delete('gallery_burung');
	}
}
