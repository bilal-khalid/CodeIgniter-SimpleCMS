<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Model
{
    public function insert(array $data)
    {
        $this->db->set($data);
        return $this->db->insert('categories');
    }

    public function get(int $id)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

	public function all(string $orderby = 'id', string $direction = 'asc', $limit = null, $start = 0)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->order_by($orderby, $direction);
        if ($limit) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all() {
        return $this->db->count_all('categories');
    }

    public function update(int $id, array $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('categories');
    }

    public function delete(int $id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('categories');
    }
}
