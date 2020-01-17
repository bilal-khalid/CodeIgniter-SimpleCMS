<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/dashboard') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/categories') ?>">Categories</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Add Category</li>
    </ol>
</nav>
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h3 class="my-2">Add Category</h3>
        </div>
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <form action="<?= site_url('admin/categories/add') ?>" method="POST">
            <div class="form-group mb-4">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>" 
                    required autofocus>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="<?= site_url('admin/categories') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->