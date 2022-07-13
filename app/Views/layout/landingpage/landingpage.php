<?= $this->extend('layout/landingpage/template_landingpage'); ?>

<?= $this->section('content'); ?>

<?= $this->include('layout/landingpage/navbar'); ?>

<?= $this->renderSection('content'); ?>

<?= $this->include('layout/landingpage/footer'); ?>

<?= $this->endSection(); ?>