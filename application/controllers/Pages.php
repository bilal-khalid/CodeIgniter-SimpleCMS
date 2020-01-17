<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends Public_Controller
{
    public function view($name)
	{
        switch ($name) {
            case 'about':
                $data['page'] = 'about';
                $data['main_content'] = 'pages/about';
                $data['bg_image'] = 'about-bg.jpg';
                $data['page_heading'] = 'About Me';
                $data['page_subheading'] = 'This is what I do.';
                break;
            case 'contact':
                $data['page'] = 'contact';
                $data['main_content'] = 'pages/contact';
                $data['bg_image'] = 'contact-bg.jpg';
                $data['page_heading'] = 'Contact Me';
                $data['page_subheading'] = 'Have questions? I have answers.';
                break;
            default:
                show_404();
        }
        
        $this->load->view('layouts/main', $data);
	}
}
