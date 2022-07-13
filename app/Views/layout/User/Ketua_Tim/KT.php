<?= $this->extend('layout/User/Ketua_Tim/template_KT'); ?>

<?= $this->section('content'); ?>

<div id="wrapper">

    <?= $this->include('layout/User/Ketua_Tim/sidebar_KT') ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <?= $this->include('layout/topbar') ?>

            <div class="container-fluid">

                <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->
                <?= $this->renderSection('content'); ?>
            </div>
        </div>

        <?= $this->include('layout/footer') ?>

    </div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<?= $this->endSection(); ?>