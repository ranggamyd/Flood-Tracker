<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Service Area -->
<section class="services section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Aset Terdampak</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Halaman ini menyajikan informasi penting tentang aset yang terdampak oleh banjir di wilayah Cirebon. Kami memberikan data terperinci mengenai jalan raya, jembatan, dan infrastruktur penting lainnya yang dapat terkena dampak saat terjadi banjir.</p>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <table id="datatable" class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Aset</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                        foreach ($aset_terdampak as $item) : ?>
                            <tr>
                                <th class="text-center" scope="row"><?= $i++ ?></th>
                                <td class="text-center">
                                    <a class="img-popup" href="<?= base_url('assets/images/') . $item['gambar_aset'] ?>">
                                        <img src="<?= base_url('assets/images/') . $item['gambar_aset'] ?>" class="img-thumbnail img-popup" alt="<?= $item['nama_aset'] ?>" style="width: 75px; height: 75px; object-fit: cover;">
                                    </a>
                                </td>
                                <td><?= $item['nama_aset'] ?></td>
                                <td><?= $item['kategori'] ?></td>
                                <td><?= $item['kondisi'] ?></td>
                                <td><?= $item['lokasi'] ?></td>
                                <td class="text-center"><?= date('d M Y', strtotime($item['tanggal'])) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- /End Services Area -->
<?= $this->endSection() ?>