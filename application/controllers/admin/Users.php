<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

	public function index()
	{
        $this->load->library('pagination');

        $data = [];
        $count = $this->User->count_all();

        $this->config->load('pagination_admin', TRUE);
        $config = $this->config->item('pagination_admin');
        $config['base_url'] = site_url('admin/users');
        $config['total_rows'] = $this->User->count_all();

        if ($count > 0) {
            $page = $this->uri->segment(3) ? $this->uri->segment(3) : 1;
            $start = ($page - 1) * $config['per_page'];
            $data['users'] = $this->User->all('id', 'desc', $config['per_page'], $start);

            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        }

        $data['main_content'] = 'admin/users/index';      
		$this->load->view('admin/layouts/main', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');

        if (is_post_request()) {
            $this->set_validation_rules(true);

            if ($this->form_validation->run() == TRUE) {
                $user_data = $this->get_post_data();
                if ($this->User->insert($user_data)) {
                    $this->session->set_flashdata('success', 'The user was successfully saved!');
                    redirect('admin/users');
                } else {
                    $this->session->set_flashdata('error', 'There was an error saving this user. Please try again later!');
                }
            }
        }

        $data['users'] = $this->User->all();
        $data['main_content'] = 'admin/users/add';
		$this->load->view('admin/layouts/main', $data);
    }

    public function edit($id)
    {
        $this->load->library('form_validation');

        $user = $this->User->get((int)$id);
        if (!$user) {
            show_404();
        }

        if (is_post_request()) {
            $this->set_validation_rules(false);

            if ($this->form_validation->run() == TRUE) {
                $user_data = $this->get_post_data();
                if ($this->User->update($user->id, $user_data)) {
                    $this->session->set_flashdata('success', 'The user was successfully saved!');
                    redirect('admin/users');
                } else {
                    $this->session->set_flashdata('error', 'There was an error saving this user. Please try again later!');
                }
            }
        }

        $data['user'] = $user;
        $data['main_content'] = 'admin/users/edit';
		$this->load->view('admin/layouts/main', $data);
    }

    public function delete($id)
    {
        if ($this->User->delete((int)$id)) {
            $this->session->set_flashdata('success', 'The user was successfully deleted!');
        }
        redirect('admin/users');
    }

    private function set_validation_rules(bool $require_password = true)
    {
        $this->form_validation->set_rules(
            'first_name', 'First Name', 
            'trim|required|min_length[1]|max_length[100]'
        );
        $this->form_validation->set_rules(
            'last_name', 'Last Name', 
            'trim|required|min_length[1]|max_length[100]'
        );
        $this->form_validation->set_rules(
            'username', 'Username', 
            'trim|required|alpha_numeric|min_length[2]|max_length[100]'
        );
        $this->form_validation->set_rules(
            'email', 'Email', 
            'trim|required|min_length[1]|max_length[100]'
        );
        $this->form_validation->set_rules(
            'password', 'Password', 
            ($require_password ? 'required|' : '') . 'min_length[6]'
        );
        $this->form_validation->set_rules(
            'confirm_password', 'Confirm Password', 
            ($require_password ? 'required|' : '') . 'matches[password]'
        );
        $this->form_validation->set_rules(
            'group_id', 'Group', 
            'required'
        );
    }

    private function get_post_data(bool $require_password = true)
    {
        $post_data = [];
        $post_data['first_name'] = $this->input->post('first_name');
        $post_data['last_name'] = $this->input->post('last_name');
        $post_data['username'] = $this->input->post('username');
        $post_data['email'] = $this->input->post('email');
        if ($require_password) {
            $post_data['password'] = $this->input->post('password');
        } elseif (!empty($this->input->post('password'))) {
            $post_data['password'] = $this->input->post('password');
        }
        $post_data['group_id'] = $this->input->post('group_id');
        return $post_data;
    }
}
