<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div id="login-container" class="bg-light rounded border py-5 px-4 p-sm-5">
    <h3 class="text-primary text-center mb-3">SimpleCMS Admin Login</h3>
    <hr>
    <?php $this->load->view('admin/layouts/includes/flash'); ?>
    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <form action="<?= site_url('admin/login') ?>" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" 
                value="<?= set_value('username') ?>" required autofocus>
        </div>
        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>
</div>
