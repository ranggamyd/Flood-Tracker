<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Newsletter Area -->
<section class="newsletter section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 offset-lg-2 col-12 mb-3">
                <div class="subscribe-text text-center">
                    <h6 class="wow fadeInUp" data-wow-delay=".4s">Bergabung Sekarang</h6>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Daftarlah sekarang dan bergabung dengan komunitas kami di Cirebon Flood Tracker. Bagikan informasi tentang kejadian banjir, serta unggah foto terkait kejadian banjir di wilayah Anda.</p>
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
                    <form action="<?= base_url('register') ?>" method="post" class="newsletter-inner mt-5">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label text-light">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" class="form-control form-control-lg" id="nama_lengkap" required style="color: #000 !important;">
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label text-light">Jenis Kelamin</label>
                            <select name="jk" class="form-control form-control-lg" id="jk" required style="color: #000 !important;">
                                <option value="" selected disabled>== Pilih Jenis Kelamin ==</option>
                                <option value="Laki-laki" <?= set_select('jk', 'Laki-laki') ?>>Laki-laki</option>
                                <option value="Perempuan" <?= set_select('jk', 'Perempuan'); ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label text-light">Alamat</label>
                            <textarea name="alamat" class="form-control form-control-lg" id="alamat"><?= old('alamat') ?></textarea style="color: #000 !important;">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="no_hp" class="form-label text-light">No. Telepon</label>
                                <input type="number" name="no_hp" value="<?= old('no_hp') ?>" class="form-control form-control-lg" id="no_hp" style="color: #000 !important;">
                            </div>
                            <div class="col">
                                <label for="email" class="form-label text-light">Email</label>
                                <input type="email" name="email" value="<?= old('email') ?>" class="form-control form-control-lg" id="email" style="color: #000 !important;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label text-light">Username</label>
                            <input type="text" name="username" value="<?= old('username') ?>" class="form-control form-control-lg" id="username" required style="color: #000 !important;">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="password" class="form-label text-light">Password</label>
                                <input type="password" name="password" value="<?= old('password') ?>" class="form-control form-control-lg" id="password" required style="color: #000 !important;">
                            </div>
                            <div class="col">
                                <label for="password_conf" class="form-label text-light">Konfirmasi Password</label>
                                <input type="password" name="password_conf" value="<?= old('password_conf') ?>" class="form-control form-control-lg" id="password_conf" required style="color: #000 !important;">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-light">Sudah punya akun? <a href="<?= base_url('login') ?>" class="">Login sekarang! <span class="dir-part"></span></a></div>
                            <div class="button d-flex justify-content-between">
                                <button type="submit" class="btn mouse-dir white-bg">Daftarkan sekarang! <span class="dir-part"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Newsletter Form -->
            </div>
        </div>
    </div>
</section>
<!-- /End Newsletter Area -->
<?= $this->endSection() ?>