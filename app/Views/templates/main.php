<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>CFT - <?= $title ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/images/favicon.svg" />

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/animate.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/leaflet/leaflet.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/magnificPopup/magnificPopup.css" />

    <!-- Javascript -->
    <script src="<?= base_url() ?>/assets/js/tiny-slider.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/leaflet/leaflet.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header -->
    <?= $this->include('templates/header') ?>
    <!-- End Header -->

    <!-- Main Content -->
    <?= $this->renderSection('content') ?>
    <!-- End Main Content -->

    <!-- Footer -->
    <?= $this->include('templates/footer') ?>
    <!-- End Footer -->

    <!-- Scroll Top -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- Javascript -->
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/main.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/magnificPopup/magnificPopup.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (session()->getFlashdata('success')) : ?>
                Swal.fire({
                    title: 'Berhasil!',
                    text: '<?= session()->getFlashdata('success') ?>',
                    icon: 'success'
                })
            <?php endif ?>
            <?php if (session()->getFlashdata('error')) : ?>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal menyimpan data!',
                    icon: 'error'
                })
            <?php endif ?>

            $('.img-popup').magnificPopup({
                type: 'image',
                mainClass: 'mfp-with-zoom', // this class is for CSS animation below

                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it

                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function

                    // The "opener" function should return the element from which popup will be zoomed in
                    // and to which popup will be scaled down
                    // By defailt it looks for an image tag:
                    opener: function(openerElement) {
                        // openerElement is the element on which popup was initialized, in this case its <a> tag
                        // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
            });
        });
    </script>
</body>

</html>