<?php defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting');
    }

	public function index()
	{
        $this->load->library('form_validation');

        if (is_post_request()) {
            $this->form_validation->set_rules('site_title', 'Site Title', 'trim|required');
            $this->form_validation->set_rules('site_description', 'Site Description', 'trim');
            $this->form_validation->set_rules('featured_heading', 'Featured Heading', 'trim');
            $this->form_validation->set_rules('featured_text', 'Featured Text', 'trim');

            if ($this->form_validation->run() == TRUE) {
                $post_data = [];
                $post_data['site_title'] = $this->input->post('site_title');
                $post_data['site_description'] = $this->input->post('site_description');
                $post_data['featured_heading'] = $this->input->post('featured_heading');
                $post_data['featured_text'] = $this->input->post('featured_text');
                if ($this->Setting->update($post_data)) {
                    $this->session->set_flashdata('success', 'The settings were successfully saved!');
                    redirect('admin/settings');
                } else {
                    $this->session->set_flashdata('error', 'There was an error saving the settings. Please try again later!');
                }
            }
        }

        $data['settings'] = $this->Setting->prepare();
        $data['main_content'] = 'admin/settings/index';
		$this->load->view('admin/layouts/main', $data);
    }
}
