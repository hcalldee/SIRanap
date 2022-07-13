<?php

echo $this->extend('layout/Admin/Admin');

echo $this->section('content');

if ($title == 'User') {
    echo $this->include('Admin/Account');
} else if ($title == 'Perawat') {
    echo $this->include('Admin/Perawat');
} else if ($title == 'Dashboard') {
    echo $this->include('Admin/Dashboard');
} else if ($title == 'Pasien') {
    echo $this->include('Admin/Pasien');
} else if ($title == 'Assessment') {
    echo $this->include('Admin/Assessment');
} else if ($title == 'Planning') {
    echo $this->include('Admin/Plan');
} else if ($title == 'Ruangan') {
    echo $this->include('Admin/Ruangan');
} else if ($title == 'Kategori') {
    echo $this->include('Admin/Kategori');
} else if ($title == 'Dokter') {
    echo $this->include('Admin/Dokter');
} else if ($title == 'Spesialis') {
    echo $this->include('Admin/Spesialis');
} else if ($title == 'User Menu') {
    echo $this->include('Admin/Usermenu');
} else if ($title == 'User Access Menu') {
    echo $this->include('Admin/Useraccessmenu');
} else if ($title == 'Role') {
    echo $this->include('Admin/Role');
} else if ($title == 'Userrole') {
    echo $this->include('Admin/Userrole');
} else if ($title == 'Tindakan') {
    echo $this->include('Admin/Tindakan');
} else if ($title == 'Shift') {
    echo $this->include('Admin/Shift');
}

echo $this->endSection();
