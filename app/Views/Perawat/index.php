<?php

echo $this->extend('layout/User/Perawat/Perawat');

echo $this->section('content');

if ($title == 'Tindakan') {
    echo $this->include('Perawat/Tindakan');
} else if ($title == 'Kalender') {
    echo $this->include('Perawat/Kalender');
} else if ($title == 'Pasien') {
    echo $this->include('Perawat/Pasien');
} else if ($title == 'Laporan Keperawatan') {
    echo $this->include('Perawat/Report');
}

echo $this->endSection();
