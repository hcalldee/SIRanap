<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url() ?>/public/img/logo.png" type="image/ico">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />

    <link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />

    <link rel="stylesheet" href="<?= base_url('') ?>/public/lp/assets/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>/public/lp/assets/OwlCarousel/owl.theme.default.min.css">
    <!-- Custom fonts for this template-->
    <!-- <link href="<?= base_url(); ?>/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?= base_url(); ?>/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/public/css/sb-admin-2.css" rel="stylesheet">

    <!-- datepicker -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!-- toast -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/vendor/toast/toastr.css">
    <!-- data tables -->
    <!-- <link rel="stylesheet" href="<//?= base_url(); ?>/vendor/data-table/bootstrap.css"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/vendor/data-table/dataTables.bootstrap4.min.css">

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/public/js/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/chosen/component-chosen.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>/public/css/mystyle.css"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/my.css">

    <!-- <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/8/84/Coronavirus_Disease_Mitigation_Acceleration_Task_Force.jpg" type="image/ico"> -->

    <!-- SWEETT ALERT -->
    <script src="<?= base_url(); ?>/public/js/sweet-alert/sweetalert2.all.min.js"></script>

    <!-- CHART JS -->
    <!-- <script src="<?= base_url(); ?>/public/vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url(); ?>/public/vendor/chart.js/Chart.bundle.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->

    <script src="<?= base_url(); ?>/public/vendor/chart-bar/Chart.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/timepick/demo.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/css/wickedpicker.min.css'); ?>">


    <!-- css file input -->
    <link href="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/css/fileinput.css" rel="stylesheet">


    <style>
        body {
            color: #858796;
        }
    </style>

</head>

<body class="bg-gradient-white">
    <?= $this->renderSection('content'); ?>


    <!-- Bootstrap core JavaScript-->
    <!-- <script src="<?= base_url(); ?>public/js/jquery-3.4.1.min.js"></script> -->
    <script src="<?= base_url(); ?>/public/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/public/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/data-table/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/data-table/dataTables.bootstrap4.min.js"></script>


    <script src="<?= base_url(); ?>/public/js/wickedpicker.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/chosen.jquery.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/scriptku.js"></script>

    <!-- file input -->
    <script src="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/js/fileinput.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/js/locales/id.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/js/plugins/piexif.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/themes/fa/theme.js"></script>

    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://d3js.org/topojson.v0.min.js"></script>


    <!-- toast -->
    <script src="<?= base_url(); ?>/public/vendor/toast/toastr.min.js"></script>

    <script>
        $('.timepicker-24-hr').wickedpicker({
            twentyFour: true
        });
    </script>
    <?= $this->include('/Admin/jquery/dashboard/jquery'); ?>

</body>
<?= $this->include('/layout/jquery'); ?>
<?= $this->include('/Admin/jquery'); ?>
<?= $this->include('/Admin/jquery/akun/jquery'); ?>
<?= $this->include('/Admin/jquery/perawat/jquery'); ?>
<?= $this->include('/Admin/jquery/pasien/jquery'); ?>
<?= $this->include('/Admin/jquery/ruangan/jquery'); ?>
<?= $this->include('/Admin/jquery/assessment/jquery'); ?>
<?= $this->include('/Admin/jquery/plan/jquery'); ?>
<?= $this->include('/Admin/jquery/dokter/jquery'); ?>
<?= $this->include('/Admin/jquery/spesialis/jquery'); ?>
<?= $this->include('/Admin/jquery/userrole/jquery'); ?>
<?= $this->include('/Admin/jquery/kategori/jquery'); ?>
<?= $this->include('/Admin/jquery/shift/jquery'); ?>
<?= $this->include('/Admin/jquery/tindakan/jquery'); ?>

</html>