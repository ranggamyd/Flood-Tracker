<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong><?= $title ?></strong></h1>
        <div class="row">
            <div class="col">
                <div class="card" style="height: 100%;">
                    <div class="card-header">
                        <h5 class="card-title float-start">Daftar Pelaporan</h5>
                        <!-- <a href="<?= base_url('admin/pelaporan/create') ?>" class="btn btn-primary btn-sm float-end"><i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Tambah Data</span></a> -->
                    </div>
                    <div class="card-body pt-0">
                        <table id="datatables-buttons" class="table table-striped table-hover" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th style="text-align: center !important;">No</th>
                                    <th style="text-align: center !important;">Foto Kejadian</th>
                                    <th style="text-align: center !important;">Tanggal</th>
                                    <th style="text-align: center !important;">Nama Pelapor</th>
                                    <th style="text-align: center !important;">Lokasi</th>
                                    <th style="text-align: center !important;">Deskripsi</th>
                                    <th style="text-align: center !important;">Progress Penanganan</th>
                                    <th style="text-align: center !important;">Status</th>
                                    <th style="text-align: center !important;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pelaporan as $item) :
                                ?>
                                    <tr>
                                        <th class="text-center align-middle"><?= $i++ ?></th>
                                        <td class="text-center align-middle">
                                            <a class="img-popup" href="<?= base_url('assets/images/') . $item['foto_pelaporan'] ?>">
                                                <img src="<?= base_url('assets/images/') . $item['foto_pelaporan'] ?>" class="img-thumbnail img-popup" alt="<?= $item['lokasi'] ?>" style="width: 75px; height: 75px; object-fit: cover;">
                                            </a>
                                        </td>
                                        <td class=" align-middle"><?= date('d M Y', strtotime($item['tanggal_pelaporan'])) ?></td>
                                        <td class=" align-middle"><?= $item['nama_lengkap'] ?></td>
                                        <td class=" align-middle"><?= $item['lokasi'] ?></td>
                                        <td class=" align-middle"><?= $item['deskripsi'] ?></td>
                                        <td class="text-center align-middle" style="width: 100px;">
                                            <?= $item['progress_penanganan'] ?>%
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-<?= ($item['progress_penanganan'] >= 50) ? 'success' : 'warning' ?>" role="progressbar" style="width: <?= $item['progress_penanganan'] ?>%;" aria-valuenow="<?= $item['progress_penanganan'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php if ($item['status'] == 'Tertunda') : ?>
                                                <!-- <span class="badge bg-primary"><?= $item['status'] ?></span><br> -->
                                                <?php if ($item['status'] == 'Tertunda') : ?>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="<?= base_url('admin/pelaporan/konfirmasi/') . $item['p_id'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Terima & buat laporan"><i class="align-middle" data-feather="check-circle"></i></a>
                                                        <a href="<?= base_url('admin/pelaporan/tolak/') . $item['p_id'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tolak laporan"><i class="align-middle" data-feather="x-circle"></i></a>
                                                    </div>
                                                <?php endif ?>
                                            <?php elseif ($item['status'] == 'Dikonfirmasi') : ?>
                                                <span class="badge bg-success"><?= $item['status'] ?></span>
                                            <?php else : ?>
                                                <span class="badge bg-danger"><?= $item['status'] ?></span>
                                            <?php endif ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="<?= base_url('admin/pelaporan/update/') . $item['p_id'] ?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit"><i class="align-middle" data-feather="edit"></i></i></a>
                                                <form action="<?= base_url('admin/pelaporan/') . $item['p_id'] ?>" method="post" class="d-inline">
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
        </div>
    </div>
</main>
<?php $this->endSection(); ?>