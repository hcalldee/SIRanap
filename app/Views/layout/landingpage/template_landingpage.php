<!DOCTYPE html>
<html lang="en">

<head>

    <title><?= $title ?></title>

    <link href="<?= base_url('') ?>/public/lp/assets/img/logo.png" rel="icon">
    <!-- <link href="css/styles.css" rel="stylesheet" /> -->
    <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?= base_url(); ?>/public/vendor/data-table/dataTables.bootstrap4.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- owl Carousel CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/public/lp/assets/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>/public/lp/assets/OwlCarousel/owl.theme.default.min.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Mulish:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('') ?>/public/lp/assets/css/style.css">

</head>

<body class="sb-nav-fixed">
    <!-- Navbar -->
    <?= $this->renderSection('content'); ?>
    <!-- Navbar End -->
    <script src="<?= base_url(''); ?>/public/vendor/data-table/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(''); ?>/public/vendor/data-table/dataTables.bootstrap4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="<?= base_url('') ?>/public/lp/assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>

    <!-- JS Chart -->
    <!-- <script src="<?= base_url('') ?>/public/lp/assets/demo/chart-JK.js"></script>
    <script src="<?= base_url('') ?>/public/lp/assets/demo/chart-usia.js"></script>
    <script src="<?= base_url('') ?>/public/lp/assets/demo/chart-RRuangan.js"></script>
    <script src="<?= base_url('') ?>/public/lp/assets/demo/chart-Covid.js"></script> -->

    <!-- JS Owl Carousel -->
    <script src="<?= base_url('') ?>/public/lp/assets/OwlCarousel/owl.carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            stagePadding: 50,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 5000,
            nav: true,
            dots: true,
            loop: true,
            responsive: {
                0: {
                    stagePadding: 20,
                    items: 1,
                    nav: false

                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1400: {
                    items: 4
                }
            }
        });
    </script>
</body>

</html>

<?= $this->include('landingpage/jquery'); ?>