<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article');
        $this->load->helper('text');
    }

    public function index()
    {
        $this->load->library('pagination');

        $data = [];
        $count = $this->Article->count_all();

        $this->config->load('pagination', TRUE);
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('articles');
        $config['total_rows'] = $this->Article->count_all();

        if ($count > 0) {
            $page = $this->uri->segment(2) ? $this->uri->segment(2) : 1;
            $start = ($page - 1) * $config['per_page'];
            $data['articles'] = $this->Article->all('id', 'desc', $config['per_page'], $start);

            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        }

        $data['main_content'] = 'articles/index';
		$this->load->view('layouts/main', $data);
    }

	public function view($id)
	{
        $article = $this->Article->get((int)$id);
        if (!$article) {
            show_404();
        }

        $data['article'] = $article;
        $data['main_content'] = 'articles/view';
		$this->load->view('layouts/main', $data);
	}
}
