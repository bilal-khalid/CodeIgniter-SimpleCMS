<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/dashboard') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Articles</li>
    </ol>
</nav>
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h3 class="my-2">Articles</h3>
            <a class="btn btn-primary my-2" href="<?= site_url('admin/articles/add') ?>">Add New</a>
        </div>
        <?php if (isset($articles)) : ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article) : ?>
                            <tr>
                                <td><?= $article->id ?></td>
                                <td><?= h($article->title) ?></td>
                                <td><?= h($article->category) ?></td>
                                <td><?= h($article->user) ?></td>
                                <td><?= date('F j, Y, g:i a', strtotime($article->created)) ?></td>
                                <td>
                                    <a href="<?= site_url("admin/articles/edit/{$article->id}") ?>" class="btn btn-secondary btn-sm">Edit</a>
                                    <a href="<?= site_url("admin/articles/delete/{$article->id}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
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
            <p>There are no articles.</p>
        <?php endif ?>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->
