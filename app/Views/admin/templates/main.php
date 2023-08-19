<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>CFT - <?= $title ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/images/favicon.svg" />

    <link href="<?= base_url('adminkit-dev') ?>/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/leaflet/leaflet.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/magnificPopup/magnificPopup.css" />

    <!-- Javascript -->
    <script src="<?= base_url() ?>/assets/vendors/leaflet/leaflet.js"></script>
</head>

<body>
    <div class="wrapper">

        <!-- Header -->
        <?= $this->include('admin/templates/sidebar') ?>
        <!-- End Header -->

        <div class="main">
            <!-- Header -->
            <?= $this->include('admin/templates/navbar') ?>
            <!-- End Header -->

            <!-- Main Content -->
            <?= $this->renderSection('content') ?>
            <!-- End Main Content -->

            <!-- Footer -->
            <?= $this->include('admin/templates/footer') ?>
            <!-- End Footer -->

        </div>
    </div>

    <script src="<?= base_url('adminkit-dev') ?>/js/app.js"></script>
    <script src="<?= base_url('adminkit-dev') ?>/js/datatables.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/magnificPopup/magnificPopup.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (session()->getFlashdata('success')) : ?>
                Swal.fire({
                    title: 'Berhasil!',
                    text: '<?= session()->getFlashdata('success') ?>',
                    icon: 'success',
                    timer: 2000,
                })
            <?php endif ?>
            <?php if (session()->getFlashdata('error')) : ?>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal menyimpan data!',
                    icon: 'error'
                })
            <?php endif ?>

            // Datatables with Buttons
            var datatablesButtons = $("#datatables-buttons").DataTable({
                responsive: true,
                lengthChange: !1,
                pageLength: 5,
                buttons: ["copy", "print"]
            });
            datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");

            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

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