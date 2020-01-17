<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<header class="masthead" style="background-image: url('<?= base_url('assets/images/article-bg.jpg'); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= h($article->title) ?></h1>
                    <h2 class="subheading"><?= character_limiter($article->body, 100) ?></h2>
                    <span class="meta">Posted by
                        <a href="#"><?= h($article->user) ?></a>
                        on <?= date('F j, Y', strtotime($article->created)) ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
