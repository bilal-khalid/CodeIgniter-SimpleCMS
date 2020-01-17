<?php defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends Admin_Controller
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
        $this->load->library('pagination');

        $data = [];
        $count = $this->Article->count_all();

        $this->config->load('pagination_admin', TRUE);
        $config = $this->config->item('pagination_admin');
        $config['base_url'] = site_url('admin/articles');
        $config['total_rows'] = $this->Article->count_all();

        if ($count > 0) {
            $page = $this->uri->segment(3) ? $this->uri->segment(3) : 1;
            $start = ($page - 1) * $config['per_page'];
            $data['articles'] = $this->Article->all('id', 'desc', $config['per_page'], $start);

            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        }

        $data['main_content'] = 'admin/articles/index';      
		$this->load->view('admin/layouts/main', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');

        if (is_post_request()) {
            $this->set_validation_rules();

            if ($this->form_validation->run() == TRUE) {
                $article_data = $this->get_post_data();
                if ($this->Article->insert($article_data)) {
                    $this->session->set_flashdata('success', 'The article was successfully saved!');
                    redirect('admin/articles');
                } else {
                    $this->session->set_flashdata('error', 'There was an error saving this article. Please try again later!');
                }
            }
        }

        $data['categories'] = $this->Category->all();
        $data['users'] = $this->User->all();
        $data['main_content'] = 'admin/articles/add';
		$this->load->view('admin/layouts/main', $data);
    }

    public function edit($id)
    {
        $this->load->library('form_validation');

        $article = $this->Article->get((int)$id);
        if (!$article) {
            show_404();
        }

        if (is_post_request()) {
            $this->set_validation_rules();

            if ($this->form_validation->run() == TRUE) {
                $article_data = $this->get_post_data();
                if ($this->Article->update($article->id, $article_data)) {
                    $this->session->set_flashdata('success', 'The article was successfully saved!');
                    redirect('admin/articles');
                } else {
                    $this->session->set_flashdata('error', 'There was an error saving this article. Please try again later!');
                }
            }
        }

        $data['article'] = $article;
        $data['categories'] = $this->Category->all();
        $data['users'] = $this->User->all();
        $data['main_content'] = 'admin/articles/edit';
		$this->load->view('admin/layouts/main', $data);
    }

    public function delete($id)
    {
        if ($this->Article->delete((int)$id)) {
            $this->session->set_flashdata('success', 'The article was successfully deleted!');
        }
        redirect('admin/articles');
    }

    private function set_validation_rules()
    {
        $this->form_validation->set_rules(
            'title', 'Title', 
            'trim|required|min_length[3]|max_length[255]'
        );
        $this->form_validation->set_rules(
            'body', 'Body', 
            'trim|required|min_length[3]'
        );
        $this->form_validation->set_rules(
            'category_id', 'Category', 
            'required'
        );
        $this->form_validation->set_rules(
            'user_id', 'Author', 
            'required'
        );
        $this->form_validation->set_rules(
            'access', 'Access', 
            'required'
        );
        $this->form_validation->set_rules(
            'is_published', 'Published', 
            'required'
        );
    }

    private function get_post_data()
    {
        $post_data = [];
        $post_data['category_id'] = $this->input->post('category_id');
        $post_data['user_id'] = $this->input->post('user_id');
        $post_data['title'] = $this->input->post('title');
        $post_data['body'] = $this->input->post('body');
        $post_data['access'] = $this->input->post('access');
        $post_data['is_published'] = $this->input->post('is_published');
        return $post_data;
    }
}
