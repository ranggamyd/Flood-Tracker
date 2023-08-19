<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong><?= $title ?></strong></h1>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="alert-message">
                    <h4 class="alert-heading fw-bold">Gagal!</h4>
                    <p><?= session()->getFlashdata('error') ?></p>
                </div>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <form action="<?= base_url('admin/users/update/') . $users['id'] ?>" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" value="<?= old('nama_lengkap', $users['nama_lengkap']) ?>" class="form-control" id="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select name="jk" class="form-control" id="jk" required>
                                    <option value="" selected disabled>== Pilih Jenis Kelamin ==</option>
                                    <option value="Laki-laki" <?= set_select('jk', 'Laki-laki', $users['jk'] == 'Laki-laki' ? true : false) ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= set_select('jk', 'Perempuan', $users['jk'] == 'Perempuan' ? true : false) ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat"><?= old('alamat', $users['alamat']) ?></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="no_hp" class="form-label">No. Telepon</label>
                                    <input type="number" name="no_hp" value="<?= old('no_hp', $users['no_hp']) ?>" class="form-control" id="no_hp">
                                </div>
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" value="<?= old('email', $users['email']) ?>" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" value="<?= old('username', $users['username']) ?>" class="form-control" id="username" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" value="<?= old('password') ?>" class="form-control" id="password" required>
                                </div>
                            </div>
                            <div class="float-start">
                                <a href="<?= base_url('admin/users') ?>" class="btn btn-success"><i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle">Kembali</span></a>
                            </div>
                            <div class="float-end">
                                <button type="reset" class="btn btn-secondary"><i class="align-middle" data-feather="refresh-cw"></i> <span class="align-middle">Reset</span></button>
                                <button type="submit" class="btn btn-primary"><i class="align-middle" data-feather="save"></i> <span class="align-middle">Simpan</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->endSection(); ?>