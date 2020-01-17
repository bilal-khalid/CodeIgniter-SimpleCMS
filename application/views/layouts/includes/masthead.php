<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<header class="masthead" style="background-image: url('<?= base_url('assets/images/home-bg.jpg'); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?= h($this->settings->featured_heading) ?></h1>
                    <span class="subheading"><?= $this->settings->featured_text ?></span>
                </div>
            </div>
        </div>
    </div>
</header>