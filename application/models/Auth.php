<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Model
{
	public function admin_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('group_id', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user) && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }
}
