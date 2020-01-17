<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('h')) {
    function h($data)
    {
        return html_escape($data);
    }
}

if (!function_exists('u')) {
    function u($string)
    {
        return urlencode($string);
    }
}

if (!function_exists('is_post_request')) {
    function is_post_request()
    {
        $CI =& get_instance();
        return $CI->input->server('REQUEST_METHOD') == 'POST';
    }
}
