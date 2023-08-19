<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= base_url('dashboard') ?>">
            <img src="<?= base_url() ?>/assets/images/dark-logo.svg" alt="Logo" style="width: 135%;">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main Menu
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="<?= base_url('dashboard') ?>">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url('admin/pelaporan') ?>">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Laporan Banjir</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url('admin/lokasi_banjir') ?>">
                    <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Lokasi Banjir</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url('admin/aset_terdampak') ?>">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Aset Terdampak</span>
                </a>
            </li>

            <li class="sidebar-header">
                Pengguna
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url('admin/users') ?>">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Kelola Pengguna</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url('admin/users/') . session('id_user') ?>">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profil Saya</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url('logout') ?>">
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
                </a>
            </li>

            <li class="sidebar-header">
                Lainnya
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url() ?>">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Halaman Utama</span>
                </a>
            </li>
        </ul>
    </div>
</nav>