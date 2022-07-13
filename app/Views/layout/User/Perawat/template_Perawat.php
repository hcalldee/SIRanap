<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>

    <!-- offline -->
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/public/css/sb-admin-2.css" rel="stylesheet">
    <!-- data tables -->
    <!-- <link rel="stylesheet" href="<//?= base_url(); ?>/vendor/data-table/bootstrap.css"> -->
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/public/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/simple-calendar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/demo.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/chosen/component-chosen.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/my.css">
    <link rel="icon" href="<?= base_url() ?>/public/img/logo.png" type="image/ico">
    <!-- SWEETT ALERT -->
    <script src="<?= base_url(); ?>/public/js/sweet-alert/sweetalert2.all.min.js"></script>
    <!-- CHART JS -->
    <!-- <script src="<?= base_url(); ?>/public/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/chart.js/Chart.bundle.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
    <!-- <script src="<?= base_url(); ?>/public/vendor/chart-bar/Chart.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/public/css/timepick/demo.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/public/css/wickedpicker.min.css'); ?>">
    <!-- toast -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/vendor/toast/toastr.css">
    <!-- data tables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/vendor/data-table/dataTables.bootstrap4.min.css">

    <!-- online -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />

    <link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />

    <!-- Custom fonts for this template-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" /> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/css/sb-admin-2.css" integrity="sha512-1HclAOkQSKIyDqJS8azD2GusAZTbtDrChZU0o0UL2+3lDw2KeMLCEYOQzsO2joppy8L+CVKI3SkXBeZb3vUwYA==" crossorigin="anonymous" /> -->

    <!-- datepicker -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> -->

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> -->

    <!-- <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/8/84/Coronavirus_Disease_Mitigation_Acceleration_Task_Force.jpg" type="image/ico"> -->

    <!-- SWEETT ALERT -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script> -->


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

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/public/vendor/data-table/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/data-table/dataTables.bootstrap4.min.js"></script>


    <!-- file input -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/fileinput.min.js" integrity="sha512-vDrq7v1F/VUDuBTB+eILVfb9ErriIMW7Dn3JC/HOQLI8ZzTBTRRKrKJO3vfMmZFQpEGVpi+EYJFatPgVFxOKGA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/locales/id.min.js" integrity="sha512-jzCNGQc2Inz0st0pcHOFXbRuZSP6AoRDZk5gV++BA1v9T70FR612nsMmKZw+nuHP/UaZ/RdC5o5mkXQK3YOQVg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/plugins/piexif.min.js" integrity="sha512-rOFfpB1/58CtdhJdLV7Z9r4XcPv46dOngI3bAxgK8SUZEFjVtW4rG7BUu+3L5PxHMh3s52kpE65Cl29skN9rRw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/themes/explorer-fa/theme.min.js" integrity="sha512-hg/NmpjshDPjmZAAGr5j6UlcV1GotL1IBbFH96Q2fFGkr/OaMwAuZTl5j6swzyxUU3eihRUhRWn0rASVuyXGxw==" crossorigin="anonymous"></script>

    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://d3js.org/topojson.v0.min.js"></script>

    <!-- offline assets -->
    <!-- file input -->
    <!-- <script src="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/themes/fa/theme.js"></script> -->
    <!-- <script src="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/js/plugins/piexif.js"></script> -->
    <!-- <script src="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/js/locales/id.js"></script> -->
    <!-- <script src="<?= base_url(); ?>/public/vendor/bootstrap-fileinput-master/js/fileinput.js"></script> -->

    <!-- custom script  -->
    <!-- <script src="<?= base_url(); ?>/public/vendor/data-table/jquery.dataTables.min.js"></script> -->
    <script src="<?= base_url(); ?>/public/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/wickedpicker.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/chosen.jquery.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/scriptku.js"></script>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="<//?= base_url(); ?>/js/jquery-3.4.1.min.js"></script> -->
    <script src="<?= base_url(); ?>/public/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/public/vendor/jquery-easing/jquery.easing.min.js"></script>



    <!-- toast -->
    <script src="<?= base_url(); ?>/public/js/jquery.simple-calendar.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/toast/toastr.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script> -->

    <script>
        $('.timepicker-24-hr').wickedpicker({
            twentyFour: true
        });
    </script>

</body>

<?= $this->include('/layout/jquery'); ?>
<?= $this->include('/Perawat/jquery'); ?>

</html>