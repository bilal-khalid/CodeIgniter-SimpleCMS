<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    public $user_groups = [
        '1' => 'Admins',
        '2' => 'Users'
    ];

    public function insert(array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = $this->hash_password($data['password']);
        }
        $this->db->set($data);
        return $this->db->insert('users');
    }

    public function get(int $id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

	public function all(string $orderby = 'id', string $direction = 'asc', $limit = null, $start = 0)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by($orderby, $direction);
        if ($limit) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all() {
        return $this->db->count_all('users');
    }

    public function update(int $id, array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = $this->hash_password($data['password']);
        }
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('users');
    }

    public function delete(int $id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    private function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
