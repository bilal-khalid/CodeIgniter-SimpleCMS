<?php defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Model
{
    public function insert(array $data)
    {
        $this->db->set($data);
        return $this->db->insert('articles');
    }

    public function get(int $id)
    {
        $this->db->select('a.*, c.name as category, CONCAT(u.first_name, " ", u.last_name) AS user');
        $this->db->from('articles as a');
        $this->db->join('categories as c', 'a.category_id = c.id', 'LEFT');
        $this->db->join('users as u', 'a.user_id = u.id', 'LEFT');
        $this->db->where('a.id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

	public function all(string $orderby = 'id', string $direction = 'asc', $limit = null, $start = 0)
    {
        $this->db->select('a.*, c.name as category, CONCAT(u.first_name, " ", u.last_name) AS user');
        $this->db->from('articles as a');
        $this->db->join('categories as c', 'a.category_id = c.id', 'LEFT');
        $this->db->join('users as u', 'a.user_id = u.id', 'LEFT');
        $this->db->order_by($orderby, $direction);
        if (!is_null($limit)) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all() {
        return $this->db->count_all('articles');
    }

    public function update(int $id, array $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('articles');
    }

    public function delete(int $id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('articles');
    }
}
