<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h3 class="my-2">Latest Articles</h3>
        </div>
        <?php if (count($articles)) : ?>
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
        <?php else : ?>
            <p>There are no articles.</p>
        <?php endif ?>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-4">
            <h3 class="my-2">Latest Categories</h3>
        </div>
        <?php if (count($categories)) : ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?= $category->id ?></td>
                                <td><?= h($category->name) ?></td>
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
        <?php else : ?>
            <p>There are no categories.</p>
        <?php endif ?>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-md-6">
        <div class="mb-4">
            <h3 class="my-2">Latest Users</h3>
        </div>
        <?php if (count($users)) : ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= h($user->username) ?></td>
                                <td>
                                    <a href="<?= site_url("admin/users/edit/{$user->id}") ?>" class="btn btn-secondary btn-sm">Edit</a>
                                    <a href="<?= site_url("admin/users/delete/{$user->id}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        <?php else : ?>
            <p>There are no users.</p>
        <?php endif ?>
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->