<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong><?= $title ?></strong></h1>
        <div class="row">
            <div class="col-lg-8">
                <div class="card" style="height: 100%;">
                    <div class="card-header">
                        <h5 class="card-title float-start">Daftar Lokasi Banjir</h5>
                        <a href="<?= base_url('admin/lokasi_banjir/create') ?>" class="btn btn-primary btn-sm float-end"><i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Tambah Data</span></a>
                    </div>
                    <div class="card-body pt-0">
                        <table id="datatables-buttons" class="table table-striped table-hover" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th style="text-align: center !important;">No</th>
                                    <th style="text-align: center !important;">Gambar</th>
                                    <th style="text-align: center !important; width: 110px;">Tanggal</th>
                                    <th style="text-align: center !important;">Lokasi</th>
                                    <th style="text-align: center !important;">Ketinggian</th>
                                    <th style="text-align: center !important;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($lokasi_banjir as $item) :
                                ?>
                                    <tr>
                                        <th class="text-center align-middle"><?= $i++ ?></th>
                                        <td class="text-center">
                                            <a class="img-popup" href="<?= base_url('assets/images/') . $item['gambar'] ?>">
                                                <img src="<?= base_url('assets/images/') . $item['gambar'] ?>" class="img-thumbnail img-popup" alt="<?= $item['lokasi'] ?>" style="width: 75px; height: 75px; object-fit: cover;">
                                            </a>
                                        </td>
                                        <td class="text-center"><?= date('d M Y', strtotime($item['tanggal'])) ?></td>
                                        <td><?= $item['lokasi'] ?></td>
                                        <td class="text-center"><?= $item['ketinggian'] ?> cm</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="<?= base_url('admin/lokasi_banjir/') . $item['id'] ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Detail"><i class="align-middle" data-feather="eye"></i></i></a>
                                                <a href="<?= base_url('admin/lokasi_banjir/update/') . $item['id'] ?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit"><i class="align-middle" data-feather="edit"></i></i></a>
                                                <form action="<?= base_url('admin/lokasi_banjir/') . $item['id'] ?>" method="post" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus"><i class="align-middle" data-feather="trash-2"></i></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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

    <?php foreach ($lokasi_banjir as $item) : ?>
        L.marker([<?= $item['garis_lintang'] ?>, <?= $item['garis_bujur'] ?>]).bindPopup("<b><?= $item['lokasi'] ?></b><br><a href='<?= base_url('admin/lokasi_banjir/') . $item['id'] ?>'>Lihat Detail</a>").addTo(map);
    <?php endforeach ?>
</script>
<?php $this->endSection(); ?>