<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/includes/head'); ?>
</head>
<body>
    <!-- Navigation -->
    <?php $this->load->view('layouts/includes/navigation'); ?>
    <!-- Page Header -->
    <?php if (isset($article)) : ?>
        <?php $this->load->view('layouts/includes/masthead_post'); ?>
    <?php elseif (isset($page)) : ?>
        <?php $this->load->view('layouts/includes/masthead_page'); ?>
    <?php else : ?>
        <?php $this->load->view('layouts/includes/masthead'); ?>
    <?php endif ?>
    <!-- Main Content -->
    <?php if (isset($article)) : ?>
    <article>
    <?php endif ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <?php $this->load->view($main_content); ?>
                </div>
            </div>
        </div>
    <?php if (isset($article)) : ?>
    </article>
    <?php endif ?>
    <hr>
    <!-- Footer -->
    <?php $this->load->view('layouts/includes/footer'); ?>
    <!-- Scripts -->
    <?php $this->load->view('layouts/includes/scripts'); ?>
</body>
</html>
