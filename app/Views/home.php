<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Hero Area -->
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 co-12">
                    <div class="home-slider">
                        <div class="hero-text">
                            <span class="small-title wow fadeInUp" data-wow-delay=".3s">Cirebon Flood Tracker</span>
                            <h1 class="wow fadeInUp" data-wow-delay=".5s"><span>Selamat Datang di</span><br>
                                Cirebon Flood Tracker!</h1>
                            <p class="wow fadeInUp pe-4" data-wow-delay=".7s">
                                CFT (Cirebon Flood Tracker) adalah aplikasi sistem informasi geografis yang dirancang khusus untuk membantu Anda memantau dan memetakan banjir di wilayah Cirebon, kami memberikan informasi yang akurat dan terkini tentang risiko banjir di sekitar Anda.
                            </p>
                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                <a href="<?= base_url('cuaca') ?>" class="btn mouse-dir">Lihat Cuaca <span class="dir-part"></span></a>
                                <a href="<?= base_url('lokasi_banjir') ?>" class="btn mouse-dir">Lihat Lokasi Banjir <span class="dir-part"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Hero Area -->

<!-- Start Features Area -->
<section class="Features section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="feature-right wow fadeInUp" data-wow-delay=".3s">
                    <div class="watch-inner">
                        <div class="video-head wow zoomIn" data-wow-delay="0.4s">
                            <!-- <a href="https://www.youtube.com/watch?v=BqI0Q7e4kbk" class="glightbox video"><i class="lni lni-play"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="feature-content">
                    <div class="title">
                        <h3 class="wow fadeInRight" data-wow-delay=".5s">Fitur Utama</h3>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="feature-thumb">
                            <i class="lni lni-cloudy-sun"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Pemantauan Cuaca</h2>
                            <p>Dapatkan informasi cuaca terkini untuk wilayah Cirebon, termasuk curah hujan, suhu, dan kelembaban udara.</p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".6s">
                        <div class="feature-thumb">
                            <i class="lni lni-map"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Pemetaan Lokasi Banjir</h2>
                            <p>Pemetaan interaktif yang memperlihatkan lokasi banjir saat ini, tinggi muka air, dan daerah evakuasi di wilayah Cirebon.</p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".7s">
                        <div class="feature-thumb">
                            <i class="lni lni-caravan"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Pemantauan Aset Terdampak</h2>
                            <p>Informasi tentang aset yang terdampak banjir, seperti jalan raya, jembatan, dan infrastruktur penting lainnya di wilayah Cirebon.</p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".8s">
                        <div class="feature-thumb">
                            <i class="lni lni-stats-up"></i>
                        </div>
                        <div class="banner-content">
                            <h2 class="title">Laporkan Banjir</h2>
                            <p>Berpartisipasilah dengan mengirimkan laporan banjir langsung melalui aplikasi, termasuk tinggi muka air, kondisi banjir, dan foto terkait.</p>
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

<section class="section free-version-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="section-title mb-60">
                    <span class="text-white wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Laporkan Banjir!</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Jangan biarkan banjir mengambil Anda dengan kejutan</h2>
                    <p class="text-white wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Bergabunglah dengan Cirebon Flood Tracker hari ini dan menjadi bagian dari komunitas yang peduli terhadap keamanan dan kesiapan terhadap bencana banjir di wilayah Cirebon.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-btn text-right text-lg-right button wow fadeInRight" data-wow-delay=".8s">
                    <?php if (session('logged_in') == true) : ?>
                        <a href="<?= base_url('pelaporan') ?>" rel="nofollow" class="btn mouse-dir">Laporkan Banjir!<span class="dir-part"></span></a><br>
                    <?php else : ?>
                        <a href="<?= base_url('auth') ?>" rel="nofollow" class="btn mouse-dir">Login!<span class="dir-part"></span></a><br>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var slider = new tns({
        container: '.home-slider',
        slideBy: 'page',
        autoplay: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: true,
        controls: false,
        controlsText: [
            '<i class="lni lni-arrow-left prev"></i>',
            '<i class="lni lni-arrow-right next"></i>'
        ],
        responsive: {
            1200: {
                items: 1,
            },
            992: {
                items: 1,
            },
            0: {
                items: 1,
            }

        }
    });

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