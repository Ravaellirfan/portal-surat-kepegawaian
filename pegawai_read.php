<?php
require 'koneksi.php';
header('Content-Type: application/json');

// Tampilkan semua data pegawai (aktif & selesai) agar admin bisa ceklis selesai
$result = $conn->query("SELECT * FROM pegawai ORDER BY id DESC");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>
