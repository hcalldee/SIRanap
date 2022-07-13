<!doctype html>
<html lang="en">

<head>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $judul; ?></title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />

        <link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />

        <!-- Custom fonts for this template-->
        <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= base_url(); ?>/css/sb-admin-2.css" rel="stylesheet">

        <!-- datepicker -->

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

        <!-- toast -->
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/toast/toastr.css">
        <!-- data tables -->
        <!-- <link rel="stylesheet" href="<//?= base_url(); ?>/vendor/data-table/bootstrap.css"> -->
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/data-table/dataTables.bootstrap4.min.css">

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>/js/jquery-3.4.1.min.js"></script>


        <link rel="stylesheet" href="<?= base_url(); ?>/css/chosen/component-chosen.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/css/mystyle.css">

        <!-- <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/8/84/Coronavirus_Disease_Mitigation_Acceleration_Task_Force.jpg" type="image/ico"> -->
        <link rel="icon" href="https://cdn.pixabay.com/photo/2012/04/11/11/55/letter-n-27733_1280.png" type="image/ico">

        <!-- SWEETT ALERT -->
        <script src="<?= base_url(); ?>/js/sweet-alert/sweetalert2.all.min.js"></script>

        <!-- CHART JS -->
        <!-- <script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/chart.js/Chart.bundle.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->

        <script src="<?= base_url(); ?>/vendor/chart-bar/Chart.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script> -->

        <link rel="stylesheet" type="text/css" href="<?= base_url('/css/timepick/demo.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('/css/wickedpicker.min.css'); ?>">


        <!-- css file input -->
        <link href="<?= base_url(); ?>/vendor/bootstrap-fileinput-master/css/fileinput.css" rel="stylesheet">

        <style>
            body {
                color: #858796;
            }
        </style>

    </head>

    <title><?= $title ?></title>
</head>

<body>
    <?= $this->renderSection('content'); ?>
</body>

<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>/vendor/data-table/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/vendor/data-table/dataTables.bootstrap4.min.js"></script>


<script src="<?= base_url(); ?>/js/wickedpicker.min.js"></script>
<script src="<?= base_url(); ?>/js/chosen.jquery.min.js"></script>
<script src="<?= base_url(); ?>/js/scriptku.js"></script>

<!-- file input -->
<script src="<?= base_url(); ?>/vendor/bootstrap-fileinput-master/js/fileinput.js"></script>
<script src="<?= base_url(); ?>/vendor/bootstrap-fileinput-master/js/locales/id.js"></script>
<script src="<?= base_url(); ?>/vendor/bootstrap-fileinput-master/js/plugins/piexif.js"></script>
<script src="<?= base_url(); ?>/vendor/bootstrap-fileinput-master/themes/fa/theme.js"></script>

<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="https://d3js.org/topojson.v0.min.js"></script>


<!-- toast -->
<script src="<?= base_url(); ?>/vendor/toast/toastr.min.js"></script>

<script>
    $('.timepicker-24-hr').wickedpicker({
        twentyFour: true
    });
</script>

<?= $this->include('/layout/jquery'); ?>
<?= $this->include('/pasien/jquery'); ?>
<?= $this->include('/perawat/jquery'); ?>

</html>