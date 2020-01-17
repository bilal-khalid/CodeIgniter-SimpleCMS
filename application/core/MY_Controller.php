<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->uri->uri_string() !== 'admin/login' && !$this->session->userdata('admin_logged_in')) {
            $this->session->set_flashdata('error', 'Access denied. You need to login first!');
            redirect('admin/login');
        }
    }
}

class Public_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Setting');

        $this->settings = new stdClass();
        foreach ($this->Setting->all() as $setting) {
            $this->settings->{$setting->key} = $setting->value;
        }
    }
}
