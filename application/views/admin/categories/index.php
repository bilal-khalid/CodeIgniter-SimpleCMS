<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/dashboard') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ol>
</nav>
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h3 class="my-2">Categories</h3>
            <a class="btn btn-primary my-2" href="<?= site_url('admin/categories/add') ?>">Add New</a>
        </div>
        <?php if (isset($categories)) : ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?= $category->id ?></td>
                                <td><?= h($category->name) ?></td>
                                <td><?= date('F j, Y, g:i a', strtotime($category->created)) ?></td>
                                <td>
                                    <a href="<?= site_url("admin/categories/edit/{$category->id}") ?>" class="btn btn-secondary btn-sm">Edit</a>
                                    <a href="<?= site_url("admin/categories/delete/{$category->id}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->

            <?php if (isset($pagination_links)) : ?>
                <?= $pagination_links ?>
            <?php endif ?>
            
        <?php else : ?>
            <p>There are no categories.</p>
        <?php endif ?>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->
