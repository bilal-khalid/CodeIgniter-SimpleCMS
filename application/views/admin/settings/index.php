<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/dashboard') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Settings</li>
    </ol>
</nav>
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h3 class="my-2">Settings</h3>
        </div>
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <form action="<?= site_url('admin/settings') ?>" method="POST">
            <div class="form-group">
                <label for="site_title">Site Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="site_title" id="site_title" 
                    value="<?= h($settings->site_title) ?>" required>
            </div>
            <div class="form-group">
                <label for="site_description">Site Description</label>
                <textarea class="form-control" name="site_description" id="site_description"><?= 
                    h($settings->site_description) ?></textarea>
            </div>
            <div class="form-group">
                <label for="featured_heading">Featured Heading</label>
                <input type="text" class="form-control" name="featured_heading" id="featured_heading" 
                    value="<?= h($settings->featured_heading) ?>">
            </div>
            <div class="form-group mb-4">
                <label for="featured_text">Featured Text</label>
                <textarea class="form-control" name="featured_text" id="featured_text"><?= 
                    h($settings->featured_text) ?></textarea>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->