<?php defined('BASEPATH') or exit('No direct script access allowed');

$config['per_page'] = 10;
$config['uri_segment'] = 2;
$config['num_links'] = 7;
$config['use_page_numbers'] = true;
$config['display_pages'] = false;
  
$config['full_tag_open'] = '<div class="clearfix mt-3">';
$config['full_tag_close'] = '</div>';

$config['prev_link'] = '&larr; Newer Posts';
$config['prev_tag_open'] = '<div class="float-left">';
$config['prev_tag_close'] = '</div>';

$config['next_link'] = 'Older Posts &rarr;';
$config['next_tag_open'] = '<div class="float-right">';
$config['next_tag_close'] = '</div>';

$config['attributes'] = ['class' => 'btn btn-primary'];