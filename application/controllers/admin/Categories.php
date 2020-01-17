<?php defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category');
    }

	public function index()
	{
        $this->load->library('pagination');

        $data = [];
        $count = $this->Category->count_all();

        $this->config->load('pagination_admin', TRUE);
        $config = $this->config->item('pagination_admin');
        $config['base_url'] = site_url('admin/categories');
        $config['total_rows'] = $this->Category->count_all();

        if ($count > 0) {
            $page = $this->uri->segment(3) ? $this->uri->segment(3) : 1;
            $start = ($page - 1) * $config['per_page'];
            $data['categories'] = $this->Category->all('id', 'desc', $config['per_page'], $start);

            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        }

        $data['main_content'] = 'admin/categories/index';      
		$this->load->view('admin/layouts/main', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');

        if (is_post_request()) {
            $this->set_validation_rules();

            if ($this->form_validation->run() == TRUE) {
                $category_data = $this->get_post_data();
                if ($this->Category->insert($category_data)) {
                    $this->session->set_flashdata('success', 'The category was successfully saved!');
                    redirect('admin/categories');
                } else {
                    $this->session->set_flashdata('error', 'There was an error saving this category. Please try again later!');
                }
            }
        }

        $data['main_content'] = 'admin/categories/add';
		$this->load->view('admin/layouts/main', $data);
    }

    public function edit($id)
    {
        $this->load->library('form_validation');

        $category = $this->Category->get((int)$id);
        if (!$category) {
            show_404();
        }

        if (is_post_request()) {
            $this->set_validation_rules();

            if ($this->form_validation->run() == TRUE) {
                $category_data = $this->get_post_data();
                if ($this->Category->update($category->id, $category_data)) {
                    $this->session->set_flashdata('success', 'The category was successfully saved!');
                    redirect('admin/categories');
                } else {
                    $this->session->set_flashdata('error', 'There was an error saving this category. Please try again later!');
                }
            }
        }

        $data['category'] = $category;
        $data['main_content'] = 'admin/categories/edit';
		$this->load->view('admin/layouts/main', $data);
    }

    public function delete($id)
    {
        if ($this->Category->delete((int)$id)) {
            $this->session->set_flashdata('success', 'The category was successfully deleted!');
        }
        redirect('admin/categories');
    }

    private function set_validation_rules()
    {
        $this->form_validation->set_rules(
            'name', 'Name', 
            'trim|required|min_length[1]|max_length[100]'
        );
    }

    private function get_post_data()
    {
        $post_data = [];
        $post_data['name'] = $this->input->post('name');
        return $post_data;
    }
}
