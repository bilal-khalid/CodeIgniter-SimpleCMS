<?php defined('BASEPATH') or exit('No direct script access allowed');

$config['per_page'] = 10;
$config['uri_segment'] = 3;
$config['num_links'] = 7;
$config['use_page_numbers'] = true;
$config['display_pages'] = true;
  
$config['full_tag_open'] = '<ul class="pagination justify-content-center mt-3">';
$config['full_tag_close'] = '</ul>';

$config['first_link'] = false;
$config['last_link'] = false;

$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

$config['attributes'] = ['class' => 'page-link'];