<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">

    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle"><?= $users['nama_lengkap'] ?></h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Pengguna</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="<?= base_url('adminkit-dev') ?>/img/avatars/avatar.jpg" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mt-3 mb-0"><?= $users['nama_lengkap'] ?></h5>
                        <div class="text-muted mb-4"><?= $users['is_admin'] == 1 ? 'Administrator' : 'User' ?></div>
                        <div class="d-grid">
                            <a href="<?= base_url('admin/users/update/') . $users['id'] ?>" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i> <span class="align-middle">Edit Pengguna</span></a>
                            <a href="<?= base_url('admin/users/')  ?>" class="btn btn-success mt-3"><i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle">Kembali</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Informasi Detail</h5>
                    </div>
                    <div class="card-body h-100">
                        <strong>Nama Lengkap</strong><br />
                        <?= $users['nama_lengkap'] ?>
                        <hr />
                        <strong>Jenis Kelamin</strong><br />
                        <?= $users['jk'] ?>
                        <hr />
                        <strong>Alamat</strong><br />
                        <?= $users['alamat'] ?>
                        <hr />
                        <strong>No. Telepon</strong><br />
                        <?= $users['no_hp'] ?>
                        <hr />
                        <strong>E-Mail</strong><br />
                        <?= $users['email'] ?>
                        <hr />
                        <strong>level</strong><br />
                        <?= $users['is_admin'] ? 'Administrator' : 'Pengguna' ?>
                        <hr />
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php $this->endSection(); ?>