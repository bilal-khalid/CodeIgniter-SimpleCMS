<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Model
{
	public function all()
    {
        $query = $this->db->get('settings');
        return $query->result();
    }

    public function prepare()
    {
        $object = new stdClass();
        $settings = $this->Setting->all();
        foreach ($settings as $setting) {
            $object->{$setting->key} = $setting->value;
        }
        return $object;
    }

    public function update($post_data)
    {
        if (empty($post_data)) {
            return false;
        }
        $data = [];
        foreach ($post_data as $key => $value) {
            $data[] = [
                'key' => $key,
                'value' => $value
            ];
        }
        $this->db->update_batch('settings', $data, 'key');
        return $this->db->update_batch('settings', $data, 'key') !== false;
    }
}
