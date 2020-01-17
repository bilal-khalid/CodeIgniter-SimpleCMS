<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/layouts/includes/head'); ?>
</head>
<body>
    <div class="container h-100">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <?php $this->load->view($main_content); ?>
        </div>
    </div>
    <?php $this->load->view('admin/layouts/includes/scripts'); ?>
</body>
</html>
