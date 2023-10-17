<?php
$server = "localhost"; // Nama Server
$username = "id21412252_ihsan"; // Nama Pengguna
$password = "Ihsan-1326"; // Password
$database = "id21412252_portofolio"; // Nama Database

// Membuat koneksi ke database
$koneksi = mysqli_connect($server, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal");
}
?>