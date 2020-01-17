<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-light navbar-toggler" id="menu-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url() ?>" target="_blank">View Site</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('admin/logout') ?>">Logout
                    (<?= $this->session->userdata('admin_username') ?>)</a>
            </li>
        </ul>
    </div>
</nav>
