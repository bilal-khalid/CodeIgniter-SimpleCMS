<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/dashboard') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= site_url('admin/articles') ?>">Articles</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
    </ol>
</nav>
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h3 class="my-2">Edit Article</h3>
        </div>
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <form action="<?= site_url("admin/articles/edit/{$article->id}") ?>" method="POST">
            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="title" id="title" value="<?= h($article->title) ?>" 
                    required autofocus>
            </div>
            <div class="form-group">
                <label for="body">Body <span class="text-danger">*</span></label>
                <textarea class="form-control" name="body" id="body" rows="10" required><?= h($article->body) ?></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value=""></option>
                    <?php
                    foreach ($categories as $category) {
                        echo '<option value="' . $category->id . '" ' . 
                            ($article->category_id == $category->id ? 'selected' : '') . 
                            '>' . h($category->name) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">Author <span class="text-danger">*</span></label>
                <select class="form-control" name="user_id" id="user_id" required>
                    <option value=""></option>
                    <?php
                    foreach ($users as $user) {
                        echo '<option value="' . $user->id . '" ' .
                            ($article->user_id == $user->id ? 'selected' : '') .
                            '>' . sprintf('%s %s', h($user->first_name), h($user->last_name)) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="access">Access <span class="text-danger">*</span></label>
                <select class="form-control" name="access" id="access" required>
                    <option value=""></option>
                    <option value="0" <?= $article->access == '0' ? 'selected' : '' ?>>Everyone</option>
                </select>
                <small class="text-muted">Choose who will be able to access this page</small>
            </div>
            <div class="form-group mb-4">
                <label>Published <span class="text-danger">*</span></label><br>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="is_published" value="1" 
                            <?= $article->is_published == '1' ? 'checked' : '' ?>> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="is_published" value="0"
                            <?= $article->is_published == '0' ? 'checked' : '' ?>> No
                    </label>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="<?= site_url('admin/articles') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->