<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/chosen/component-chosen.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/my.css">

    <!-- <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/8/84/Coronavirus_Disease_Mitigation_Acceleration_Task_Force.jpg" type="image/ico"> -->
    <link rel="icon" href="<?= base_url() ?>/public/img/logo.png" type="image/ico">

    <!-- SWEETT ALERT -->
    <script src="<?= base_url(); ?>/public/js/sweet-alert/sweetalert2.all.min.js"></script>

    <link rel="icon" href="https://lh3.googleusercontent.com/proxy/wZPMptawT3byUaNZx-m2GTC_sSKyfgXfFBFhMC8CzkfTbyjefcSLnyGdf8Uc2p50OdHfF87QJuEnMqIVgeIOOJtJRr6jRewF" type="image/ico">
</head>

<body class="bg-gradient-white" id="login-background">
    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url(); ?>/public/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/chosen.jquery.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/public/js/scriptku.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>


<?= $this->include('/layout/jquery'); ?>
<?= $this->include('/Auth/jquery'); ?>

</html>