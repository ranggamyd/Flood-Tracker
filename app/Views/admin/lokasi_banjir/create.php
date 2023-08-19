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
            <div class="col-lg-8">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <form action="<?= base_url('admin/lokasi_banjir/create') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="lokasi" class="form-label">Nama Lokasi</label>
                                    <input type="text" name="lokasi" value="<?= isset($append) ? $append['lokasi'] : old('lokasi') ?>" class="form-control" id="lokasi" required>
                                </div>
                                <div class="col-4">
                                    <label for="tanggal" class="form-label">Waktu Kejadian</label>
                                    <input type="datetime-local" name="tanggal" value="<?= isset($append) ? date('Y-m-d\TH:i:s', strtotime($append['tanggal'])) : old('tanggal', date('Y-m-d\TH:i:s')) ?>" class="form-control" id="tanggal" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="ketinggian" class="form-label">Ketinggian (cm)</label>
                                <input type="number" name="ketinggian" value="<?= old('ketinggian') ?>" step="any" class="form-control" id="ketinggian" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi"><?= isset($append) ? $append['deskripsi'] : old('deskripsi') ?></textarea>
                            </div>
                            <div class="row mb-4">
                                <div class="col-2">
                                    <a class="img-popup" href="<?= base_url('assets/images') ?>/<?= isset($append) ? $append['gambar'] : 'default.jpg' ?>">
                                        <img src="<?= base_url('assets/images') ?>/<?= isset($append) ? $append['gambar'] : 'default.jpg' ?>" class="img-thumbnail img-preview" style="width: 100px; height: 100px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="col-10 d-flex align-items-center">
                                    <div class="w-100">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <input type="file" name="gambar" value="<?= isset($append) ? $append['gambar'] : old('gambar') ?>" oninput="updatePreview()" accept="image/png, image/jpeg" class="form-control" id="gambar">
                                        <input type="hidden" name="old_gambar" value="<?= isset($append) ? $append['gambar'] : null ?>" class="form-control" id="old_gambar">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="garis_lintang" class="form-label">Garis Lintang</label>
                                    <input type="text" name="garis_lintang" value="<?= isset($append) ? $append['garis_lintang'] : old('garis_lintang') ?>" class="form-control" id="garis_lintang" required readonly>
                                </div>
                                <div class="col-6">
                                    <label for="garis_bujur" class="form-label">Garis Bujur</label>
                                    <input type="text" name="garis_bujur" value="<?= isset($append) ? $append['garis_bujur'] : old('garis_bujur') ?>" class="form-control" id="garis_bujur" required readonly>
                                </div>
                                <div class="form-text mb-3">Posisikan marker pada map yang tersedia.</div>
                            </div>
                            <div class="float-start">
                                <a href="<?= base_url('admin/lokasi_banjir') ?>" class="btn btn-success"><i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle">Kembali</span></a>
                            </div>
                            <div class="float-end">
                                <button type="reset" class="btn btn-secondary"><i class="align-middle" data-feather="refresh-cw"></i> <span class="align-middle">Reset</span></button>
                                <button type="submit" class="btn btn-primary"><i class="align-middle" data-feather="save"></i> <span class="align-middle">Simpan</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="height: 100%;">
                    <div class="card-header">
                        <h5 class="card-title">Peta Lokasi Banjir</h5>
                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function updatePreview() {
        $('.img-preview').attr('src', URL.createObjectURL(event.target.files[0]));
        $('.img-popup').attr('href', URL.createObjectURL(event.target.files[0]));
    };

    const map = L.map('map').setView([-6.732289545749154, 108.55300802949404], 12);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var currentMarker;
    <?php if (isset($append)) : ?>
        currentMarker = L.marker([<?= $append['garis_lintang'] ?>, <?= $append['garis_bujur'] ?>]).addTo(map);
    <?php endif ?>

    map.on('click', function(e) {
        if (currentMarker) {
            currentMarker._icon.style.transition = "transform 0.3s ease-out";
            currentMarker._shadow.style.transition = "transform 0.3s ease-out";

            currentMarker.setLatLng(e.latlng);

            setTimeout(function() {
                currentMarker._icon.style.transition = null;
                currentMarker._shadow.style.transition = null;
            }, 300);
        } else {
            currentMarker = new L.marker(e.latlng).addTo(map);
        };

        $('#garis_lintang').val(e.latlng.lat);
        $('#garis_bujur').val(e.latlng.lng);
    });
</script>
<?php $this->endSection(); ?>