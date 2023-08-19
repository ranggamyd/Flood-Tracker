<!-- ========================= header start ========================= -->
<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>/assets/images/logo.svg" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="page-scroll" href="<?= base_url('cuaca') ?>">Cuaca</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="<?= base_url('lokasi_banjir') ?>">Lokasi Banjir</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="<?= base_url('aset_terdampak') ?>">Aset Terdampak</a>
                                </li>
                                <?php if ((session('logged_in') == true) && (session('is_admin') != 1)) : ?>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="<?= base_url('laporan_saya') ?>">Laporan Saya</a>
                                    </li>
                                <?php endif ?>
                                <li class="nav-item">
                                    <a class="page-scroll" href="<?= base_url('pelaporan') ?>">Laporkan Banjir</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                        <div class="button">
                            <?php if (session('logged_in') == true) : ?>
                                <?php if (session('is_admin') == 1) : ?>
                                    <a href="<?= base_url('dashboard') ?>" class="btn white-bg mouse-dir">Dashboard</a>
                                <?php endif ?>
                                <a href="<?= base_url('logout') ?>" class="btn white-bg mouse-dir">Logout</a>
                            <?php else : ?>
                                <a href="<?= base_url('login') ?>" class="btn white-bg mouse-dir">Login</a>
                            <?php endif ?>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
<!-- ========================= header end ========================= -->