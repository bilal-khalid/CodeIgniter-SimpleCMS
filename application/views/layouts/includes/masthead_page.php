<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<header class="masthead" style="background-image: url('<?= base_url("assets/images/{$bg_image}"); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?= h($page_heading) ?></h1>
                    <h2 class="subheading"><?= h($page_subheading) ?></h2>
                </div>
            </div>
        </div>
    </div>
</header>
