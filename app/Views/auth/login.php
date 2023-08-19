<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Start Newsletter Area -->
<section class="newsletter section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 offset-lg-2 col-12 mb-3">
                <div class="subscribe-text text-center">
                    <h6 class="wow fadeInUp" data-wow-delay=".4s">Masuk Sekarang</h6>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Silahkan masukan informasi login anda untuk melanjutkan.</p>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <hr />
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2 col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-form wow fadeInRight" data-wow-delay=".5s">
                    <form action="<?= base_url('login') ?>" method="post" class="newsletter-inner mt-5">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="username" class="form-label text-light">Username</label>
                            <input type="text" name="username" value="<?= old('username') ?>" class="form-control form-control-lg" id="username" required autofocus style="color: #000 !important;">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label text-light">Password</label>
                            <input type="password" name="password" value="<?= old('password') ?>" class="form-control form-control-lg" id="password" required style="color: #000 !important;">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-light">Belum punya akun? <a href="<?= base_url('register') ?>" class="">Daftarkan sekarang! <span class="dir-part"></span></a></div>
                            <div class="button d-flex justify-content-between">
                                <button type="submit" class="btn mouse-dir white-bg">Masuk sekarang! <span class="dir-part"></span></button>
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