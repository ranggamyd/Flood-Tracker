<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Service Area -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Laporan Saya</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Berikut ini merupakan daftar laporan banjir yang telah Anda kontribusikan untuk memantau dan melaporkan situasi banjir di wilayah Cirebon.</p>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped table-hover" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th style="text-align: center !important;">No</th>
                            <th style="text-align: center !important;">Foto Kejadian</th>
                            <th style="text-align: center !important;">Tanggal</th>
                            <th style="text-align: center !important;">Lokasi</th>
                            <th style="text-align: center !important;">Status</th>
                            <th style="text-align: center !important;">Deskripsi</th>
                            <th style="text-align: center !important;">Progress Penanganan</th>
                            <th style="text-align: center !important;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($laporan_saya as $item) :
                        ?>
                            <tr>
                                <th class="text-center align-middle"><?= $i++ ?></th>
                                <td class="text-center align-middle">
                                    <a class="img-popup" href="<?= base_url('assets/images/') . $item['foto_pelaporan'] ?>">
                                        <img src="<?= base_url('assets/images/') . $item['foto_pelaporan'] ?>" class="img-thumbnail img-popup" alt="<?= $item['lokasi'] ?>" style="width: 75px; height: 75px; object-fit: cover;">
                                    </a>
                                </td>
                                <td class=" align-middle"><?= date('d M Y', strtotime($item['tanggal_pelaporan'])) ?></td>
                                <td class=" align-middle"><?= $item['lokasi'] ?></td>
                                <td class="text-center align-middle">
                                    <?php if ($item['status'] == 'Tertunda') : ?>
                                        <span class="badge bg-primary"><?= $item['status'] ?></span>
                                    <?php elseif ($item['status'] == 'Dikonfirmasi') : ?>
                                        <span class="badge bg-success"><?= $item['status'] ?></span>
                                    <?php else : ?>
                                        <span class="badge bg-danger"><?= $item['status'] ?></span>
                                    <?php endif ?>
                                </td>
                                <td class=" align-middle"><?= $item['deskripsi'] ?></td>
                                <td class="text-center align-middle" style="width: 100px;">
                                    <?= $item['progress_penanganan'] ?>%
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-<?= ($item['progress_penanganan'] >= 50) ? 'success' : 'warning' ?>" role="progressbar" style="width: <?= $item['progress_penanganan'] ?>%;" aria-valuenow="<?= $item['progress_penanganan'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <?php if ($item['status'] == 'Tertunda') : ?>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <form action="<?= base_url('pelaporan/') . $item['p_id'] ?>" method="post" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus"><i class="lni lni-trash align-middle"></i></button>
                                            </form>
                                        </div>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- /End Services Area -->
<!--/ End Pricing Table -->
<?= $this->endSection() ?>