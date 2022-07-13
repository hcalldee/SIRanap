<?php

echo $this->extend('layout/User/Ketua_Tim/KT');

echo $this->section('content');

if ($title == 'Perawat') {
    echo $this->include('KT/Perawat');
} else if ($title == 'Tindakan') {
    echo $this->include('KT/Tindakan');
} else if ($title == 'Kalender') {
    echo $this->include('KT/Kalender');
} else if ($title == 'Shift') {
    echo $this->include('KT/Shift');
} else if ($title == 'Pasien') {
    echo $this->include('KT/Pasien');
}
echo $this->endSection();
