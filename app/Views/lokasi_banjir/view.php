<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Features Area -->
<section class="Features section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-12 d-flex justify-content-center align-items-center">
                <img src="<?= base_url('assets/images/') . $lokasi_banjir['gambar'] ?>" alt="<?= $lokasi_banjir['gambar'] ?>" style="height: 100%; object-fit: cover;">
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <div class="feature-content">
                    <div class="title">
                        <h3 class="wow fadeInRight" data-wow-delay=".4s"><?= $lokasi_banjir['lokasi'] ?></h3>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="feature-thumb">
                            <i class="lni lni-cloudy-sun"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Waktu Kejadian</h2>
                            <p><?= date('H:i | d M Y', strtotime($lokasi_banjir['tanggal'])) ?></p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="feature-thumb">
                            <i class="lni lni-cloudy-sun"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Nama Lokasi</h2>
                            <p><?= $lokasi_banjir['lokasi'] ?></p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="feature-thumb">
                            <i class="lni lni-cloudy-sun"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Ketinggian</h2>
                            <p><?= $lokasi_banjir['ketinggian'] ?> cm</p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="feature-thumb">
                            <i class="lni lni-cloudy-sun"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Titik Koordinat</h2>
                            <p><?= $lokasi_banjir['garis_lintang'] ?>, <?= $lokasi_banjir['garis_bujur'] ?></p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="feature-thumb">
                            <i class="lni lni-cloudy-sun"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Deskripsi</h2>
                            <p><?= $lokasi_banjir['deskripsi'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features Area -->

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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
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
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- /End Services Area -->

<script type="text/javascript">
    const map = L.map('map').setView([-6.732289545749154, 108.55300802949404], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    <?php foreach ($lokasi_banjirs as $item) : ?>
        L.marker([<?= $item['garis_lintang'] ?>, <?= $item['garis_bujur'] ?>]).bindPopup("<b><?= $item['lokasi'] ?></b><br><a href='<?= base_url('lokasi_banjir/') . $item['id'] ?>'>Lihat Detail</a>").addTo(map);
    <?php endforeach ?>
</script>
<?= $this->endSection() ?>