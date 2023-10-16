<?php
$server = "localhost"; // Nama Server
$username = "root"; // Nama Pengguna
$password = ""; // Password
$database = "portofolio"; // Nama Database

// Membuat koneksi ke database
$koneksi = mysqli_connect($server, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal");
}
?>