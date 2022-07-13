<?php
echo $this->extend('layout/landingpage/landingpage');
echo $this->section('content');

if ($title == 'Beranda') {
    echo $this->include('landingpage/beranda');
} else if ($title == 'About') {
    echo $this->include('landingpage/about');
}

echo $this->endSection();
