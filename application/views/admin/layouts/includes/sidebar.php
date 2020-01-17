<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="bg-light" id="sidebar-wrapper">
    <div class="sidebar-heading">SimpleCMS</div>
    <div class="list-group list-group-flush">
        <a href="<?= site_url('admin/dashboard') ?>" class="list-group-item list-group-item-action bg-light">
            Dashboard
        </a>
        <a href="<?= site_url('admin/articles') ?>" class="list-group-item list-group-item-action bg-light">
            Articles
        </a>
        <a href="<?= site_url('admin/categories') ?>" class="list-group-item list-group-item-action bg-light">
            Categories
        </a>
        <a href="<?= site_url('admin/users') ?>" class="list-group-item list-group-item-action bg-light">
            Users
        </a>
        <a href="<?= site_url('admin/settings') ?>" class="list-group-item list-group-item-action bg-light">
            Settings
        </a>
    </div>
</div>
<!-- /#sidebar-wrapper -->