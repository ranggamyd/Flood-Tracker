<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong><?= $title ?></strong></h1>

        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Laporan Banjir</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="file-text"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?= $total_laporan ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Lokasi Banjir</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="map-pin"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?= $total_lokasi_banjir ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Aset Terdampak</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="list"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?= $total_aset_terdampak ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Pengguna</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?= $total_users ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Laporan Banjir</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatables-buttons" class="table table-striped table-hover" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th style="text-align: center !important;">No</th>
                                    <th style="text-align: center !important;">Foto Kejadian</th>
                                    <th style="text-align: center !important;">Tanggal</th>
                                    <th style="text-align: center !important;">Nama Pelapor</th>
                                    <th style="text-align: center !important;">Lokasi</th>
                                    <th style="text-align: center !important;">Deskripsi</th>
                                    <th style="text-align: center !important;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pelaporan as $item) :
                                ?>
                                    <tr>
                                        <th class="text-center align-middle"><?= $i++ ?></th>
                                        <td class="text-center">
                                            <a class="img-popup" href="<?= base_url('assets/images/') . $item['foto_pelaporan'] ?>">
                                                <img src="<?= base_url('assets/images/') . $item['foto_pelaporan'] ?>" class="img-thumbnail img-popup" alt="<?= $item['lokasi'] ?>" style="width: 75px; height: 75px; object-fit: cover;">
                                            </a>
                                        </td>
                                        <td><?= date('d M Y', strtotime($item['tanggal_pelaporan'])) ?></td>
                                        <td><?= $item['nama_lengkap'] ?></td>
                                        <td><?= $item['lokasi'] ?></td>
                                        <td><?= $item['deskripsi'] ?></td>
                                        <td class="text-center">
                                            <?php if ($item['status'] == 'Tertunda') : ?>
                                                <span class="badge bg-primary"><?= $item['status'] ?></span>
                                            <?php elseif ($item['status'] == 'Dikonfirmasi') : ?>
                                                <span class="badge bg-success"><?= $item['status'] ?></span>
                                            <?php else : ?>
                                                <span class="badge bg-danger"><?= $item['status'] ?></span>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->endSection(); ?>