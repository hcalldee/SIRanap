<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <div class="row ">
                <div class="col px-lg-0 pl-3">
                    <img src="<?= base_url() ?>/public/lp/assets/img/logo.png" alt="" style="width: 40px;">
                </div>
                <div class="col ml-auto px-2" style=" margin-top: -5px;">
                    <b style="font-size: 18PX;">RSUD PANGERAN JAYA SUMITRA</b>
                    <p class="mb-0" style="font-size: 13px;">KABUPATEN KOTABARU</p>
                </div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto poppins">
                <a class="nav-item nav-link text-uppercase mr-2 " href="<?= base_url('home'); ?>" style="color: black;">Beranda <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link text-uppercase mr-2" href="<?= base_url('home/about'); ?>" style="color: black;">About</a>
                <a class="nav-item btn btn-hijau text-uppercase" href="<?= base_url('/Login'); ?>">Login</a>
            </div>
        </div>
    </div>
</nav>