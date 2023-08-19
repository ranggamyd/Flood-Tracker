<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Newsletter Area -->
<section class="newsletter section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 offset-lg-2 col-12 mb-3">
                <div class="subscribe-text text-center">
                    <h6 class="wow fadeInUp" data-wow-delay=".4s">Laporkan Bencana Banjir</h6>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Berikan partisipasi dan kontribusi anda dalam memantau dan melaporkan situasi banjir di wilayah Cirebon. Melalui fitur pelaporan banjir, Anda dapat berbagi informasi tentang tinggi muka air, kondisi banjir, serta mengunggah foto terkait kejadian banjir di wilayah Anda.</p>
                    <?php if (session()->getFlashdata('errorList')) : ?>
                        <hr />
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            <?= session()->getFlashdata('errorList'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2 col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-form wow fadeInRight" data-wow-delay=".5s">
                    <form action="<?= base_url('pelaporan') ?>" method="post" class="newsletter-inner mt-5" enctype="multipart/form-data">
                        <?php csrf_field() ?>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label text-light">Nama Lokasi</label>
                            <input type="text" name="lokasi" value="<?= old('lokasi') ?>" class="form-control form-control-lg" id="lokasi" required autofocus style="color: #000 !important;">
                        </div>
                        <div class="mb-3">
                            <label for="foto_pelaporan" class="form-label text-light">Foto Kejadian</label>
                            <input type="file" name="foto_pelaporan" value="<?= old('foto_pelaporan') ?>" accept="image/png, image/jpeg" class="form-control form-control-lg" id="foto_pelaporan" required style="color: #000 !important;">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="garis_lintang" class="form-label text-light">Garis Lintang</label>
                                    <input type="text" name="garis_lintang" value="<?= old('garis_lintang') ?>" class="form-control form-control-lg" id="garis_lintang" required readonly style="color: #000 !important;">
                                </div>
                                <div class="mb-3">
                                    <label for="garis_bujur" class="form-label text-light">Garis Bujur</label>
                                    <input type="text" name="garis_bujur" value="<?= old('garis_bujur') ?>" class="form-control form-control-lg" id="garis_bujur" required readonly style="color: #000 !important;">
                                </div>
                                <div class="form-text text-light mb-3">Posisikan marker pada map untuk memilih.</div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <div id="map" style="height: 215px; border-radius: 7.5px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label text-light">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control form-control-lg" id="deskripsi" required style="color: #000 !important;"><?= old('deskripsi') ?></textarea>
                        </div>
                        <div class="button d-flex justify-content-end">
                            <button type="submit" class="btn mouse-dir white-bg">Laporkan sekarang! <span class="dir-part"></span></button>
                        </div>
                    </form>
                </div>
                <!-- End Newsletter Form -->
            </div>
        </div>
    </div>
</section>
<!-- /End Newsletter Area -->

<script type="text/javascript">
    const map = L.map('map').setView([-6.732289545749154, 108.55300802949404], 12);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var currentMarker;

    map.on('click', function(e) {
        if (currentMarker) {
            currentMarker._icon.style.transition = "transform 0.3s ease-out";
            currentMarker._shadow.style.transition = "transform 0.3s ease-out";

            currentMarker.setLatLng(e.latlng);

            setTimeout(function() {
                currentMarker._icon.style.transition = null;
                currentMarker._shadow.style.transition = null;
            }, 300);
        } else {
            currentMarker = new L.marker(e.latlng).addTo(map);
        };

        $('#garis_lintang').val(e.latlng.lat);
        $('#garis_bujur').val(e.latlng.lng);
    });
</script>
<?= $this->endSection() ?>