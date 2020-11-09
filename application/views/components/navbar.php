<nav>
    <div class="nav-wrapper container">
        <a class="brand-logo"><img class="mt-10" src="<?= base_url('assets/image/Birdie_Vertical.png'); ?>" height="40" width="130"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="<?= site_url('home/') ?>">Home</a></li>
            <li><a href="<?= site_url('viewlist/') ?>">List</a></li>
            <li class="nav-border mx-15"></li>
            <?php if ($this->session->userdata('logged_in') !== true) { ?>
                <li><a href="<?= site_url('login/index/login') ?>">Login</a></li>
                <li><a class="btn btn-signup" href="<?= site_url('login/index/signup') ?>">Sign Up</a></li>
            <?php } else { ?>
                <li><?= $this->session->userdata('username') ?></li>
                <li><a class="ml-10" href="<?= site_url('details/logout') ?>">Logout</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>