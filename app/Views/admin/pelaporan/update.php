<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong><?= $title ?></strong></h1>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="alert-message">
                    <h4 class="alert-heading fw-bold">Gagal!</h4>
                    <p><?= session()->getFlashdata('errorList') ?></p>
                </div>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col-12">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <form action="<?= base_url('admin/pelaporan/update/') . $pelaporan['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <?php csrf_field() ?>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Nama Lokasi</label>
                                <input type="text" name="lokasi" value="<?= old('lokasi', $pelaporan['lokasi']) ?>" class="form-control" id="lokasi" required autofocus>
                            </div>
                            <div class="row mb-4">
                                <div class="col-2">
                                    <a class="img-popup" href="<?= base_url('assets/images/') . $pelaporan['foto_pelaporan'] ?>">
                                        <img src="<?= base_url('assets/images/') . $pelaporan['foto_pelaporan'] ?>" class="img-thumbnail img-preview" accept="image/png, image/jpeg" style="width: 100px; height: 100px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="col-10 d-flex align-items-center">
                                    <div class="w-100">
                                        <label for="foto_pelaporan" class="form-label">Foto Kejadian</label>
                                        <input type="file" name="foto_pelaporan" oninput="updatePreview()" class="form-control" id="foto_pelaporan">
                                        <input type="hidden" name="old_foto_pelaporan" value="<?= old('foto_pelaporan', $pelaporan['foto_pelaporan']) ?>" oninput="updatePreview()" class="form-control" id="old_foto_pelaporan">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" required><?= old('deskripsi', $pelaporan['deskripsi']) ?></textarea>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label for="status" class="form-label">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input name="status" class="form-check-input" type="radio" id="tertunda" value="Tertunda" <?= set_radio('status', 'Tertunda', old('status', $pelaporan['status']) == 'Tertunda' ? TRUE : FALSE) ?>>
                                        <label class="form-check-label" for="tertunda">Tertunda</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="status" class="form-check-input" type="radio" id="dikonfirmasi" value="Dikonfirmasi" <?= set_radio('status', 'Dikonfirmasi', old('status', $pelaporan['status']) == 'Dikonfirmasi' ? TRUE : FALSE) ?>>
                                        <label class="form-check-label" for="dikonfirmasi">Dikonfirmasi</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="status" class="form-check-input" type="radio" id="ditolak" value="Ditolak" <?= set_radio('status', 'Ditolak', old('status', $pelaporan['status']) == 'Ditolak' ? TRUE : FALSE) ?>>
                                        <label class="form-check-label" for="ditolak">Ditolak</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="progress_penanganan" class="form-label">Progress Penanganan (%)</label>
                                    <input type="number" name="progress_penanganan" step="any" min="0" max="100" value="<?= old('progress_penanganan', $pelaporan['progress_penanganan']) ?>" class="form-control" id="progress_penanganan" required>
                                </div>
                            </div>
                            <div class="float-start">
                                <a href="<?= base_url('admin/pelaporan') ?>" class="btn btn-success"><i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle">Kembali</span></a>
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

<script>
    function updatePreview() {
        $('.img-preview').attr('src', URL.createObjectURL(event.target.files[0]));
        $('.img-popup').attr('href', URL.createObjectURL(event.target.files[0]));
    };
</script>
<?php $this->endSection(); ?>