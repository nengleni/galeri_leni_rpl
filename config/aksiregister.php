<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

$sql = mysqli_query($koneksi, "INSERT INTO `user`(`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES 
('','$username','$password','$email','$namalengkap','$alamat')");

if ($sql) {
    echo "<script>
    alert ('Pendaftaran Akun Berhasil');
    location.href = '../login.php';
    </script>";
}