<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/dashboard') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h3 class="my-2">Users</h3>
            <a class="btn btn-primary my-2" href="<?= site_url('admin/users/add') ?>">Add New</a>
        </div>
        <?php if (isset($users)) : ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Group</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= sprintf('%s %s', h($user->first_name), h($user->last_name)) ?></td>
                                <td><?= h($user->username) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= get_group_name($user->group_id) ?></td>
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

            <?php if (isset($pagination_links)) : ?>
                <?= $pagination_links ?>
            <?php endif ?>
            
        <?php else : ?>
            <p>There are no users.</p>
        <?php endif ?>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->
