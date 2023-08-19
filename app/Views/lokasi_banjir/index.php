<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Service Area -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Pemetaan Lokasi Banjir</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Pemetaan interaktif yang memperlihatkan lokasi banjir saat ini, tinggi muka air, dan daerah evakuasi di wilayah Cirebon.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-5">
                <form action="<?= base_url('lokasi_banjir') ?>" method="get">
                    <div class="row g-3 align-items-center">
                        <div class="col-6 text-end">
                            <label for="inputPassword6" class="col-form-label text-end">Tampil berdasarkan tanggal</label>
                        </div>
                        <div class="col-4">
                            <input type="text" id="date-range-input" name="daterange" class="form-control form-control-lg" data-date-format='yy-mm-dd' />
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</section>
<!-- /End Services Area -->

<!-- Pricing Table -->
<section id="pricing" class="pricing-table section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="section-title">
                    <!-- <span class="wow fadeInDown" data-wow-delay=".2s">Daftar Lokasi Banjir</span> -->
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Daftar Lokasi Banjir</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Berikut ini merupakan informasi terperinci tentang daerah-daerah yang rentan terhadap banjir, tinggi muka air saat terjadi banjir, dan daerah evakuasi yang perlu diperhatikan.</p>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <?php foreach ($lokasi_banjir as $item) : ?>
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".3s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title"><?= $item['lokasi'] ?></h4>
                            <div class="price">
                                <p class="amount"><?= $item['ketinggian'] ?>cm</p>
                            </div>
                        </div>
                        <!-- Table List -->
                        <ul class="table-list mb-0">
                            <li><?= date('d M Y', strtotime($item['tanggal'])) ?></li>
                        </ul>
                        <div class="button mt-3">
                            <a class="btn white-bg mouse-dir" href="<?= base_url('lokasi_banjir/') . $item['id'] ?>">Lihat Detail <span class="dir-part"></span></a>
                        </div>
                        <!-- Table Bottom -->
                    </div>
                    <!-- End Single Table-->
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!--/ End Pricing Table -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#date-range-input').daterangepicker({
            startDate: moment().subtract(7, 'days'), // Tanggal awal default (7 hari yang lalu)
            endDate: moment(), // Tanggal akhir default (hari ini)
            opens: 'left', // Penempatan tampilan dropdown
            format: 'yyyy-mm-dd',
            ranges: {
                '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                '1 bulan terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
    });

    const map = L.map('map').setView([-6.732289545749154, 108.55300802949404], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    <?php foreach ($lokasi_banjir as $item) : ?>
        L.marker([<?= $item['garis_lintang'] ?>, <?= $item['garis_bujur'] ?>]).bindPopup("<b><?= $item['lokasi'] ?></b><br><a href='<?= base_url('lokasi_banjir/') . $item['id'] ?>'>Lihat Detail</a>").addTo(map);
    <?php endforeach ?>
</script>
<?= $this->endSection() ?>