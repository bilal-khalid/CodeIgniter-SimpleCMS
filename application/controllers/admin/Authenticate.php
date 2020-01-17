<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authenticate extends Admin_Controller
{
    public function login()
	{
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }

        $this->load->model('Auth');
        $this->load->library('form_validation');

        if (is_post_request()) {
            $this->form_validation->set_rules(
                'username', 'Username', 
                'trim|required|alpha_numeric|min_length[2]|max_length[100]'
            );
            $this->form_validation->set_rules(
                'password', 'Password', 
                'required|min_length[6]'
            );

            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $user = $this->Auth->admin_login($username, $password);
                if (!empty($user)) {
                    $this->session->set_userdata([
                        'admin_user_id'   => $user->id,
                        'admin_username'  => $user->username,
                        'admin_logged_in' => true
                    ]);
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Sorry, the login info that you entered is invalid');
                }
            }
        }

		$data['main_content'] = 'admin/authenticate/login';
		$this->load->view('admin/layouts/centered', $data);
    }

    public function logout()
    {
		$this->session->unset_userdata('admin_user_id');
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_logged_in');
        $this->session->sess_destroy();

        redirect('admin/login');
	}
}
