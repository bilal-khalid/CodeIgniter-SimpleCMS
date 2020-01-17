<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/layouts/includes/head'); ?>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('admin/layouts/includes/sidebar'); ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Top Navigation -->
            <?php $this->load->view('admin/layouts/includes/navigation'); ?>
            <div class="container-fluid py-3">
                <?php $this->load->view('admin/layouts/includes/flash'); ?>
                <?php $this->load->view($main_content); ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Scripts -->
    <?php $this->load->view('admin/layouts/includes/scripts'); ?>
</body>
</html>
