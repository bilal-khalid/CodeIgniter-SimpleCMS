<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/dashboard') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/users') ?>">Users</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Add User</li>
    </ol>
</nav>
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h3 class="my-2">Add User</h3>
        </div>
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <form action="<?= site_url('admin/users/add') ?>" method="POST">
            <div class="form-group">
                <label for="first_name">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?= set_value('first_name') ?>" 
                    required autofocus>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?= set_value('last_name') ?>" 
                    required>
            </div>
            <div class="form-group">
                <label for="username">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>" 
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" 
                    required>
            </div>
            <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password') ?>" 
                    required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="<?= set_value('confirm_password') ?>" 
                    required>
            </div>
            <div class="form-group mb-4">
                <label for="group_id">Group <span class="text-danger">*</span></label>
                <select class="form-control" name="group_id" id="group_id" required>
                    <option value=""></option>
                    <?php
                    foreach (get_groups() as $group_id => $group_name) {
                        echo '<option value="' . $group_id . '" ' . 
                            (set_value('group_id') == $group_id ? 'selected' : '') . 
                            '>' . h($group_name) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="<?= site_url('admin/users') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->