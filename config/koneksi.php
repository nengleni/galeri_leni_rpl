<?php
$hostname = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'gallery_v2';

$koneksi = mysqli_connect($hostname, $userdb, $passdb, $namedb) or die('Gagal Terhubung Ke Database');