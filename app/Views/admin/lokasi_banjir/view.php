<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h1 class="h3 mb-3"><strong><?= $title ?></strong></h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="<?= base_url('admin/aset_terdampak/kelola_aset/') . $lokasi_banjir['id'] ?>" class="btn btn-primary"><i class="align-middle me-1" data-feather="alert-octagon"></i> <span class="align-middle">Kelola Aset Terdampak</span></a>
            </div>
        </div>

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
                    <a class="img-popup" href="<?= base_url('assets/images/') . $lokasi_banjir['gambar'] ?>">
                        <img class="card-img-top" src="<?= base_url('assets/images/') . $lokasi_banjir['gambar'] ?>" alt="<?= $lokasi_banjir['lokasi'] ?>" style="max-height: 300px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <!-- <form action="<?= base_url('admin/lokasi_banjir/create') ?>" method="post" enctype="multipart/form-data"> -->
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-8">
                                <label for="lokasi" class="form-label">Nama Lokasi</label>
                                <input type="text" name="lokasi" value="<?= old('lokasi', $lokasi_banjir['lokasi']) ?>" class="form-control" id="lokasi" required readonly>
                            </div>
                            <div class="col-4">
                                <label for="tanggal" class="form-label">Waktu Kejadian</label>
                                <input type="datetime-local" name="tanggal" value="<?= old('tanggal', date('Y-m-d\TH:i:s', strtotime($lokasi_banjir['tanggal']))) ?>" class="form-control" id="tanggal" required readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ketinggian" class="form-label">Ketinggian (cm)</label>
                            <input type="number" name="ketinggian" value="<?= old('ketinggian', $lokasi_banjir['ketinggian']) ?>" step="any" class="form-control" id="ketinggian" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi"><?= old('deskripsi', $lokasi_banjir['deskripsi']) ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="garis_lintang" class="form-label">Garis Lintang</label>
                                <input type="text" name="garis_lintang" value="<?= old('garis_lintang', $lokasi_banjir['garis_lintang']) ?>" class="form-control" id="garis_lintang" required readonly>
                            </div>
                            <div class="col-6">
                                <label for="garis_bujur" class="form-label">Garis Bujur</label>
                                <input type="text" name="garis_bujur" value="<?= old('garis_bujur', $lokasi_banjir['garis_bujur']) ?>" class="form-control" id="garis_bujur" required readonly>
                            </div>
                            <div class="form-text mb-3">Posisikan marker pada map yang tersedia.</div>
                        </div>
                        <div class="float-start">
                            <a href="<?= base_url('admin/lokasi_banjir') ?>" class="btn btn-success"><i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle">Kembali</span></a>
                        </div>
                        <!-- <div class="float-end">
                                <button type="reset" class="btn btn-secondary"><i class="align-middle" data-feather="refresh-cw"></i> <span class="align-middle">Reset</span></button>
                                <button type="submit" class="btn btn-primary"><i class="align-middle" data-feather="save"></i> <span class="align-middle">Simpan</span></button>
                            </div> -->
                        <!-- </form> -->
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
    const map = L.map('map').setView([-6.732289545749154, 108.55300802949404], 12);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    L.marker([<?= $lokasi_banjir['garis_lintang'] ?>, <?= $lokasi_banjir['garis_bujur'] ?>]).bindPopup("<b><?= $lokasi_banjir['lokasi'] ?></b><br><a href='<?= base_url('admin/lokasi_banjir/') . $lokasi_banjir['id'] ?>'>Lihat Detail</a>").addTo(map);
</script>
<?php $this->endSection(); ?>