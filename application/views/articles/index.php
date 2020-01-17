<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if (isset($articles)) : ?>

    <?php foreach ($articles as $article) : ?>
        <div class="post-preview">
            <a href="<?= site_url("articles/view/{$article->id}") ?>">
                <h2 class="post-title">
                    <?= h($article->title) ?>
                </h2>
                <h3 class="post-subtitle">
                    <?= character_limiter($article->body, 100) ?>
                </h3>
            </a>
            <p class="post-meta">Posted by
                <a href="#"><?= h($article->user) ?></a>
                on <?= date('F j, Y', strtotime($article->created)) ?></p>
        </div>
        <hr>
    <?php endforeach ?>
    
<?php endif ?>

<!-- Pager -->
<?php if (isset($pagination_links)) : ?>
    <?= $pagination_links ?>
<?php endif ?>