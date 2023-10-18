<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "link.php"; // Sertakan file koneksi database

function hanyaAngka($input)
{
    $filterInput = preg_replace('/[^0-9]/', '', $input);
    return $filterInput;
}

function CekId($input)
{
    if (ctype_digit($input)) {
        return true;
    } else {
        return false;
    }
}

$data = array();

if (isset($_GET['id']) && CekId($_GET['id'])) {
    $id = hanyaAngka($_GET['id']); // Bersihkan ID untuk memastikan hanya angka yang tersisa

    // Query untuk mengambil data berdasarkan ID
    $query = "SELECT user.*, pendidikan.*, pengalaman.*
          FROM user
          LEFT JOIN pendidikan ON user.id = pendidikan.id
          LEFT JOIN pengalaman ON user.id = pengalaman.id
          WHERE user.id = $id";


    // Eksekusi Query
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data = $row;
    } else {
        // jika data tidak ditemukan, kirim respons JSON dengan pesan error
        $data['error'] = 'Data tidak ditemukan';
    }
} else {
    // jika ID invalid atau ID tidak diberikan
    $data['error'] = 'Invalid ID';
}

echo json_encode($data);

// Tutup koneksi database
mysqli_close($koneksi);
?>