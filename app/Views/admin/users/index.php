<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong><?= $title ?></strong></h1>
        <div class="row">
            <div class="col">
                <div class="card" style="height: 100%;">
                    <div class="card-header">
                        <h5 class="card-title float-start">Daftar Pengguna</h5>
                        <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary btn-sm float-end"><i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Tambah Data</span></a>
                    </div>
                    <div class="card-body pt-0">
                        <table id="datatables-buttons" class="table table-striped table-hover" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th style="text-align: center !important;">No</th>
                                    <th style="text-align: center !important;">Nama Lengkap</th>
                                    <th style="text-align: center !important;">Jenis Kelamin</th>
                                    <th style="text-align: center !important;">No. Telp</th>
                                    <th style="text-align: center !important;">Email</th>
                                    <th style="text-align: center !important;">Username</th>
                                    <th style="text-align: center !important;">Level</th>
                                    <th style="text-align: center !important;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($users as $item) :
                                ?>
                                    <tr>
                                        <th class="text-center align-middle"><?= $i++ ?></th>
                                        <td><?= $item['nama_lengkap'] ?></td>
                                        <td class="text-center"><?= $item['jk'] ?></td>
                                        <td class="text-center"><?= $item['no_hp'] ?></td>
                                        <td class="text-center"><?= $item['email'] ?></td>
                                        <td class="text-center"><?= $item['username'] ?></td>
                                        <td class="text-center">
                                            <?php if ($item['is_admin'] == 1) : ?>
                                                <span class="badge bg-danger">Administrator</span>
                                            <?php else : ?>
                                                <span class="badge bg-primary">Pengguna</span>
                                            <?php endif ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="<?= base_url('admin/users/') . $item['id'] ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Detail"><i class="align-middle" data-feather="eye"></i></i></a>
                                                <a href="<?= base_url('admin/users/update/') . $item['id'] ?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit"><i class="align-middle" data-feather="edit"></i></i></a>
                                                <form action="<?= base_url('admin/users/') . $item['id'] ?>" method="post" class="d-inline">
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