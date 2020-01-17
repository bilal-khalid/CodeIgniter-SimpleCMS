<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article');
        $this->load->model('Category');
        $this->load->model('User');
    }

	public function index()
	{
        $data['articles'] = $this->Article->all('id', 'desc', 5);
        $data['categories'] = $this->Category->all('id', 'desc', 5);
        $data['users'] = $this->User->all('id', 'desc', 5);
        
		$data['main_content'] = 'admin/dashboard/index';
		$this->load->view('admin/layouts/main', $data);
    }
}
/*
database, session, form_validation
form, html, url, text
user_model, article_model, settings_model, authenticate_model
*/