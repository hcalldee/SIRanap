<?php

echo $this->extend('layout/User/Kepala_Ruangan/KR');

echo $this->section('content');

if ($title == 'Perawat') {
    echo $this->include('KR/Perawat');
} else if ($title == 'Pasien') {
    echo $this->include('KR/Pasien');
} else if ($title == 'Kategori') {
    echo $this->include('KR/Kategori');
} else if ($title == 'Kalender') {
    echo $this->include('KR/Kalender');
} else if ($title == 'Shift') {
    echo $this->include('KR/Shift');
} else if ($title == 'Ketua Tim') {
    echo $this->include('KR/KetuaTim');
} else if ($title == 'Tindakan') {
    echo $this->include('KR/Tindakan');
} else if ($title == 'Kategori') {
    echo $this->include('KR/Kategori');
}

echo $this->endSection();
